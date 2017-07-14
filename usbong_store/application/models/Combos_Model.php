<?php 
class Combos_Model extends CI_Model
{
	public function getCombos()
	{
		$this->db->select('product_id, name, author, price, quantity_in_stock');
		$this->db->where('product_type_id','5'); //5 is for type: combos
		$query = $this->db->get('product');
		return $query->result_array();
	}
}
?>