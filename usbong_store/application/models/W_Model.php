<?php 
class W_Model extends CI_Model
{
/*	
	public function getProduct($param)
	{
		$this->db->select('name, author, price, product_overview, product_id, product_type_id, quantity_in_stock, description, format, language, pages');
		$this->db->where('product_id', $param);
		$query = $this->db->get('product');
		return $query->row();
	}
*/	
	public function getProduct($param)
	{
		$this->db->select('t1.name, t1.author, t1.price, t1.product_overview, t1.product_id, t1.product_type_id, t1.quantity_in_stock, t1.description, t1.format, t1.language, t1.pages, t2.merchant_name');
		$this->db->from('product as t1');		
		$this->db->join('merchant as t2', 't1.merchant_id = t2.merchant_id', 'LEFT');
		$this->db->where('t1.product_id', $param);
		
		$query = $this->db->get('product');
		return $query->row();
	}	
}
?>