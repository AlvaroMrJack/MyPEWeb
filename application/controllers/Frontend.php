<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Frontend extends CI_Controller {

	public function index()
	{

$this->load->database();
		$this->load->model('Category_model', 'cat');
		$this->load->model('Config_model', 'conf');
		$this->load->model('Multimedia_model', 'mul');
		$this->load->model('Product_model', 'prod');
		$this->load->model('Redes_model', 'redes');

		$data['config']=$this->conf->findAllActivados();
		$data['categoryParent']=$this->cat->findAllParentActivados();
		$data['subCat']=array();
		foreach ($data['categoryParent'] as $key => $value) {
			$data['subCat'][$key->cat_id]=$this->cat->findByParent($key->cat_id);
		}
		$data['product']=$this->prod->findAllActivados();

		foreach ($data['product'] as $key => $value) {
			$data['multimedia'][$key->pro_id]=$this->mul->findByProId($key->pro_id);
		}
		$data['redes']=$this->redes->findAll();

		$this->load->view('Frontend/catalogo', $data);
	}

	public function categoria($id)
	{
		$this->load->model('Category_model', 'cat');
		$this->load->model('Config_model', 'conf');
		$this->load->model('Multimedia_model', 'mul');
		$this->load->model('Product_model', 'prod');
		$this->load->model('Redes_model', 'redes');


		$data['config']=$this->conf->findAll();
		$data['categoryParent']=$this->cat->findAllParentActivados();
		$data['subCat']=array();
		foreach ($data['categoryParent'] as $key => $value) {
			$data['subCat'][$key->cat_id]=$this->cat->findByParent($key->cat_id);
		}
		$data['product']=$this->prod->findByCatIdAct($id);

		foreach ($data['product'] as $key => $value) {
			$data['multimedia'][$key->pro_id]=$this->mul->findByProId($key->pro_id);
		}
		$data['redes']=$this->redes->findAll();


		$this->load->view('Frontend/catalogo', $data);
	}

}

/* End of file Frontend.php */
/* Location: ./application/controllers/Frontend.php */