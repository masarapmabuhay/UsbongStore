<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class account extends CI_Controller {

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
	public function login()//$param)
	{
//		$data['param'] = $this->input->get('param'); //added by Mike, 20170616
		
		$this->load->view('templates/style');
		$this->load->view('templates/header');
		//--------------------------------------------
/*		
		$this->load->model('Cart_Model');
		$data['result'] = $this->Cart_Model->getCart();//$this->input->post('customer'));//$param);
*/		
		$this->load->view('account/login');
		
		//--------------------------------------------
		$this->load->view('templates/footer');	
	}
	
	public function create()
	{
		$this->load->view('templates/style');
		$this->load->view('templates/header');
		//--------------------------------------------
		
		$this->load->library('session');
		$this->load->library('form_validation');
		
		/*
		 $this->load->model('Cart_Model');
		 $data['result'] = $this->Cart_Model->getCart();//$this->input->post('customer'));//$param);
		 */
		$this->load->view('account/create');
		
		//--------------------------------------------
		$this->load->view('templates/footer');
	}
}
