<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Treatmentmodel extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function gettreatment(){
    return $this->db->get('treatment')->result();
  }

  function tambahtreatment($data){
    $this->db->insert('treatment', $data);
  }

  function getdata($id){
    $this->db->select('*');
    $this->db->from('treatment');
    $this->db->where('idtreatment', $id);

    return $this->db->get()->row();
  }

  function edittreatment($id, $data){
    $this->db->where('idtreatment', $id);
    $this->db->update('treatment', $data);
  }

  function hapustreatment($id){
    return $this->db->delete('treatment', array('idtreatment' => $id));
  }

}
