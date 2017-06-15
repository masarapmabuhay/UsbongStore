<?php 
class Search_Model extends CI_Model
{
	public function getSearchResult($param)
	{
		$this->db->select('name, author, price');
		$this->db->like('name',$param); 
		$this->db->or_like('author', $param); 
		$query = $this->db->get('product');
		return $query->result_array();		
	}
}
?>