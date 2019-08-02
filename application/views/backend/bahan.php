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
                              <li>
                                <a href="">Jenis Bahan</a>
                              </li>
                              <li class="active">
                                Bahan
                              </li>
                           </ol>
                        <div class="clearfix"></div>
                      </div>
							  </div>
						</div>
            <!-- end row -->
            <div class="row">
              <div class="col-xs-12">
               <div class="card-box">
                   <div class="row">
                       <div class="col-lg-12">
                           <h4 class="header-title m-t-0">Schulogy - Jenis Bahan</h4>
                           &nbsp;&nbsp;
                           
                           <button type="button" name="button" class="btn btn-info btn-rounded waves-effect waves-light" data-toggle="modal" data-target="#tambahdata">Tambah Bahan</button>
                           <div class="p-20">
                               <table class="table table-striped">
                                   <thead>
                                   <tr>
                                       <th>No</th>
                                       <th>Kode Bahan</th>
                                       <th>Jenis Bahan</th>
                                       <th>Opsi</th>
                                   </tr>
                                   </thead>
                                   <tbody>
                                     <?php $i =1 ; foreach ($bahan as $a): ?>
                                       <tr>
                                         <td><?php echo $i++; ?></td>
                                         <td><?php echo $a->idbahan; ?></td>
                                         <td><?php echo $a->bahan; ?></td>
                                         <td>
                                           <a href="" data-toggle="modal" data-target="#editdata<?=$a->idbahan; ?>" disabled><img name="edit" width="20" height="20" src="<?php echo base_url('img/edit.png'); ?>" data-toggle="tooltip" data-placement="bottom" data-original-title="Edit Unit Kerja" disabled/></a>
                                           <a href="<?php echo site_url('backend/bahan/hapusbahan/'.$a->idbahan); ?>" class="sa-params"><img width="20" height="20" src="<?php echo base_url('img/hapus.png'); ?>" data-toggle="tooltip" data-placement="bottom" data-original-title="Hapus Unit Kerja"/></a>
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
                           <h4 class="modal-title">Tambah Jenis Bahan</h4>
                         </div>
                         <form class="form-horizontal" action="<?php echo base_url('backend/bahan/tambahbahan'); ?>" method="post" enctype="multipart/form-data" role="form">
                           <div class="modal-body">
                             <div class="form-group">
                               <label class="col-lg-3 col-sm-2 control-label">Kode Jenis Bahan</label>
                               <div class="col-lg-9">
                                 <input type="text" name="idbahan" class="form-control" >
                               </div>
                             </div>
                             <div class="form-group">
                               <label class="col-lg-3 col-sm-2 control-label">Jenis Bahan</label>
                               <div class="col-lg-9">
                                 <input type="text" name="bahan" class="form-control" placeholder="Masukkan Jenis Bahan">
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

                   <?php foreach($bahan as $a): ?>
                     <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" id="editdata<?=$a->idbahan; ?>">
                       <div class="modal-dialog">
                         <div class="modal-content">
                           <div class="modal-header">
                             <button type="button" aria-hidden="true" data-dismiss="modal" class="close">x</button>
                             <h4 class="modal-title">Edit Jenis Bahan</h4>
                           </div>
                           <form class="form-horizontal" action="<?php echo base_url('backend/bahan/editbahan'); ?>" method="post" enctype="multipart/form-data" role="form">
                             <div class="modal-body">
                               <div class="form-group">
                                 <label class="col-lg-3 col-sm-2 control-label">Kode Jenis Bahan</label>
                                 <div class="col-lg-9">
                                   <input type="text" name="idbahan" class="form-control" value="<?= $a->idbahan; ?>" readonly="readonly" >
                                 </div>
                               </div>
                               <div class="form-group">
                                 <label class="col-lg-3 col-sm-2 control-label">Jenis Bahan</label>
                                 <div class="col-lg-9">
                                   <input type="text" name="bahan" class="form-control" value="<?= $a->bahan; ?>">
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

 <?php
 $this->load->view('templates/footer');
  ?>
