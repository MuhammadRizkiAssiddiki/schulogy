<?php  ?>
<div class="col-md-11">

  <br>
  <?php foreach ($pesanan as $a): ?>
  <div style="text-align: center">
  <big> <strong style="color:green">  Hai,<?php echo $a->namapemesan; ?>! </strong> </big><br>
     Ini Detail Pemesanan Kamu <br>
     <br>
  </div>
  <?php endforeach; ?>

    <table class="table table-striped">
      <?php foreach ($pesanan as $asik): ?>
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
      <th colspan="4" style="text-align: center"> Detail Pesanan</th>
    </thead>
    <thead>
      <th style="text-align: center">Nama Barang - Bahan</th>
      <th style="text-align: center">Jenis Layanan</th>
      <th style="text-align: center">Harga</th>
      <th style="text-align: center">Status</th>
    </thead>
    <tbody>
      <?php foreach ($detail as $a): ?>
      <tr>
        <td style="text-align: center"><?php echo $a->namabarang.' - '.$a->bahan;  ?></td>
        <td style="text-align: center"><?php echo $a->layanan; ?></td>
        <td style="text-align: center"><?php echo $a->harga; ?></td>
        <td style="text-align: center;color:green;"> <?php if ($a->status == 'Belum Selesai'){ ?>
          <?php echo $a->status; ?>
          <?php } else { ?>
          <?php echo $a->status; ?>
          <?php } ?>
         </td>

      </tr>
        <?php endforeach; ?>
    </tbody>
  </table>
</div>
