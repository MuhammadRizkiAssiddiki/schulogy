<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesanan extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('pesananmodel');
  }

  function index()
  {
    $data['pesanan'] = $this->pesananmodel->tampilpesanan();
    $this->load->view('backend/pesanan', $data);
  }

  function tambahpesanan()
  {
    $data['bahan'] = $this->pesananmodel->getbahan();
    $data['layanan'] = $this->pesananmodel->getlayanan();
    $this->load->view('backend/tambahpesanan', $data);
  }

  function prosestambahpesanan(){

    // NOTE: Intinya geng, kau salah letak tag form, harus sepadan, harus pas posisinya ya

    $idpesanan = $this->input->post('idpesanan');
    $i = 0;
    $barang = $this->input->post('namabarang');
    $bahan = $this->input->post('bahan');
    $layanan = $this->input->post('layanan');
    $harga = $this->input->post('harga');

    $pesanan = array(
      'idpesanan' => $idpesanan,
      'tanggal' => $this->input->post('tanggal'),
      'namapemesan' => $this->input->post('namapemesan')
    );
    $this->pesananmodel->tambahpesanan($pesanan);


    if ($barang[0] !== null) {
      foreach ($barang as $a) {
        $data = [
          'idpesanan' => $idpesanan,
          'namabarang' =>$a,
          'idbahan'=> $bahan[$i],
          'idlayanan' => $layanan[$i],
          'harga' => $harga[$i],
          'status' => 'Belum Selesai',
        ];

        $insert = $this->db->insert('detailpesanan', $data);

        if ($insert) {
          $i++;
        }
      }
    }


    redirect('backend/pesanan');
  }

  function detailpesanan($id){
    $data['schulogy'] = $this->pesananmodel->detailpesanan($id);
    $data['detail'] = $this->pesananmodel->detailnyalagicuk($id);
    $data['layanan'] = $this->pesananmodel->getlayanan();
    $data['bahan'] = $this->pesananmodel->getbahan();
    $this->load->view('backend/detailpesanan', $data);
  }

  function editpesanan(){
    $id = $this->input->post('idpesanan');
    $data = array(
      'namapemesan' => $this->input->post('namapemesan')
    );
    $this->pesananmodel->editpesanan($id, $data);
    redirect('backend/pesanan');
  }

  function changestatus($id){
    $data = array(
      'status' => 'Sudah Selesai'
    );
    $this->pesananmodel->changestatus($id, $data);
    redirect('backend/pesanan/detailpesanan/'.$id);
  }

  function ubahstatus(){
    $id = $this->input->post('id');
    $idpesanan = $this->input->post('idpesanan');
    $data = array(
      'status' => $this->input->post('ubah')
    );
    $this->pesananmodel->ubahstatus($id, $data);
    redirect('backend/pesanan/detailpesanan/'.$idpesanan);
  }

  function editdp(){
    $id = $this->input->post('iddetailpesanan');
    $idpesanan = $this->input->post('idpesanan');
    $data = array(
      'namabarang' => $this->input->post('namabarang'),
      'idbahan' => $this->input->post('bahan'),
      'idlayanan' => $this->input->post('layanan'),
      'harga' => $this->input->post('harga')
    );
    $this->pesananmodel->editdp($id, $data);
    redirect('backend/pesanan/detailpesanan/'.$idpesanan);
  }

  function hapuspesanan($id){
    $this->pesananmodel->hapuspesanan($id);
    redirect('backend/pesanan');
  }

  function hapusdp(){
    $id = $this->input->get('var1');
    $idpesanan = $this->input->get('var2');
    $this->pesananmodel->hapusdp($id);
    redirect('backend/pesanan/detailpesanan/'.$idpesanan);
  }

}
