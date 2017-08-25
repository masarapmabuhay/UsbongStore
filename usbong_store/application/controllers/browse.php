<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Browse extends MY_Controller {

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
	public function search()//$param)
	{
		$data['param'] = $this->input->get('param'); //added by Mike, 20170616

		//from application/core/MY_Controller
		$this::initStyle();
		$this::initHeaderWith($data);
		//--------------------------------------------
		$this->load->view('templates/right_side_bar');
		//--------------------------------------------
		
		$this->load->model('Search_Model');
		$data['result'] = $this->Search_Model->getSearchResult($this->input->get('param'));//$param);

		//added by Mike, 20170825
		$customer_id = $this->session->userdata('customer_id');

		if ($customer_id==null) {
			$customer_id=-1;
		}
		
		$searchData = array(
				'customer_id' => $customer_id,
				'searched_item' => $this->input->get('param')
		);
		
		$this->Search_Model->addSearchedField($searchData);
		
		
		$this->load->view('browse', $data);
		
		//--------------------------------------------
		$this->load->view('templates/footer');	
	}
}
