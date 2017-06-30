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
		$query = $this->db->get();
		
		return $query->result_array();
	}
	
	public function addToCart($data) {	 
		$this->db->insert('cart', $data);
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