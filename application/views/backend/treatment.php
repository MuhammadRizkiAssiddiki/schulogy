<?php
    $this->load->view('templates/header');
?>

 <body class="fixed-left">
   <div id="wrapper">
     <?php $this->load->view('templates/sidebar'); ?>


     <div class="content-page">
     <!-- Start content -->
        <div class="content">
          <div class="container">
            <div class="row">
		            <div class="col-xs-12">
			               <div class="page-title-box">
                        <h4 class="page-title">Schulogy </h4>
                          <ol class="breadcrumb p-0">
                            <li>
                                <a href="<?php echo base_url('backend/administrator'); ?>">Schulgy</a>
                              </li>
                              <li class="active">
                                Konfigurasi Slide Treatment
                              </li>
                           </ol>
                        <div class="clearfix"></div>
                      </div>
							  </div>
                  <?php echo $this->session->flashdata('notif'); ?>
						</div>
            <!-- end row -->
            <div class="row">
              <div class="col-xs-12">
               <div class="card-box">
                   <div class="row">
                       <div class="col-lg-12">
                           <h4 class="header-title m-t-0">Schulogy - Konfigurasi Slide Foto Treatment</h4>
                           &nbsp;&nbsp;

                           <button type="button" name="button" class="btn btn-info btn-rounded waves-effect waves-light" data-toggle="modal" data-target="#tambahdata">Tambah Data Slide</button>
                           <div class="p-20">
                               <table class="table table-striped">
                                   <thead>
                                   <tr>
                                       <th>No</th>
                                       <th>Caption 1 <br>(Baris-1) </th>
                                       <th>Caption 2 <br>(Baris-2) </th>
                                       <th>Caption 3 <br>(Baris-3) </th>
                                       <th>Foto Slide</th>
                                       <th>Status</th>
                                       <th>Aksi</th>
                                   </tr>
                                   </thead>
                                   <tbody>
                                     <?php $i =1 ; foreach ($treatment as $a): ?>
                                       <tr>
                                         <td><?php echo $i++; ?></td>
                                         <td><?php echo $a->caption1; ?></td>
                                         <td><?php echo $a->caption2; ?></td>
                                         <td width="220px"><?php echo $a->caption3; ?></td>
                                         <td> <img src="<?php echo base_url('treatmentfoto/').$a->treatment; ?>" alt="" width="120px" height="60px"> </td>
                                         <td><?php echo $a->status; ?></td>
                                         <td>
                                           <a href="" data-toggle="modal" data-target="#editdata<?=$a->idtreatment; ?>" disabled><img name="edit" width="20" height="20" src="<?php echo base_url('img/edit.png'); ?>" data-toggle="tooltip" data-placement="bottom" data-original-title="Edit Slide Foto" disabled/></a>
                                           <a href="<?php echo site_url('backend/treatment/hapustreatment/'.$a->idtreatment); ?>" class="sa-params"><img width="20" height="20" src="<?php echo base_url('img/hapus.png'); ?>" data-toggle="tooltip" data-placement="bottom" data-original-title="Hapus Slide Foto"/></a>
                                         </td>
                                       </tr>
                                     <?php endforeach; ?>
                                   </tbody>
                               </table>
                           </div>
                       </div>

                   </div>
                   <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" id="tambahdata">
                     <div class="modal-dialog">
                       <div class="modal-content">
                         <div class="modal-header">
                           <button type="button" aria-hidden="true" data-dismiss="modal" class="close">x</button>
                           <h4 class="modal-title">Tambah Data Slide</h4>
                         </div>
                         <form class="form-horizontal" action="<?php echo base_url('backend/treatment/tambahtreatment'); ?>" method="post" enctype="multipart/form-data" role="form">
                           <div class="modal-body">
                             <div class="form-group">
                               <label class="col-lg-3 col-sm-2 control-label">Caption 1 (Kata2 Untuk Baris Ke-1)</label>
                               <div class="col-lg-9">
                                 <input type="text" name="caption1" class="form-control" placeholder="Masukkan Caption Baris Ke-1">
                               </div>
                             </div>
                             <div class="form-group">
                               <label class="col-lg-3 col-sm-2 control-label">Caption 2 (Kata2 Untuk Baris Ke-2)</label>
                               <div class="col-lg-9">
                                 <input type="text" name="caption2" class="form-control" placeholder="Masukkan Caption Baris Ke-2">
                               </div>
                             </div>
                             <div class="form-group">
                               <label class="col-lg-3 col-sm-2 control-label">Caption 3 (Kata2 Untuk Baris Ke-3)</label>
                               <div class="col-lg-9">
                                 <input type="text" name="caption3" class="form-control" placeholder="Masukkan Caption Baris Ke-3">
                               </div>
                             </div>
                             <div class="form-group">
                               <label class="col-lg-3 col-sm-2 control-label">Status Aktif</label>
                               <div class="col-lg-9">
                                 <select class="form-control" name="status">
                                   <option value="Aktif">Aktif</option>
                                   <option value="Tidak Aktif">Tidak Aktif</option>
                                 </select>
                               </div>
                               <div class="form-group">
                                 <label class="col-lg-3 col-sm-2 control-label">File Slide Foto</label>
                                 <div class="col-lg-9">
                                   <input type="file" name="treatment" placeholder="Masukkan File Foto Slide">
                                 </div>
                               </div>
                             </div>
                           </div>
                           <div class="modal-footer">
                             <button type="submit" class="btn btn-info">Simpan</button>
                             <button type="button" class="btn btn-warning" data-dismiss="modal">Batal</button>
                           </div>
                         </form>
                       </div>
                     </div>

                   </div>

                   <?php foreach($treatment as $a): ?>
                     <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" id="editdata<?=$a->idtreatment; ?>">
                       <div class="modal-dialog">
                         <div class="modal-content">
                           <div class="modal-header">
                             <button type="button" aria-hidden="true" data-dismiss="modal" class="close">x</button>
                             <h4 class="modal-title">Edit Jenis slide</h4>
                           </div>
                           <form class="form-horizontal" action="<?php echo base_url('backend/treatment/edittreatment'); ?>" method="post" enctype="multipart/form-data" role="form">
                             <div class="modal-body">
                               <div class="form-group">
                                 <div class="col-lg-9 asik">
                                   <input type="hidden" id="idtreatment" name="idtreatment" class="form-control" value="<?= $a->idtreatment; ?>" readonly="readonly" >
                                 </div>
                               </div>
                               <div class="form-group">
                                 <label class="col-lg-3 col-sm-2 control-label">Caption 1 (Kata2 Untuk Baris Ke-1)</label>
                                 <div class="col-lg-9">
                                   <input type="text" name="caption1" class="form-control" value="<?php echo $a->caption1; ?>">
                                 </div>
                               </div>
                               <div class="form-group">
                                 <label class="col-lg-3 col-sm-2 control-label">Caption 2 (Kata2 Untuk Baris Ke-2)</label>
                                 <div class="col-lg-9">
                                   <input type="text" name="caption2" class="form-control" value="<?php echo $a->caption2; ?>">
                                 </div>
                               </div>
                               <div class="form-group">
                                 <label class="col-lg-3 col-sm-2 control-label">Caption 3 (Kata2 Untuk Baris Ke-3)</label>
                                 <div class="col-lg-9">
                                   <input type="text" name="caption3" class="form-control" value="<?php echo $a->caption3; ?>">
                                 </div>
                               </div>
                               <div class="form-group">
                                 <label class="col-lg-3 col-sm-2 control-label">Status Aktif</label>
                                 <div class="col-lg-9">
                                   <select class="form-control" name="status">
                                     <option value="Aktif">Aktif</option>
                                     <option value="Tidak Aktif">Tidak Aktif</option>
                                   </select>
                                 </div>
                                 <div class="form-group">
                                   <label class="col-lg-3 col-sm-2 control-label">File Slide Foto</label>
                                   <div class="col-lg-9">
                                     <input id="uploadImage<?php echo $a->idtreatment; ?>" type="file" name="treatment" onchange="PreviewImage(<?php echo $a->idtreatment; ?>);">
                                   </div> <br>
                                   <div class="col-lg-9">
                                     <img id="uploadPreview<?php echo $a->idtreatment; ?>" src="<?php echo base_url('treatmentfoto/').$a->treatment; ?>" width="300px" height="100px" alt="">
                                   </div>
                                 </div>
                               </div>
                             </div>
                             <div class="modal-footer">
                               <button type="submit" class="btn btn-info">Simpan</button>
                               <button type="button" class="btn btn-warning" data-dismiss="modal">Batal</button>
                             </div>
                           </form>
                         </div>
                       </div>

                     </div>

                   <?php endforeach; ?>

                 </div>
               </div><!-- end col-->

            </div>
            <!-- end row -->
          </div> <!-- container -->
      </div> <!-- content -->
     </div>
    <!-- End content-page -->
   </div>
 </body>

 <script type="text/javascript">

      function PreviewImage(id) {

        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("uploadImage"+id).files[0]);
        oFReader.onload = function (oFREvent)
        {
          document.getElementById("uploadPreview"+id).src = oFREvent.target.result;
        };
      };

      </script>


<?php
    $this->load->view('templates/footer');
?>