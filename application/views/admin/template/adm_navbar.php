<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <header class="main-header">
      <!-- Logo -->
      <li href="<?= base_url('admin') ?>" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>S</b>AP</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg" style="font-family :Courier New, Courier, monospace; font-size:55px;"><b>SIMPEL</b></span>


      </li>

      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="col-sm-9 text-center" style="color:white; font-family :Courier New, Courier, monospace; font-size:33px; line-height:1; padding-top:12px; margin-left: 60px;"><b>
            <marquee behavior="" direction="">Sistem Informasi Manajemen Pegawai Elektronik </marquee>
          </b></div>
        <!-- <p class="text-center">Center aligned text.</p> -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">

            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu" style="display: inline-flex;">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                <img src="<?php echo base_url('uploads/profile/' . $avatar) ?>" class="user-image" alt="User Image">

                <!-- <span class="hidden-xs"><?= $this->session->userdata('nama') ?></span> -->
              </a>

              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">

                  <img src="<?php echo base_url('uploads/profile/' . $avatar) ?>" class="img-circle" alt="User Image">


                  <p>
                    <?= $this->session->userdata('nama') ?>
                    <small>Terakhir Login : <?= $this->session->userdata('last_login') ?></small>
                  </p>
                </li>

                <!-- Menu Body -->
                <!-- <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
                <!-- /.row -->

                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="<?= base_url('admin/profile') ?>" class="btn btn-default btn-flat"><i class="fa fa-cogs" aria-hidden="true"></i> Profile</a>
                  </div>
                  <div class="pull-right">
                    <a href="<?= base_url('admin/sigout'); ?>" class="btn btn-default btn-flat"><i class="fa fa-sign-out" aria-hidden="true"></i> Keluar</a>
                  </div>
                </li>
              </ul>
            </li>
            <!-- Control Sidebar Toggle Button -->
          </ul>
        </div>
      </nav>
    </header>