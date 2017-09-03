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
		
		$d = $query->result_array();
				
		foreach ($d as &$value) {
//			echo "hello ".$value['merchant_name'];
			$this->db->select('t3.product_type_name');
			$this->db->from('merchant_product_type as t1');
			$this->db->join('merchant as t2', 't1.merchant_id = t2.merchant_id', 'LEFT');
			$this->db->join('product_type as t3', 't1.product_type_id = t3.product_type_id', 'LEFT');
			$this->db->where('t1.merchant_id', $value['merchant_id']);
//		$this->db->order_by('t3.product_type_name', 'ASC');
			$query = $this->db->get();
			$value['product_type_name'] = $query->row()->product_type_name;
		}
						
		return $d;		
	}
}
?>