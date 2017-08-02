<?php 
class Childrens_Model extends CI_Model
{
	public function getChildrens()
	{
//		$this->db->join('account', 'stories.userid = account.id');
		$this->db->select('product_id, name, author, price, quantity_in_stock');
		$this->db->where('product_type_id','10'); //10 is for type: children's (books)		
		$this->db->order_by('name', 'ASEC');	
		$query = $this->db->get('product');
		return $query->result_array();
	}
}
?>