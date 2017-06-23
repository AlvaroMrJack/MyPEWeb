
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Multimedia_Model extends CI_Model {

public function __construct()
{
parent::__construct();
}

private  $_columns  =  array(
'mul_pro_id' => 0,
'mul_id' => 0,
'mul_name' => '',
'mul_route' => '',
'mul_position' => 0,
'mul_status' => 1

);

public function get($attr){
  return $this->_columns[$attr];
}

public function create($row){
  $multimedia =  new Multimedia_Model();
  foreach ($row as $key => $value)
    {
      $multimedia->_columns[$key] = $value;
    }
  return $multimedia;
}

  public function setColumns ($row = null){
    foreach ($row as $key => $value) {
      $this->columns[$key] = $value;
      }
    }

public function insert(){
$this->db->insert('mypeweb_multimedia',$this->_columns);
}

public function update($id, $data) {
  $multimedia = $this->db->get_where('mypeweb_multimedia',array('mul_id'=>$id));
  if($multimedia->num_rows() > 0){
    $this->db->where('mul_id', $id);
    return $this->db->update('mypeweb_multimedia', $data);
    }else{
  $data['mul_id'] = $id;
  return $this->db->insert('mypeweb_multimedia',$data);
  }
}

public function delete($id){
  $sql="delete from mypeweb_multimedia WHERE mul_id=".$id;
  $query = $this->db->query($sql);
  return 1;
}


public function desactivar($id){
  $sql="update mypeweb_multimedia set mul_status =0 WHERE mul_id=".$id;
  $query = $this->db->query($sql);
  return 1;
}

public function activar($id){
  $sql="update mypeweb_multimedia set mul_status =1 WHERE mul_id=".$id;
  $query = $this->db->query($sql);
  return 1;
}

public function findAll(){
  $result=array();
  $this->db->select('*');
  $this->db->from('mypeweb_multimedia');
  $this->db->order_by("mul_position", "asc");
  $consulta = $this->db->get();
    foreach ($consulta->result() as $row) {
    $result[] = $this->create($row);
  }
  return $result;
}

   public function findById($id){
    $query = $this ->db-> get_where('mypeweb_multimedia',array('mul_id'=>$id));
   if($query -> num_rows() >= 1)
         {
            $row = $query->row_object();
            $mul=$this->create($row);
            return $mul; 
         }
    return false;
  }

   public function findByProId($id){
    $query = $this->db->get_where('mypeweb_multimedia',array('mul_pro_id'=>$id));
    if($query -> num_rows() >= 1){
      foreach ($query->result() as $query) {
        $result[] = $this->create($query);
      } 
        return $result;
    }
    return false;
  }

 public function findAllActivados(){
  $result=array();  
  $this->db->select('*');
  $this->db->from('mypeweb_multimedia');
  $this->db->where('mul_status',1);
  $this->db->order_by("mul_position", "asc");
  $consulta = $this->db->get();
    foreach ($consulta->result() as $row) {
    $result[] = $this->create($row);
  }
  return $result;
}

 public function findAllDesactivados(){
  $result=array();
  $consulta = $this->db->get_where('mypeweb_multimedia',array('mul_status'=>0));
    foreach ($consulta->result() as $row) {
    $result[] = $this->create($row);
  }
  return $result;
}

}
