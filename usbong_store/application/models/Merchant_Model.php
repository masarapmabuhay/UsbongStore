<?php
class Merchant_Model extends CI_Model
{
    //------------------------//
    // Get
    //------------------------//

    public function getAll() {
        $this->db->from('merchant');
        $this->db->order_by('merchant_name', 'ASC');
        return $this->db->get()->result_array();
    }

}
?>