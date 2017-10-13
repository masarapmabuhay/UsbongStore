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
            show_error('Admin access is required.', 404, 'Authentication Failed');
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

	
}
