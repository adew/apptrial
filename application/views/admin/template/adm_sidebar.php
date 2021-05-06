<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">

        <img src="<?php echo base_url('uploads/profile/' . $avatar) ?>" class="img-circle" alt="User Image">

      </div>
      <div class="pull-left info">
        <p><?= $this->session->userdata('nama') ?></p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- search form -->

    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MENU PKP</li>

      <li class="active">
        <a href="<?php echo base_url('admin') ?>">
          <i class="fa fa-desktop"></i> <span>Monitoring Kinerja Pegawai</span>
          <span class="pull-right-container">
            <!-- <i class="fa fa-angle-left pull-right"></i> -->
          </span>
        </a>
      </li>
      <li>
        <a href="<?php echo base_url('admin/datapkp') ?>">
          <i class="fa fa-database" aria-hidden="true"></i> <span>Data PKP</span></a>
      </li>
      <li class="header">MENU CUTI</li>
      <li>
        <a href="<?php echo base_url('cuti') ?>">
          <i class="fa fa-desktop" aria-hidden="true"></i> <span>Monitoring Cuti</span></a>
      </li>
      <li>
        <a href="<?php echo base_url('cuti/datacuti') ?>">
          <i class="fa fa-database" aria-hidden="true"></i> <span>Data Cuti</span></a>
      </li>
      <li>
        <a href="<?php echo base_url('cuti/inputdatacuti') ?>">
          <i class="fa fa-calendar-minus-o" aria-hidden="true"></i> <span>Pengajuan Cuti</span></a>
      </li>
      <li>
        <a href="<?php echo base_url('cuti/variabelcuti') ?>">
          <i class="fa fa-circle-o-notch" aria-hidden="true"></i> <span>Jenis Cuti</span></a>
      </li>
      <li class="header">MANAJEMEN USER</li>
      <li>
        <a href="<?php echo base_url('admin/profile') ?>">
          <i class="fa fa-cogs" aria-hidden="true"></i> <span>Profile</span></a>
      </li>
      <li>
        <a href="<?php echo base_url('admin/users') ?>">
          <i class="fa fa-fw fa-users" aria-hidden="true"></i> <span>Pegawai</span></a>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>