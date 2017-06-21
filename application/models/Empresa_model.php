<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Empresa_model extends CI_Model {

	public function __construct()
	{
	parent::__construct();
	}

	private  $_columns  =  array(
	'emp_id' => 0,
	'emp_mision' => '',
	'emp_vision' => '',
	'emp_objetivo' => '',
	'emp_descripcion' => '',
	'emp_estado' => 0
	);

	public function get($attr){
	  return $this->_columns[$attr];
	}

	public function create($row){
	  $empresa =  new Empresa_Model();
	  foreach ($row as $key => $value)
	    {
	      $empresa->_columns[$key] = $value;
	    }
	  return $empresa;
	}

	public function findAll(){
	  $result=array();
	  $this->db->select('*');
	  $this->db->from('mypeweb_empresa');
	  $consulta = $this->db->get();
	    foreach ($consulta->result() as $row) {
	    $result[] = $this->create($row);
	  }
	  return $result;
	}

}

/* End of file Empresa_model.php */
/* Location: ./application/models/Empresa_model.php */