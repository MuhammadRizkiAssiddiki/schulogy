<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slidefoto extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('slidefotomodel');
  }

  function index()
  {
    $data['slide'] = $this->slidefotomodel->getslide();
    $this->load->view('backend/slide', $data);
  }

  function tambahslide(){
    $namafile = 'Slidefoto-'.$this->input->post('idslider');
    $config['upload_path'] = './slidefoto/';
    $config['allowed_types'] = 'gif|jpg|png|jpeg';
    $config['max_size']	= '0'; //in kb
    $config['file_name'] = $namafile;
    $this->load->library('upload', $config);

    if (! $this->upload->do_upload('slider')) {
      $this->session->set_flashdata('notif',
        '
        <div class="col-md-3"></div>
        <div class="col-md-7">
        <div class="alert alert-danger" role="alert">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <strong>Gagal Mengupload Foto Slider, Silahkan Coba Lagi!</strong>
        </div>
        </div>
        <div class="col-md-3"></div>
        '
      );
    } else {
      $data = array(
        'idslider' => $this->input->post('idslider'),
        'slider' => $this->upload->data('file_name'),
        'status' => $this->input->post('status'),
        'caption1' => $this->input->post('caption1'),
        'caption2' => $this->input->post('caption2'),
        'caption3' => $this->input->post('caption3')
      );
      $this->slidefotomodel->tambahslide($data);

      $this->session->set_flashdata('notif',
        '
        <div class="col-md-3"></div>
        <div class="col-md-7">
        <div class="alert alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <strong>Slide Foto Berhasil Diupload!</strong>
        </div>
        </div>
        <div class="col-md-3"></div>
        '
      );
    }

    redirect('backend/slidefoto');
  }

  function editslide(){
    $id = $this->input->post('idslide');

    $namafile = 'Slidefoto-'.$this->input->post('idslide');
    $config['upload_path'] = './slidefoto/';
    $config['allowed_types'] = 'gif|jpg|png|jpeg';
    $config['max_size']	= '0'; //in kb
    $config['file_name'] = $namafile;
    $this->load->library('upload', $config);

    if (! $this->upload->do_upload('slider')) {
      $data = array(
        'status' => $this->input->post('status'),
        'caption1' => $this->input->post('caption1'),
        'caption2' => $this->input->post('caption2'),
        'caption3' => $this->input->post('caption3')
      );
      $this->slidefotomodel->editslide($id, $data);

      $this->session->set_flashdata('notif',
        '
        <div class="col-md-3"></div>
        <div class="col-md-7">
        <div class="alert alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <strong>Slide Foto Berhasil Diupdate!</strong>
        </div>
        </div>
        <div class="col-md-3"></div>
        '
      );
    } else {
      $foto = $this->slidefotomodel->getdata($id);
      unlink('slidefoto/'.$foto->slider);
      $data = array(
        'slider' => $this->upload->data('file_name'),
        'status' => $this->input->post('status'),
        'caption1' => $this->input->post('caption1'),
        'caption2' => $this->input->post('caption2'),
        'caption3' => $this->input->post('caption3')
      );
      $this->slidefotomodel->editslide($id, $data);

      $this->session->set_flashdata('notif',
        '
        <div class="col-md-3"></div>
        <div class="col-md-7">
        <div class="alert alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <strong>Slide Foto Beserta Fotonya Berhasil Diupdate!</strong>
        </div>
        </div>
        <div class="col-md-3"></div>
        '
      );
    }

    redirect('backend/slidefoto');
  }

  function hapusslide($id){
    $foto = $this->slidefotomodel->getdata($id);
    unlink('slidefoto/'.$foto->slider);
    $this->slidefotomodel->hapusslide($id);
    redirect('backend/slidefoto');
  }

}
