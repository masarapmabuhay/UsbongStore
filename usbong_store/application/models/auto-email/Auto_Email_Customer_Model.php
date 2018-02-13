<?php
class Auto_Email_Customer_Model extends CI_Model
{
    //------------------------//
    // Get
    //------------------------//

    public function get($customer_id) {
        $this->db->from('customer');
        $this->db->where('customer_id', $customer_id);
        return $this->db->get()->row();
    }

    public function getMax() {
        $this->db->select_max('customer_id');
        $data = $this->db->get('customer')->row();
        if (isset($data->customer_id) AND !empty($data->customer_id)) {
            return $data->customer_id;
        } else {
            return 0;
        }
    }
}
?>