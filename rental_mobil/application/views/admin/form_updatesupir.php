<div class="x_panel">
                  <div class="x_title">
                    <h2><?php echo  $header_updatesupir; ?> </h2>
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

<?php 

if($this->session->flashdata('error'))
  {
    echo '<div class="alert alert-danger alert-message">';
    echo $this->session->flashdata('error');
      echo '</div>';
  }
 ?>

<?php  
	if ($this->session->flashdata('alert'))
	 {
			echo '<div class="alert alert-danger alert-message">';
			echo $this->session->flashdata('alert');
			echo '</div>';	# code...
	} else if ($this->session->flashdata('success')) {
			echo '<div class="alert alert-success alert-message">';
			echo $this->session->flashdata('success');
			echo '</div>';
	}
 ?>
                  </div>
                  <div class="x_content">
<!--                     <div class="row">
            <div class="col-md-3 col-sm-4">
              <img src=" <?php echo base_url(); ?>assets/upload/<?php echo $foto; ?> " style="width: 100%" alt="mobil">

            </div>  
              <div class="col-md-9 col-sm-9"> -->

                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" enctype='multipart/form-data' method="post">


                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Sopir <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="nama_supir" name="nama_supir" value="<?php echo $nama_supir; ?>" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">NIK <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" onkeydown="return event.keyCode !== 69" id="nik" name="nik" value="<?php echo $nik; ?>" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">NO KTP <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" onkeydown="return event.keyCode !== 69" id="no_ktp" name="no_ktp" value="<?php echo $no_ktp; ?>" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">No HP <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        	<input type="number" onkeydown="return event.keyCode !== 69" id="no_hp" name="no_hp" value="<?php echo $no_hp; ?>" required="required"  step="1"  class="form-control col-md-7 col-xs-12"/>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Jenis Kelamin <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">

                        <select class="form-control col-md-7 col-xs-12" name="jenis_kelamin" required="required">
                            <option value="1"  <?php if($jenis_kelamin == 1) { echo "selected";} ?> >Laki Laki</option>
                            <option value="2" <?php if($jenis_kelamin == 2) { echo "selected";} ?>  >Perempuan</option>
 
                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Alamat <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <label for="message">Deskripsi (20 chars min, 100 max) :</label>
                          <textarea id="alamat" required="required" class="form-control" name="alamat" data-parsley-trigger="keyup" data-parsley-minlength="10" data-parsley-maxlength="100" data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.."
                            data-parsley-validation-threshold="10"  ><?php echo $alamat; ?></textarea>
                          </div>
                      </div>


                     <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tanggal Lahir <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="date" id="tgl_lahir" name="tgl_lahir" value="<?= $tgl_lahir; ?>" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Umur <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        	<input type="number" onkeydown="return event.keyCode !== 69" id="umur" name="umur" value="<?php echo $umur; ?>" required="required"  step="1"  class="form-control col-md-7 col-xs-12"/>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Foto Sopir <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <?php if (isset($foto)){
                            echo '<input type="hidden" name="gambar_lama" value="'.$foto.'">';
                            echo '<img src="'.base_url().'assets/upload/'.$foto.'" width="30%">';
                          } ?>
                          <div class="clearfix"></div>
                          <br>
                          <input type="file" id="first-name" name="foto"  class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>


                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" class="btn btn-primary" onclick="window.history.go(-1)"  >Kembali</button>
                          <button type="submit" class="btn btn-success"name="submit" value="Submit" >Submit</button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>
            </div>
