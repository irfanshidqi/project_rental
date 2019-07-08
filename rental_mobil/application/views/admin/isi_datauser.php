            <div class="page-title">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Table Data user <small><?php echo $this->session->userdata("nama"); ?></small></h2>
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
  <?php if($this->session->flashdata('success')){
    echo '<div class="alert alert-success alert-message">';
    echo $this->session->flashdata('success');
    echo '</div>';
  } ?>

              <a href="<?php echo base_url().'user/tambah_user' ?>" class="btn btn-success"><i class="fa fa-plus"></i> Tambah User Baru</a>

                    <p class="text-muted font-13 m-b-30">
                      Di bawah ini merupakan data dari user yang ada.
                    </p>
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>No.</th>
                          <th>Username</th>
                          <th>Nama Lengkap</th>
                          <th>NIK</th>
                          <th>No Telp</th>
                          <th>Jenis Kelamin</th>
                          <th>Status</th>
                          <th>Action</th>

                        </tr>
                      </thead>
                      <tbody>

                    <?php 

                    $no = 1;
                    foreach ($data->result() as $user) : ?>

                        <tr>
                          <td><?php echo $no++; ?>.</td>
                          <td><?php echo $user->username; ?></td>
                          <td><?php echo $user->nama; ?></td>
                          <td><?php echo $user->nik; ?></td>
                          <td><?php echo $user->no_hp; ?></td>
                          <td>                          
                            <?php 
                            if ($user->jenis_kelamin == 1) {
                              echo '<label class="label-default" style="color:white; padding:3px 5px;">laki Laki</label>';

                            }else{
                              echo '<label class="label-default" style="color:white; padding:3px 5px;">Perempuan </label>';

                            }
                            ?></td>

                          <td>
                          	<?php 
                          	if ($user->status == 1) {
                          		echo '<label class="label-success" style="color:white; padding:3px 5px;">Aktif</label>';

                          	}else{
                          		echo '<label class="label-danger" style="color:white; padding:3px 5px;">Tidak Aktif</label>';

                          	}
	                          ?>
                          	
                          </td>
                          <td>
                          	<a href="<?php echo base_url(); ?>user/detail/<?php echo $user->id_user; ?>" class="btn btn-success"><i class="fa fa-search-plus"></i></a>
                  <?php if ($this->session->userdata('level') == 1): ?>

                          	<a href="<?php echo base_url(); ?>user/update_user/<?php echo $user->id_user; ?>" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                  <?php endif ?>

                          </td>



                        </tr>

                    <?php endforeach; ?>


                      </tbody>
                    </table>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>