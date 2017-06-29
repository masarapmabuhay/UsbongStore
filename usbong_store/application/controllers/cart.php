<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class cart extends CI_Controller {

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
		
		$this->load->view('templates/style');
		$this->load->view('templates/header');
		//--------------------------------------------
		
		$this->load->model('Cart_Model');
		$data['result'] = $this->Cart_Model->getCart();//$this->input->post('customer'));//$param);
		
		$this->load->view('shoppingcart', $data);
		
		//--------------------------------------------
		$this->load->view('templates/footer');	
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
	
	public function getTotalNumInCart($param) {
		$this->load->model('Cart_Model');
		return $this->Cart_Model->addToCart($param);
	}
}
