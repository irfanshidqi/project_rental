
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Table Data Mobil <small><?php echo $this->session->userdata("nama"); ?></small></h2>
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
                    <p class="text-muted font-13 m-b-30">
                      Di bawah ini merupakan data dari mobil yang ada.
                    </p>
<?php 
  
     if ($this->session->flashdata('success')){

    echo '<div class="alert alert-success alert-message">';
    echo $this->session->flashdata('success');
    echo '</div>';

  }

 ?>
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>No.</th>
                          <th>Nama Mobil</th>
                          <th>Merk</th>
                          <th>Tahun</th>
                          <th>Harga Sewa</th>
                          <th>Plat</th>
                          <th>Status</th>
                          <th>Action</th>

                        </tr>
                      </thead>
                      <tbody>

                    <?php 

                    $no = 1;
                    foreach ($data as $mobil) : ?>

                        <tr>
                          <td><?php echo $no++; ?>.</td>
                          <td><?php echo $mobil->nama_mobil; ?></td>
                          <td><?php echo $mobil->nama_merek; ?></td>
                          <td><?php echo $mobil->tahun_mobil; ?></td>
                          <td>Rp.<?php echo number_format ($mobil->harga_sewa,0,',','.'); ?></td>
                          <td><?php echo $mobil->plat_mobil; ?>	</td>
                          <td>

                          	<?php 
                          	if ($mobil->status_sewa == 1) {
                          		echo '<label class="label-success" style="color:white; padding:3px 5px;">Tersedia</label>';

                          	}else{
                          		echo '<label class="label-danger" style="color:white; padding:3px 5px;">Di Sewa</label>';

                          	}
	                          ?>
                          	
                          </td>
                          <td>
                          	<a href="<?php echo base_url(); ?>mobil/detail/<?php echo $mobil->id_mobil; ?>" class="btn btn-success"><i class="fa fa-search-plus"></i></a>
                          	<a href="<?php echo base_url(); ?>mobil/update_mobil/<?php echo $mobil->id_mobil; ?>" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                          </td>



                        </tr>

                    <?php endforeach; ?>


                      </tbody>
                    </table>

                  </div>
                </div>
              </div>
            </div>
