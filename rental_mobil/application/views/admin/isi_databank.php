        <!-- page content -->
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Data Rekening Bank</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">

                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_content">
                    <div class="row">
                      <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                        <ul class="pagination pagination-split">
                          <li><a href="#ModalTambahBank" data-toggle="modal" ><i class="fa fa-plus"></i>Tambah Rekening Bank	</a></li>

                        </ul>
                      </div>

                      <div class="clearfix"></div>
<?php foreach ($data->result() as $key ): ?>
  
                      <div class="col-md-4 col-sm-4 col-xs-12 profile_details">
                        <div class="well profile_view">
                          <div class="col-sm-12">
                            <h4 class="brief"><i>BANK <?php echo $key->nama_bank; ?></i></h4>
                            <div class="left col-xs-7">
                              <h2><?php echo $key->nama_pemilik; ?></h2>
                              <p><strong>Di buat: </strong> <?php echo $key->created; ?> </p>

                            </div>
                            <div class="right col-xs-5 text-center">
   
                            </div>
                          </div>
                          <div class="col-xs-12 bottom text-center">
                            <div class="col-xs-12 col-sm-6 emphasis">
                              <p class="ratings">
                                <a>No.Rek:</a>
                                <a><?php echo $key->no_rekening; ?></a>


                              </p>
                            </div>
    <!--                         <div class="col-xs-12 col-sm-6 emphasis">
                              <button type="button" class="btn btn-success btn-xs"> <i class="fa fa-user">
                                </i> <i class="fa fa-comments-o"></i> </button>
                              <button type="button" class="btn btn-primary btn-xs">
                                <i class="fa fa-user"> </i> View Profile
                              </button>
                            </div> -->
                          </div>
                        </div>
                      </div>
<?php endforeach ?>

    <!-- Upload modal -->
    <div id="ModalTambahBank" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">

          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">Tambah Rekening Bank <?php echo  $id = $this->uri->segment(3);           
 ?></h4>
          </div>
          <div class="modal-body">
            <div id="testmodal" style="padding: 5px 20px;">
              <form id="antoform" method="post" action="<?php echo base_url().'Bank/tambah_bank/'?>" class="form-horizontal calender" enctype='multipart/form-data'>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Nama Panjang</label>
                  <div class="col-sm-9">
                    <input type="text"  class="form-control" id="nama_pemilik" name="nama_pemilik">
                  </div>

                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Bank</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="nama_bank" name="nama_bank">
                  </div>

                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">No Rekening</label>
                  <div class="col-sm-9">
                    <input type="number" onkeydown="return event.keyCode !== 69" class="form-control" id="no_rekening" name="no_rekening">
                  </div>

                </div>


          <div class="modal-footer">
            <button type="button" class="btn btn-default antoclose" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" name="submit" value="Submit">Submit</button>
          </div>
              </form>
            </div>
          </div>

        </div>
      </div>
    </div>


    <div id="fc_create" data-toggle="modal" data-target="#ModalUploadBukti"></div>
    <!-- /Upload modal -->

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
        <!-- /page content -->