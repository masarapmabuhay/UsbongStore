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
		$this->db->select('t1.name, t1.author, t1.price, t1.product_overview, t1.product_id, t1.product_type_id, t1.quantity_in_stock, t1.description, t1.format, t1.language, t1.pages, t1.merchant_id, t2.merchant_name');
		$this->db->from('product as t1');		
		$this->db->join('merchant as t2', 't1.merchant_id = t2.merchant_id', 'LEFT');
		$this->db->where('t1.product_id', $param);
		
		$query = $this->db->get('product');
		return $query->row();
	}	
	
	public function getMerchantCategories($merchantId)
	{
		$this->db->select('t3.product_type_name, t1.merchant_id');
		$this->db->from('merchant_product_type as t1');
		$this->db->join('merchant as t2', 't1.merchant_id = t2.merchant_id', 'LEFT');
		$this->db->join('product_type as t3', 't1.product_type_id = t3.product_type_id', 'LEFT');	
		$this->db->where('t1.merchant_id', $merchantId);
		$this->db->order_by('t3.product_type_name', 'ASC');
		$query = $this->db->get();
		
		return $query->result_array();
	}	
	
	public function getMerchantName($merchantId) {
		$this->db->select('merchant_name');
		$this->db->from('merchant');
		$this->db->where('merchant_id', $merchantId);
		$query = $this->db->get();
		
		return $query->row();		
	}
	
	public function incrementViewNum($productId) {
		$this->db->select('product_view_num');
		$this->db->from('product');
		$this->db->where('product_id', $productId);
		$query = $this->db->get();
		
		$viewNum = $query->row()->product_view_num;
		$viewNum++;

		$updateData = array(
				'product_view_num' => $viewNum
		);
		$this->db->where('product_id', $productId);
		$this->db->update('product', $updateData);
	}
}
?>