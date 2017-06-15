<?php 
class Beverages_Model extends CI_Model
{
	public function getBeverages()
	{
		$this->db->select('name, author, price');
		$this->db->where('product_type_id','3'); //3 is for type: beverages
		$query = $this->db->get('product');
		return $query->result_array();
	}
}
?>