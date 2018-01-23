<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends MY_Controller {
/* //orig
	public function index()
	{
		//from application/core/MY_Controller
		$this::initStyle();
		$this::initHeader();
		//--------------------------------------------
		
		
		$this->load->view('contact');
		
		//--------------------------------------------
		$this->load->view('templates/footer');	
	}
*/	
	public function index()
	{
/*		
		$this->load->library('email');
		
		$this->email->from('account-update@usbong.ph', 'Usbong Store');
		$this->email->to('masarapmabuhay@gmail.com');
//		$this->email->cc('another@another-example.com');
//		$this->email->bcc('them@their-example.com');
		
		$this->email->subject('Email Test');
		$this->email->message('Testing the email class.');
		
		$this->email->send();
*/		
		
		$customer_id = $this->session->userdata('customer_id');
		
		
		//from application/core/MY_Controller
		$this::initStyle();
		$this::initHeader();
		//--------------------------------------------
		
		if (isset($customer_id)) {
			$this->load->model('Account_Model');
			$data['customer_information'] = $this->Account_Model->getCustomerInformation($customer_id);			
			
			$data['firstNameParam'] = $data['customer_information']->customer_first_name;
			$data['lastNameParam'] = $data['customer_information']->customer_last_name;
			$data['emailAddressParam'] = $data['customer_information']->customer_email_address;
						
			$this->session->set_flashdata('data', $data);
			
			$this->load->view('contact', $data);			
		}
		else {
			$this->load->view('contact');			
		}
		
		//--------------------------------------------
		$this->load->view('templates/footer');
	}	
	
	public function confirm()
	{	
		$customer_id = $this->session->userdata('customer_id');
/*		
		if (!isset($customer_id)) {
			redirect('account/login'); //home page
		}
*/		
		if (!isset($customer_id)) {
			$customer_id = -1;
		}
/*
 //TODO: add: this later		
		$this->form_validation->set_rules('emailAddressParam', 'Email Address', 'valid_email|trim|required');
		$this->form_validation->set_rules('firstNameParam', 'First Name', 'trim|required');
		$this->form_validation->set_rules('lastNameParam', 'Last Name', 'trim|required');
*/

		
		$fields = array('firstNameParam', 'lastNameParam', 'emailAddressParam', 'contactCaseTypeParam', 'subjectParam', 'descriptionParam');
		
		foreach ($fields as $field)
		{
			$data[$field] = $_POST[$field];
		}

		
/*				
		if ($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('errors', validation_errors());
			$this->session->set_flashdata('data', $data);
			
			//from application/core/MY_Controller
			$this::initStyle();
			$this::initHeader();
			//--------------------------------------------
			
			$this->load->library('session');
			$this->load->library('form_validation');
			
			$this->load->view('contact');
			
			//--------------------------------------------
			$this->load->view('templates/footer');
		}
		else {		
*/		
			$this->load->model('Contact_Case_Model');
			$data["is_success"] = $this->Contact_Case_Model->insertContactCase($data, $customer_id);
			
			$this->session->set_flashdata('data', $data);
			
			//from application/core/MY_Controller
			$this::initStyle();
			$this::initHeader();
			//--------------------------------------------
			
			$this->load->library('session');
			$this->load->library('form_validation');			
/*		}
*/				
		$this->load->view('contact');
				
		//--------------------------------------------
		$this->load->view('templates/footer');
	}
}
