<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Tambah User
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Forms</a></li>
      <li class="active">Tambah User</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <!-- left column -->
      <div class="col-md-12">
        <div class="container">
          <!-- general form elements -->
          <div class="box box-primary" style="width:94%;">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-fw fa-user" aria-hidden="true"></i> Tambah Users Data</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div class="container">
              <form action="<?= base_url('admin/proses_tambah_user') ?>" role="form" method="post">

                <!-- <?php if ($this->session->flashdata('msg_berhasil')) { ?>
                  <div class="alert alert-success alert-dismissible" style="width:91%">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Success!</strong><br> <?php echo $this->session->flashdata('msg_berhasil'); ?>
                  </div>
                <?php } ?> -->

                <div class="box-body">
                  <!-- <div class="form-group" style="display:block;">
                    <label for="username" style="width:87%;margin-left: 0px;">Username</label>
                    <?php echo form_error('username', '<p class="callout callout-warning" style=" width: 50%" role="alert">', '</p>'); ?>
                    <input type="text" name="username" value="<?php echo set_value('username'); ?>" style=" width: 50%;margin-right: 67px;margin-left: 0px;" class="form-control" id="username" placeholder="Username">
                  </div> -->
                  <div class="form-group" style="display:block;">
                    <label for="nip" style="width:87%;margin-left: 0px;">NIP</label>
                    <?php echo form_error('nip', '<p class="callout callout-warning" style=" width: 50%" role="alert">', '</p>'); ?>
                    <input type="text" name="nip" value="<?php echo set_value('nip'); ?>" style="width: 50%;margin-right: 67px;margin-left: 0px;" class="form-control" id="nip" placeholder="NIP">
                  </div>
                  <div class="form-group" style="display:block;">
                    <label for="nama" style="width:87%;margin-left: 0px;">Nama Lengkap</label>
                    <?php echo form_error('nama', '<p class="callout callout-warning" style=" width: 50%" role="alert">', '</p>'); ?>
                    <input type="text" name="nama" value="<?php echo set_value('nama'); ?>" style="width: 50%;margin-right: 67px;margin-left: 0px;" class="form-control" id="nama" placeholder="Nama Lengkap">
                  </div>
                  <div class="form-group" style="display:block;">
                    <label for="jabatan" style="width:87%;margin-left: 0px;">Jabatan</label>
                    <?php echo form_error('jabatan', '<p class="callout callout-warning" style=" width: 50%" role="alert">', '</p>'); ?>
                    <input type="text" name="jabatan" value="<?php echo set_value('jabatan'); ?>" style="width: 50%;margin-right: 67px;margin-left: 0px;" class="form-control" id="jabatan" placeholder="Jabatan">
                  </div>
                  <div class="form-group" style="display:block;">
                    <label for="unit_kerja" style="width:87%;margin-left: 0px;">Unit Kerja</label>
                    <?php echo form_error('jabatan', '<p class="callout callout-warning" style=" width: 50%" role="alert">', '</p>'); ?>
                    <textarea rows="3" name="unit_kerja" value="<?php echo set_value('unit_kerja'); ?>" style="width: 50%;margin-right: 67px;margin-left: 0px;" class="form-control" id="unit_kerja" placeholder="Unit Kerja"></textarea>
                  </div>
                  <!-- <div class="form-group" style="display:block;">
                    <label for="email" style="width:73%;">Email</label>
                    <?php echo form_error('email', '<p class="callout callout-warning" style=" width: 50%" role="alert">', '</p>'); ?>
                    <input type="text" name="email" value="<?php echo set_value('email'); ?>" style="width:50%;margin-right: 67px;" class="form-control" id="email" placeholder="Email">
                  </div> -->
                  <div class="form-group" style="display:block;">
                    <label for="password" style="width:73%;">Password default</label>
                    <?php echo form_error('password', '<p class="callout callout-warning" style=" width: 50%" role="alert">', '</p>'); ?>
                    <input type="text" name="password" value="12345" style="width:50%;margin-right: 67px;" class="form-control" id="password" placeholder="Password" readonly>
                  </div>
                  <!-- <div class="form-group" style="display:block;">
                    <label for="confirm_password" style="width:73%;">Confirm Password</label>
                    <input type="password" name="confirm_password" style="width:50%;margin-right: 67px;" class="form-control" id="confirm_password" placeholder="Confirm Password">
                  </div> -->
                  <div class="form-group" style="display:block;">
                    <label for="role" style="width:73%;">Role</label>
                    <select class="form-control" name="role" style="width:11%;margin-right: 18px;">
                      <option value="0" selected="">User Biasa</option>
                      <option value="1">User Admin</option>
                    </select>
                  </div>
                  <!-- /.box-body -->

                  <div class="box-footer" style="width:50%;">
                    <a type="button" class="btn btn-default" onclick="history.back(-1)" name="btn_kembali"><i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali</a>
                    <!-- <a type="button" class="btn btn-info" style="width:13%;margin-right:29%" href="<?= base_url('admin/users') ?>" name="btn_listusers"><i class="fa fa-table" aria-hidden="true"></i> Lihat Users</a> -->
                    <button type="submit" style="width:20%" class="btn btn-primary pull-right"><i class="fa fa-check" aria-hidden="true"></i> Simpan</button>
                  </div>
              </form>
            </div>
          </div>
          <!-- /.box -->

          <!-- Form Element sizes -->

          <!-- /.box -->


          <!-- /.box -->

          <!-- Input addon -->

          <!-- /.box -->

        </div>
        <!--/.col (left) -->
        <!-- right column -->
        <!-- <div class="col-md-6">
          <!-- Horizontal Form -->

        <!-- /.box -->
        <!-- general form elements disabled -->

        <!-- /.box -->

      </div>
    </div>
    <!--/.col (right) -->
</div>
<!-- /.row -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->