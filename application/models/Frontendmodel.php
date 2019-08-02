<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Frontendmodel extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function detailpesanan($id){
    $this->db->select('*');
    $this->db->from('pesanan');
    $this->db->where('pesanan.idpesanan', $id);

    return $this->db->get()->result();
  }

  function detailnyalagicuk($id){
    $this->db->select('*');
    $this->db->from('detailpesanan, bahan, layanan');
    $this->db->where('detailpesanan.idbahan = bahan.idbahan');
    $this->db->where('detailpesanan.idlayanan = layanan.idlayanan');
    $this->db->where('detailpesanan.idpesanan', $id);

    return $this->db->get()->result();
  }

}
