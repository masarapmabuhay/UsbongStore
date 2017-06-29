<?php 
class Cart_Model extends CI_Model
{
	public function getCart()//$customer)
	{
		$this->db->select('product_id, name, author, price, product_type_id');
//		$this->db->like('name',$param); 
//		$this->db->or_like('author', $param); 
		$query = $this->db->get('product');
		return $query->result_array();
	}
	
	public function addToCart($data) {//$product_idParam, $customer_idParam, $quantityParam, $priceParam) {
/*		$data = array(
				'product_id' => $param['product_idParam'],
				'customer_id' => $param['customer_idParam'],
				'quantity' => $param['quantityParam'],
				'price' => $param['priceParam']
		);

		$data = array(
 				'product_id' => $product_idParam,
				 'customer_id' => $customer_idParam,
				 'quantity' => $quantityParam,
				 'price' => $priceParam
		);
*/				 
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