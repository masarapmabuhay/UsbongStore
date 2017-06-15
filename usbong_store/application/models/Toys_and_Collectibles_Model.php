<?php 
class Toys_and_Collectibles_Model extends CI_Model
{
	public function getToys_and_Collectibles()
	{
		$this->db->select('name, author, price');
		$this->db->where('product_type_id','8'); //8 is for type: toys & collectibles
		$query = $this->db->get('product');
		return $query->result_array();
	}
}
?>