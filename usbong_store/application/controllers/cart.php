<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class cart extends MY_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function shoppingcart()//$param)
	{
//		$data['param'] = $this->input->get('param'); //added by Mike, 20170616
		
		//from application/core/MY_Controller
		$this::initStyle();
		$this::initHeader();
		//--------------------------------------------
		
		$customer_id = $this->session->userdata('customer_id');
		$data['result'] = '';

		$product_id = $this->uri->segment(3);

		if ($product_id!="") {
			$this->load->model('Cart_Model');
			$this->Cart_Model->removeItemInCart($customer_id, $product_id);
		}		
		else {		
			if ($customer_id!="") {					
				$this->load->model('Cart_Model');
				$data['result'] = $this->Cart_Model->getCart($customer_id);
				
				//merge all product items that are the same
				//increment quantity field accordingly
	//			echo "hello".count($data['result']);
				$mergeOutput = array(); //$data['result'];//
				
				foreach ($data['result'] as $value) {
					if ($this->in_array_r($value['name'], $mergeOutput, false)) {					
						$mergeOutput[$value['name']]['quantity'] += $value['quantity'];
	//					echo "in array".$mergeOutput[$value['name']]['quantity']."<br>";				
					}
					else {
						$mergeOutput[$value['name']] = $value;
	//					echo "new ".$value['name']."<br>";
					}
					
				}
	//		$data['result'] = $finalOutput;//$mergeOutput;
				$data['result'] = $mergeOutput;			
			}
		}		
		
		$this->load->view('shoppingcart', $data);
		
		//--------------------------------------------
		$this->load->view('templates/footer');	
	}
	
	//Reference: https://stackoverflow.com/questions/4128323/in-array-and-multidimensional-array;
	//last accessed: 20170702
	//answer by: jwueller
	public function in_array_r($needle, $haystack, $strict = false) {
		foreach ($haystack as $item) {
			if (($strict ? $item === $needle : $item == $needle) || (is_array($item) && $this->in_array_r($needle, $item, $strict))) {
				return true;
			}
		}
		
		return false;
	}
	
	public function addToCart() {//$product_idParam, $customer_idParam, $quantityParam, $priceParam) {//($productId, $customerId, $quantity, $price) {	
/*		$fields = array('product_idParam', 'customer_idParam', 'quantityParam', 'priceParam');
		
		foreach ($fields as $field)
		{
			$data[$field] = $_POST[$field];
		}
*/		
/*
		$data = array(
				'product_id' => $product_idParam,
				'customer_id' => $customer_idParam,
				'quantity' => $quantityParam,
				'price' => $priceParam
		);
*/		
		$data = array(
				'product_id' => $this->uri->segment(3),
				'customer_id' => $this->uri->segment(4),
				'quantity' => $this->uri->segment(5),
				'price' => $this->uri->segment(6)
		);
				
		$this->load->model('Cart_Model');
		$this->Cart_Model->addToCart($data);
	}	
	
	public function checkout() {		
		$customer_id = $this->session->userdata('customer_id');

		$this->load->model('Cart_Model');
		$data['result'] = $this->Cart_Model->getCart($customer_id);
	
		$orderTotalPrice = 0;
		$totalQuantity = 0;

//		echo "hello".count($data['result']);
		
//		for($i=0; $i<count($data['result']); $i++) {
		$i=0;
		foreach ($data['result'] as $value) {
//			echo "hello".$_POST['quantityParam'.$i];
//			echo "hello".$_POST['priceParam'.$i];

			$orderTotalPrice+=$_POST['quantityParam'.$i]*$_POST['priceParam'.$i];
			$totalQuantity+=$_POST['quantityParam'.$i];

			$this->Cart_Model->updateQuantityInCart($value['cart_id'], $_POST['quantityParam'.$i]);
			$i++;
		}
//		echo "orderTotalPrice: ".$orderTotalPrice;

		$data = array(
				'customer_id' => $customer_id,
				'quantity' => $totalQuantity,
				'status_accepted' => 1,
				'order_total_price' => $orderTotalPrice				
		);			

		$this->load->model('Cart_Model');
		$this->Cart_Model->checkoutCustomerOrder($data);


//		$data[$field] = $_POST[$field];
		
/*		
		$data = array(
				'product_id' => $this->uri->segment(3),
				'customer_id' => $this->uri->segment(4),
				'quantity' => $this->uri->segment(5),
				'price' => $this->uri->segment(6)
		);
		
		$this->load->model('Cart_Model');
		$this->Cart_Model->addToCart($data);
*/		
	}
}
