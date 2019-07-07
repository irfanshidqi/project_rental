            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12">

<div class="x_panel">
   <div class="x_title">
      <h2>Laporan Transaksi</h2>
      <div class="clearfix"></div>
    <?= validation_errors('<p style="color:red">','</p>'); ?>
      <form class="form-horizontal row" action="" method="post">

         <div class="form-group col-md-3 col-sm-12">
            <select class="form-control" name="bln">
               <option value="01" <?php if($bln == 01) { echo 'selected';} ?>>Januari</option>
               <option value="02" <?php if($bln == 02) { echo 'selected';} ?>>Februari</option>
               <option value="03" <?php if($bln == 03) { echo 'selected';} ?>>Maret</option>
               <option value="04" <?php if($bln == 04) { echo 'selected';} ?>>April</option>
               <option value="05" <?php if($bln == 05) { echo 'selected';} ?>>Mei</option>
               <option value="06" <?php if($bln == 06) { echo 'selected';} ?>>Juni</option>
               <option value="07" <?php if($bln == 07) { echo 'selected';} ?>>Juli</option>
               <option value="08" <?php if($bln == 8) { echo 'selected';} ?>>Agustus</option>
               <option value="09" <?php if($bln == 9) { echo 'selected';} ?>>September</option>
               <option value="10" <?php if($bln == 10) { echo 'selected';} ?>>Oktober</option>
               <option value="11" <?php if($bln == 11) { echo 'selected';} ?>>November</option>
               <option value="12" <?php if($bln == 12) { echo 'selected';} ?>>Desember</option>
            </select>
         </div>

         <div class="form-group col-md-3 col-sm-12">
            <select class="form-control" name="thn">
               <?php for ($i = 2019; $i <= 2035; $i++) { ?>
                  <option value="<?=$i;?>" <?php if($thn == $i) { echo 'selected';} ?> >
          <?=$i;?>
          </option>
               <?php } ?>
            </select>
         </div>

         <button type="submit" name="submit" value="Submit" class="btn btn-primary">Submit</button>
      </form>
   </div>

   <div class="x_content">
      <div class="row">

      <?php 

          switch ($bln) {

            case '01':
              $Bulan = 'Januari';
              break;        
            case '02':
              $Bulan = 'Februari';
              break;
            case '03':
              $Bulan = 'Maret';
              break;
            case '04':
              $Bulan = 'April';
              break;
            case '05':
              $Bulan = 'Mei';
              break;
            case '06':
              $Bulan = 'Juni';
              break;
            case '07':
              $Bulan = 'Juli';
              break;
            case '08':
              $Bulan = 'Agustus';
              break;
            case '09':
              $Bulan = 'September';
              break;
            case '10':
              $Bulan = 'Oktober';
              break;
            case '11':
              $Bulan = 'November';
              break;
            case '12':
              $Bulan = 'Desember';
              break;
          }

       ?>

         <div class="col-md-10 col-sm-12">
            <h3>Laporan Bulan <?php echo $Bulan; ?> Tahun <?php echo $thn; ?></h3>
         </div>
         <div class="col-md-1 col-sm-12 col-md-offset-1">
            <a href="#" onclick="window.print();" class="btn btn-success"><i class="fa fa-print"></i></a>
         </div>

         <div class="col-md-12 col-sm-12">
            <table class="table table-bordered">
               <thead>
                  <tr>
                     <th>#</th>
                     <th>Id Order</th>
                     <th>Nama Pemesan</th>
                     <th>Tanggal Sewa</th>
                     <th>Lama Penyewaan</th>
                     <th>Harga Sewa Mobil</th>
                     <th>Total Bayar</th>
                     <th>Denda</th>
                     <th>Pendapatan</th>
                  </tr>
               </thead>
               <tbody>
<?php if(!empty($data->result())){  ?>
                <?php 

                  $no = 1;
                  $pendapatan = 0;

                  foreach ($data->result() as $key) :
                      $pendapatan += $key->total_harga+$key->denda;
                  

                 ?>
                  <tr>
                     <td><?php echo $no++; ?></td>
                     <td><?php echo $key->id_transaksi; ?></td>
                     <td><?php echo $key->nama; ?></td>
                     <td><?php echo $key->tgl_order; ?></td>
                     <td><?php echo $key->lama_peminjaman; ?> Hari</td>

                     <td>
                        <span style="float:left">Rp.<?php echo number_format($key->harga); ?></span>
                        <span style="float:right">,-</span>
                     </td>
                     <td>
                        <span style="float:left">Rp.<?php echo number_format($key->total_harga); ?></span>
                        <span style="float:right">,-</span>
                     </td>
                     <td>
                        <span style="float:left">Rp.<?php echo number_format($key->denda); ?></span>
                        <span style="float:right">,-</span>
                     </td>
                     <td>
                        <span style="float:left">Rp.<?php echo number_format($key->total_harga+$key->denda); ?></span>
                        <span style="float:right">,-</span>
                     </td>
                  </tr>
                <?php endforeach; ?>
<?php }else{
  echo '                    <td colspan="8" class="text-muted" style="text-align:center"><b style="text-align:center">Tidak Ada Data Transaksi Pada Bulan Ini</b></td>
  <td></td>
';
}  ?>
                  <tr>
<!-- <?php if(!empty($key)){
$semua = $key->total_harga+$key->denda;
}else{
} ?> -->
                     <td colspan="8" style="text-align:center"><b>Pendapatan</b></td>
                     <td>
                        <b>
                           <span style="float:left">Rp.
<?php if(!empty($semua)){
      echo number_format($pendapatan);
}  ?>
  
</span>
                           <span style="float:right">,-</span>
                        </b>
                     </td>

                  </tr>

               </tbody>
            </table>

         </div>

         <div class="col-md-6 col-sm-6">
            <a href="#" class="btn btn-default" onclick="window.history.go(-1)">Kembali</a>
         </div>

      </div>
   </div>
</div>
   </div>
</div>   
</div>
