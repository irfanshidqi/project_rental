        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="<?= base_url() ?>admin" class="site_title"><i class="fa fa-automobile"></i> <span>RENTAL MOBIL</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->

            <!-- /menu profile quick info -->
            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">

                  <li><a><i class="fa fa-car"></i> Mobil <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?= base_url(); ?>mobil/tambah_mobil">Tambah Mobil</a></li>
                      <li><a href="<?php echo base_url() ?>mobil/index">Data Mobil</a></li>
                      <li><a href="<?php echo base_url() ?>supir">Data Supir</a></li>


                    </ul>
                  </li>
                  <li><a><i class="fa fa-user"></i> User <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url().'user' ?>">Data User</a></li>
<!--                       <li><a href="#">Hak Akses</a></li>
                      <li><a href="#">List User</a></li> -->

                    </ul>
                  </li>
                  <?php if ($this->session->userdata('level') == 1): ?>
                    <li><a><i class="fa fa-key"></i> Hak Akses <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url().'Bank' ?>">Hak Akses Admin</a></li>
<!--                       <li><a href="#">Hak Akses</a></li>
                      <li><a href="#">List User</a></li> -->

                    </ul>
                  </li>    
                    <li><a><i class="fa fa-bank"></i> Bank <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url().'Bank' ?>">Data Rekening Bank</a></li>
<!--                       <li><a href="#">Hak Akses</a></li>
                      <li><a href="#">List User</a></li> -->

                    </ul>
                  </li>                  
                  <?php endif ?>

                  <li><a><i class="fa fa-shopping-cart"></i> Pesanan Mobil <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url().'transaksi/tambah_transaksi' ?>">Tambah Transaksi</a></li>
                      <li><a href="<?php echo base_url().'transaksi' ?>">Data Semua Transaksi</a></li>
                      <li><a href="<?php echo base_url().'transaksi/tr_pending' ?>">Transaksi Pending</a></li>
                      <li><a href="<?php echo base_url().'transaksi/tr_wait' ?>">Menunggu Konfirmasi</a></li>
                      <li><a href="<?php echo base_url().'transaksi/tr_lunas' ?>">Pembayaran Lunas</a></li>
                      <li><a href="<?php echo base_url().'transaksi/tr_berlangsung' ?>">Peminjaman Berlangsung</a></li>
                      <li><a href="<?php echo base_url().'laporan/tr_selesai' ?>">Transaksi Selesai</a></li>



<!--                       <li><a href="#">Transaksi Selesei</a></li>
 -->
                    </ul>
                  </li>
                  <li><a><i class="fa fa-book"></i> Laporan <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url().'laporan' ?>">Laporan Bulanan Transaksi</a></li>


                    </ul>
                  </li>


                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a a href="<?php echo base_url().'admin/edit_admin' ?>"data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a href="<?php echo base_url('login/logout'); ?>" data-toggle="tooltip" data-placement="top" title="Logout">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav class="" role="navigation">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-user"></i> <?php echo $this->session->userdata("nama"); ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="<?php echo base_url().'admin/edit_admin' ?>"> Profile</a></li>
                    <li>

                    </li>
                    <li><a href="<?php echo base_url('login/logout'); ?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>

                <li role="presentation" class="dropdown">
       <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="label label-pill label-danger count" style="border-radius:10px;"></span> <span class="glyphicon glyphicon-bell" style="font-size:18px;"></span></a>
       <ul class="dropdown-menu"></ul>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
<!--                     <li>
                      <a>
                        <span class="image"><img src="" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li> -->



                    <li>
                      <div class="text-center">
                        <a>
                          <strong>Lihat Semua Transaksi Baru</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->