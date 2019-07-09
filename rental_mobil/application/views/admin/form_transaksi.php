 
                 <div class="row">
<?php  
  if ($this->session->flashdata('alert'))
   {
      echo '<div class="alert alert-danger alert-message ">';
      echo $this->session->flashdata('alert');
      echo '</div>';  # code...
  } else if ($this->session->flashdata('success')) {
      echo '<div class="alert alert-success alert-message">';
      echo $this->session->flashdata('success');
      echo '</div>';
  }
 ?>
                  <div class="col-md-6 col-xs-12">

                <div class="x_panel">
                  <div class="x_title">
                    <h2>Tambah Transaksi Baru </h2>
                    <ul class="nav navbar-right panel_toolbox">

                    </ul>
                    <div class="clearfix"></div>

                  </div>
                  <div class="x_content">

                    <br />
                    <form class="form-horizontal form-label-left"  method="post">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Kode Transaksi</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">


                          <input type="text" class="form-control"  value="<?php echo $id_tr ?>" readonly="readonly" name="id_transaksi">

                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Merek Mobil</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <select class="select2_single form-control" tabindex="-1" id="merek_mobil" name="merek_mobil" required="required" >
                            <option>- Merek Mobil -</option>
                            <?php foreach ($merek as $key) {?>
                            <option  value="<?= $key->id_merek ?>"><?= $key->nama_merek ?></option>
                            <?php } ?>



                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Tipe Mobil</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <select class="select2_single form-control" tabindex="-1" name="tipe_mobil" id="tipe_mobil" required="required">
                            <option  value="">Tipe-tipe mobil</option>

  
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Harga Sewa Perhari</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="number" class="form-control" readonly="readonly"  id="harga_sewa" placeholder="Harga Sewa Perhari" name="sewa" required="required" >
                        </div>
                      </div>
<!--                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="form-control" name="nama" placeholder="Nama lengkap">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">No Hp</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="form-control" name="no_hp" placeholder="No HP">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Email</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="form-control" name="email" placeholder="Email">
                        </div>
                      </div> -->
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Tujuan	</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" name="tujuan" id="autocomplete-custom-append" class="form-control col-md-10" style="float: right;" placeholder="Tujuan Penyewaan" required="required">
                          <div id="autocomplete-container" style="position: relative; float: left; width: 400px; margin: 10px;"></div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal Pesan</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">	
                             <input type="date" class="form-control has-feedback-left" id="dt"  placeholder="First Name" aria-describedby="inputSuccess2Status3" name="tgl_start" required="required">
                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                              <span id="inputSuccess2Status3" class="sr-only">(success)</span>
                       </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Waktu Ambil</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">	
                             <input type="time" class="form-control has-feedback-left" id="single_cal3" placeholder="First Name" aria-describedby="inputSuccess2Status3" name="waktu" required="required">
                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                              <span id="inputSuccess2Status3" class="sr-only">(success)</span>
                       </div>
                      </div>


                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Lama Penyewaan</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="number" class="form-control" placeholder="Lama sewa" id="lama" name="lama_penyewaan" onChange="gettotal_harga()" required="required" >
                        </div>
                      </div>


	
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">BANK</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <select class="select2_single form-control" name="bank" tabindex="-1" required="required">
                            <option>- Bank -</option>
                            <?php foreach ($bank as $key ): ?>
                            <option value="<?php echo $key->id_bank ?> " ><?php echo $key->nama_bank ?></option>

                              
                            <?php endforeach ?>


                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Total Harga</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="number" class="form-control" id="total_harga" name="total_harga" readonly="readonly" placeholder="Total Harga" required="required" >
                        </div>
                      </div>



                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                          <button type="submit" class="btn btn-primary">Cancel</button>
                          <button type="submit" name="submit" class="btn btn-success" value="Submit">Submit</button>
                        </div>
                      </div>

                  </div>
                </div>
            </div>
<!-- supir -->
              <div class="col-md-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Form Supir <small>Pilih Data supir</small></h2>
                    <ul class="nav navbar-right panel_toolbox">


                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                      <div class="col-md-12 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control has-feedback-left" id="nama_supir" name="nama_supir" placeholder="Cari Nama Supir Disini" required="required" >
                        <span class="fa fa-search-plus form-control-feedback left" aria-hidden="true"></span>
                      </div>
                      <br>
                      <br>
                      <br>

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control has-feedback-left" id="id_supir" name="id_supir" placeholder="id supir" readonly="">
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                      </div>

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control" id="umur" name="umur" placeholder="Umur" readonly="">
                        <span class="fa fa-male form-control-feedback right" aria-hidden="true"></span>
                      </div>

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control has-feedback-left" name="alamat_supir" id="alamat_supir" placeholder="Alamat" readonly="">
                        <span class="fa fa-building form-control-feedback left" aria-hidden="true" ></span>
                      </div>

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="number" class="form-control" id="hp_supir" name="hp_supir" placeholder="No Hp" readonly="">
                        <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
                      </div>


                      <div class="ln_solid"></div>


                  </div>
                </div>
              </div>
<!-- supir -->
              <div class="col-md-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Form data User <small>Pilih data user yg telah terdaftar</small></h2>
                    <ul class="nav navbar-right panel_toolbox">


                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                      <div class="col-md-12 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control has-feedback-left" id="nama_pelanggan" name="nama_pelanggan" placeholder="Caru Nama Pelanggan Disini" required="required">
                        <span class="fa fa-search-plus form-control-feedback left" aria-hidden="true"></span>
                      </div>
                                           <br>
                      <br>
                      <br> 
                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="email" class="form-control has-feedback-left" id="email_pelanggan" name="email_pelanggan" placeholder="Email" readonly="">
                        <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                      </div>

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="number" class="form-control" id="no_pelanggan" name="no_pelanggan" placeholder="No.HP pelanggan" readonly="">
                        <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                      </div>
                        <input type="hidden" class="form-control" id="id_pelanggan" name="id_pelanggan" >





                      <div class="ln_solid"></div>


                    </form>
                  </div>
                </div>
            </div>
          </div>
        </div>