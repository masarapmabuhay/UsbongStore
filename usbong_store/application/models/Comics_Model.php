<?php 
class Comics_Model extends CI_Model
{
	public function getComics($merchant_id)
	{
		$this->db->select('product_id, name, author, price, quantity_in_stock');
		$this->db->where('product_type_id','6'); //6 is for type: comics

		if ($merchant_id!=null) {
			$this->db->where('merchant_id',$merchant_id);
		}
				
		$this->db->order_by('name', 'ASEC');
		$query = $this->db->get('product');
		return $query->result_array();
	}
}
?>