<?php 

class Auto_Email_Schedule_Model extends CI_Model
{
    // constants for Auto_Email_Schedule
    const QUEUED = 'QUEUED';
    // constants for Auto_Email_Sent
    const SENT   = 'SENT';

    //------------------------//
    // Get
    //------------------------//

    // get the first row with the highest priority
    /*
        (
            [auto_email_schedule_id] => 2
            [auto_email_id] => 1
            [start_customer_id] => 1
            [end_customer_id] => 1
            [start_datetime] => 2017-09-28 14:30:00
            [status] => QUEUED
        )
    */
    public function getTopPriorityRow() {
        //
        $this->db->from('auto_email_schedule');
        $this->db->where('status', self::QUEUED);
        $this->db->where(
            'CAST(`start_datetime` AS DATETIME) <= CAST(NOW() AS DATETIME)'
        );
        $this->db->order_by('start_datetime', 'ASC');
        $this->db->order_by('auto_email_schedule_id', 'ASC');
        return $this->db->get()->row();
    }

    // using the inputs, these parses tables auto_email_sent and tables customer for a list of users that should be engaged
    /*
        (
            // data will look like this for a previously failed sent email
            [0] => Array
                (
                    [customer_id] => 7
                    [customer_first_name] => User
                    [customer_last_name] => 7
                    [customer_email_address] => user7@gmail.com
                    // error data from last attempt
                    [auto_email_sent_id] => 6
                    [datetime] => 2017-09-29 00:00:00
                    [status] => ERROR
                    [error] => error message of last attempt
                )
            // data will look like this for a fresh email
            [1] => Array
                (
                    [customer_id] => 8
                    [customer_first_name] => User
                    [customer_last_name] => 8
                    [customer_email_address] => user8@gmail.com
                    // error data from last are blank
                    [auto_email_sent_id] =>
                    [datetime] =>
                    [status] =>
                    [error] =>
                )
        )
    */
    public function getCustomers($auto_email_schedule_id, $max) {
        //
        $this->db->select('customer.customer_id, customer.customer_first_name, customer.customer_last_name, customer.customer_email_address, auto_email_sent.auto_email_sent_id, auto_email_sent.datetime, auto_email_sent.status, auto_email_sent.error');
        $this->db->from('customer');
        $this->db->join('auto_email_sent', 'customer.customer_id = auto_email_sent.customer_id', 'left');
        $this->db->where(
            '`customer`.`customer_id` >= ('.
            '   SELECT `start_customer_id`'.
            '   FROM `auto_email_schedule` AS `auto_email_schedule_start_customer`'.
            '   WHERE `auto_email_schedule_id` = '.$this->db->escape($auto_email_schedule_id).
            ')'
        );
        $this->db->where(
            '`customer`.`customer_id` <= ('.
            '    SELECT `end_customer_id`'.
            '    FROM `auto_email_schedule`'.
            '    WHERE `auto_email_schedule_id` = '.$this->db->escape($auto_email_schedule_id).
            ')'
        );
        $this->db->where(
            '`customer`.`customer_id` NOT IN ('.
            '    SELECT `customer_id` FROM `auto_email_sent`'.
            '    WHERE'.
            '    `auto_email_schedule_id` = '.$this->db->escape($auto_email_schedule_id).' AND '.
            '    `status` = "'.self::SENT.'"'.
            ')'
        );
        $this->db->order_by('customer.customer_id', 'ASC');
        $this->db->limit($max);
        return $this->db->get()->result_array();
    }

    //------------------------//
    // Set
    //------------------------//

    public function setStatus($auto_email_schedule_id, $status) {
        $data = array(
            'status' => $status
        );
        $this->db->where('auto_email_schedule_id', $auto_email_schedule_id);
        $this->db->update('auto_email_schedule', $data);
    }

}
?>