<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administer extends MY_Controller {

    //------------------------//
    // Private Functions
    //------------------------//

    // throws error if user has no access right
    private function can_user_access() {
        $this->load->library('session');
        if ($this->session->userdata('is_admin') != 1) {
            show_error('Admin access is required.', 403, 'Authentication Failed');
        }
    }

    //------------------------//
    // Public Functions
    //------------------------//

    public function index($page = NULL) {
        // load header
        $this::initStyle();
        $this::initHeader();

        // load dependencies
        $this->load->model('auto-email/Auto_Email_Model');

        // check authentication
        self::can_user_access();

        // prepare data
        if (!isset($page)) {
            $page = 1;
        }

        $data['page']['max_page']  = $this->Auto_Email_Model->getMaxPage();
        $data['page']['prev_page'] = ($page > 1                        ) ? ($page - 1) : NULL;
        $data['page']['next_page'] = ($page < $data['page']['max_page']) ? ($page + 1) : NULL;
        $data['auto_email']        = $this->Auto_Email_Model->getPage($page);

        // render view
        $this->load->view('auto-email/administer', $data);


        // load footer
        $this->load->view('templates/footer');
    }

    public function queue($auto_email_id, $page = NULL) {

        //------------------------//
        // Step 1: init
        //------------------------//

        // load header
        $this::initStyle();
        $this::initHeader();

        // load dependencies: helpers
        $this->load->helper('html');
        // load dependencies: libraries
        $this->load->library('form_validation');
        // load dependencies: models
        $this->load->model('auto-email/Auto_Email_Schedule_Model');

        // check authentication
        self::can_user_access();

        // prepare data
        if (!isset($page)) {
            $page = 1;
        }

        // init post data
        $data['post']['create_button'] = $this->input->post('create_button');
        $data['post']['status_button'] = $this->input->post('status_button');
        $data['post']['result_obj']    = NULL;

        //------------------------//
        // Step 2: process POST request for NEW button
        //------------------------//

        if (isset($data['post']['create_button'])) {
            // set validation rules
            $this->form_validation->set_rules('start_customer_id', 'Start Customer ID', 'required|integer');
            $this->form_validation->set_rules('end_customer_id'  , 'End Customer ID'  , 'required|integer');
            $this->form_validation->set_rules('end_customer_id'  , 'End Customer ID'  , 'greater_than_equal_to['.$this->input->post('start_customer_id').']');
            // regex for 2017-10-13 10:06:15:
            // ref: https://stackoverflow.com/questions/37732/what-is-the-regex-pattern-for-datetime-2008-09-01-123545
            $this->form_validation->set_rules(
                'start_datetime',
                'Target Kick',
                array(
                    'required',
                    'regex_match[/(\d{4})-(\d{2})-(\d{2}) (\d{2}):(\d{2}):(\d{2})/]'
                )
            );

            // save to database if validation passes
            if ($this->form_validation->run()) {
                // update database
                $data['post']['result_obj'] = $this->Auto_Email_Schedule_Model->add(
                    $this->input->post('auto_email_id'),
                    $this->input->post('start_customer_id'),
                    $this->input->post('end_customer_id'),
                    $this->input->post('start_datetime')
                );

                // report errors if needed
                if (!$data['post']['result_obj']['success']) {
                    $this->session->set_flashdata('auto_email_queue_error', $data['post']['result_obj']['error']);
                    redirect('auto-email/queue/'.$auto_email_id.'/'.$page);
                }
            }
        }

        //------------------------//
        // Step 3: process POST request for PAUSE and PLAY buttons
        //------------------------//

        if (isset($data['post']['status_button'])) {
            // do DB write access if there is a POST request
            $data['post']['status']                 = $this->input->post('status');
            $data['post']['auto_email_schedule_id'] = $this->input->post('auto_email_schedule_id');
            if (
                isset($data['post']['status']) AND
                isset($data['post']['auto_email_schedule_id'])
            ) {
                // update database
                $data['post']['result_obj'] = $this->Auto_Email_Schedule_Model->setSafeSet($data['post']['auto_email_schedule_id'], $data['post']['status']);
                if (!$data['post']['result_obj']['success']) {
                    $this->session->set_flashdata('auto_email_queue_error', $data['post']['result_obj']['error']);
                    redirect('auto-email/queue/'.$auto_email_id.'/'.$page);
                }
            }
        }

        //------------------------//
        // Step 4: render view
        //------------------------//

        // read database
        $data['page']['auto_email_id']  = $auto_email_id;
        $data['page']['max_page']       = $this->Auto_Email_Schedule_Model->getMaxPage($auto_email_id);
        $data['page']['current_page']   = $page;
        $data['page']['prev_page']      = ($page > 1                        ) ? ($page - 1) : NULL;
        $data['page']['next_page']      = ($page < $data['page']['max_page']) ? ($page + 1) : NULL;
        $data['auto_email']             = $this->Auto_Email_Schedule_Model->getPage($auto_email_id, $page);

        // render view
        $this->load->view('auto-email/queue', $data);

        // load footer
        $this->load->view('templates/footer');
    }

    public function create($elem, $page = NULL) {
        // load header
        $this::initStyle();
        $this::initHeader();

        // load dependencies: helpers
        $this->load->helper('html');
        // load dependencies: models
        $this->load->model('auto-email/Auto_Email_Model');

        // check authentication
        self::can_user_access();

        // render common header
        $this->load->view('auto-email/create_header');

        // render view
        if ($elem == 'template') {
            $this->create_template($page);
        } elseif ($elem == 'data') {
            $this->create_data();
        } elseif ($elem == 'products') {
            $this->create_products($page);
        } elseif ($elem == 'save') {
            $this->create_save();
        } else {
            show_error('Page does not exist.', 404, 'Not Found');
        }

        // load footer
        $this->load->view('templates/footer');
    }

    //------------------------//
    // Private Functions for Create
    //------------------------//

    private function create_template($page) {
        // load dependencies
        $this->load->model('auto-email/Auto_Email_Template_Model');

        // prepare data
        if (!isset($page)) {
            $page = 1;
        }

        // process post request
        $post['submit_button']          = $this->input->post('submit_button');
        $post['auto_email_template_id'] = $this->input->post('auto_email_template_id');
        if (isset($post['submit_button'])) {
            if (
                isset($post['auto_email_template_id'])
            ) {
                $email_template_model = $this->Auto_Email_Template_Model->get($post['auto_email_template_id']);
                // update session
                $this->session->set_userdata('auto_email-create-auto_email_template_id', $post['auto_email_template_id']);
                $this->session->set_userdata('auto_email-create-auto_email_template-product_capacity', $email_template_model['product_capacity']);
                // delete session fields
                $this->session->unset_userdata('auto_email-create-auto_email_model');
                $this->session->unset_userdata('auto_email-create-auto_email_product_models');
                // redirect
                redirect('auto-email/create/data');
            }
        }

        // render
        $data['page']['max_page']     = $this->Auto_Email_Template_Model->getMaxPage();
        $data['page']['current_page'] = $page;
        $data['page']['prev_page']    = ($page > 1                        ) ? ($page - 1) : NULL;
        $data['page']['next_page']    = ($page < $data['page']['max_page']) ? ($page + 1) : NULL;
        $data['auto_email_template']  = $this->Auto_Email_Template_Model->getPage($page);

        $this->load->view('auto-email/create_template', $data);
    }

    private function create_data() {
        // load dependencies: libraries
        $this->load->library('form_validation');
        // load dependencies: model
        $this->load->model('auto-email/Auto_Email_Template_Model');

        // prepare data
        $data['auto_email_template'] = NULL;
        if ($this->session->has_userdata('auto_email-create-auto_email_template_id')) {
            $data['auto_email_template'] = $this->Auto_Email_Template_Model->get(
                $this->session->userdata('auto_email-create-auto_email_template_id')
            );
        }

        // flag error if needed
        if (!isset($data['auto_email_template'])) {
            // report error
            $this->session->set_flashdata('auto_email-create_data-error', 'Please choose a template first.');
        }

        // process post request
        $post['submit_button'] = $this->input->post('submit_button');
        $post['subject']       = $this->input->post('subject');
        $post['data_01']       = $this->input->post('data_01');
        $post['data_02']       = $this->input->post('data_02');
        $post['data_03']       = $this->input->post('data_03');
        $post['data_04']       = $this->input->post('data_04');
        $post['data_05']       = $this->input->post('data_05');
        if (isset($post['submit_button'])) {
            $this->form_validation->set_rules('subject', 'Email Subject', 'required');
            if ($data['auto_email_template']['data_01_used'] == 1) {
                $this->form_validation->set_rules('data_01', $data['auto_email_template']['data_01_attribute'], 'required');
            }
            if ($data['auto_email_template']['data_02_used'] == 1) {
                $this->form_validation->set_rules('data_02', $data['auto_email_template']['data_02_attribute'], 'required');
            }
            if ($data['auto_email_template']['data_03_used'] == 1) {
                $this->form_validation->set_rules('data_03', $data['auto_email_template']['data_03_attribute'], 'required');
            }
            if ($data['auto_email_template']['data_04_used'] == 1) {
                $this->form_validation->set_rules('data_04', $data['auto_email_template']['data_04_attribute'], 'required');
            }
            if ($data['auto_email_template']['data_05_used'] == 1) {
                $this->form_validation->set_rules('data_05', $data['auto_email_template']['data_05_attribute'], 'required');
            }

            // update session if validation passes
            if ($this->form_validation->run()) {
                $this->session->set_userdata(
                    'auto_email-create-auto_email_model',
                    [
                        'subject' => $post['subject'],
                        'data_01' => $post['data_01'],
                        'data_02' => $post['data_02'],
                        'data_03' => $post['data_03'],
                        'data_04' => $post['data_04'],
                        'data_05' => $post['data_05'],
                    ]
                );
                // redirect
                redirect('auto-email/create/products/1');
            }
        }

        // render view
        $this->load->view('auto-email/create_data', $data);
    }

    private function create_products($page) {
        // load dependencies
        $this->load->model('auto-email/Auto_Email_Product_Model');
        $this->load->model('auto-email/Auto_Email_Template_Model');

        // prepare data
        if (!isset($page)) {
            $page = 1;
        }

        if ($this->session->has_userdata('auto_email-create-auto_email_template_id')) {
            $data['auto_email_template'] = $this->Auto_Email_Template_Model->get(
                $this->session->userdata('auto_email-create-auto_email_template_id')
            );
        }

        // flag error if needed
        if (!isset($data['auto_email_template'])) {
            // report error
            $this->session->set_flashdata('auto_email-create_products-error', 'Please choose a template first.');
        }

        // process post requests
        $post['submit_button']   = $this->input->post('submit_button');
        $post['remove_button']   = $this->input->post('remove_button');
        $post['product_id']      = $this->input->post('product_id');
        $post['name']            = $this->input->post('name');
        $post['product_id_list'] = $this->session->userdata('auto_email-create-auto_email_product_models');

        // process post requests: add
        if (
            isset($post['submit_button']) AND
            isset($post['product_id']   )
        ) {
            // check if there is still room in session field
            if (
                isset($post['product_id_list']) AND
                count($post['product_id_list']) >= $data['auto_email_template']['product_capacity']
            ) {
                // report error
                $this->session->set_flashdata('auto_email-create_products-warning', 'At most '.$data['auto_email_template']['product_capacity'].' entries can be chosen.');
            } else {
                // prepare session field
                if (
                    isset($post['product_id_list']) AND
                    count($post['product_id_list']) > 0
                ) {
                    // append data to past session fields
                    $post['product_id_list'][$post['product_id']] = $post['name'];
                } else {
                    // create session field
                    $post['product_id_list'] = [
                        $post['product_id'] => $post['name']
                    ];
                }
                // update session field
                $this->session->set_userdata('auto_email-create-auto_email_product_models', $post['product_id_list']);
                // redirect if product list is full
                if (
                    count($post['product_id_list']) >= $data['auto_email_template']['product_capacity']
                ) {
                    redirect('auto-email/create/save');
                }
            }
        }

        // process post requests: remove
        if (
            isset($post['remove_button']) AND
            isset($post['product_id']   )
        ) {
            // check if there is somthing to delete
            if (
                isset($post['product_id_list']) AND
                count($post['product_id_list']) > 0
            ) {
                // update session field
                unset($post['product_id_list'][$post['product_id']]);
                $this->session->set_userdata('auto_email-create-auto_email_product_models', $post['product_id_list']);
            }
        }

        // render
        $data['page']['name_filter']  = $this->input->get('name_filter');
        $data['page']['max_page']     = $this->Auto_Email_Product_Model->getMaxPage($data['page']['name_filter']);
        $data['page']['current_page'] = $page;
        $data['page']['prev_page']    = ($page > 1                        ) ? ($page - 1) : NULL;
        $data['page']['next_page']    = ($page < $data['page']['max_page']) ? ($page + 1) : NULL;
        $data['auto_email_product']   = $this->Auto_Email_Product_Model->getPage($page, $data['page']['name_filter']);
        $data['product_count']        = count($post['product_id_list']);


        $this->load->view('auto-email/create_products', $data);
    }

    private function create_save() {
        // load dependencies
        $this->load->model('auto-email/Auto_Email_Model');
        $this->load->model('auto-email/Auto_Email_Template_Model');

        // check pre-req
        if (
            !$this->session->has_userdata('auto_email-create-auto_email_template_id') OR
            !$this->session->has_userdata('auto_email-create-auto_email_template-product_capacity')
        ) {
            $this->session->set_flashdata('auto_email-create_save-error', 'Please choose a template first.');
        } elseif (!$this->session->has_userdata('auto_email-create-auto_email_model')) {
            $this->session->set_flashdata('auto_email-create_save-error', 'Please fill up Set Data first.');
        } elseif (
            (
                !$this->session->has_userdata('auto_email-create-auto_email_product_models') OR
                count($this->session->userdata('auto_email-create-auto_email_product_models')) != $this->session->userdata('auto_email-create-auto_email_template-product_capacity')
            ) AND
            $this->session->has_userdata('auto_email-create-auto_email_template-product_capacity') AND
            $this->session->has_userdata('auto_email-create-auto_email_product_models')
        ) {
            $this->session->set_flashdata('auto_email-create_save-error', 'You only have '.count($this->session->userdata('auto_email-create-auto_email_product_models')).' of '.$this->session->userdata('auto_email-create-auto_email_template-product_capacity').' products.');
        } elseif (
            (
                !$this->session->has_userdata('auto_email-create-auto_email_product_models') OR
                count($this->session->userdata('auto_email-create-auto_email_product_models')) != $this->session->userdata('auto_email-create-auto_email_template-product_capacity')
            ) AND
            $this->session->has_userdata('auto_email-create-auto_email_template-product_capacity')
        ) {
            $this->session->set_flashdata('auto_email-create_save-error', 'You need exactly '.$this->session->userdata('auto_email-create-auto_email_template-product_capacity').' products first.');
        } elseif (
            !$this->session->has_userdata('auto_email-create-auto_email_product_models') OR
            count($this->session->userdata('auto_email-create-auto_email_product_models')) != $this->session->userdata('auto_email-create-auto_email_template-product_capacity')
        ) {
            $this->session->set_flashdata('auto_email-create_save-error', 'Please choose products first.');
        }

        // access session and db fields
        $temp_auto_email_model             = $this->session->userdata('auto_email-create-auto_email_model');
        $data['auto_email_template_model'] = $this->Auto_Email_Template_Model->get($this->session->userdata('auto_email-create-auto_email_template_id'));
        $data['auto_email_model'] = [
            'subject'                => $temp_auto_email_model['subject'],
            'auto_email_template_id' => $this->session->userdata('auto_email-create-auto_email_template_id'),
            'data_01'                => $data['auto_email_template_model']['data_01_used'] == 1 ? $temp_auto_email_model['data_01'] : NULL,
            'data_02'                => $data['auto_email_template_model']['data_02_used'] == 1 ? $temp_auto_email_model['data_02'] : NULL,
            'data_03'                => $data['auto_email_template_model']['data_03_used'] == 1 ? $temp_auto_email_model['data_03'] : NULL,
            'data_04'                => $data['auto_email_template_model']['data_04_used'] == 1 ? $temp_auto_email_model['data_04'] : NULL,
            'data_05'                => $data['auto_email_template_model']['data_05_used'] == 1 ? $temp_auto_email_model['data_05'] : NULL,
        ];
        $data['auto_email_product_models'] = $this->session->userdata('auto_email-create-auto_email_product_models');

        // process post request
        $post['submit_button']   = $this->input->post('submit_button');
        $post['result_obj']      = NULL;
        if (isset($post['submit_button'])) {
            $post['result_obj'] = $this->Auto_Email_Model->createNewEmail(
                $data['auto_email_model'],
                array_keys($data['auto_email_product_models'])
            );

            if ($post['result_obj']['success']) {
                // delete session fields
                $this->session->unset_userdata('auto_email-create-auto_email_template_id');
                $this->session->unset_userdata('auto_email-create-auto_email_template-product_capacity');
                $this->session->unset_userdata('auto_email-create-auto_email_model');
                $this->session->unset_userdata('auto_email-create-auto_email_product_models');
                // redirect to queue page
                redirect('auto-email/queue/'.$post['result_obj']['auto_email_id'].'/1');
            } else {
                $this->session->set_flashdata('auto_email-create_save-warning', $post['result_obj']['error']);
            }
        }

        // render
        $this->load->view('auto-email/create_save', $data);
    }

}