<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Tambah Pegawai
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Tambah Pegawai</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <!-- left column -->
      <div class="col-md-12">

        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-fw fa-user" aria-hidden="true"></i> Tambah Data Pegawai</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->


          <!-- <?php if ($this->session->flashdata('msg_berhasil')) { ?>
                  <div class="alert alert-success alert-dismissible" style="width:91%">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Success!</strong><br> <?php echo $this->session->flashdata('msg_berhasil'); ?>
                  </div>
                <?php } ?> -->

          <div class="box-body">
            <div class="form-panel">
              <form class="form-horizontal style-form" action="<?= base_url('admin/proses_tambah_user') ?>" role="form" method="post">
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">NIP</label>
                  <div class="col-sm-5">
                    <?php echo form_error('nip', '<p class="callout callout-warning" style=" width: 50%" role="alert">', '</p>'); ?>
                    <input type="text" name="nip" value="<?php echo set_value('nip'); ?>" class="form-control" id="nip" placeholder="NIP">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Nama Lengkap</label>
                  <div class="col-sm-5">
                    <?php echo form_error('nama', '<p class="callout callout-warning" style=" width: 50%" role="alert">', '</p>'); ?>
                    <input type="text" name="nama" value="<?php echo set_value('nama'); ?>" class="form-control" id="nama" placeholder="Nama Lengkap">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Jabatan</label>
                  <div class="col-sm-5">
                    <?php echo form_error('jabatan', '<p class="callout callout-warning" style=" width: 50%" role="alert">', '</p>'); ?>
                    <input type="text" name="jabatan" value="<?php echo set_value('jabatan'); ?>" class="form-control" id="jabatan" placeholder="Jabatan">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Unit Kerja</label>
                  <div class="col-sm-5">
                    <?php echo form_error('jabatan', '<p class="callout callout-warning" style=" width: 50%" role="alert">', '</p>'); ?>
                    <textarea rows="3" name="unit_kerja" value="<?php echo set_value('unit_kerja'); ?>" class="form-control" id="unit_kerja" placeholder="Unit Kerja"></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Password default</label>
                  <div class="col-sm-5">
                    <?php echo form_error('password', '<p class="callout callout-warning" style=" width: 50%" role="alert">', '</p>'); ?>
                    <input type="text" name="password" value="12345" class="form-control" id="password" placeholder="Password" readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Role</label>
                  <div class="col-sm-2">
                    <select class="form-control" name="role">
                      <option value="0" selected="">User Biasa</option>
                      <option value="1">User Admin</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label"></label>
                  <div class="col-sm-10">
                    <a type="button" onclick="history.back(-1)" class="btn btn-sm btn-danger">Kembali </a>
                    <input type="submit" name="simpan" value="Simpan" class="btn btn-sm btn-primary" />&nbsp;
                  </div>
                </div>
              </form>
            </div>
          </div>
          <!-- /.box-body -->
        </div>

      </div>
    </div>
    <!--/.col (right) -->
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->