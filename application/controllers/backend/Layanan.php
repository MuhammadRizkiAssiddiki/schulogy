<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Layanan extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('layananmodel');
  }

  function index()
  {
    $data['layanan'] = $this->layananmodel->tampillayanan();
    $this->load->view('backend/layanan', $data);
  }

  function tambahlayanan(){
    $data = array(
      'idlayanan' => $this->input->post('idlayanan'),
      'layanan' => $this->input->post('layanan')
    );
    $this->layananmodel->tambahlayanan($data);
    redirect('backend/layanan');
  }

  function editlayanan(){
    $id = $this->input->post('idlayanan');
    $data = array(
      'layanan' => $this->input->post('layanan')
    );
    $this->layananmodel->editlayanan($id, $data);
    redirect('backend/layanan');
  }

  function hapuslayanan($id){
    $this->layananmodel->hapuslayanan($id);
    redirect('backend/layanan');
  }

}
