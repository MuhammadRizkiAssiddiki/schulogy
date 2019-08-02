<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slidefotomodel extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function getslide(){
    return $this->db->get('slider')->result();
  }

  function tambahslide($data){
    $this->db->insert('slider', $data);
  }

  function getdata($id){
    $this->db->select('*');
    $this->db->from('slider');
    $this->db->where('idslider', $id);

    return $this->db->get()->row();
  }

  function editslide($id, $data){
    $this->db->where('idslider', $id);
    $this->db->update('slider', $data);
  }

  function hapusslide($id){
    return $this->db->delete('slider', array('idslider' => $id));
  }

}
