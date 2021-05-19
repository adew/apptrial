  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Jabatan
        <!-- <small>Human Resource Management System</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Jabatan</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-12 connectedSortable">

          <!-- TO DO List -->
          <div class="box box-warning">
            <div class="box-header">
              <i class="ion ion-clipboard"></i>
              <h3 class="box-title">Input Data Jabatan</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
              <div class="form-panel">
                <form class="form-horizontal style-form" action="<?= base_url('cuti/saveinputjabatan') ?>" method="post" enctype="multipart/form-data" name="form1" id="form1">


                  <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Jabatan</label>
                    <div class="col-sm-8">
                      <?php echo form_error('jabatan', '<p class="callout callout-warning" style=" role="alert">', '</p>'); ?>
                      <input name="jabatan" type="text" value="<?php echo set_value('jabatan'); ?>" id="jabatan" class="form-control" placeholder="Jabatan" autocomplete="off" />
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Deskripsi</label>
                    <div class="col-sm-8">
                      <?php echo form_error('deskripsi', '<p class="callout callout-warning" style=" role="alert">', '</p>'); ?>
                      <input name="deskripsi" type="text" value="<?php echo set_value('deskripsi'); ?>" id="deskripsi" class="form-control" placeholder="Deskripsi" autocomplete="off" />
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label"></label>
                    <div class="col-sm-10">
                      <input type="submit" name="simpan" value="Simpan" class="btn btn-sm btn-primary" />&nbsp;
                      <a href="<?= base_url('cuti/jabatan') ?>" class="btn btn-sm btn-danger">Batal </a>
                    </div>
                  </div>
                  <?php if (isset($token_generate)) { ?>
                    <input type="hidden" name="token" class="form-control" value="<?= $token_generate ?>">
                  <?php } else {
                    redirect(base_url('cuti/inputjabatan'));
                  } ?>
                </form>
              </div>
            </div><!-- /.box-body -->
          </div><!-- /.box -->

        </section><!-- /.Left col -->
      </div><!-- /.row (main row) -->

    </section><!-- /.content -->
  </div><!-- /.content-wrapper -->