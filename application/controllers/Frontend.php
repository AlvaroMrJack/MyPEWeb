<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Frontend extends CI_Controller {

	public function index()
	{

		$this->load->model('Category_model', 'cat');
		$this->load->model('Config_model', 'config');
		//$this->load->model('Multimedia_model', 'mul');
		$this->load->model('Product_model', 'prod');

		$data['config']=$this->config->findAll();
		$data['categoryParent']=$this->cat->findAllParentActivados();
		$data['subCat']=array();
		foreach ($data['categoryParent'] as $key => $value) {
			$data['subCat'][$key->cat_id]=$this->cat->findByParent($key->cat_id);
		}
		$data['product']=$this->prod->findAllActivados();
		//$data['multimedia']=$this->mul->findAllActivados();


		$this->load->view('Frontend/catalogo', $data);
	}

	public function categoria($id)
	{
		$this->load->model('Category_model', 'cat');
		$this->load->model('Config_model', 'config');
		//$this->load->model('Multimedia_model', 'mul');
		$this->load->model('Product_model', 'prod');

		$data['config']=$this->config->findAll();
		$data['categoryParent']=$this->cat->findAllParentActivados();
		$data['subCat']=array();
		foreach ($data['categoryParent'] as $key => $value) {
			$data['subCat'][$key->cat_id]=$this->cat->findByParent($key->cat_id);
		}
		$data['product']=$this->prod->findByCatId($id);
		//$data['multimedia']=$this->mul->findAllActivados();


		$this->load->view('Frontend/catalogo', $data);
	}

}

/* End of file Frontend.php */
/* Location: ./application/controllers/Frontend.php */