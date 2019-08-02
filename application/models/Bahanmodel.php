<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bahanmodel extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function tampilbahan(){
    $this->db->select('*');
    $this->db->from('bahan');

    return $this->db->get()->result();
  }

  function tambahbahan($data){
    $this->db->insert('bahan', $data);
  }

  function editbahan($id, $data){
    $this->db->where('idbahan', $id);
    $this->db->update('bahan', $data);
  }

  function hapusbahan($id){
    return $this->db->delete('bahan', array('idbahan' => $id));
  }

}
