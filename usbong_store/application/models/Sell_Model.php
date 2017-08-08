<?php 
class Sell_Model extends CI_Model
{
	public function insertSell($param, $customerId)
	{		
		$data = array(
				'customer_id' => $customerId,
				'product_name' => $param['productNameParam'],
				'product_image_link' => $param['productImageLinkParam'],
				'product_type' => $param['productTypeParam'],
				'quantity' => $param['quantityParam'],
				'sell_total_cost' => $param['totalCostParam'],
				'comments' => $param['commentsParam']				
		);
		//'comments' => $param['commentsParam']
		
		$this->db->insert('customer_sell', $data);
		
		return $this->db->insert_id(); //customer_request_id
	}		
}
?>