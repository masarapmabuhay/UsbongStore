<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class w extends CI_Controller {

	public function index($param)
	{
//		$data['param'] = $this->input->get('param'); //added by Mike, 20170616
		
		$this->load->view('templates/style');
		$this->load->view('templates/header');
		//--------------------------------------------
		
//		$this->load->model('Cart_Model');
//		$data['result'] = $this->Cart_Model->getCart();//$this->input->post('customer'));//$param);
		
//		$this->load->view('w', $data);
		$this->load->view('w');
		
		//--------------------------------------------
		$this->load->view('templates/footer');	
	}
	
	
}
