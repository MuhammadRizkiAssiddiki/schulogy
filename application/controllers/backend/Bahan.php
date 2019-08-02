<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bahan extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('bahanmodel');
  }

  function index()
  {
    $data['bahan'] = $this->bahanmodel->tampilbahan();
    $this->load->view('backend/bahan', $data);
  }

  function tambahbahan(){
    $data = array(
      'idbahan' => $this->input->post('idbahan'),
      'bahan' => $this->input->post('bahan')
    );
    $this->bahanmodel->tambahbahan($data);
    redirect('backend/bahan');
  }

  function editbahan(){
    $id = $this->input->post('idbahan');
    $data = array(
      'bahan' => $this->input->post('bahan')
    );
    $this->bahanmodel->editbahan($id, $data);
    redirect('backend/bahan');
  }

  function hapusbahan($id){
    $this->bahanmodel->hapusbahan($id);
    redirect('backend/bahan');
  }

}
