
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Config_Model extends CI_Model {

public function __construct()
{
parent::__construct();
}

private  $_columns  =  array(
'con_id' => 0,
'con_phonenumber' => '',
'con_email'=>'',
'con_background' => '',
'con_footer' => '',
'con_navbar' => '',
'con_logo' => '',
'con_video' => '',
'con_nombrefantasia' => '',
'con_fontstyle' => '',
'con_fontsize' => 0,
'con_status' => 1

);

public function get($attr){
  return $this->_columns[$attr];
}

public function create($row){
  $configuration =  new Config_Model();
  foreach ($row as $key => $value)
    {
      $configuration->_columns[$key] = $value;
    }
  return $configuration;
}

  public function setColumns ($row = null){
    foreach ($row as $key => $value) {
      $this->columns[$key] = $value;
      }
    }

public function insert(){
$this->db->insert('mypeweb_configuration',$this->_columns);
}

public function update($id, $data) {
  $configuration = $this->db->get_where('mypeweb_configuration',array('con_id'=>$id));
  if($configuration->num_rows() > 0){
    $this->db->where('con_id', $id);
    return $this->db->update('mypeweb_configuration', $data);
    }else{
  $data['con_id'] = $id;
  return $this->db->insert('mypeweb_configuration',$data);
  }
}

public function delete($id){
  $sql="delete from mypeweb_configuration WHERE con_id=".$id;
  $query = $this->db->query($sql);
  return 1;
}

public function desactivar($id){
  $sql="update mypeweb_configuration set con_status =0 WHERE con_id=".$id;
  $query = $this->db->query($sql);
  return 1;
}

public function activar($id){
  $sql="update mypeweb_configuration set con_status =1 WHERE con_id=".$id;
  $query = $this->db->query($sql);
  return 1;
}

public function findAll(){
  $result=array();
  $consulta = $this->db->get('mypeweb_configuration');
    foreach ($consulta->result() as $row) {
    $result[] = $this->create($row);
  }
  return $result;
}

   public function findById($id){
    $query = $this ->db-> get_where('mypeweb_configuration',array('con_id'=>$id));
   if($query -> num_rows() >= 1)
         {
            $row = $query->row_object();
            $con=$this->create($row);
            return $con; 
         }
    return false;
  }


 public function findAllActivados(){
  $result=array();
  $consulta = $this->db->get_where('mypeweb_configuration',array('con_status'=>1));
    foreach ($consulta->result() as $row) {
    $result[] = $this->create($row);
  }
  return $result;
}

 public function findAllDesactivados(){
  $result=array();
  $consulta = $this->db->get_where('mypeweb_configuration',array('con_status'=>0));
    foreach ($consulta->result() as $row) {
    $result[] = $this->create($row);
  }
  return $result;
}
 
}
