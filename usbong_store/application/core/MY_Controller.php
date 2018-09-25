<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
	//added by Mike, 20180605
	//the default is the website is not mobile responsive
	public function setMobileResponsive($value) {
//		$isMobileResponsive = $value; 
				
		$mobileResponsiveSetting = array(
				'is_mobile_responsive'  => $value
		);

		$this->session->set_userdata($mobileResponsiveSetting);				
	}
	
	public function isMobileResponsive() {		
		$mobileResponsiveSetting= $this->session->userdata('is_mobile_responsive');
		
		if (isset($mobileResponsiveSetting) && ($mobileResponsiveSetting)) {
			return true;
		}
		return false;
	}
	
	public function initStyle() {		
		//added by Mike, 20180605
		$this->setMobileResponsive(TRUE); //simply update this to TRUE to make the entire site mobile responsive; work-in-progress
		 				
		
		// new style that's mobile responsive
		//edited by Mike, 20180610
/*		
		if ((isset($isMobileResponsive)) AND ($isMobileResponsive == true)) {
*/
//		if (isset($mobileResponsiveSetting) && ($mobileResponsiveSetting)) {			
		if ($this->isMobileResponsive()) {
			if (
				(
					$this->router->class == 'b' AND
					(
						$this->router->method == 'beverages' OR
						$this->router->method == 'books' OR
						$this->router->method == 'childrens' OR
						$this->router->method == 'textbooks' OR
						$this->router->method == 'medical' OR
						$this->router->method == 'food' OR
						$this->router->method == 'comics' OR
						$this->router->method == 'manga' OR
						$this->router->method == 'toys_and_collectibles' OR
						$this->router->method == 'miscellaneous' OR
						$this->router->method == 'promos'
					)
				) OR
				(
					$this->router->class == 'account' AND
					(
						$this->router->method == 'create' OR
						$this->router->method == 'login' OR
						$this->router->method == 'settings' OR
						$this->router->method == 'save'
					)
				) OR
				(
					$this->router->class == 'w' AND
					(
						$this->router->method == 'index'
					)
				)
			) {
				$this->load->view('templates/style_v2');
			} else {
				$this->load->view('templates/style');
			}			
		}
		else {
			$this->load->view('templates/style');		
		}

/*		$this->load->view('templates/style_v2');		
 */
	}

	//added by Mike, 20180415
	public function isMobile() {
//		echo "Hello" . $_SERVER["HTTP_USER_AGENT"];
		return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
	}
	
	public function initHeader() {
		//edited by Mike, 20180415
		// If the user is on a mobile device, redirect him/her
		if($this->isMobile()){
			header("Location: http://app.usbong.ph");
		}
						
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

/*		
		// new style that's mobile responsive
		if ($this->router->class == 'b' AND $this->router->method == 'beverages') {
			$this->load->view('templates/header_v2');
		} else {			
			//edited by Mike, 20180428			
			$this->load->view('templates/header', $data);
		}
*/
		// new style that's mobile responsive		
		//edited by Mike, 20180610
//		if ((isset($isMobileResponsive)) AND ($isMobileResponsive == true)) {
		if ($this->isMobileResponsive()) {			
			if (
				(
					$this->router->class == 'b' AND
					(
						$this->router->method == 'beverages' OR
						$this->router->method == 'books' OR
						$this->router->method == 'childrens' OR
						$this->router->method == 'textbooks' OR
						$this->router->method == 'medical' OR
						$this->router->method == 'food' OR
						$this->router->method == 'comics' OR
						$this->router->method == 'manga' OR
						$this->router->method == 'toys_and_collectibles' OR
						$this->router->method == 'miscellaneous' OR
						$this->router->method == 'promos'
					)
				) OR
				(
					$this->router->class == 'account' AND
					(
						$this->router->method == 'create' OR
						$this->router->method == 'login' OR
						$this->router->method == 'settings' OR
						$this->router->method == 'save'
					)
				) OR
				(
					$this->router->class == 'w' AND
					(
						$this->router->method == 'index'
					)
				)
			) {
				$this->load->view('templates/header_v2', $data); //edited by Mike, 20180916 
			} else {
				//edited by Mike, 20180428
				$this->load->view('templates/header', $data);
			}
		}
		else {
			$this->load->view('templates/header', $data);
		}

/*		
		$this->load->view('templates/header_v2');
*/		
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