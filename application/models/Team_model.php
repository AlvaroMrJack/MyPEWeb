<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Team_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}
	private $columns = array(
		'team_id' => 0,
		'team_nombre'=> '',
		'team_desc'=>'',
		'team_cargo'=>'',
		'team_foto'=>''
		);


	public function get($attr){
  return $this->columns[$attr];
}

	public function create($row){
	  $team =  new Team_model();
	  foreach ($row as $key => $value)
	    {
	      $team->columns[$key] = $value;
	    }
	  return $team;
	}

	  public function setColumns ($row = null){
	    foreach ($row as $key => $value) {
	      $this->columns[$key] = $value;
	      }
	    }

	public function insert(){
	$this->db->insert('team',$this->columns);
	}

	public function update($id, $data) {
	  $team = $this->db->get_where('team',array('team_id'=>$id));
	  if($team->num_rows() > 0){
	    $this->db->where('team_id', $id);
	    return $this->db->update('team', $data);
	    }else{
	  $data['team_id'] = $id;
	  return $this->db->insert('team',$data);
	  }
	}

	public function delete($id){
	  $sql="delete from team WHERE team_id=".$id;
	  $query = $this->db->query($sql);
	  return 1;
	}

	public function findAll(){
	  $result=array();
	  $consulta = $this->db->get('team');
	    foreach ($consulta->result() as $row) {
	    $result[] = $this->create($row);
	  }
	  return $result;
	}

	  public function findById($id){
	    $query = $this ->db-> get_where('team',array('team_id'=>$id));
	   if($query -> num_rows() >= 1)
	         {
	            $row = $query->row_object();
	            $log=$this->create($row);
	            return $log; 
	         }
	    return false;
	  }
	 
	  
	

}

/* End of file Team_model.php */
/* Location: ./application/models/Team_model.php */