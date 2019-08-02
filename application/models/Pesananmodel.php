<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesananmodel extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function tampilpesanan(){
    $this->db->select('*');
    $this->db->from('pesanan');

    return $this->db->get()->result();
  }

  function getbahan(){
    $this->db->select('*');
    $this->db->from('bahan');

    return $this->db->get()->result();
  }

  function getlayanan(){
    return $this->db->get('layanan')->result();
  }

  function tambahpesanan($pesanan){
    $this->db->insert('pesanan', $pesanan);
  }

  function tambahdetailpesanan($data){
    $this->db->insert('detailpesanan', $data);
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

  function editpesanan($id, $data){
    $this->db->where('idpesanan', $id);
    $this->db->update('pesanan', $data);
  }

  function changestatus($id, $data){
    $this->db->where('iddetailpesanan', $id);
    $this->db->update('detailpesanan', $data);
  }

  function ubahstatus($id, $data){
    $this->db->where('iddetailpesanan', $id);
    $this->db->update('detailpesanan', $data);
  }

  function editdp($id, $data){
    $this->db->where('iddetailpesanan', $id);
    $this->db->update('detailpesanan', $data);
  }

  function hapuspesanan($id){
    return $this->db->delete('pesanan', array('idpesanan' => $id));
  }
  function hapusdp($id){
    $this->db->delete('detailpesanan', array('iddetailpesanan' => $id));
  }

}
