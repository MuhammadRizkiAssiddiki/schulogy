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
                                <a href="">Pesanan</a>
                              </li>
                              <li class="active">
                                Data Pesanan
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
                           <h4 class="header-title m-t-0">Schulogy - Pemesanan</h4>
                           &nbsp;&nbsp;

                           <a href="<?php echo site_url('backend/pesanan/tambahpesanan') ?>" class="btn btn-info btn-rounded waves-effect waves-light">Tambah Pesanan</a>
                           <div class="p-20">
                               <table id="datatable" class="table table-striped">
                                   <thead>
                                   <tr>
                                       <th>No</th>
                                       <th>Kode Pesanan</th>
                                       <th>Nama Pemesan</th>
                                       <th>Tanggal</th>
                                       <th>Opsi</th>
                                   </tr>
                                   </thead>
                                   <tbody>
                                     <?php $i =1 ; foreach ($pesanan as $a): ?>
                                       <tr>
                                         <td><?php echo $i++; ?></td>
                                         <td><?php echo $a->idpesanan; ?></td>
                                         <td><?php echo $a->namapemesan; ?></td>
                                         <td><?php echo $a->tanggal; ?></td>
                                         <td>
                                           <a href="<?php echo site_url('backend/pesanan/detailpesanan/'.$a->idpesanan) ?>"><img name="detail" width="20" height="20" src="<?php echo base_url('img/detail.png'); ?>" data-toggle="tooltip" data-placement="bottom" data-original-title="Detail Pesanan" disabled/></a>
                                           <a href="" data-toggle="modal" data-target="#editdata<?=$a->idpesanan; ?>" disabled><img name="edit" width="20" height="20" src="<?php echo base_url('img/edit.png'); ?>" data-toggle="tooltip" data-placement="bottom" data-original-title="Edit Pesanan" disabled/></a>
                                           <a href="<?php echo site_url('backend/pesanan/hapuspesanan/'.$a->idpesanan); ?>" class="sa-params"><img width="20" height="20" src="<?php echo base_url('img/hapus.png'); ?>" data-toggle="tooltip" data-placement="bottom" data-original-title="Hapus Pesanan"/></a>
                                         </td>
                                       </tr>
                                     <?php endforeach; ?>
                                   </tbody>
                               </table>
                           </div>
                       </div>

                   </div>
                   <?php foreach($pesanan as $a): ?>
                     <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" id="editdata<?=$a->idpesanan; ?>">
                       <div class="modal-dialog">
                         <div class="modal-content">
                           <div class="modal-header">
                             <button type="button" aria-hidden="true" data-dismiss="modal" class="close">x</button>
                             <h4 class="modal-title">Edit Pesanan</h4>
                           </div>
                           <form class="form-horizontal" action="<?php echo base_url('backend/pesanan/editpesanan'); ?>" method="post" enctype="multipart/form-data" role="form">
                             <div class="modal-body">
                               <div class="form-group">
                                 <label class="col-lg-3 col-sm-2 control-label">Kode Pesanan</label>
                                 <div class="col-lg-9">
                                   <input type="text" name="idpesanan" class="form-control" value="<?= $a->idpesanan; ?>" readonly="readonly" >
                                 </div>
                               </div>
                               <div class="form-group">
                                 <label class="col-lg-3 col-sm-2 control-label">Pesanan</label>
                                 <div class="col-lg-9">
                                   <input type="text" name="namapemesan" class="form-control" value="<?= $a->namapemesan; ?>">
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
 <script>
     var resizefunc = [];
 </script>

 <!-- jQuery  -->
 <script src="<?php echo base_url('assets/backend/assets/'); ?>js/jquery.min.js"></script>

 <!-- Required datatable js -->
 <script src="<?php echo base_url('assets/backend/assets/'); ?>plugins/datatables/jquery.dataTables.min.js"></script>
 <script src="<?php echo base_url('assets/backend/assets/'); ?>plugins/datatables/dataTables.bootstrap4.min.js"></script>

 <script type="text/javascript">
     $(document).ready(function() {
         $('#datatable').DataTable();

     });

 </script>
 <?php
 $this->load->view('templates/footer');
  ?>
