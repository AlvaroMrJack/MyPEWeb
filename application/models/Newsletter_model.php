
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Newsletter_Model extends CI_Model {

public function __construct()
{
parent::__construct();
}

private  $_columns  =  array(
'new_id' => 0,
'new_subject' => '',
'new_text' => ''

);

public function get($attr){
  return $this->_columns[$attr];
}

public function create($row){
  $newsletter =  new Newsletter_Model();
  foreach ($row as $key => $value)
    {
      $newsletter->_columns[$key] = $value;
    }
  return $newsletter;
}

  public function setColumns ($row = null){
    foreach ($row as $key => $value) {
      $this->columns[$key] = $value;
      }
    }

public function insert(){
$this->db->insert('mypeweb_newsletter',$this->_columns);
}

public function update($id, $data) {
  $newsletter = $this->db->get_where('mypeweb_newsletter',array('new_id'=>$id));
  if($newsletter->num_rows() > 0){
    $this->db->where('new_id', $id);
    return $this->db->update('mypeweb_newsletter', $data);
    }else{
  $data['new_id'] = $id;
  return $this->db->insert('mypeweb_newsletter',$data);
  }
}

public function delete($id){
  $sql="delete from mypeweb_newsletter WHERE new_id=".$id;
  $query = $this->db->query($sql);
  return 1;
}


public function findAll(){
  $result=array();
  $consulta = $this->db->get('mypeweb_newsletter');
    foreach ($consulta->result() as $row) {
    $result[] = $this->create($row);
  }
  return $result;
}

  public function findById($id){
    $query = $this ->db-> get_where('mypeweb_newsletter',array('new_id'=>$id));
   if($query -> num_rows() >= 1)
         {
            $row = $query->row_object();
            $newsletter=$this->create($row);
            return $newsletter; 
         }
    return false;
  }
 
}
