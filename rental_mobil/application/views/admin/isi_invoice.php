            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Invoice Transaksi <small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <section class="content invoice">
<?php  
  if ($this->session->flashdata('alert'))
   {
      echo '<div class="alert alert-danger alert-message">';
      echo $this->session->flashdata('alert');
      echo '</div>';  # code...
  } else if ($this->session->flashdata('success')) {
      echo '<div class="alert alert-success alert-message">';
      echo $this->session->flashdata('success');
      echo '</div>';
  }
 ?>
                      <!-- title row -->
                      <div class="row">
                        <div class="col-xs-12 invoice-header">
                          <h1>
                                <i class="fa fa-globe"></i> Invoice.
                                 <small class="pull-right"><?php echo $created; ?></small>

                             <div class="text-center text-muted well well-sm no-shadow">
                        <?php if($status_transaksi == 1){
                        	echo "<small ><i class='fa fa-credit-card'></i> Menunggu Pembayaran</small>";
                        }elseif ($status_transaksi == 2) {
                        	echo "<small ><i class='fa fa-credit-card'></i> Menunggu Konfirmasi</small>";
                        }elseif ($status_transaksi == 3) {
                        	echo "<small ><i class='fa fa-credit-card'></i> Lunas</small>";
                        }elseif ($status_transaksi == 4) {
                        	echo "<small ><i class='fa fa-credit-card'></i> Peminjaman sedang Berjalan</small>";
                        }elseif ($status_transaksi == 5) {
                        	echo "<small ><i class='fa fa-credit-card'></i> Transaksi Telah Selesai</small>";
                        }elseif ($status_transaksi == 9) {
                        	echo "<small ><i class='fa fa-credit-card'></i> Transaksi Batal</small>";

                        } ?>

							</div>
                           </h1>
                        </div>
                        <!-- /.col -->
                      </div>
                      <br>
                      <!-- info row -->
                      <div class="row invoice-info">
                        <div class="col-sm-4 invoice-col">
                          From
                          <address>
                                          <strong><?php echo $this->session->userdata('nama') ?> Admin, Inc.</strong>

                                          <br>Phone: <?php echo $this->session->userdata('no_hp') ?>
                                          <br>Email: <?php echo $this->session->userdata('email') ?>
                                      </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                          Kepada.
                          <address>
                                          <strong><?php echo $nama ?></strong>
                                          <br>795 Freedom Ave, Suite 600
                                          <br><?php echo $tujuan ?>
                                          <br>Phone: <?php echo $no_hp ?>
                                          <br>Email: <?php echo $email ?>
                                      </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                          <b>Invoice #<?php echo $id_transaksi; ?></b>
                          <br>
                          <br>
                          <b>Order ID:</b> 4F3S8J
                          <br>
                          <b>Payment Due:</b> <?php echo $tgl_akhir; ?>
                          <br>
                          <b>Account:</b> <?php echo $bank; ?>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->

                      <!-- Table row -->
                      <div class="row">
                        <div class="col-xs-12 table">
                          <table class="table table-striped">
                            <thead>
                              <tr>
                                <th>No.</th>
                                <th>Mobil</th>
                                <th>Plat Nomer</th>
                                <th>Tahun Mobil</th>
                                <th>Kapasitas</th>
                              	<th>warna</th>
                                <th style="width: 49%">Description</th>
                                <th>Harga Sewa</th>

                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>1</td>
                                <td><?php echo $nama_mobil; ?></td>
                                <td><?php echo $plat ?></td>
                                <td><?php echo $tahun_mobil ?></td>
                                <td><?php echo $kapasitas ?></td>
                                <td><?php echo $warna; ?></td>


                                <td><?php echo $deskripsi ?>
                                </td>
                                <td>Rp. <?php echo number_format($harga_sewa) ?></td>

                              </tr>


                            </tbody>
                          </table>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->

                      <div class="row">
                        <!-- accepted payments column -->
                        <div class="col-xs-6">
                          <p class="lead">Metode Pembayaran :</p>
                          <img src="<?php echo base_url().'admin_assets/' ?>images/visa.png"  alt="Visa">
                          <img src="<?php echo base_url().'admin_assets/' ?>images/mastercard.png" alt="Mastercard">
                          <img src="<?php echo base_url().'admin_assets/' ?>images/visa.jpg" width="92" height="32" alt="Visa">
<!-- 
                          <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                            Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem plugg dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
                          </p> -->
<div class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                <p class="text-md  text-center " style="margin-top: 10px;">Transfer Pembayaran Ke Nomer Rekening <?php echo $nama_bank ?> :</p>
                <p class="text-md  text-center "><?php echo $no_rek ?></p>
                <p class="text-md  text-center ">a/n <?php echo $pemilik_bank ?></p>
                <p class="text-md  text-center ">Biasanya terverifikasi dalam 10 - 30menit, atau tunggu 1x24 jam kerja</p>
                 <p class="text-md  text-center  "><strong> Kode Order #<?php echo $id_transaksi; ?></strong></p>
               <p class="text-md  text-center ">Jumlah yang harus di bayar :</p>
                <p class="text-md  text-center ">Rp. <?php echo number_format($total_harga) ?></p>
               <p class="text-md  text-center "><strong>Transfer Tepat Hingga 3 digit Terakhir !</strong></p>
                <p class="text-md  text-center ">Perbedaan digit akan menghambat proses verifikasi.</p>
</div>
                        </div>
                        <!-- /.col -->
                        <div class="col-xs-6">
                          <p class="lead">Amount Due 2/22/2014</p>
                          <div class="table-responsive">
                            <table class="table">
                              <tbody>
                                <tr>
                                  <th style="width:50%">Harga perhari:</th>
                                  <td>Rp. <?php echo number_format($harga_sewa) ?></td>
                                  <td></td>

                                </tr>
                                <tr>
                                  <th>Tgl Awal Order :</th>
                                  <td><?php echo $tgl_order ?></td>
                                  <td><?php echo $waktu_order ?></td>

                                </tr>
                                <tr>
                                  <th>Lama Penyewaan :</th>
                                  <td><?php echo $lama_peminjaman ?> Hari</td>
                                  <td></td>

                                </tr>
                                <tr>
                                  <th>Penyewaan Berakhir :</th>
                                  <td><?php echo $tgl_akhir ?> </td>
                                  <td></td>

                                </tr>
                                <tr>
                                  <th>Total:</th>
                                  <td>Rp. <?php echo number_format($total_harga) ?></td>
                                  <td></td>

                                </tr>
                              </tbody>
                            </table>
                            <br>
                            <br>
                            <br>
                            
             <div class="col-xs-11">
    <?php if($status_transaksi == 1):?>
    <div class="time-left pull-right ">
        <span style="font-size: 17px;">Sisa Waktu Pembayaran:</span>
        <br> 
        <div class="text-center" id="timer"></div>
    </div>
    <?php else:?>
    <?php endif;?>
   </div>
                          </div>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->

                      <!-- this row will not appear when printing -->
                      <div class="row no-print">
                        <div class="col-xs-10">
                          <button class="btn btn-default" onclick="window.print();"><i class="fa fa-print"></i> Print</button>

<!--                           <button class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment</button>
 -->                        </div>
                      </div>
                    </section>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->