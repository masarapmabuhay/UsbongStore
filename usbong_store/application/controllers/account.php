<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class account extends MY_Controller {

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
		
		//from application/core/MY_Controller
		$this::initStyle();
		$this::initHeader();
		//--------------------------------------------
		
/*		
		$this->load->library('session');
		$this->load->library('form_validation');
*/		
/*				
		$fields = array('emailAddressParam', 'passwordParam');
		
		foreach ($fields as $field)
		{
			$data[$field] = $_POST[$field];
		}
		
		$this->load->model('Account_Model');
		$data['is_login_success'] = $this->Account_Model->loginAccount($data);
*/				
		$this->load->view('account/login');
		
		//--------------------------------------------
		$this->load->view('templates/footer');	
	}
	
	public function logout() {
		session_destroy();
		
		redirect(''); //home page		
	}
	
	public function create()
	{
		//from application/core/MY_Controller
		$this::initStyle();
		$this::initHeader();
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

	public function settings()
	{
		$customer_id = $this->session->userdata('customer_id');
		
		if (!isset($customer_id)) {
			redirect('account/login'); //home page			
		}
		
		//from application/core/MY_Controller
		$this::initStyle();
		$this::initHeader();
		//--------------------------------------------
		
		$this->load->library('session');
		$this->load->library('form_validation');
		
		$this->load->model('Account_Model');
		$data['result'] = $this->Account_Model->getCustomerInformation($customer_id);
				
		$this->load->view('account/settings', $data);
		
		//--------------------------------------------
		$this->load->view('templates/footer');
	}
	
	public function save()
	{				
		$customer_id = $this->session->userdata('customer_id');

		$this->form_validation->set_rules('emailAddressParam', 'Email Address', 'valid_email|trim|required');
		$this->form_validation->set_rules('firstNameParam', 'First Name', 'trim|required');
		$this->form_validation->set_rules('lastNameParam', 'Last Name', 'trim|required');
		$this->form_validation->set_rules('contactNumberParam', 'Contact Number', 'trim|required|numeric');
		$this->form_validation->set_rules('shippingAddressParam', 'Shipping Address', 'trim|required');
		$this->form_validation->set_rules('cityParam', 'City', 'trim|required');
		$this->form_validation->set_rules('countryParam', 'Country', 'trim|required');
		$this->form_validation->set_rules('postalCodeParam', 'Postal Code', 'trim|required|numeric');
		
		$fields = array('emailAddressParam', 'firstNameParam', 'lastNameParam', 'contactNumberParam', 'shippingAddressParam', 'cityParam', 'countryParam', 'postalCodeParam', 'modeOfPaymentParam');
		
		foreach ($fields as $field)
		{
			$data[$field] = $_POST[$field];
		}
				
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
									
			$this->load->view('account/settings');
			
			//--------------------------------------------
			$this->load->view('templates/footer');
		}
		else
		{
			/*
			 $this->load->model('Account_Model');
			 $this->Account_Model->registerAccount($data);
			 
			 //added by Mike, 20170624
			 $newdata = array(
			 'customer_first_name'  => $data['firstNameParam'],
			 'customer_email_address'     => $data['emailAddressParam'],
			 'logged_in' => TRUE
			 );
			 $this->session->set_userdata($newdata);
			 
			 $this::initStyle();
			 $this::initHeader();
			 
			 //--------------------------------------------
			 
			 $this->load->model('Books_Model');
			 $data['books'] = $this->Books_Model->getBooks();
			 $this->load->view('b/books',$data);
			 
			 //--------------------------------------------
			 $this->load->view('templates/footer');
			 */
//			echo "OK! Success!";
			
			$this->session->set_flashdata('data', $data);
			
			//from application/core/MY_Controller
			$this::initStyle();
			$this::initHeader();
			//--------------------------------------------
			
			$this->load->library('session');
			$this->load->library('form_validation');
			
			$this->load->model('Account_Model');
			$this->Account_Model->updateAccount($customer_id, $data);
			
			$this->load->view('account/settings');
			
			//--------------------------------------------
			$this->load->view('templates/footer');			
		}
	}	
}
