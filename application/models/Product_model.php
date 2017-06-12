
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_Model extends CI_Model {

public function __construct()
{
parent::__construct();
}

private  $_columns  =  array(
'pro_id' => 0,
'pro_name' => '',
'pro_subtitle' => '',
'pro_description' => '',
'pro_price' => 0,
'pro_currency' => '',
'pro_position' => 0,
'pro_status' => 1,
'pro_cat_id' => 0,
'pro_discount' => 0,
'Upro_total' => 0

);

public function get($attr){
  return $this->_columns[$attr];
}

public function create($row){
  $usuario =  new Product_Model();
  foreach ($row as $key => $value)
    {
      $usuario->_columns[$key] = $value;
    }
  return $usuario;
}

  public function setColumns ($row = null){
    foreach ($row as $key => $value) {
      $this->columns[$key] = $value;
      }
    }

public function insert(){
$this->db->insert('mypeweb_product',$this->_columns);
}

public function update($id, $data) {
  $usuario = $this->db->get_where('mypeweb_product',array('pro_id'=>$id));
  if($usuario->num_rows() > 0){
    $this->db->where('pro_id', $id);
    return $this->db->update('mypeweb_product', $data);
    }else{
  $data['pro_id'] = $id;
  return $this->db->insert('mypeweb_product',$data);
  }
}

public function delete($id){
  $sql="delete from mypeweb_product WHERE pro_id=".$id;
  $query = $this->db->query($sql);
  return 1;
}
public function desactivar($id){
  $sql="update mypeweb_product set pro_status =0 WHERE pro_id=".$id;
  $query = $this->db->query($sql);
  return 1;
}
public function activar($id){
  $sql="update mypeweb_product set pro_status =1 WHERE pro_id=".$id;
  $query = $this->db->query($sql);
  return 1;
}


public function findAll(){
  $result=array();
  $this->db->select('*');
  $this->db->from('mypeweb_product');
  $this->db->order_by("pro_position", "asc");
  $consulta = $this->db->get();
    foreach ($consulta->result() as $row) {
    $result[] = $this->create($row);
  }
  return $result;
}

    public function findById($id){
    $query = $this ->db-> get_where('mypeweb_product',array('pro_id'=>$id));
   if($query -> num_rows() >= 1)
         {
            $row = $query->row_object();
            $pro=$this->create($row);
            return $pro; 
         }
    return false;
  }


 public function findAllActivados(){
  $result=array();  
  $this->db->select('*');
  $this->db->from('mypeweb_product');
  $this->db->where('pro_status',1);
  $this->db->order_by("pro_position", "asc");
  $consulta = $this->db->get();
    foreach ($consulta->result() as $row) {
    $result[] = $this->create($row);
  }
  return $result;
}

 public function findAllDesactivados(){
  $result=array();
  $consulta = $this->db->get_where('mypeweb_product',array('pro_status'=>0));
    foreach ($consulta->result() as $row) {
    $result[] = $this->create($row);
  }
  return $result;
}

}
