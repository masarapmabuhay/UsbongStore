<?php
class Auto_Email_Unsubscribe_Model extends CI_Model
{
    //------------------------//
    // Add
    //------------------------//

    // adds a row of data to database (if it's not yet present)
    // returns the following:
    // [
    //     'success'       => bool,
    //     'rows_affected' => 1, // 0 means that the entry was already present and nothing was done
    //     'error'         => XXX,
    // ]
    public function smartAdd($customer_id) {
        // init output
        $output = [
            'success'       => TRUE,
            'rows_affected' => 0,
            'error'         => '',
        ];

        // check if entry exists
        $this->db->select('customer_id');
        $this->db->from('auto_email_unsubscribe');
        $this->db->where('customer_id', $customer_id);
        $data = $this->db->get()->row();

        if (!isset($data->customer_id)) {
            // add row to database
            $this->db->insert(
                'auto_email_unsubscribe',
                [
                    'customer_id' => $customer_id,
                    'datetime'    => date('Y-m-d H:i:s'),
                ]
            );

            // check if update was success
            $output['rows_affected'] = $this->db->affected_rows();
            if ($output['rows_affected'] < 1) {
                $sql_error_obj     = $this->db->error();
                $output['success'] = FALSE;
                $output['error']   = $sql_error_obj['message'];
            }
        }

        return $output;
    }

}
?>