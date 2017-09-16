<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	public function initStyle() {		 		
		$this->load->view('templates/style');
	}
	
	public function initHeader() {
		$customer_id = $this->session->userdata('customer_id');

		if ($customer_id!="") {			
			$this->load->model('Account_Model');
			
			$customerInformation = $this->Account_Model->getCustomerInformation($customer_id);
			//$data['customer_first_name'] = $customerInformation->customer_first_name;

			$newdata = array(
					'customer_first_name'  => $customerInformation->customer_first_name,
					'is_admin' => $customerInformation->is_admin,
					'merchant_id' => $customerInformation->merchant_id
			);
			$this->session->set_userdata($newdata);
			
			$this->load->model('Cart_Model');
//			$data['totalItemsInCart'] = $this->Cart_Model->getTotalItemsInCart($customer_id);			
			
			
			$data['result'] = $this->Cart_Model->getCart($customer_id);			
			$data['result'] = $this->mergeOutput($data['result']);
			$totalQuantity=0;
			
			foreach ($data['result'] as $value) {
				$totalQuantity+=$value['quantity'];
			}
			
			$data['totalItemsInCart'] = $totalQuantity;
		}	
		else {
			$data['totalItemsInCart'] = 0;			
		}
//		$data['totalItemsInCart']=10;

		$this->load->view('templates/header', $data);		
	}
	
	public function initHeaderWith($data) {
		$this->initHeader();
//		$this->load->view('templates/header', $data);
	}
	
	//added by Mike, 20170711
	public function mergeOutput($d) {
		//merge all product items that are the same
		//increment quantity field accordingly
		$mergeOutput = array(); //$data['result'];//
		
		foreach ($d as $value) {
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
		return $mergeOutput;
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
}
