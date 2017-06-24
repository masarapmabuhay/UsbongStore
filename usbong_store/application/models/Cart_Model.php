<?php 
class Cart_Model extends CI_Model
{
	public function getCart()//$customer)
	{
		$this->db->select('product_id, name, author, price, product_type_id');
//		$this->db->like('name',$param); 
//		$this->db->or_like('author', $param); 
		$query = $this->db->get('product');
		return $query->result_array();
	}
}
?>