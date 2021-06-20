  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        PKP
        <!-- <small>Human Resource Management System</small> -->
      </h1>
      <!-- <ol class="breadcrumb">
        <li><a href="<?= base_url('admin') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">PKP</li>
      </ol> -->
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
              <h3 class="box-title">Input Data PKP</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
              <div class="form-panel">
                <form class="form-horizontal style-form" action="<?= base_url('pkp/savedatapkp') ?>" method="post" enctype="multipart/form-data" name="form3" id="form3">
                  <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">NIP/NRP</label>
                    <div class="col-sm-4">
                      <?php echo form_error('nip', '<p class="callout callout-warning" style=" role="alert">', '</p>'); ?>
                      <input name="nip" type="text" value="<?= $nip ?>" id="nip" class="form-control" placeholder="NIP/NRP" autocomplete="off" readonly />
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Bulan</label>
                    <div class="col-sm-3">
                      <?php echo form_error('bulan', '<p class="callout callout-warning" style=" role="alert">', '</p>'); ?>
                      <select name="bulan" id="bulan" class="form-control select2">
                        <option value=""> Pilih Bulan </option>
                        <?php foreach ($bulan as $list => $value) : ?>
                          <option value="<?= $list ?>"> <?= $value; ?> </option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">File PKP (.xlsx)</label>
                    <div class="col-sm-4">
                      <?php echo form_error('file_pkp', '<p class="callout callout-warning" style=" role="alert">', '</p>'); ?>
                      <input name="file_pkp" type="file" value="" id="file_pkp" class="form-control " placeholder="File Pkp" autocomplete="off" />
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Skor</label>
                    <div class="col-sm-4">
                      <?php echo form_error('skor', '<p class="callout callout-warning" style=" role="alert">', '</p>'); ?>
                      <input name="skor" type="text" value="" id="skor" class="form-control" placeholder="Skor" autocomplete="off" />
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label"></label>
                    <div class="col-sm-8">
                      <a href="<?= base_url('pkp/datapkp') ?>" class="btn btn-sm btn-danger">Batal </a>
                      <input type="submit" name="simpan" value="Simpan" class="btn btn-sm btn-primary" />&nbsp;
                    </div>
                  </div>
                </form>
              </div><!-- /.box-body -->
            </div><!-- /.box -->

        </section><!-- /.Left col -->
      </div><!-- /.row (main row) -->

    </section><!-- /.content -->
  </div><!-- /.content-wrapper -->