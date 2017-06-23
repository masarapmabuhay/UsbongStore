<?php 
class Books_Model extends CI_Model
{
	public function getBooks()
	{
//		$this->db->join('account', 'stories.userid = account.id');
		$this->db->select('product_id, name, author, price');
		$this->db->where('product_type_id','2'); //2 is for type: books		
		$query = $this->db->get('product');
		return $query->result_array();
	}
}
?>