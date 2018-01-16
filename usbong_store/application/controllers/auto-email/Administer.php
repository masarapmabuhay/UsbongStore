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

    // returns bool
    private function bool_can_user_access() {
        $this->load->library('session');
        if ($this->session->userdata('is_admin') != 1) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    //------------------------//
    // Public Functions
    //------------------------//

    public function index($page = NULL) {

      //------------------------//
      // Init
      //------------------------//

      $customer_id = $this->session->userdata('customer_id');
      $is_admin = $this->session->userdata('is_admin');

      if (!isset($customer_id) || $is_admin!="1") {
        redirect('account/login'); //home page
      }

      // load header
      $this::initStyle();
      $this::initHeader();

      // load dependencies: helpers
      $this->load->helper('html');
      // load dependencies
      $this->load->model('auto-email/Auto_Email_Schedule_Model');
      $this->load->model('auto-email/Auto_Email_Model');

      // check authentication
      self::can_user_access();

      // prepare data
      if (!isset($page)) {
          $page = 1;
      }

      //------------------------//
      // Process Post Request
      //------------------------//

      // init post data
      $data['post']['kick_button']            = $this->input->post('kick_button');
      $data['post']['auto_email_schedule_id'] = $this->input->post('auto_email_schedule_id');

      // process post request as needed
      if (isset($data['post']['kick_button']) AND $data['post']['auto_email_schedule_id']) {
        // check if there is something to be kicked
        $status = $this->Auto_Email_Schedule_Model->getStatus($data['post']['auto_email_schedule_id']);

        // kick the queue
        if ($status == 'QUEUED') {
          // kick auto email script in the background
          $web_dir = exec('pwd').'/';
          $command = 'php '.$web_dir.'index.php auto-email/autoemail run '.escapeshellarg($data['post']['auto_email_schedule_id']).' > /dev/null &';
          exec($command);

          // poll status till it changes from QUEUE to anything else
          do {
            $new_status = $this->Auto_Email_Schedule_Model->getStatus($data['post']['auto_email_schedule_id']);
          } while (
            $status == $new_status
          );
        }
      }

      //------------------------//
      // Render
      //------------------------//

      $data['page']['page']        = $page;
      $data['page']['max_page']    = $this->Auto_Email_Model->getMaxPage();
      $data['page']['prev_page']   = ($page > 1                        ) ? ($page - 1) : NULL;
      $data['page']['next_page']   = ($page < $data['page']['max_page']) ? ($page + 1) : NULL;
      $data['auto_email']          = $this->Auto_Email_Model->getPage($page);
      $data['auto_email_schedule'] = $this->Auto_Email_Schedule_Model->getTopPriorityRow();

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

        // clear edit flag
        if ($this->session->userdata('auto_email-create-auto_email_id') !== NULL) {
            $this->session->unset_userdata('auto_email-create-auto_email_id');
            $this->session->unset_userdata('auto_email-create-auto_email_template_id');
            $this->session->unset_userdata('auto_email-create-auto_email_template-product_capacity');
            $this->session->unset_userdata('auto_email-create-auto_email_model');
            $this->session->unset_userdata('auto_email-create-auto_email_product_models');
        }

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

    public function edit($elem, $auto_email_id, $page = NULL) {
        // load header
        $this::initStyle();
        $this::initHeader();

        // load dependencies: helpers
        $this->load->helper('html');
        // load dependencies: models
        $this->load->model('auto-email/Auto_Email_Model');
        $this->load->model('auto-email/Auto_Email_Product_Model');

        // check authentication
        self::can_user_access();

        // validate $auto_email_id
        $auto_email_model = $this->Auto_Email_Model->get($auto_email_id);
        if (!isset($auto_email_model)) {
            show_error('Page does not exist.', 404, 'Not Found');
        }

        // initialize session if needed
        if (
            // edit flag is not active
            $this->session->userdata('auto_email-create-auto_email_id') === NULL OR
            // session auto_email_id is not the same as the id in the url
            $this->session->userdata('auto_email-create-auto_email_id') != $auto_email_model->auto_email_id
        ) {
            // prepare email
            $this->session->set_userdata('auto_email-create-auto_email_id', $auto_email_model->auto_email_id);
            $this->session->set_userdata('auto_email-create-auto_email_template_id', $auto_email_model->auto_email_template_id);
            $this->session->set_userdata(
                'auto_email-create-auto_email_model',
                [
                    'subject' => $auto_email_model->subject,
                    'data_01' => $auto_email_model->data_01,
                    'data_02' => $auto_email_model->data_02,
                    'data_03' => $auto_email_model->data_03,
                    'data_04' => $auto_email_model->data_04,
                    'data_05' => $auto_email_model->data_05,
                ]
            );

            // prepare products
            $auto_email_product_models = $this->Auto_Email_Product_Model->getAllProducts($auto_email_model->auto_email_id);
            $product_ids               = [];
            foreach ($auto_email_product_models as $key => $obj) {
                $product_ids[$obj['product_id']] = $obj['name'];
            }
            $this->session->set_userdata('auto_email-create-auto_email_template-product_capacity', $auto_email_model->product_capacity);
            $this->session->set_userdata('auto_email-create-auto_email_product_models', $product_ids);
        }

        // render common header
        $this->load->view(
            'auto-email/create_header',
            [
                'mode'          => 'edit',
                'auto_email_id' => $auto_email_model->auto_email_id,
            ]
        );

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

    public function preview($auto_email_id) {
        // load dependencies: libraries
        $this->load->library('encryption');
        // load dependencies: helpers
        $this->load->helper('html');
        // load dependencies: models
        $this->load->model('auto-email/Auto_Email_Model');
        $this->load->model('auto-email/Auto_Email_Customer_Model');
        $this->load->model('auto-email/Auto_Email_Product_Model');

        // check authentication
        self::can_user_access();

        // check input
        $data['email'] = $this->Auto_Email_Model->get($auto_email_id);
        if (!isset($data['email']->auto_email_id)) {
          show_error('Email does not exist.');
        }

        // render view based on template
        switch ($data['email']->auto_email_template_id) {
            case 1:
                // extract data from db
                $customer         = $this->Auto_Email_Customer_Model->get($this->session->userdata('customer_id'));
                $data['products'] = $this->Auto_Email_Product_Model->getAllProducts($data['email']->auto_email_id);

                // clean data from db
                $data['customer']['customer_first_name'] = $customer->customer_first_name;
                $data['customer']['customer_id']         = $customer->customer_id;
                foreach ($data['products'] as $data_key => $data_obj) {
                    // if url is defined in database, use that
                    if (isset($data_obj['external_url'])) {
                        $data['products'][$data_key]['product_url'] = $data_obj['external_url'];
                    } else {
                        // if no url is defined, fall back to usbong store url logic
                        $data['products'][$data_key]['product_url'] = create_product_url($data_obj['product_id'], $data_obj['name'], $data_obj['author']);
                    }
                    $data['products'][$data_key]['image_url']   = create_image_url($data_obj['name'], $data_obj['product_type_name']);
                }
                $this->load->view('auto-email/email_frame_simple_template', $data);
            break;
            case 2:
                // extract data from db
                $customer = $this->Auto_Email_Customer_Model->get($this->session->userdata('customer_id'));

                // clean data from db
                $data['customer']['customer_first_name'] = $customer->customer_first_name;
                $data['customer']['customer_id']         = $customer->customer_id;
                $this->load->view('auto-email/email_frame_single_template', $data);
            break;
            default:
                show_error('The email template is not yet supported.');
        }
    }

    public function unsubscribe($encrypted_customer_id) {
        // load dependencies: libraries
        $this->load->library('encryption');
        // load dependencies: helpers
        $this->load->helper('html');
        // load dependencies: models
        $this->load->model('auto-email/Auto_Email_Customer_Model');
        $this->load->model('auto-email/Auto_Email_Unsubscribe_Model');

        // validate encrypted data
        $data['encrypted_customer_id'] = $encrypted_customer_id;
        $data['customer_id']           = $this->encryption->decrypt(
            // decode ~ back to /:
            preg_replace(
                '/~/',
                '/',
                rawurldecode(
                    $data['encrypted_customer_id']
                )
            )
        );

        if (!$data['customer_id']) {
            show_error('The data submitted for email unsubscribe has been tampered.', 403, 'Authentication Failed');
        }

        // access database
        $data['customer'] = $this->Auto_Email_Customer_Model->get($data['customer_id']);

        // validate user exists: if user does not exist, then this url was not generated by this store
        if (!isset($data['customer']->customer_id)) {
            show_error('The data submitted for email unsubscribe has been tampered.', 403, 'Authentication Failed');
        }

        // load header
        $this::initStyle();
        $this::initHeader();

        // init post data
        $data['post']['submit_button']         = $this->input->post('submit_button');
        $data['post']['encrypted_customer_id'] = $this->input->post('encrypted_customer_id');

        if (
            isset($data['post']['submit_button'])  AND
            $data['post']['encrypted_customer_id'] AND
            $data['post']['encrypted_customer_id'] == $data['encrypted_customer_id']
        ) {
            // add user to unsubscribe list
            $result = $this->Auto_Email_Unsubscribe_Model->smartAdd($data['customer_id']);
            // show good bye page
            if ($result['success']) {
                $this->load->view('auto-email/unsubscribed', $data);
            } else {
                show_error($result['error'], 500, 'Server Error');
            }
        } else {
            // show confirmation page
            $this->load->view('auto-email/unsubscribe', $data);
        }
    }

    //------------------------//
    // Ajax Functions
    //------------------------//

    public function ajax_create_products_add() {
        // load dependencies
        $this->load->model('auto-email/Auto_Email_Product_Model');

        // access session data
        $post['product_capacity'] = $this->session->userdata('auto_email-create-auto_email_template-product_capacity');
        $post['product_id_list']  = $this->session->userdata('auto_email-create-auto_email_product_models');
        $post['auto_email_id']    = $this->session->userdata('auto_email-create-auto_email_id');

        // access post data
        $post['product_id']        = $this->input->post('product_id');
        $post['name']              = $this->input->post('name');

        // init output
        $output = [
            'success'      => FALSE,
            'error'        => 'Data is invalid.',
            'product_list' => [],
            'redirect_url' => NULL,
        ];

        // create dummy data
        for ($i = 1; $i <= $post['product_capacity']; $i++) {
            $output['product_list'][] = [
                'product_id'   => 0,
                'name'         => 'Blank',
                'layout_index' => $i,
                'layout_image' => base_url('/assets/images/auto-email/blank_image.png'),
            ];
        }

        // validate user access
        if (!self::bool_can_user_access()) {
            $output['error'] = 'Authorization failed.';
        } elseif (
            isset($post['product_id_list']) AND
            count($post['product_id_list']) >= $post['product_capacity']
        ) {
            $output['error'] = 'At most '.$post['product_capacity'].' entries can be chosen.';
        } elseif (
            isset($post['product_id_list']) AND
            count($post['product_id_list']) >= 0 AND
            in_array($post['product_id'], array_keys($post['product_id_list']))
        ) {
            $output['error'] = $post['name'].' is already in your list.';
        } elseif (isset($post['product_id'])) {

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

            // set output
            $output['success']      = TRUE;
            $output['error']        = NULL;

            // redirect
            if (isset($post['auto_email_id'])) {
                $output['redirect_url'] = (count($post['product_id_list']) == $post['product_capacity']) ? site_url('auto-email/edit/save/'.$post['auto_email_id']) : NULL;
            } else {
                $output['redirect_url'] = (count($post['product_id_list']) == $post['product_capacity']) ? site_url('auto-email/create/save') : NULL;
            }

            $temp['output_index'] = 0;
            foreach ($post['product_id_list'] as $product_id => $name) {
                // fetch info from database
                $temp['model_data'] = $this->Auto_Email_Product_Model->get($product_id);

                // update output data
                $output['product_list'][$temp['output_index']]['product_id']   = $temp['model_data']['product_id'];
                $output['product_list'][$temp['output_index']]['name']         = $temp['model_data']['name'];
                $output['product_list'][$temp['output_index']]['layout_index'] = $temp['output_index'] + 1;
                $output['product_list'][$temp['output_index']]['layout_image'] = create_image_url($temp['model_data']['name'], $temp['model_data']['product_type_name']);

                // iterate index
                $temp['output_index']++;
            }
        }

        // return response
        echo json_encode($output);
    }

    public function ajax_create_products_remove() {
        // load dependencies
        $this->load->model('auto-email/Auto_Email_Product_Model');

        // access session data
        $post['product_capacity'] = $this->session->userdata('auto_email-create-auto_email_template-product_capacity');
        $post['product_id_list']  = $this->session->userdata('auto_email-create-auto_email_product_models');

        // access post data
        $post['product_id'] = $this->input->post('product_id');

        // init output
        $output = [
            'success'      => FALSE,
            'error'        => 'Data is invalid.',
            'product_list' => []
        ];

        // create dummy data
        for ($i = 1; $i <= $post['product_capacity']; $i++) {
            $output['product_list'][] = [
                'product_id'   => 0,
                'name'         => 'Blank',
                'layout_index' => $i,
                'layout_image' => base_url('/assets/images/auto-email/blank_image.png'),
            ];
        }

        // validate user access
        if (!self::bool_can_user_access()) {
            $output['error'] = 'Authorization failed.';
        } elseif (
            // validate post data
            isset($post['product_id']     )     AND
            // check if there is something to delete
            isset($post['product_id_list'])     AND
            count($post['product_id_list']) > 0 AND
            in_array($post['product_id'], array_keys($post['product_id_list']))
        ) {
            // update session field
            unset($post['product_id_list'][$post['product_id']]);
            $this->session->set_userdata('auto_email-create-auto_email_product_models', $post['product_id_list']);

            // set output
            $output['success'] = TRUE;
            $output['error']   = NULL;

            $temp['output_index'] = 0;
            foreach ($post['product_id_list'] as $product_id => $name) {
                // fetch info from database
                $temp['model_data'] = $this->Auto_Email_Product_Model->get($product_id);

                // update output data
                $output['product_list'][$temp['output_index']]['product_id']   = $temp['model_data']['product_id'];
                $output['product_list'][$temp['output_index']]['name']         = $temp['model_data']['name'];
                $output['product_list'][$temp['output_index']]['layout_index'] = $temp['output_index'] + 1;
                $output['product_list'][$temp['output_index']]['layout_image'] = create_image_url($temp['model_data']['name'], $temp['model_data']['product_type_name']);

                // iterate index
                $temp['output_index']++;
            }
        }

        // return response
        echo json_encode($output);
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

        // access session
        $data['page']['auto_email_id'] = $this->session->userdata('auto_email-create-auto_email_id');

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
                if (isset($data['page']['auto_email_id'])) {
                    redirect('auto-email/edit/data/'.$data['page']['auto_email_id']);
                } else {
                    redirect('auto-email/create/data');
                }
            }
        }

        // render
        $data['page']['max_page']     = $this->Auto_Email_Template_Model->getMaxPage();
        $data['page']['current_page'] = $page;
        $data['page']['prev_page']    = ($page > 1                        ) ? ($page - 1) : NULL;
        $data['page']['next_page']    = ($page < $data['page']['max_page']) ? ($page + 1) : NULL;
        $data['auto_email_template']  = $this->Auto_Email_Template_Model->getPage($page);
        $data['page']['mode']         = (isset($data['page']['auto_email_id'])) ? 'edit' : 'create';

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

        // access session
        $data['page']['auto_email_id'] = $this->session->userdata('auto_email-create-auto_email_id');
        $data['page']['mode']          = (isset($data['page']['auto_email_id'])) ? 'edit' : 'create';

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
                // redirect based on edit flag
                if (isset($data['page']['auto_email_id'])) {
                    // redirects for edit
                    if ($data['auto_email_template']['product_capacity'] < 1) {
                        // products are not needed, skip to save
                        redirect('auto-email/edit/save/'.$data['page']['auto_email_id']);
                    } else {
                        // go to products
                        redirect('auto-email/edit/products/'.$data['page']['auto_email_id'].'/1');
                    }
                } else {
                    // redirects for new
                    if ($data['auto_email_template']['product_capacity'] < 1) {
                        // products are not needed, skip to save
                        redirect('auto-email/create/save');
                    } else {
                        // go to products
                        redirect('auto-email/create/products/1');
                    }
                }
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

        // process session data
        $session['product_id_list']    = $this->session->userdata('auto_email-create-auto_email_product_models');

        // render
        $data['page']['name_filter']        = $this->input->get('name_filter');
        $data['page']['max_page']           = $this->Auto_Email_Product_Model->getMaxPage($data['page']['name_filter']);
        $data['page']['current_page']       = $page;
        $data['page']['prev_page']          = ($page > 1                        ) ? ($page - 1) : NULL;
        $data['page']['next_page']          = ($page < $data['page']['max_page']) ? ($page + 1) : NULL;
        $data['page']['auto_email_id']      = $this->session->userdata('auto_email-create-auto_email_id');
        $data['page']['mode']               = (isset($data['page']['auto_email_id'])) ? 'edit' : 'create';
        $data['auto_email_product']         = $this->Auto_Email_Product_Model->getPage($page, $data['page']['name_filter']);
        $data['product_count']              = count($session['product_id_list']);
        $data['auto_email_chosen_products'] = [];
        if (count($session['product_id_list']) > 0) {
            foreach ($session['product_id_list'] as $product_id => $name) {
                $data['auto_email_chosen_products'][] = $this->Auto_Email_Product_Model->get($product_id);
            }
        }

        $this->load->view('auto-email/create_products', $data);
    }

    private function create_save() {
        // load dependencies
        $this->load->model('auto-email/Auto_Email_Model');
        $this->load->model('auto-email/Auto_Email_Product_Model');
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
            $this->session->userdata('auto_email-create-auto_email_template-product_capacity') > 0 AND (
                !$this->session->has_userdata('auto_email-create-auto_email_product_models') OR
                count($this->session->userdata('auto_email-create-auto_email_product_models')) != $this->session->userdata('auto_email-create-auto_email_template-product_capacity')
            )
        ) {
            $this->session->set_flashdata('auto_email-create_save-error', 'You need exactly '.$this->session->userdata('auto_email-create-auto_email_template-product_capacity').' products first.');
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
        $data['product_ids']               = (count($data['auto_email_product_models']) > 0) ? array_keys($data['auto_email_product_models']) : [];

        // access session fields for mode
        $data['page']['auto_email_id'] = $this->session->userdata('auto_email-create-auto_email_id');
        $data['page']['mode']          = (isset($data['page']['auto_email_id'])) ? 'edit' : 'create';

        // process post request
        $post['submit_button']   = $this->input->post('submit_button');
        $post['result_obj']      = NULL;
        if (isset($post['submit_button'])) {
            // do edit or create
            if ($data['page']['mode'] == 'edit') {
                $post['result_obj'] = $this->Auto_Email_Model->updateEmail(
                    $data['page']['auto_email_id'],
                    $data['auto_email_model'],
                    $data['product_ids']
                );
            } else {
                $post['result_obj'] = $this->Auto_Email_Model->createNewEmail(
                    $data['auto_email_model'],
                    $data['product_ids']
                );
            }

            if ($post['result_obj']['success']) {
                // delete session fields
                $this->session->unset_userdata('auto_email-create-auto_email_id');
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
