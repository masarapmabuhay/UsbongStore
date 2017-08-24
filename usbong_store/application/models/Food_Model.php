<?php 
class Food_Model extends CI_Model
{
	public function getFoodOnly($merchant_id)
	{
		$this->db->select('product_id, product_type_id, name, author, price, previous_price, quantity_in_stock');
		$this->db->where('product_type_id','11'); //11 is for type: food
		
		if ($merchant_id!=null) {
			$this->db->where('merchant_id',$merchant_id);
		}
		
		$this->db->order_by('name', 'ASEC');
		$query = $this->db->get('product');
		
		return $query->result_array();
	}
	
	public function getFood($merchant_id)
	{
		$this->db->select('product_id, product_type_id, name, author, price, previous_price, quantity_in_stock');
		$this->db->where('product_type_id','11'); //11 is for type: food
		
		if ($merchant_id!=null) {
			$this->db->where('merchant_id',$merchant_id);
		}
		
		$this->db->order_by('name', 'ASEC');
		$query = $this->db->get('product');
		
		//added by Mike, 20170824
		$this->incrementViewNum($query->row()->product_type_id);
		
		return $query->result_array();
	}
	
	public function incrementViewNum($productTypeId) {
		$this->db->select('product_type_view_num');
		$this->db->from('product_type');
		$this->db->where('product_type_id', $productTypeId);
		$query = $this->db->get();
		
		$viewNum = $query->row()->product_type_view_num;
		$viewNum++;
		
		$updateData = array(
				'product_type_view_num' => $viewNum
		);
		$this->db->where('product_type_id', $productTypeId);
		$this->db->update('product_type', $updateData);
	}
}
?>