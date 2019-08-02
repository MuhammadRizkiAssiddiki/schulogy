<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Layananmodel extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function tampillayanan(){
    $this->db->select('*');
    $this->db->from('layanan');

    return $this->db->get()->result();
  }

  function tambahlayanan($data){
    $this->db->insert('layanan', $data);
  }

  function editlayanan($id, $data){
    $this->db->where('idlayanan', $id);
    $this->db->update('layanan', $data);
  }

  function hapuslayanan($id){
    return $this->db->delete('layanan', array('idlayanan' => $id));
  }

}
