<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class b extends CI_Controller {

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
/*		$this->load->view('templates/style');
		$this->load->view('templates/header');
*/		
		$this->books();
/*		$this->load->view('templates/footer');
 */
	}
	
	//---------------------------------------------------------
	// Books Category
	//---------------------------------------------------------
	public function books()
	{
		$this->load->view('templates/style');
		$this->load->view('templates/header');
		//--------------------------------------------
		
//		$data['content'] = 'category/Books';
		$this->load->model('Books_Model');
		$data['books'] = $this->Books_Model->getBooks();
//		$this->load->view('templates/general_template',$data);
		$this->load->view('b/books',$data);

		//--------------------------------------------
		$this->load->view('templates/footer');
	}	
	
	//---------------------------------------------------------
	// COMBOS Category
	//---------------------------------------------------------
	public function combos()
	{
		$this->load->view('templates/style');
		$this->load->view('templates/header');
		//--------------------------------------------
		
//		$data['content'] = 'category/Combos';
		$this->load->model('Combos_Model');
		$data['combos'] = $this->Combos_Model->getCombos();
		//		$this->load->view('templates/general_template',$data);
		$this->load->view('b/combos',$data);

		//--------------------------------------------
		$this->load->view('templates/footer');		
	}
	
	//---------------------------------------------------------
	// BEVERAGES Category
	//---------------------------------------------------------
	public function beverages()
	{
		$this->load->view('templates/style');
		$this->load->view('templates/header');
		//--------------------------------------------
		
		$this->load->model('Beverages_Model');
		$data['beverages'] = $this->Beverages_Model->getBeverages();
		//		$this->load->view('templates/general_template',$data);
		$this->load->view('b/beverages',$data);
		
		//--------------------------------------------
		$this->load->view('templates/footer');
	}
	
	//---------------------------------------------------------
	// COMICS Category
	//---------------------------------------------------------
	public function comics()
	{
		$this->load->view('templates/style');
		$this->load->view('templates/header');
		//--------------------------------------------
		
		$this->load->model('Comics_Model');
		$data['comics'] = $this->Comics_Model->getComics();
		//		$this->load->view('templates/general_template',$data);
		$this->load->view('b/comics',$data);
		
		//--------------------------------------------
		$this->load->view('templates/footer');
	}
	
	//---------------------------------------------------------
	// MANGA Category
	//---------------------------------------------------------
	public function manga()
	{
		$this->load->view('templates/style');
		$this->load->view('templates/header');
		//--------------------------------------------
		
		$this->load->model('Manga_Model');
		$data['manga'] = $this->Manga_Model->getManga();
		//		$this->load->view('templates/general_template',$data);
		$this->load->view('b/manga',$data);
		
		//--------------------------------------------
		$this->load->view('templates/footer');
	}
	
	//---------------------------------------------------------
	// TOYS & COLLECTIBLES Category
	//---------------------------------------------------------
	public function toys_and_collectibles()
	{
		$this->load->view('templates/style');
		$this->load->view('templates/header');
		//--------------------------------------------
		
		$this->load->model('Toys_and_Collectibles_Model');
		$data['toys_and_collectibles'] = $this->Toys_and_Collectibles_Model->getToys_and_Collectibles();
		//		$this->load->view('templates/general_template',$data);
		$this->load->view('b/toys_and_collectibles',$data);
		
		//--------------------------------------------
		$this->load->view('templates/footer');
	}	
}