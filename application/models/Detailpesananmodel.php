<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detailpesananmodel extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function getbahan(){
    $this->db->select('*');
    $this->db->from('bahan');

    return $this->db->get()->result();
  }

  function getlayanan(){
    $this->db->select('*');
    $this->db->from('layanan');

    return $this->db->get()->result();
  }

  function tampildp(){
    $this->db->select('*');
    $this->db->from('detailpesanan, pesanan, bahan, layanan');
    $this->db->where('detailpesanan.idpesanan = pesanan.idpesanan');
    $this->db->where('detailpesanan.idbahan = bahan.idbahan');
    $this->db->where('detailpesanan.idlayanan = layanan.idlayanan');

    return $this->db->get()->result();
  }

  function editdp($id, $data){
    $this->db->where('iddetailpesanan', $id);
    $this->db->update('detailpesanan', $data);
  }

  function hapusdp($id){
    $this->db->delete('detailpesanan', array('iddetailpesanan' => $id));
  }

}
