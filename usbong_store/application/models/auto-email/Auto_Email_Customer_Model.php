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

}
?>