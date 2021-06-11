<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      User Profile
    </h1>
    <!-- <ol class="breadcrumb">
      <li><a href="<?= base_url('admin') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="<?= base_url('admin/profile') ?>" class="active">Profile</a></li>
    </ol> -->
  </section>

  <!-- Main content -->
  <section class="content">

    <div class="row">
      <div class="col-md-3">

        <!-- Profile Image -->
        <div class="box box-warning">
          <div class="box-body box-profile">

            <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url('uploads/profile/' . $avatar) ?>" alt="User profile picture">

            <h3 class="profile-username text-center"><?= $this->session->userdata('nama') ?></h3>

            <p class="text-muted text-center"><?= $this->session->userdata('jabatan') ?></p><br>

          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->

        <!-- About Me Box -->

        <!-- /.box -->
      </div>
      <!-- /.col -->
      <div class="col-md-9">
        <div class="nav-tabs-custom">
          <ul class="nav nav-tabs">
            <li class="active"><a href="#settings" data-toggle="tab">Ubah Password</a></li>
            <li><a href="#picture" data-toggle="tab">Ubah Foto</a></li>
          </ul>
          <div class="tab-content">

            <!-- /.tab-pane -->

            <!-- /.tab-pane -->

            <div class="tab-pane" id="picture">
              <form class="form-horizontal" action="<?= base_url('admin/proses_gambar_upload') ?>" method="post" enctype="multipart/form-data">

                <div class="form-group">
                  <label for="username" class="col-sm-2 control-label">Upload Foto</label>

                  <div class="col-sm-6">
                    <input type="file" name="userpicture" class="form-control" id="userpicture">
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-6">
                    <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                  </div>
                </div>
              </form>
            </div>

            <div class="tab-pane active" id="settings">
              <form class="form-horizontal" action="<?= base_url('admin/proses_new_password') ?>" method="post">
                <div class="form-group">
                  <label for="nip" class="col-sm-2 control-label">NIP</label>
                  <div class="col-sm-6">
                    <input type="text" name="nip" class="form-control" id="nip" readonly value="<?= $this->session->userdata('nip') ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="nama" class="col-sm-2 control-label">Nama Lengkap</label>

                  <div class="col-sm-6">
                    <input type="nama" name="nama" class="form-control" id="nama" value="<?= $this->session->userdata('nama') ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="new_password" class="col-sm-2 control-label">Password Baru</label>

                  <div class="col-sm-6">
                    <input type="password" name="new_password" class="form-control" id="new_password" placeholder="New Password" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="confirm_new_password" class="col-sm-2 control-label">Konrirmasi Password Baru</label>

                  <div class="col-sm-6">
                    <input type="password" name="confirm_new_password" class="form-control" id="confirm_new_password" placeholder="Confirm New Password" required>
                  </div>
                </div>
                <?php if (isset($token_generate)) { ?>
                  <input type="hidden" name="token" class="form-control" value="<?= $token_generate ?>">
                <?php } else {
                  redirect(base_url('admin/profile'));
                } ?>

                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-6">
                    <button type="submit" class="btn btn-sm btn-primary">Simpan </button>
                  </div>
                </div>
              </form>
            </div>
            <!-- /.tab-pane -->
          </div>
          <!-- /.tab-content -->
        </div>
        <!-- /.nav-tabs-custom -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->