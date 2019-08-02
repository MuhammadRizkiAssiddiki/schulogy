<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
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
                                <a href="<?php echo base_url('backend/pesanan'); ?>">Data Pesanan</a>
                              </li>
                              <li class="active">
                                Tambah Pesanan
                              </li>
                           </ol>
                        <div class="clearfix"></div>
                      </div>
							  </div>
						</div>

            <!-- end row -->
            <form role="form" id="SimpanData" data-parsley-validate novalidate action="<?php echo base_url('backend/pesanan/prosestambahpesanan'); ?>" method="post" enctype="multipart/form-data" role="form">

            <div class="row">

              <div class="col-xs-12">
               <div class="card-box">

                   <div class="row">


                       <div class="col-lg-12">
                           <h4 class="header-title m-t-0">Schulogy - Tambah Data Pesanan</h4>
                             <div class="col-sm-12 col-xs-12 col-md-6">
                                 <p class="text-muted font-13 m-b-10">
                                   Note : Masukkan Data Pesanan Terlebih Dahulu, Sesudah itu, masukkan data detail pesanan!
                                 </p>

                                 <div class="p-20">
                                       <div class="form-group row" style="text-align: right">
                                           <label for="Kode Pesanan" class="col-sm-4 form-control-label">Kode Pesanan <span class="text-danger">*</span></label>
                                           <div class="col-sm-5">
                                             <input type="text" id="idpesanan" name="idpesanan" parsley-trigger="change" required placeholder="Masukkan Kode Pesanan" class="form-control" id="userName">
                                           </div>
                                       </div>

                                       <div class="form-group row" style="text-align: right">
                                           <label for="Kode Pesanan" class="col-sm-4 form-control-label">Nama Pemesan <span class="text-danger">*</span></label>
                                           <div class="col-sm-5">
                                             <input type="text" name="namapemesan" parsley-trigger="change" required placeholder="Masukkan Nama Pemesan" class="form-control" id="userName">
                                           </div>
                                       </div>

                                       <div class="form-group row" style="text-align: right">
                                           <label for="Kode Pesanan" class="col-sm-4 form-control-label">Tanggal Pesanan <span class="text-danger">*</span></label>
                                           <div class="col-sm-5">
                                             <div class="input-group">
                                                <input type="text" class="form-control" placeholder="mm/dd/yyyy" id="datepicker">
                                                <span class="input-group-addon bg-custom b-0"><i class="icon-calender"></i></span>
                                            </div>
                                          </div>
                                       </div>
                                 </div>

                              </div>
                       </div>

                   </div>
                 </div>
               </div><!-- end col-->

               <div class="col-xs-12">
                <div class="card-box">
                    <div class="row">
                        <div class="col-lg-12">
                            <h4 class="header-title m-t-0">Detail Data Pesanan</h4>
                            <div class="p-20">
                              <div id="notif">

                              </div>
                              <table class="table" id="tableLoop">
                                <thead>
                                <tr>
                                    <th style="text-align: center;">Nama Barang</th>
                                    <th style="text-align: center;">Bahan</th>
                                    <th style="text-align: center;">Layanan</th>
                                    <th style="text-align: center;">Harga</th>
                                    <th style="background: white; border:0px; text-align: center;">
                                      <a id="tambahbaris" class="btn btn-success waves-effect waves-light"> Tambah</a>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                              </table>

                            </div>
                        </div>

                    </div>
                    <div class="form-group text-right">
                      <div class="col-md-12 col-md-offset-4">
                        <button type="submit" class="btn btn-success">Submit</button>
                        <button type="reset" class="btn btn-primary">Reset</button>
                      </div>
                    </div>

                  </div>

                </div><!-- end col-->
                </form>


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


  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js">

  </script>

  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
$( function() {
  $( "#datepicker" ).datepicker();
} );
</script>


  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js">

  </script>
  <script type="text/javascript">

    $(document).ready(function(){
      for (B=1; B<=1; B++) {
        Barisbaru();
      }
      $('#tambahbaris').click(function(e){
        e.preventDefault();
        Barisbaru();
      });

      $("tableLoop tbody").find('input[type=text]').filter(':visible:first').focus();
    });

    function Barisbaru() {
      var Baris = '<tr>';
            Baris += '<td>';
              Baris += '<input type="text" id="namabarang" name="namabarang[]" parsley-trigger="change" required placeholder="Masukkan Nama Barang" class="form-control">';
            Baris += '</td>';
            Baris += '<td>';
              Baris += '<select id="bahan" class="c-select" name="bahan[]" style="width:190px;text-align: center;">';
              Baris += '<?php foreach ($bahan as $a): ?>';
              Baris += '<option value="<?php echo $a->idbahan; ?>"><?php echo $a->bahan; ?></option>'
              Baris += '<?php endforeach; ?>';
              Baris += '</select>';
            Baris += '</td>';
            Baris += '<td>';
              Baris += '<select class="c-select" name="layanan[]" style="width:190px;text-align: center;">';
              Baris += '<?php foreach ($layanan as $a): ?>';
              Baris += '<option value="<?php echo $a->idlayanan; ?>"><?php echo $a->layanan; ?></option>'
              Baris += '<?php endforeach; ?>';
              Baris += '</select>';
            Baris += '</td>';
            Baris += '<td>';
              Baris += '<input type="text" name="harga[]" parsley-trigger="change" required placeholder="Masukkan Harga" class="form-control">';
            Baris += '</td>';
            Baris += '<td style="background: white; border:0px; text-align: center;">';
              Baris += '<a class="btn btn-danger waves-effect waves-light" id="Hapusbaris">Hapus</a>';
            Baris += '</td>';
          Baris += '</tr>';

          $("#tableLoop tbody").append(Baris);
          $("#tableLoop tbody tr").each(function(){
            $(this).find('td:nth-child(2) input').focus();
          });
    }

    $(document).on('click', '#Hapusbaris', function(e) {
      e.preventDefault();
      var a = 1;
      $(this).parent().parent().remove();
      $('tableLoop tbody tr').each(function(){
        $(this).find('td:nth-child(1)').html(a);
        a++;
      });
    });

    // $(document).ready(function(){
    //   $('#SimpanData').submit(function(e){
    //
    //     e.preventDefault();
    //     detailpesanan();
    //   });
    // });
    //
    // function detailpesanan(){
    //   var nama = $('#namabarang').val();
    //   var id = $('#bahan').val();
    //
    //   $.ajax({
    //     url:$("#SimpanData").attr('action'),
    //     type:'post',
    //     cache:false,
    //     dataType:"json",
    //     data: $("#SimpanData").serialize(),
    //     success:function (data){
    //       $('#notif').html('<div class="alert alert-success">Data Berhasil Disimpan</div>')
    //       alert(id);
    //       if (data.success == true) {
    //         $('.namabarang').val('');
    //       }
    //       else{
    //         alert(nama);
    //         $('#notif').html('<div class="alert alert-danger">Data Gagal Disimpan</div>')
    //       }
    //     },
    //
    //     error:function(error){
    //       alert(nama);
    //       alert(id);
    //       alert(error);
    //     }
    //   });
    // }
  </script>
