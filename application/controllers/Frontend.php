<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Frontend extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('frontendmodel');
    $this->load->model('slidefotomodel');
  }

  function index()
  {
    $data['slide'] = $this->slidefotomodel->getslide();
    $this->load->view('home', $data);
  }

  function cekpesanan(){
    $id = $this->input->post('kode');

    $data['pesanan'] = $this->frontendmodel->detailpesanan($id);
    $data['detail'] = $this->frontendmodel->detailnyalagicuk($id);
    $this->load->view('pesanan', $data);
  }

}
