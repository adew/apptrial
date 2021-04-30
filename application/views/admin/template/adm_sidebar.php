<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">

        <img src="<?php echo base_url('assets/upload/user/img/' . $avatar) ?>" class="img-circle" alt="User Image">

      </div>
      <div class="pull-left info">
        <p><?= $this->session->userdata('username') ?></p>
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

      <!-- <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Forms</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('admin/form_barangmasuk') ?>"><i class="fa fa-circle-o"></i> Tambah Data Barang Masuk</a></li>
            <li><a href="<?php echo base_url('admin/form_satuan') ?>"><i class="fa fa-circle-o"></i> Tambah Satuan Barang</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>Tables</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?= base_url('admin/tabel_barangmasuk') ?>"><i class="fa fa-circle-o"></i> Tabel Barang Masuk</a></li>
            <li><a href="<?= base_url('admin/tabel_barangkeluar') ?>"><i class="fa fa-circle-o"></i> Tabel Barang Keluar</a></li>
            <li><a href="<?= base_url('admin/tabel_satuan') ?>"><i class="fa fa-circle-o"></i> Tabel Satuan</a></li>
          </ul>

        <li class="header">LABELS</li> -->

      <li class="header">MENU CUTI</li>
      <li>
        <a href="<?php echo base_url('cuti') ?>">
          <i class="fa fa-desktop" aria-hidden="true"></i> <span>Monitoring Cuti</span></a>
      </li>
      <li>
        <a href="<?php echo base_url('cuti/satker') ?>">
          <i class="fa fa-fw fa-building" aria-hidden="true"></i> <span>Satker</span></a>
      </li>
      <li>
        <a href="<?php echo base_url('cuti/jabatan') ?>">
          <i class="fa fa-fw fa-building" aria-hidden="true"></i> <span>Jabatan</span></a>
      </li>
      <li>
        <a href="<?php echo base_url('cuti/variabelcuti') ?>">
          <i class="fa fa-fw fa-dollar" aria-hidden="true"></i> <span>Jenis Cuti</span></a>
      </li>
      <li class="header">Manajemen User</li>
      <li>
        <a href="<?php echo base_url('admin/profile') ?>">
          <i class="fa fa-cogs" aria-hidden="true"></i> <span>Profile</span></a>
      </li>
      <li>
        <a href="<?php echo base_url('admin/users') ?>">
          <i class="fa fa-fw fa-users" aria-hidden="true"></i> <span>Users</span></a>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>