<?php 
class Comics_Model extends CI_Model
{
	public function getComics()
	{
		$this->db->select('name, author, price');
		$this->db->where('product_type_id','6'); //6 is for type: comics
		$query = $this->db->get('product');
		return $query->result_array();
	}
}
?>