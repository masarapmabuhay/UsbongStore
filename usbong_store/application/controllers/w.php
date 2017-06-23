<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class w extends CI_Controller {

	public function index($param)
	{
//		$data['param'] = $this->input->get('param'); //added by Mike, 20170616
		
		$this->load->view('templates/style');
		$this->load->view('templates/header');
		//--------------------------------------------

		$productName = str_replace('-',' ',$param); 
				
		$this->load->model('W_Model');
		$data['result'] = $this->W_Model->getProduct($productName);
//		$data['result'] = $this->W_Model->getProduct($param);
		
		$this->load->view('w', $data);
		
		//--------------------------------------------
		$this->load->view('templates/footer');	
	}
}
