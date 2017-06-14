<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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
	public function index()
	{
		$this->load->view('templates/style');
		$this->load->view('templates/header');
//		$this->load->view('home');
		$this->viewBooksCategory();
		$this->load->view('templates/footer');
	}
	
	//---------------------------------------------------------
	// Books Category
	//---------------------------------------------------------
	public function viewBooksCategory()
	{
		$data['content'] = 'category/Books';
		$this->load->model('Books_Model');
		$data['books'] = $this->Books_Model->getBooks();
//		$this->load->view('templates/general_template',$data);
		$this->load->view('b/books',$data);
	}	
}
