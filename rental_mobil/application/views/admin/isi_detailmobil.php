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
							<img src=" <?php echo base_url(); ?>assets/upload/<?php echo $gambar; ?> " style="width: 100%" alt="mobil">

						</div>					
	
							<div class="col-md-6 col-sm-6">
								
								<table class="table table-striped" >
									<tr>
										<td width="100px" >Nama Mobil</td>
										<td> : <?php echo $nama_mobil; ?></td>
									</tr>
									<tr>
										<td width="100px">Merk</td>
										<td> : <?php echo $nama_merek; ?></td>
									</tr>
									<tr>
										<td width="100px">Kapasitas</td>
										<td> : <?php echo $kapasitas_mobil; ?> Orang</td>
									</tr>
									<tr>
										<td width="100px">Warna Mobil</td>
										<td> : <?php echo $warna_mobil; ?></td>
									</tr>
									<tr>
										<td width="100px">Tahun Mobil</td>
										<td> : <?php echo $tahun_mobil; ?></td>
									</tr>
									<tr>
										<td width="100px">Harga Sewa</td>
										<td> : Rp.<?php echo number_format ($harga_sewa); ?></td>
									</tr>
									<tr>
										<td width="100px">Plat Mobil</td>
										<td> : <?php echo $plat_mobil; ?></td>
									</tr>
									<tr>
										<td width="100px">Transmisi</td>
										<td> : 							
											<?php 
                          	if ($status_sewa == 1) {
                          		echo '<label class="label-danger" style="color:white; padding:3px 5px;">Manual</label>';

                          	}else{
                          		echo '<label class="label-danger" style="color:white; padding:3px 5px;">Matic</label>';

                          	}
	                        ?></td>
									</tr>
									<tr>
										<td width="100px">Status Mobil</td>
										<td> : <?php echo $status_mobil; ?></td>
									</tr>
									<tr>
										<td width="100px">Status Sewa</td>
										<td> :                           	
							<?php 
                          	if ($status_sewa == 1) {
                          		echo '<label class="label-success" style="color:white; padding:3px 5px;">Tersedia</label>';

                          	}else{
                          		echo '<label class="label-danger" style="color:white; padding:3px 5px;">Di Sewa</label>';

                          	}
	                        ?>
	                          	
	                          </td>
									</tr>
									<tr>
										<td width="100px">Deskripsi</td>
										<td> : <?php echo nl2br($deskripsi_mobil); ?></td>
									</tr>
									<tr>
										<td width="100px">Fasilitas</td>
										<td> : 							
											<?php 
                          	if ($status_sewa == 1) {
                          		echo '<label class="label-warning" style="color:white; padding:3px 5px;">Bensin</label>';

                          	}else{
                          		echo '<label class="label-warning" style="color:white; padding:3px 5px;">Sopir</label>';

                          	}
	                        ?></td>
									</tr>
								</table>
								<a href="#myModal" class="btn btn-danger" data-toggle="modal" >Delete</a>
								<a href="<?php echo base_url(); ?>mobil/update_mobil/<?php echo $id_mobil; ?>" class="btn btn-warning" >Edit</a>
								<a href="#" class="btn btn-default" onclick="window.history.go(-1)" >Kembali</a>

<!-- Modal HTML -->
<div id="myModal" class="modal fade">
	<div class="modal-dialog modal-confirm">
		<div class="modal-content">
			<div class="modal-header">
				<div class="icon-box">
					<i class="glyphicon glyphicon-ban-circle">	</i>
				</div>				
				<h4 class="modal-title">Apakah kamu yakin ?</h4>	
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<p>Apakah kamu ingin menghapus data ini ? Setelah di hapus data tidak dapat di kembalikan.</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
				<a href="<?php echo base_url(); ?>mobil/hapus/<?php echo $id_mobil; ?>" class="btn btn-danger" >Delete</a>
			</div>
		</div>
	</div>
</div>  


							</div>
					</div>

                  </div>
                </div>
              </div>
            </div>