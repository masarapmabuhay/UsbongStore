<?php 
class Cart_Model extends CI_Model
{
	public function getCart($customerId)
	{
/*		
		$this->db->select('product_id, name, author, price, product_type_id');
		$query = $this->db->get('product');
		return $query->result_array();
*/		
		$this->db->select('t1.product_id, t1.quantity, t2.name, t2.author, t2.price, t2.product_type_id');
		$this->db->from('cart as t1');
		$this->db->join('product as t2', 't1.product_id = t2.product_id', 'LEFT');
		$this->db->where('t1.customer_id', $customerId);
		$this->db->where('t1.removed_datetime_stamp', 0);		
		$query = $this->db->get();
		
		return $query->result_array();
	}
	
	public function addToCart($data) {	 
		$this->db->insert('cart', $data);
	}

	public function checkoutCustomerOrder($data) {		
		$this->db->insert('customer_order', $data);
		$customerOrderId = $this->db->insert_id(); //newly inserted Row
		
//		echo "hello".$customerOrderId;
		
		date_default_timezone_set('Asia/Hong_Kong');
		$dateTimeStamp = date('Y/m/d h:i:s a');
		
		$updateData = array(
				'customer_order_id' => $customerOrderId,
				'purchased_datetime_stamp' => $dateTimeStamp
		);
		$this->db->where('customer_id', $data['customer_id']);
		$this->db->where('purchased_datetime_stamp', 0);
		$this->db->where('removed_datetime_stamp', 0);
		
		$this->db->update('cart', $updateData); 
	}
	
	public function getTotalItemsInCart($param) {
		$this->db->select('quantity');
		$this->db->where('customer_id', $param);
		$query = $this->db->get('cart');
//		$result = $query->result_array;
		
		$totalNum = 0;
		
		if ($query->num_rows() > 0)
		{
			foreach ($query->result() as $row)
			{
				$totalNum+=intval($row->quantity);				
			}
		}
				
		if ($totalNum>999) {
			$totalNum=999; //max
		}
		
		return $totalNum;
	}
}
?>