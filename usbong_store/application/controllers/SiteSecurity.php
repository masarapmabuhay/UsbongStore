<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SiteSecurity extends MY_Controller {

	public function index()
	{		
		//from application/core/MY_Controller
		$this::initStyle();
		$this::initHeader();
		//--------------------------------------------
				
		$this->load->view('sitesecurity');
		
		//--------------------------------------------
		$this->load->view('templates/footer');	
	}
}
