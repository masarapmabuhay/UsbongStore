<?php

class Autoemail extends CI_Controller {

    //------------------------//
    // Fields
    //------------------------//

    // log settings
    private $log_level    = 'info';
    private $log_marker   = 'AutoEmail: ';

    // control settings
    private $ctrl = NULL;

    // database fields
    private $data = NULL;

    //------------------------//
    // Public Functions
    //------------------------//

    public function run($auto_email_schedule_id = NULL)
    {
        //------------------------//
        // Step 0: init
        //------------------------//

        // load models
        $this->load->model('auto-email/Auto_Email_Setting_Model');
        $this->load->model('auto-email/Auto_Email_Schedule_Model');
        $this->load->model('auto-email/Auto_Email_Model');
        $this->load->model('auto-email/Auto_Email_Sent_Model');
        $this->load->model('auto-email/Auto_Email_Product_Model');

        // load libraries
        $this->load->library('email');

        // load helpers
        $this->load->helper('url');

        // load settings
        $this->ctrl['max_send']                        = $this->Auto_Email_Setting_Model->get('max_send');
        $this->ctrl['sendmail']['smtp_timeout']        = $this->Auto_Email_Setting_Model->get('smtp_timeout');
        $this->ctrl['sendmail']['protocol']            = $this->Auto_Email_Setting_Model->get('protocol');
        $this->ctrl['sendmail']['smtp_host']           = $this->Auto_Email_Setting_Model->get('smtp_host');
        $this->ctrl['sendmail']['smtp_user']           = $this->Auto_Email_Setting_Model->get('smtp_user');
        $this->ctrl['sendmail']['smtp_pass']           = $this->Auto_Email_Setting_Model->get('smtp_pass');
        $this->ctrl['sendmail']['smtp_crypto']         = $this->Auto_Email_Setting_Model->get('smtp_crypto');
        $this->ctrl['sendmail']['smtp_port']           = $this->Auto_Email_Setting_Model->get('smtp_port');
        $this->ctrl['sendmail']['sender_alias']        = $this->Auto_Email_Setting_Model->get('sender_alias');
        $this->ctrl['sendmail']['mailpath']            = $this->Auto_Email_Setting_Model->get('mailpath');
        $this->ctrl['auto_email_schedule']             = $this->Auto_Email_Schedule_Model->getTopPriorityRow($auto_email_schedule_id);
        $this->ctrl['status']                          = 'SENT';
        $this->ctrl['error']                           = 'Error Message';

        //------------------------//
        // Step 1: look for users to send email to
        //------------------------//

        // abort if there is nothing in queue
        if (!isset($this->ctrl['auto_email_schedule'])) {
            log_message($this->log_level, $this->log_marker.'Nothing in queue.');
            return;
        }

        // set queue to active to prevent other instances of this script from parsing it
        $this->Auto_Email_Schedule_Model->setStatus($this->ctrl['auto_email_schedule']->auto_email_schedule_id, 'ACTIVE');

        // look for users
        $this->ctrl['customers'] = $this->Auto_Email_Schedule_Model->getCustomers($this->ctrl['auto_email_schedule']->auto_email_schedule_id, $this->ctrl['max_send']);
        if (count($this->ctrl['customers']) < 1) {
            $this->ctrl['customers_last_index'] = NULL;
        } else {
            $this->ctrl['customers_last_index'] = sizeof($this->ctrl['customers']) - 1;
        }

        //------------------------//
        // Step 2: show settings
        //------------------------//

        log_message($this->log_level, $this->log_marker.'SETTING QUEUE to ACTIVE:');
        if (!isset($this->ctrl['auto_email_schedule'])) {
            log_message($this->log_level, $this->log_marker.' |--> auto_email_schedule_id = NULL');
        } else {
            log_message($this->log_level, $this->log_marker.' |--> auto_email_schedule_id = '.$this->ctrl['auto_email_schedule']->auto_email_schedule_id);
        }
        if (count($this->ctrl['customers']) < 1) {
            log_message($this->log_level, $this->log_marker.' |--> customer_ids           = NULL');
        } else {
            $customers_last_index = sizeof($this->ctrl['customers']) - 1;
            log_message($this->log_level, $this->log_marker.' |--> customer_ids           = '.$this->ctrl['customers'][0]['customer_id'].' to '.$this->ctrl['customers'][$this->ctrl['customers_last_index']]['customer_id']);
        }
        log_message($this->log_level, $this->log_marker.' |--> max_send               = '.$this->ctrl['max_send']);
        log_message($this->log_level, $this->log_marker.' |--> protocol               = '.$this->ctrl['sendmail']['protocol']);
        log_message($this->log_level, $this->log_marker.' |--> smtp_host              = '.$this->ctrl['sendmail']['smtp_host']);
        log_message($this->log_level, $this->log_marker.' |--> smtp_user              = '.$this->ctrl['sendmail']['smtp_user']);
        log_message($this->log_level, $this->log_marker.' |--> smtp_crypto            = '.$this->ctrl['sendmail']['smtp_crypto']);
        log_message($this->log_level, $this->log_marker.' |--> smtp_port              = '.$this->ctrl['sendmail']['smtp_port']);
        log_message($this->log_level, $this->log_marker.' |--> mailpath               = '.$this->ctrl['sendmail']['mailpath']);

        //------------------------//
        // Step 3: get email data
        //------------------------//

        if (count($this->ctrl['customers']) > 0) {
            // extract email settings
            $this->data['email']    = $this->Auto_Email_Model->get($this->ctrl['auto_email_schedule']->auto_email_id);

            // extract data from db
            $this->data['products'] = $this->Auto_Email_Product_Model->getAllProducts($this->ctrl['auto_email_schedule']->auto_email_id);

            // clean up data from db
            foreach ($this->data['products'] as $data_key => $data) {
                $this->data['products'][$data_key]['product_url'] = create_product_url($data['product_id'], $data['name'], $data['author']);
                $this->data['products'][$data_key]['image_url']   = create_image_url($data['name'], $data['product_type_name']);
            }
        }

        //------------------------//
        // Step 4: send email
        //------------------------//

        if (count($this->ctrl['customers']) > 0) {
            // check template for last minute change in settings (add more cases as needed in the future)
            $this->ctrl['sendmail']['mailtype'] = 'html';
            $this->ctrl['sendmail']['charset']  = 'utf-8';

            // initialize email sender
            $this->email->initialize($this->ctrl['sendmail']);

            foreach($this->ctrl['customers'] as $key => $customer) {
                // log transaction
                if (isset($customer['auto_email_sent_id'])) {
                    log_message($this->log_level, $this->log_marker.'Resending email to '.$customer['customer_email_address']);
                    log_message($this->log_level, $this->log_marker.' |--> Last attempt = '.$customer['datetime']);
                } else {
                    log_message($this->log_level, $this->log_marker.'Sending email to '.$customer['customer_email_address']);
                }

                // append custmer specifc data as needed
                $this->data['customer']['customer_first_name'] = $customer['customer_first_name'];

                // send transaction
                $this->email->set_newline("\r\n"); // this is needed for gmail smtp to parse content, without this email server rejects request
                $this->email->from($this->ctrl['sendmail']['smtp_user'], $this->ctrl['sendmail']['sender_alias']);
                $this->email->to($customer['customer_email_address']);
                $this->email->subject($this->data['email']->subject);
                $this->email->message(
                    $this->load->view('auto-email/'.$this->data['email']->view, $this->data, TRUE)
                );

                try {
                    if (
                        $this->email->send()
                    ) {
                        $this->ctrl['status']  = 'SENT';
                        $this->ctrl['error']   = NULL;
                    } else {
                        $this->ctrl['status']  = 'ERROR';
                        $this->ctrl['error']   = $this->email->print_debugger();
                    }
                } catch (Exception $e) {
                    $this->ctrl['status']  = 'ERROR';
                    $this->ctrl['error']   = $e->getMessage();
                }

                // record transaction
                if (isset($customer['auto_email_sent_id'])) {
                    $this->Auto_Email_Sent_Model->updateRow($customer['auto_email_sent_id'], $this->ctrl['status'], $this->ctrl['error']);
                } else {
                    $this->Auto_Email_Sent_Model->insertRow(
                        [
                            'auto_email_schedule_id' => $this->ctrl['auto_email_schedule']->auto_email_schedule_id,
                            'customer_id'            => $customer['customer_id'],
                            'status'                 => $this->ctrl['status'],
                            'error'                  => $this->ctrl['error'],
                        ]
                    );
                }

                if ($this->ctrl['status'] == 'ERROR') {
                    log_message($this->log_level, $this->log_marker.'ABORTING QUEUE... Unable to send email to customer_id = '.$customer['customer_id'].' via '.$customer['customer_email_address'].'.');
                    break;
                }
            }
        }

        //------------------------//
        // Step 5: do post script tasks
        //------------------------//

        if (
            // there are no customers left from the queue
            count($this->ctrl['customers']) < 1 OR
            // the last customer engaged was the last on the list
            (
                $this->ctrl['status'] == 'SENT' AND
                $this->ctrl['customers'][$this->ctrl['customers_last_index']]['customer_id'] == $this->ctrl['auto_email_schedule']->end_customer_id
            )
        ) {
            // set queue to DONE
            log_message($this->log_level, $this->log_marker.'QUEUE SET to DONE.');
            $this->Auto_Email_Schedule_Model->setStatus($this->ctrl['auto_email_schedule']->auto_email_schedule_id, 'DONE');
            $this->Auto_Email_Sent_Model->deleteRowsByAutoEmailScheduleId($this->ctrl['auto_email_schedule']->auto_email_schedule_id);
        } elseif (
            $this->ctrl['status'] == 'ERROR'
        ) {
            // set queue to DONE and delete entries from scratch table
            log_message($this->log_level, $this->log_marker.'QUEUE SET to ERROR.');
            $this->Auto_Email_Schedule_Model->setStatus($this->ctrl['auto_email_schedule']->auto_email_schedule_id, 'ERROR');
        } else {
            // set queue to QUEUED
            log_message($this->log_level, $this->log_marker.'QUEUE SET to QUEUED.');
            $this->Auto_Email_Schedule_Model->setStatus($this->ctrl['auto_email_schedule']->auto_email_schedule_id, 'QUEUED');
        }
    }
}