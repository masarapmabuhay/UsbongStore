<?php 
class B_Model extends CI_Model
{	
	public function incrementViewNum() {
		$productTypeId = 1; //all, i.e. front page
		
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
	
	public function getMerchants()
	{
		$this->db->select('merchant_id, merchant_name, merchant_motto');
		$this->db->where('merchant_id !=', 0);
		
		$this->db->order_by('merchant_name', 'ASEC');
		$query = $this->db->get('merchant');
		
		return $query->result_array();
	}
}
?>