
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Laporan </h2>
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
                      Data laporan dari transaksi transaksi yg ada
                    </p>
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                       <thead>
                        <tr>
                          <th>No.</th>
                          <th>Username</th>
                          <th>Nama Lengkap</th>
                          <th>NIK</th>
                          <th>No Telp</th>
                          <th>Jenis Kelamin</th>
                          <th>Action</th>

                        </tr>
                      </thead>
                      <tbody>

                    <?php 

                    $no = 1;
                    if(!empty($data)){
                    foreach ($data as $trans) : ?>

                        <tr>
                          <td><?php echo $no++; ?>.</td>
                          <td><?php echo $trans->id_transaksi; ?></td>
                          <td><?php echo $trans->nama_mobil; ?></td>
                          <td><?php echo $trans->nama; ?></td>
                          <td><?php echo $trans->no_hp; ?></td>
                          <td>                          
                            <?php 

                      if($trans->status_transaksi == 5){
                        
                          echo '<label class="label-success" style="color:white; padding:3px 5px;">Transaksi selesai </label>';
                        }
                            ?>
                              
                            </td>

                          <td>
                            <a href="<?php echo base_url(); ?>transaksi/invoice/<?php echo $trans->id_transaksi; ?>" class="btn btn-success"><i class="fa fa-search-plus"></i></a>
<!--                             <a href="<?php echo base_url(); ?>transaksi/update_trans/<?php echo $trans->id_supir; ?>" class="btn btn-warning"><i class="fa fa-edit"></i></a> -->
                          </td>



                        </tr>

                    <?php endforeach; ?>
<?php } ?>

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>