
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_Model extends CI_Model {

public function __construct()
{
parent::__construct();
}

private  $_columns  =  array(
'cat_id' => 0,
'cat_name' => '',
'cat_parent' => 0,
'cat_status' => 1,
'cat_position' => 0


);

public function get($attr){
  return $this->_columns[$attr];
}

public function create($row){
  $category =  new Category_Model();
  foreach ($row as $key => $value)
    {
      $category->_columns[$key] = $value;
    }
  return $category;
}

  public function setColumns ($row = null){
    foreach ($row as $key => $value) {
      $this->columns[$key] = $value;
      }
    }

public function insert(){
$this->db->insert('mypeweb_category',$this->_columns);
}

public function update($id, $data) {
  $category = $this->db->get_where('mypeweb_category',array('cat_id'=>$id));
  if($category->num_rows() > 0){
    $this->db->where('cat_id', $id);
    return $this->db->update('mypeweb_category', $data);
    }else{
  $data['cat_id'] = $id;
  return $this->db->insert('mypeweb_category',$data);
  }
}

public function delete($id){
  $sql="delete from mypeweb_category WHERE cat_id=".$id;
  $query = $this->db->query($sql);
  return 1;
}

public function desactivar($id){
  $sql="update mypeweb_category set cat_status =0 WHERE cat_id=".$id;
  $query = $this->db->query($sql);
  return 1;
}

public function activar($id){
  $sql="update mypeweb_category set cat_status =1 WHERE cat_id=".$id;
  $query = $this->db->query($sql);
  return 1;
}

public function findAll(){
  $result=array();
  $this->db->select('*');
  $this->db->from('mypeweb_category');
  $this->db->order_by("cat_position", "asc");
  $consulta = $this->db->get();
    foreach ($consulta->result() as $row) {
    $result[] = $this->create($row);
  }
  return $result;
}

  public function findById($id){
    $query = $this ->db-> get_where('mypeweb_category',array('cat_id'=>$id));
   if($query -> num_rows() >= 1)
         {
            $row = $query->row_object();
            $cat=$this->create($row);
            return $cat; 
         }
    return false;
  }

    public function findByParent($id){
    $query = $this ->db-> get_where('mypeweb_category',array('cat_parent'=>$id));
   if($query -> num_rows() >= 1)
         {
            $row = $query->row_object();
            $cat=$this->create($row);
            return $cat; 
         }
    return false;
  }

   public function findAllParentActivados(){
  $result=array();  
  $this->db->select('*');
  $this->db->from('mypeweb_category');
  $this->db->where('cat_parent',null);
  $this->db->where('cat_status',1);
  $this->db->order_by("cat_position", "asc");
  $consulta = $this->db->get();
    foreach ($consulta->result() as $row) {
    $result[] = $this->create($row);
  }
  return $result;
}

 public function findAllActivados(){
  $result=array();  
  $this->db->select('*');
  $this->db->from('mypeweb_category');
  $this->db->where('cat_status',1);
  $this->db->order_by("cat_position", "asc");
  $consulta = $this->db->get();
    foreach ($consulta->result() as $row) {
    $result[] = $this->create($row);
  }
  return $result;
}

 public function findAllDesactivados(){
  $result=array();
  $consulta = $this->db->get_where('mypeweb_category',array('cat_status'=>0));
    foreach ($consulta->result() as $row) {
    $result[] = $this->create($row);
  }
  return $result;
}

}
