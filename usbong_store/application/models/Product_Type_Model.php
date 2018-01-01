<?php
class Product_Type_Model extends CI_Model
{
    //------------------------//
    // Get
    //------------------------//

    public function getAll() {
        $this->db->from('product_type');
        $this->db->order_by('product_type_name', 'ASC');
        return $this->db->get()->result_array();
    }
}
?>