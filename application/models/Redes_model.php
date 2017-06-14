<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Redes_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}
	private $columns = array(
		'red_id' => 0,
		'red_nom'=> '',
		'red_tip'=>'',
		'red_url'=>'',
		'red_ico'=>''
		);


	public function get($attr){
  return $this->columns[$attr];
}

	public function create($row){
	  $redes =  new Redes_model();
	  foreach ($row as $key => $value)
	    {
	      $redes->columns[$key] = $value;
	    }
	  return $redes;
	}

	  public function setColumns ($row = null){
	    foreach ($row as $key => $value) {
	      $this->columns[$key] = $value;
	      }
	    }

	public function insert(){
	$this->db->insert('redes',$this->columns);
	}

	public function update($id, $data) {
	  $redes = $this->db->get_where('redes',array('red_id'=>$id));
	  if($redes->num_rows() > 0){
	    $this->db->where('red_id', $id);
	    return $this->db->update('redes', $data);
	    }else{
	  $data['red_id'] = $id;
	  return $this->db->insert('redes',$data);
	  }
	}

	public function delete($id){
	  $sql="delete from redes WHERE red_id=".$id;
	  $query = $this->db->query($sql);
	  return 1;
	}

	public function findAll(){
	  $result=array();
	  $consulta = $this->db->get('redes');
	    foreach ($consulta->result() as $row) {
	    $result[] = $this->create($row);
	  }
	  return $result;
	}

	  public function findById($id){
	    $query = $this ->db-> get_where('redes',array('red_id'=>$id));
	   if($query -> num_rows() >= 1)
	         {
	            $row = $query->row_object();
	            $log=$this->create($row);
	            return $log; 
	         }
	    return false;
	  }
	 
	  
	    

}

/* End of file Redes_model.php */
/* Location: ./application/models/Redes_model.php */