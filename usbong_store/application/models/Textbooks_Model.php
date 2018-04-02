<?php 
class Textbooks_Model extends CI_Model
{
	public function getTextbooksOnly($merchant_id)
	{
		//		$this->db->join('account', 'stories.userid = account.id');
		$this->db->select('product_id, product_type_id, name, author, price, previous_price, quantity_in_stock, product_view_num, quantity_sold, is_essential_reading');
		$this->db->where('product_type_id','9'); //9 is for type: textbooks
		$this->db->where('show','1');
		$this->db->where('quantity_in_stock >',0);
		
		if ($merchant_id!=null) {
			$this->db->where('merchant_id',$merchant_id);
		}

		
		$this->db->order_by('name', 'ASEC');
		$query = $this->db->get('product');
		
		return $query->result_array();
	}
	
	public function getTextbooks($merchant_id)
	{
//		$this->db->join('account', 'stories.userid = account.id');
		$this->db->select('product_id, product_type_id, name, author, price, previous_price, quantity_in_stock, product_view_num, quantity_sold, is_essential_reading');
		$this->db->where('product_type_id','9'); //9 is for type: textbooks
		$this->db->where('show','1');
		
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