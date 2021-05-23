<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Data Pegawai
    </h1>
    <!-- <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Edit Data Pegawai</li>
    </ol> -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <!-- left column -->
      <div class="col-md-12">

        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-fw fa-user" aria-hidden="true"></i> Edit Data Pegawai</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->

          <div class="box-body">
            <div class="form-panel">
              <form class="form-horizontal style-form" action="<?= base_url('admin/proses_update_user') ?>" role="form" method="post">
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">NIP</label>
                  <div class="col-sm-5">
                    <?php echo form_error('nip', '<p class="callout callout-warning" style=" width: 50%" role="alert">', '</p>'); ?>
                    <input type="text" name="nip" value="<?= $list_data[0]->nip; ?>" class="form-control" id="nip" placeholder="NIP" readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Nama Lengkap</label>
                  <div class="col-sm-5">
                    <?php echo form_error('nama', '<p class="callout callout-warning" style=" width: 50%" role="alert">', '</p>'); ?>
                    <input type="text" name="nama" value="<?= $list_data[0]->nama; ?>" class="form-control" id="nama" placeholder="Nama Lengkap">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Jabatan</label>
                  <div class="col-sm-5">
                    <?php echo form_error('jabatan', '<p class="callout callout-warning" style=" width: 50%" role="alert">', '</p>'); ?>
                    <input type="text" name="jabatan" value="<?= $list_data[0]->jabatan; ?>" class="form-control" id="jabatan" placeholder="Jabatan">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Unit Kerja</label>
                  <div class="col-sm-5">
                    <?php echo form_error('unit_kerja', '<p class="callout callout-warning" style=" width: 50%" role="alert">', '</p>'); ?>
                    <textarea class="form-control" rows="3" cols="100" name="unit_kerja" id="unit_kerja" placeholder="Unit Kerja"><?= $list_data[0]->unit_kerja; ?></textarea>
                  </div>
                </div>
                <!-- <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Password default</label>
                  <div class="col-sm-5">
                    <?php echo form_error('password', '<p class="callout callout-warning" style=" width: 50%" role="alert">', '</p>'); ?>
                    <input type="text" name="password" value="12345" class="form-control" id="password" placeholder="Password" readonly>
                  </div>
                </div> -->
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Role</label>
                  <div class="col-sm-2">
                    <select class="form-control" name="role" required>
                      <option value="">-- Pilih --</option>
                      <option value="0">User Biasa</option>
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