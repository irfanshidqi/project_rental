                <div class="x_panel">
                  <div class="x_title">
                    <h2>Detail Supir <small>Data Lengkap Dari Supir</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>


                    </ul>
                    <div class="clearfix"></div>

                  </div>
                  <div class="x_content">
                    
					<div class="row">
						
						<div class="col-md-5 col-sm-6">
							<img src=" <?php echo base_url(); ?>assets/upload/<?php echo $foto; ?> " style="width: 100%" alt="supir">

						</div>					
	
							<div class="col-md-6 col-sm-6">
								
								<table class="table table-striped" >
									<tr>
										<td width="100px" >Nama supir</td>
										<td> : <?php echo $nama_supir; ?></td>
									</tr>
									<tr>
										<td width="100px">NIK</td>
										<td> : <?php echo $nik; ?></td>
									</tr>
									<tr>
										<td width="100px">NO KTP</td>
										<td> : <?php echo $no_ktp; ?></td>
									</tr>
									<tr>
										<td width="100px">NO HP</td>
										<td> : <?php echo $no_hp; ?></td>
									</tr>

									<tr>
										<td width="100px">jenis_kelamin</td>
										<td> : 							
											<?php 
                          	if ($jenis_kelamin == 1) {
                          		echo '<label class="label-danger" style="color:white; padding:3px 5px;">Laki Laki</label>';

                          	}else{
                          		echo '<label class="label-danger" style="color:white; padding:3px 5px;">Perempuan</label>';

                          	}
	                        ?></td>
									<tr>
										<td width="100px">Alamat </td>
										<td> :<?php echo nl2br($alamat); ?></td>
									</tr>
									<tr>
										<td width="100px">Tanggal lahir</td>
										<td> : <?php echo $tgl_lahir; ?></td>
									</tr>
									</tr>

									</tr>
									<tr>
										<td width="100px">Umur</td>
										<td> : <?php echo $umur; ?> Thn</td>
									</tr>
									<tr>

									</tr>
								</table>
<!-- 								<a href="#myModal" class="btn btn-danger" data-toggle="modal" >Delete</a>
 -->								<a href="<?php echo base_url(); ?>supir/update_supir/<?php echo $id_supir; ?>" class="btn btn-warning" >Edit</a>
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
				<a href="<?php echo base_url(); ?>supir/hapus/<?php echo $id_supir; ?>" class="btn btn-danger" >Delete</a>
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