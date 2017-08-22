<?php 
class Childrens_Model extends CI_Model
{
	public function getChildrens($merchant_id)
	{		
		
//		$this->db->join('account', 'stories.userid = account.id');
		$this->db->select('product_id, product_type_id, name, author, price, previous_price, quantity_in_stock');
		$this->db->where('product_type_id','10'); //10 is for type: children's (books)		
		
		if ($merchant_id!=null) {
			$this->db->where('merchant_id',$merchant_id);
		}		
		
		$this->db->order_by('name', 'ASEC');	
		$query = $this->db->get('product');
		return $query->result_array();
	}
}
?>