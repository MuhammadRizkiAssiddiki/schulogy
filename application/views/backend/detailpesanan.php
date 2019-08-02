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
                                <a href="<?php echo base_url('backend/pesanan'); ?>">Pesanan</a>
                              </li>
                              <li class="active">
                                Detail Pesanan
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
                           <h4 class="header-title m-t-0">Schulogy - Detail Pesanan</h4>
                           <div class="p-20">
                             <table class="table table-striped">
                               <?php foreach ($schulogy as $asik): ?>
                                 <tr>
                                   <td>Kode Pesanan</td>
                                   <td id="idpesanan">
                                     <b>
                                     <?php echo $asik->idpesanan; ?></td></b>
                                 </tr>
                                 <tr>

                                   <td>Nama Pemesan</td>
                                   <td><b><?php echo $asik->namapemesan; ?></b></td>

                                 </tr>
                                 <tr>
                                   <td>Tanggal Pesan</td>
                                   <td>
                                    <b><?php echo $asik->tanggal; ?></b> </td>
                                 </tr>
                                 <tr>
                                   <td>Total Harga</td>
                                   <td>
                                    <b><?php echo $asik->totalharga; ?></b> </td>
                                 </tr>

                               <?php endforeach; ?>
                             </table>

                             <table class="table table-bordered">
                               <thead>
                                 <th style="border: 0px;">Detail Pesanan</th>
                               </thead>
                               <thead>
                                 <th style="text-align: center">Nama Barang</th>
                                 <th style="text-align: center">Jenis Bahan</th>
                                 <th style="text-align: center">Jenis Layanan</th>
                                 <th style="text-align: center">Harga</th>
                                 <th style="text-align: center">Status</th>
                                 <th style="text-align: center">Aksi</th>
                               </thead>
                               <tbody>
                                 <?php foreach ($detail as $a): ?>
                                 <tr>
                                   <td style="text-align: center"><?php echo $a->namabarang; ?></td>
                                   <td style="text-align: center"><?php echo $a->bahan; ?></td>
                                   <td style="text-align: center"><?php echo $a->layanan; ?></td>
                                   <td style="text-align: center"><?php echo $a->harga; ?></td>
                                   <td style="text-align: center"> <?php if ($a->status == 'Belum Selesai'){ ?>
                                     <button id="sa<?php echo $a->iddetailpesanan; ?>" class="btn  btn-sm btn-warning btn-rounded waves-effect waves-light"><?php echo $a->status; ?></button>
                                     <?php } else { ?>
                                     <button id="sa<?php echo $a->iddetailpesanan; ?>" class="btn btn-sm btn-success btn-rounded waves-effect waves-light"><?php echo $a->status; ?></button>
                                     <?php } ?>
                                    </td>
                                    <td style="text-align: center">
                                          <a id="si<?php echo $a->iddetailpesanan; ?>" href="javascript:;" onclick="ubahstatus(<?php echo $a->iddetailpesanan; ?>)"><img width="20" height="20" src="<?php echo base_url('img/checklist.png'); ?>" data-toggle="tooltip" data-placement="bottom" data-original-title="Ubah Status Pesanan"/></a>
                                          <a href="" data-toggle="modal" data-target="#editdata<?=$a->iddetailpesanan; ?>" disabled><img name="edit" width="20" height="20" src="<?php echo base_url('img/edit.png'); ?>" data-toggle="tooltip" data-placement="bottom" data-original-title="Edit Detail Pesanan" disabled/></a>
                                          <a href="<?php echo site_url('backend/pesanan/hapusdp?var1=');?><?php echo $a->iddetailpesanan;?>&var2=<?php echo $a->idpesanan; ?>" class="sa-params"><img width="20" height="20" src="<?php echo base_url('img/hapus.png'); ?>" data-toggle="tooltip" data-placement="bottom" data-original-title="Hapus Detail Pesanan"/></a>
                                    </td>

                                 </tr>
                                   <?php endforeach; ?>
                               </tbody>
                             </table>
                           </div>
                       </div>

                   </div>
                   <?php foreach($detail as $b): ?>
                     <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" id="editdata<?=$b->iddetailpesanan; ?>">
                       <div class="modal-dialog">
                         <div class="modal-content">
                           <div class="modal-header">
                             <button type="button" aria-hidden="true" data-dismiss="modal" class="close">x</button>
                             <h4 class="modal-title">Edit Detail Pesanan</h4>
                           </div>
                           <form class="form-horizontal" action="<?php echo base_url('backend/pesanan/editdp'); ?>" method="post" enctype="multipart/form-data" role="form">
                             <div class="modal-body">
                               <input type="hidden" name="iddetailpesanan" value="<?php echo $b->iddetailpesanan; ?>">
                               <input type="hidden" name="idpesanan" value="<?php echo $b->idpesanan; ?>">
                               <div class="form-group">
                                 <label class="col-lg-3 col-sm-2 control-label">Nama Barang</label>
                                 <div class="col-lg-9">
                                   <input type="text" name="namabarang" class="form-control" value="<?= $b->namabarang; ?>">
                                 </div>
                               </div>
                               <div class="form-group">
                                 <label class="col-lg-3 col-sm-2 control-label">Jenis Bahan</label>
                                 <div class="col-lg-9">
                                   <select class="form-control" name="bahan">
                                     <?php foreach ($bahan as $c): ?>
                                       <option value="<?php echo $c->idbahan; ?>" <?php if($c->idbahan == $b->idbahan){ echo "selected='selected;'";} ?>><?php echo $c->bahan; ?></option>
                                     <?php endforeach; ?>
                                   </select>
                                 </div>
                               </div>
                               <div class="form-group">
                                 <label class="col-lg-3 col-sm-2 control-label">Jenis Layanan</label>
                                 <div class="col-lg-9">
                                   <select class="form-control" name="layanan">
                                     <?php foreach ($layanan as $d): ?>
                                       <option value="<?php echo $d->idlayanan; ?>" <?php if($d->idlayanan == $b->idlayanan){ echo "selected='selected;'";} ?>><?php echo $d->layanan; ?></option>
                                     <?php endforeach; ?>
                                   </select>
                                 </div>
                               </div>
                               <div class="form-group">
                                 <label class="col-lg-3 col-sm-2 control-label">Harga</label>
                                 <div class="col-lg-9">
                                   <input type="text" name="harga" class="form-control" value="<?= $b->harga; ?>">
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

 <script>
   function ubahstatus(id) {
     var idpesanan=$('#idpesanan').text();
     var status =$('#sa'+id).html();

     if (status == 'Belum Selesai') {
       var ubah = "Sudah Selesai";
       swal({
           title: "Ubah Status Pesanan?",
           text: "Pastikan Pesanan Bro/Sist Kita Udah Kelar Terlebih Dahulu Ya Bro!",
           type: "warning",
           showCancelButton: true,
           confirmButtonColor: "#DD6B55",
           confirmButtonText: "Ya, Ubah Status!",
           cancelButtonText: "Ohya, Masih Belum Nih!",
           closeOnConfirm: false,
       }, function(){
           $.ajax({
             url: "<?php echo base_url('backend/pesanan/ubahstatus/') ?>",
             type: "post",
             data: {id:id, idpesanan:idpesanan, ubah:ubah},
             success:function(){
               swal({
                   title: "Mission Complete!",
                   text: "Semoga Lelahmu Hari Ini Menjadi Berkah Dimasa Depan",
                   imageUrl: "<?php echo base_url('assets/backend/'); ?>assets/plugins/bootstrap-sweetalert/thumbs-up.jpg"
               });
               $('#sa'+id).removeClass('btn-warning').addClass('btn-success').html('Sudah Selesai');
             },
             error: function(){
               swal('Pesanan Gagal Diubah');
             }
           });
       });
     } else {
       var ubah = "Belum Selesai";
       swal({
           title: "Wah, Belum siap yaa ?",
           text: "Gapapa, Tetap semangat yaa!",
           type: "warning",
           showCancelButton: true,
           confirmButtonColor: "#DD6B55",
           confirmButtonText: "Ya, Ubah Status!",
           cancelButtonText: "Eh, Gajadi Deh!",
           closeOnConfirm: false,
       }, function(){
           $.ajax({
             url: "<?php echo base_url('backend/pesanan/ubahstatus/') ?>",
             type: "post",
             data: {id:id, idpesanan:idpesanan, ubah:ubah},
             success:function(){
               swal({
                   title: "Tetap Semangat!",
                   text: "Pastikan pesanan bro/sist kita beres dengan baik ya.",
                   imageUrl: "<?php echo base_url('assets/backend/'); ?>assets/plugins/bootstrap-sweetalert/fist.png"
               });
               $('#sa'+id).removeClass('btn-success').addClass('btn-warning').html('Belum Selesai');
             },
             error: function(){
               swal('Pesanan Gagal Diubah');
             }
           });
       });
     }


   }

   function changestatus() {
     swal('Anjeng');
   }
 </script>

 <!-- jQuery  -->
 <script src="<?php echo base_url('assets/backend/assets/'); ?>js/jquery.min.js"></script>

 <?php
 $this->load->view('templates/footer');
  ?>
