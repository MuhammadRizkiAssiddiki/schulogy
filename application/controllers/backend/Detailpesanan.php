<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detailpesanan extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('detailpesananmodel');
  }

  function index()
  {
    $data['bahan'] = $this->detailpesananmodel->getbahan();
    $data['layanan'] = $this->detailpesananmodel->getlayanan();
    $data['dp'] = $this->detailpesananmodel->tampildp();
    $this->load->view('backend/dp', $data);
  }

  function editdp(){
    $id = $this->input->post('iddetailpesanan');
    $data = array(
      'namabarang' => $this->input->post('namabarang'),
      'idbahan' => $this->input->post('bahan'),
      'idlayanan' => $this->input->post('layanan'),
      'harga' => $this->input->post('harga')
    );
    $this->detailpesananmodel->editdp($id, $data);
    redirect('backend/detailpesanan');
  }

  function hapusdp($id){
    $this->detailpesananmodel->hapusdp($id);
    redirect('backend/detailpesanan');
  }

}
