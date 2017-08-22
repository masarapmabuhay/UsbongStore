<?php 
class Toys_and_Collectibles_Model extends CI_Model
{
	public function getToys_and_Collectibles($merchant_id)
	{
		$this->db->select('product_id, product_type_id, name, author, price, previous_price, quantity_in_stock');
		$this->db->where('product_type_id','8'); //8 is for type: toys & collectibles
		
		if ($merchant_id!=null) {
			$this->db->where('merchant_id',$merchant_id);
		}		
		
		$this->db->order_by('name', 'ASEC');
		$query = $this->db->get('product');
		return $query->result_array();
	}
}
?>