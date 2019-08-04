<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Treatment extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('treatmentmodel');
  }

  function index()
  {
    $data['treatment'] = $this->treatmentmodel->gettreatment();
    $this->load->view('backend/treatment', $data);
  }

  function tambahtreatment(){
    $namafile = 'Treatment-'.$this->input->post('idtreatmentr');
    $config['upload_path'] = './treatment/';
    $config['allowed_types'] = 'gif|jpg|png|jpeg';
    $config['max_size']	= '0'; //in kb
    $config['file_name'] = $namafile;
    $this->load->library('upload', $config);

    if (! $this->upload->do_upload('treatmentr')) {
      $this->session->set_flashdata('notif',
        '
        <div class="col-md-3"></div>
        <div class="col-md-7">
        <div class="alert alert-danger" role="alert">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <strong>Gagal Mengupload Foto treatmentr, Silahkan Coba Lagi!</strong>
        </div>
        </div>
        <div class="col-md-3"></div>
        '
      );
    } else {
      $data = array(
        'idtreatmentr' => $this->input->post('idtreatmentr'),
        'treatmentr' => $this->upload->data('file_name'),
        'status' => $this->input->post('status'),
        'caption1' => $this->input->post('caption1'),
        'caption2' => $this->input->post('caption2'),
        'caption3' => $this->input->post('caption3')
      );
      $this->treatmentmodel->tambahtreatment($data);

      $this->session->set_flashdata('notif',
        '
        <div class="col-md-3"></div>
        <div class="col-md-7">
        <div class="alert alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <strong>treatment Foto Berhasil Diupload!</strong>
        </div>
        </div>
        <div class="col-md-3"></div>
        '
      );
    }

    redirect('backend/treatment');
  }

  function edittreatment(){
    $id = $this->input->post('idtreatment');

    $namafile = 'Treatment-'.$this->input->post('idtreatment');
    $config['upload_path'] = './treatment/';
    $config['allowed_types'] = 'gif|jpg|png|jpeg';
    $config['max_size']	= '0'; //in kb
    $config['file_name'] = $namafile;
    $this->load->library('upload', $config);

    if (! $this->upload->do_upload('treatmentr')) {
      $data = array(
        'status' => $this->input->post('status'),
        'caption1' => $this->input->post('caption1'),
        'caption2' => $this->input->post('caption2'),
        'caption3' => $this->input->post('caption3')
      );
      $this->treatmentmodel->edittreatment($id, $data);

      $this->session->set_flashdata('notif',
        '
        <div class="col-md-3"></div>
        <div class="col-md-7">
        <div class="alert alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <strong>treatment Foto Berhasil Diupdate!</strong>
        </div>
        </div>
        <div class="col-md-3"></div>
        '
      );
    } else {
      $foto = $this->treatmentmodel->getdata($id);
      unlink('treatment/'.$foto->treatmentr);
      $data = array(
        'treatmentr' => $this->upload->data('file_name'),
        'status' => $this->input->post('status'),
        'caption1' => $this->input->post('caption1'),
        'caption2' => $this->input->post('caption2'),
        'caption3' => $this->input->post('caption3')
      );
      $this->treatmentmodel->edittreatment($id, $data);

      $this->session->set_flashdata('notif',
        '
        <div class="col-md-3"></div>
        <div class="col-md-7">
        <div class="alert alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <strong>treatment Foto Beserta Fotonya Berhasil Diupdate!</strong>
        </div>
        </div>
        <div class="col-md-3"></div>
        '
      );
    }

    redirect('backend/treatment');
  }

  function hapustreatment($id){
    $foto = $this->treatmentmodel->getdata($id);
    unlink('treatment/'.$foto->treatmentr);
    $this->treatmentmodel->hapustreatment($id);
    redirect('backend/treatment');
  }

}
