<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Frontend extends CI_Controller {

	public function index()
	{
		$this->load->view('Frontend/catalogo');
	}

}

/* End of file Frontend.php */
/* Location: ./application/controllers/Frontend.php */