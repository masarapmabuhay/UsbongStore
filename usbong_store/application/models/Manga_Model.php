<?php 
class Manga_Model extends CI_Model
{
	public function getManga()
	{
		$this->db->select('name, author, price');
		$this->db->where('product_type_id','7'); //7 is for type: manga
		$query = $this->db->get('product');
		return $query->result_array();
	}
}
?>