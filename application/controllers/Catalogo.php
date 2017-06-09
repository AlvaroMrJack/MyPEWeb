<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Catalogo extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('catalogo/catalogo');
	}

}

/* End of file Catalogo.php */
/* Location: ./application/controllers/Catalogo.php */