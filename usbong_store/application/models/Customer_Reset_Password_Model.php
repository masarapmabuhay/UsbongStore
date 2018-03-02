<?php
class Customer_Reset_Password_Model extends CI_Model
{
    //------------------------//
    // Get
    //------------------------//

    public function get($customer_reset_password_id) {
        $this->db->select('*');
        $this->db->where('customer_reset_password_id', $customer_reset_password_id);
        $query = $this->db->get('customer_reset_password');
        $row = $query->row();
        return $row;
    }

    public function getValidEntryByCustomerId($customer_id) {
        $this->db->select('*');
        $this->db->where('customer_id', $customer_id);
        $this->db->where('CAST(`datetime_expire` AS DATETIME) > CAST(NOW() AS DATETIME)');
        $this->db->where('datetime_used IS NULL');
        $this->db->order_by('customer_reset_password_id', 'DESC');
        $query = $this->db->get('customer_reset_password');
        $row = $query->row();
        return $row;
    }

    //------------------------//
    // Update
    //------------------------//

    public function setToUsed($customer_reset_password_id, $datetime_used) {
        $this->db->where('customer_reset_password_id', $customer_reset_password_id);
        $this->db->update('customer_reset_password', ['datetime_used' =>  $datetime_used]);
    }

    //------------------------//
    // Add
    //------------------------//

    // adds a row of data to database
    // returns the following:
    // [
    //     'success'                    => bool,
    //     'customer_reset_password_id' => NULL,
    //     'error'                      => XXX,
    // ]
    public function add($customer_id, $datetime_expire) {
        // init output
        $output = [
            'success'                    => FALSE,
            'customer_reset_password_id' => NULL,
            'error'                      => '',
        ];

        // add row to database
        $this->db->insert(
            'customer_reset_password',
            [
                'customer_id'     => $customer_id,
                'datetime_expire' => $datetime_expire,
            ]
        );

        // check if update was success
        if ($this->db->affected_rows() > 0) {
            $output['success'] = TRUE;
            $output['customer_reset_password_id'] = $this->db->insert_id();
        } else {
            // $sql_error_obj   = $this->db->error();
            // $output['error'] = $sql_error_obj['message'];
            $output['error'] = 'An unexpected error occurred.';
        }
        return $output;
    }

}
?>