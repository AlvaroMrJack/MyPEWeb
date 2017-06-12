
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Newslog_Model extends CI_Model {

public function __construct()
{
parent::__construct();
}

private  $_columns  =  array(
'log_id' => 0,
'log_datesystem' => '',
'log_cus_id' => 0,
'log_new_id' => 0

);

public function get($attr){
  return $this->_columns[$attr];
}

public function create($row){
  $newslog =  new Newslog_Model();
  foreach ($row as $key => $value)
    {
      $newslog->_columns[$key] = $value;
    }
  return $newslog;
}

  public function setColumns ($row = null){
    foreach ($row as $key => $value) {
      $this->columns[$key] = $value;
      }
    }

public function insert(){
$this->db->insert('mypeweb_newslog',$this->_columns);
}

public function update($id, $data) {
  $newslog = $this->db->get_where('mypeweb_newslog',array('log_id'=>$id));
  if($newslog->num_rows() > 0){
    $this->db->where('log_id', $id);
    return $this->db->update('mypeweb_newslog', $data);
    }else{
  $data['log_id'] = $id;
  return $this->db->insert('mypeweb_newslog',$data);
  }
}

public function delete($id){
  $sql="delete from mypeweb_newslog WHERE log_id=".$id;
  $query = $this->db->query($sql);
  return 1;
}

public function findAll(){
  $result=array();
  $consulta = $this->db->get('mypeweb_newslog');
    foreach ($consulta->result() as $row) {
    $result[] = $this->create($row);
  }
  return $result;
}

  public function findById($id){
    $query = $this ->db-> get_where('mypeweb_newslog',array('log_id'=>$id));
   if($query -> num_rows() >= 1)
         {
            $row = $query->row_object();
            $log=$this->create($row);
            return $log; 
         }
    return false;
  }
 
   public function findByCusId($id){
    $query = $this ->db-> get_where('mypeweb_newslog',array('log_cus_id'=>$id));
   if($query -> num_rows() >= 1)
         {
            $row = $query->row_object();
            $log=$this->create($row);
            return $log; 
         }
    return false;
  }
    public function findByNewId($id){
    $query = $this ->db-> get_where('mypeweb_newslog',array('log_new_id'=>$id));
   if($query -> num_rows() >= 1)
         {
            $row = $query->row_object();
            $log=$this->create($row);
            return $log; 
         }
    return false;
  }
}

