<?php 
class Manga_Model extends CI_Model
{
	public function getManga($merchant_id)
	{
		$this->db->select('product_id, product_type_id, name, author, price, previous_price, quantity_in_stock');
		$this->db->where('product_type_id','7'); //7 is for type: manga

		if ($merchant_id!=null) {
			$this->db->where('merchant_id',$merchant_id);
		}
				
		$this->db->order_by('name', 'ASEC');
		$query = $this->db->get('product');
		return $query->result_array();
	}
}
?>