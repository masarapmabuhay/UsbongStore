<?php 
class Beverages_Model extends CI_Model
{
	public function getBeverages($merchant_id)
	{
		$this->db->select('product_id, name, author, price, quantity_in_stock');
		$this->db->where('product_type_id','3'); //3 is for type: beverages
		
		if ($merchant_id!=null) {
			$this->db->where('merchant_id',$merchant_id);
		}
		
		$this->db->order_by('name', 'ASEC');
		$query = $this->db->get('product');
		return $query->result_array();
	}
}
?>