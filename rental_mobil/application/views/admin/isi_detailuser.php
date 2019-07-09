                <div class="x_panel">
                  <div class="x_title">
                    <h2>Detail Mobil <small>Data Lengkap Dari Mobil</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>


                    </ul>
                    <div class="clearfix"></div>

                  </div>
                  <div class="x_content">
                    
					<div class="row">
						
				
	
							<div class="col-md-5 col-sm-6">
								
								<table class="table table-striped" >
									<tr>
										<td width="100px" >username</td>
										<td> : <?php echo $username; ?></td>
									</tr>
									<tr>
										<td width="100px">Nama Lengkap</td>
										<td> : <?php echo $nama; ?></td>
									</tr>
									<tr>
										<td width="100px">No Induk KTP</td>
										<td> : <?php echo $nik; ?> </td>
									</tr>
									<tr>
										<td width="100px">Email</td>
										<td> : <?php echo $email; ?></td>
									</tr>
									<tr>
										<td width="100px">Nomer HP</td>
										<td> : <?php echo $no_hp; ?></td>
									</tr>
									<tr>
										<td width="100px">Jenis Kelamin</td>
										<td> : <?php 

										if($jenis_kelamin == 1){
                             				 echo '<label class="label-default" style="color:white; padding:3px 5px;">laki Laki</label>';

                           		   	 }else{
                              				 echo '<label class="label-default" style="color:white; padding:3px 5px;">Perempuan </label>';

                            } ?>
                            	
                            </td>
									</tr>
									<tr>
										<td width="100px">Alamat</td>
										<td> : <?php echo $alamat; ?></td>
									</tr>
									<tr>
										<td width="100px">status </td>
										<td> : 							
											<?php 
                          	if ($status == 1) {
                          		echo '<label class="label-success" style="color:white; padding:3px 5px;">Aktif</label>';

                          	}else{
                          		echo '<label class="label-danger" style="color:white; padding:3px 5px;">Tidak Aktif</label>';

                          	}
	                        ?></td>
									</tr>
									<tr>
										<td width="100px">created </td>
										<td> : <?php echo $created; ?></td>
									</tr>


								<tr>
										<td width="100px">Last Login</td>
										<td> : <?php echo nl2br($last_login); ?></td>
									</tr>

								</table>
<!-- 								<a href="#myModal" class="btn btn-danger" data-toggle="modal" >Delete</a>
 -->								<a href="<?php echo base_url(); ?>user/update_user/<?php echo $id_user; ?>" class="btn btn-warning" >Edit</a>
								<a href="#" class="btn btn-default" onclick="window.history.go(-1)" >Kembali</a>


							</div>
							<div class="col-md-6 col-sm-6">
								
                   <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>No.</th>
                          <th>Nama Mobil</th>
                          <th>Nama Lengkap</th>
                          <th>NIK</th>


                        </tr>
                      </thead>
                      <tbody>
<?php if(!empty($data->result())){  ?>

         <?php 
                    $no = 1;
                    foreach ($data->result() as $key) : ?>
                        <tr>
                          <td><?php echo $key->id_transaksi; ?></td>
                          <td><?php echo $key->nama_mobil; ?></td>
                          <td><?php echo $key->tgl_order; ?></td>
                          <td>                          
                            <?php 

                      if($key->status_transaksi == 1){
                          echo '<label class="label-default" style="color:white; padding:3px 5px;">Menunggu Pembayaran </label>';
                        }elseif ($key->status_transaksi == 2) {
                          echo '<label class="label-default" style="color:white; padding:3px 5px;">Menunggu Konfirmasi </label>';
                        }elseif ($key->status_transaksi == 3) {
                          echo '<label class="label-success" style="color:white; padding:3px 5px;">lunas </label>';
                        }elseif ($key->status_transaksi == 4) {
                          echo '<label class="label-primary" style="color:white; padding:3px 5px;">Dalam Proses Peminjaman </label>';
                        }elseif ($key->status_transaksi == 5) {
                          echo '<label class="label-success" style="color:white; padding:3px 5px;">Transaksi selesai </label>';
                        }elseif ($key->status_transaksi == 9) {
                          echo '<label class="label-danger" style="color:white; padding:3px 5px;">Transaksi Batal </label>';
                            }
                            ?>
                            	




                        </tr>




                    <?php endforeach; ?>
<?php }else{
  echo '                    <td colspan="9" class="text-muted" style="text-align:center"><b style="text-align:center">Tidak Ada Data Transaksi </b></td>
  <td></td>
';
}  ?>



                      </tbody>
                    </table>
<!-- Modal HTML -->
<div id="myModal" class="modal fade">
	<div class="modal-dialog modal-confirm">
		<div class="modal-content">
			<div class="modal-header">
				<div class="icon-box">
					<i class="glyphicon glyphicon-remove">	</i>
				</div>				
				<h4 class="modal-title">Apakah kamu yakin ?</h4>	
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<p>Apakah kamu ingin menghapus data ini ? Setelah di hapus data tidak dapat di kembalikan.</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
				<a href="<?php echo base_url(); ?>user/hapus/<?php echo $id_user; ?>" class="btn btn-danger" >Delete</a>
			</div>
		</div>
	</div>
</div>  
<!-- end modal -->


							</div>
					</div>

                  </div>
                </div>
              </div>
            </div>