
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_Model extends CI_Model {

public function __construct()
{
parent::__construct();
}

private  $_columns  =  array(
'cus_id' => 0,
'cus_name' => '',
'cus_email' => '',
'cus_phonenumber' => '',
'cus_datesystem' => ''

);

public function get($attr){
  return $this->_columns[$attr];
}

public function create($row){
  $customer =  new Customer_Model();
  foreach ($row as $key => $value)
    {
      $customer->_columns[$key] = $value;
    }
  return $customer;
}

  public function setColumns ($row = null){
    foreach ($row as $key => $value) {
      $this->columns[$key] = $value;
      }
    }

public function insert(){
$this->db->insert('mypeweb_customer',$this->_columns);
}

public function update($id, $data) {
  $customer = $this->db->get_where('mypeweb_customer',array('cus_id'=>$id));
  if($customer->num_rows() > 0){
    $this->db->where('cus_id', $id);
    return $this->db->update('mypeweb_customer', $data);
    }else{
  $data['cus_id'] = $id;
  return $this->db->insert('mypeweb_customer',$data);
  }
}

public function delete($id){
  $sql="delete from mypeweb_customer WHERE cus_id=".$id;
  $query = $this->db->query($sql);
  return 1;
}


public function findAll(){
  $result=array();
  $consulta = $this->db->get('mypeweb_customer');
    foreach ($consulta->result() as $row) {
    $result[] = $this->create($row);
  }
  return $result;
}

  public function findById($id){
    $query = $this ->db-> get_where('mypeweb_customer',array('cus_id'=>$id));
   if($query -> num_rows() >= 1)
         {
            $row = $query->row_object();
            $customer=$this->create($row);
            return $customer; 
         }
    return false;
  }

 
}
