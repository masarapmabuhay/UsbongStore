<?php 
class Auto_Email_Schedule_Model extends CI_Model
{
    // constants for Auto_Email_Schedule
    const QUEUED = 'QUEUED';
    const PAUSED = 'PAUSED';
    const ERROR  = 'ERROR';
    // constants for Auto_Email_Sent
    const SENT   = 'SENT';
    const LIMIT  = 30;
    //------------------------//
    // Get
    //------------------------//
    // get the first row with the highest priority
    // it can be user specified or not
    // if it's not user specified, oldest start_datetime will be selected
    /*
        (
            // auto_email_schedule
            [auto_email_schedule_id] => 2
            [auto_email_id] => 1
            [start_customer_id] => 1
            [end_customer_id] => 1
            [start_datetime] => 2017-09-28 14:30:00
            [status] => QUEUED
            // auto_email
            [subject] => Test Email Addressed to Customer 1
            [auto_email_template_id] => 1
            [datetime] => 2017-10-01 00:00:00
            [data_01] => This is a test email. This template is mobile ready. It addresses recipients by first name. It has a configurable welcome message. It houses nine products.
            [data_02] =>
            [data_03] =>
            [data_04] =>
            [data_05] =>
        )
    */
    public function getTopPriorityRow($auto_email_schedule_id = NULL) {
        $this->db->from('auto_email_schedule');
        $this->db->join('auto_email', 'auto_email_schedule.auto_email_id = auto_email.auto_email_id', 'left');
        $this->db->where('status', self::QUEUED);
        $this->db->where(
            'CAST(`start_datetime` AS DATETIME) <= CAST(NOW() AS DATETIME)'
        );
        if (isset($auto_email_schedule_id)) {
          $this->db->where('auto_email_schedule_id', $auto_email_schedule_id);
        }
        $this->db->order_by('start_datetime', 'ASC');
        $this->db->order_by('auto_email_schedule_id', 'ASC');
        return $this->db->get()->row();
    }
    // returns status field of row
    public function getStatus($auto_email_schedule_id) {
        $this->db->select('status');
        $this->db->from('auto_email_schedule');
        $this->db->where('auto_email_schedule_id', $auto_email_schedule_id);
        $data = $this->db->get()->row();
        return $data->status;
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
    /*
        returns a page worth of data
        [
            0           => [
                'auto_email_schedule_id' => 2, // most recent first
                'start_customer_id'      => 5,
                'end_customer_id'        => 8,
                'start_datetime'         => '2017-10-01 00:00:00 ',
                'status'                 => ERROR,
                // error data (only applicable if error exists)
                'auto_email_sent_id'     => 1,
                'customer_id'            => 5,
                'error'                  => 'Unable to connect to SMTP Server',
                // custom
                'customers_sent'         => 0,
            ],
            .
            .
            .
            (LIMIT - 1) => [
                'auto_email_schedule_id' => 1, // oldest last
                'start_customer_id'      => 1,
                'end_customer_id'        => 4,
                'start_datetime'         => '2017-10-01 00:00:00 ',
                'status'                 => DONE,
                // error data (only applicable if error exists)
                'auto_email_sent_id'     => NULL,
                'customer_id'            => NULL,
                'error'                  => NULL,
                // custom
                'customers_sent'         => 4,
            ],
        ]
    */
    public function getPage($auto_email_id, $page) {
        // translate $page to offset
        if (
            is_numeric($page) AND
            $page > 1
        ) {
            $offset = self::LIMIT * ($page - 1);
        } else {
            $offset = 0;
        }
        $this->db->select(
            // auto_email_schedule
            'auto_email_schedule.auto_email_schedule_id, auto_email_schedule.start_customer_id, auto_email_schedule.end_customer_id, auto_email_schedule.start_datetime, auto_email_schedule.status, '.
            // auto_email_sent (error data only)
            'auto_email_sent.auto_email_sent_id, auto_email_sent.customer_id, auto_email_sent.error, '.
            // custom
            '( '.
            '    SELECT COUNT(*) '.
            '    FROM auto_email_sent '.
            '    WHERE '.
            '        auto_email_schedule.auto_email_schedule_id = auto_email_sent.auto_email_schedule_id AND '.
            '        auto_email_sent.status                     = "SENT" '.
            ') AS customers_sent '
        );
        $this->db->from('auto_email_schedule');
        $this->db->join('auto_email_sent', 'auto_email_schedule.auto_email_schedule_id = auto_email_sent.auto_email_schedule_id AND auto_email_sent.status = "ERROR" ', 'left');
        $this->db->where('auto_email_id', $auto_email_id);
        $this->db->limit(self::LIMIT, $offset);
        $this->db->order_by('auto_email_schedule_id', 'DESC');
        return $this->db->get()->result_array();
    }
    public function getMaxPage($auto_email_id) {
        return ceil(
            $this->db->where('auto_email_id', $auto_email_id)->count_all_results('auto_email_schedule') / self::LIMIT
        );
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
    // this function only allows three transitions
    // - QUEUED to PAUSED
    // - PAUSED to QUEUED
    // - ERROR  to QUEUED
    // returns the following:
    // [
    //     'success' => bool,
    //     'error'   => XXX,
    // ]
    // true if transition is allowed and false if otherwise
    public function setSafeSet($auto_email_schedule_id, $status) {
        // init output
        $output = [
            'success' => FALSE,
            'error'   => '',
        ];
        // check if new status is valid
        if (!in_array($status, [self::PAUSED, self::QUEUED])) {
            $output['error'] = 'Status '.$status.' is not valid.';
            return $output;
        }
        // get current status
        $this->db->select('status');
        $this->db->from('auto_email_schedule');
        $this->db->where('auto_email_schedule_id', $auto_email_schedule_id);
        $old_data = $this->db->get()->row();
        // check if database entry exists
        if (!isset($old_data)) {
            $output['error'] = 'Entry auto_email_schedule_id = '.$auto_email_schedule_id.' does not exist.';
            return $output;
        }
        // check if transition is allowed
        // - QUEUED to PAUSED
        if (
            $status           == self::PAUSED AND
            !in_array($old_data->status, [self::QUEUED])
        ) {
            $output['error'] = 'Setting status from '.$old_data->status.' to '.$status.' is not allowed.';
            return $output;
        }
        // check if transition is allowed
        // - PAUSED to QUEUED
        // - ERROR  to QUEUED
        if (
            $status           == self::QUEUED AND
            !in_array($old_data->status, [self::PAUSED, self::ERROR])
        ) {
            $output['error'] = 'Setting status from '.$old_data->status.' to '.$status.' is not allowed.';
            return $output;
        }
        // update database
        $data['status'] = $status;
        $this->db->where('auto_email_schedule_id', $auto_email_schedule_id);
        $this->db->update('auto_email_schedule', $data);
        // check if update was success
        if ($this->db->affected_rows() > 0) {
            $output['success'] = TRUE;
        }
        return $output;
    }
    // adds a row of data to database
    // returns the following:
    // [
    //     'success' => bool,
    //     'error'   => XXX,
    // ]
    public function add($auto_email_id, $start_customer_id, $end_customer_id, $start_datetime) {
        // init output
        $output = [
            'success' => FALSE,
            'error'   => '',
        ];
        // add row to database
        $this->db->insert(
            'auto_email_schedule',
            [
                'auto_email_id'     => $auto_email_id,
                'start_customer_id' => $start_customer_id,
                'end_customer_id'   => $end_customer_id,
                'start_datetime'    => $start_datetime,
                'status'            => self::QUEUED,
            ]
        );
        // check if update was success
        if ($this->db->affected_rows() > 0) {
            $output['success'] = TRUE;
        } else {
            $sql_error_obj   = $this->db->error();
            // $output['error'] = $sql_error_obj['message'];
            $output['error'] = 'Please check if the ids used exist in your database.';
        }
        return $output;
    }
}
?>