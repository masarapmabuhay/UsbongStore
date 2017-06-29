<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	public function initStyle() {
		$this->load->view('templates/style');
	}
	
	public function initHeader() {
		$this->load->view('templates/header');		
	}
	
	public function initHeaderWith($data) {
		$this->load->view('templates/header', $data);
	}
	
}
