  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Jatah Cuti
        <!-- <small>Human Resource Management System</small> -->
      </h1>
      <!-- <ol class="breadcrumb">
        <li><a href="<?= base_url('admin') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Pengajuan Cuti</li>
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
              <h3 class="box-title">Input Jatah Cuti</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
              <form class="form-horizontal style-form" action="<?= base_url('cuti/savejatahcuti') ?>" method="post" enctype="multipart/form-data" name="form1" id="form1">
                <div class="row">
                  <div class="form-panel">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="col-sm-4 control-label">Nama Pegawai</label>
                        <div class="col-sm-3">
                          <?php echo form_error('nip', '<p style="color:red;">', '</p>'); ?>
                          <select name="nip" id="nip" class="form-control select2">
                            <option value=""> Pilih Pegawai </option>
                            <!-- <option value="kosong">-</option> -->
                            <?php foreach ($data_user as $value) : ?>
                              <option value="<?= $value->nip ?>"> <?= $value->nama; ?> </option>
                            <?php endforeach; ?>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-4 control-label">Tahun</label>
                        <div class="col-sm-3">
                          <?php echo form_error('tahun', '<p style="color:red;">', '</p>'); ?>
                          <select name="tahun" id="tahun" class="form-control select2">
                            <option value="">Pilih Tahun </option>
                            <!-- <option value="kosong">-</option> -->
                            <?php for ($i = date('Y'); $i >= date('Y') - 3; $i--) { ?>
                              <option value="<?= $i ?>"> <?= $i ?> </option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-4 control-label">Cuti Tahunan Terpakai</label>
                        <div class="col-sm-1">
                          <?php echo form_error('cuti_tahunan_pakai', '<p style="color:red;">', '</p>'); ?>
                          <input name="cuti_tahunan_pakai" type="text" class="form-control" value="0" autofocus="on" placeholder="" />
                        </div>
                        <label class="col-sm-1 control-label">Jatah Cuti</label>
                        <div class="col-sm-1">
                          <?php echo form_error('cuti_tahunan_kuota', '<p style="color:red;">', '</p>'); ?>
                          <input name="cuti_tahunan_kuota" type="text" class="form-control" value="12" autofocus="on" placeholder="" />
                        </div>
                        <label class="col-sm-1 control-label">Sisa</label>
                        <div class="col-sm-1">
                          <input name="" type="text" class="form-control" value="0" autofocus="on" placeholder="" />
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-4 control-label">Cuti Besar Terpakai</label>
                        <div class="col-sm-1">
                          <?php echo form_error('cuti_besar_pakai', '<p style="color:red;">', '</p>'); ?>
                          <input name="cuti_besar_pakai" type="text" class="form-control" value="0" autofocus="on" placeholder="" />
                        </div>
                        <label class="col-sm-1 control-label">Jatah Cuti</label>
                        <div class="col-sm-1">
                          <?php echo form_error('cuti_besar_kuota', '<p style="color:red;">', '</p>'); ?>
                          <input name="cuti_besar_kuota" type="text" class="form-control" value="90" autofocus="on" placeholder="" />
                        </div>
                        <label class="col-sm-1 control-label">Sisa</label>
                        <div class="col-sm-1">
                          <input name="" type="text" class="form-control" value="0" autofocus="on" placeholder="" />
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-4 control-label">Cuti Sakit Terpakai</label>
                        <div class="col-sm-1">
                          <?php echo form_error('cuti_sakit_pakai', '<p style="color:red;">', '</p>'); ?>
                          <input name="cuti_sakit_pakai" type="text" class="form-control" value="0" autofocus="on" placeholder="" />
                        </div>
                        <label class="col-sm-1 control-label">Jatah Cuti</label>
                        <div class="col-sm-1">
                          <?php echo form_error('cuti_sakit_kuota', '<p style="color:red;">', '</p>'); ?>
                          <input name="cuti_sakit_kuota" type="text" class="form-control" value="14" autofocus="on" placeholder="" />
                        </div>
                        <label class="col-sm-1 control-label">Sisa</label>
                        <div class="col-sm-1">
                          <input name="" type="text" class="form-control" value="0" autofocus="on" placeholder="" />
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-4 control-label">Cuti Lahiran Terpakai</label>
                        <div class="col-sm-1">
                          <?php echo form_error('cuti_lahir_pakai', '<p style="color:red;">', '</p>'); ?>
                          <input name="cuti_lahir_pakai" type="text" class="form-control" value="0" autofocus="on" placeholder="" />
                        </div>
                        <label class="col-sm-1 control-label">Jatah Cuti</label>
                        <div class="col-sm-1">
                          <?php echo form_error('cuti_lahir_kuota', '<p style="color:red;">', '</p>'); ?>
                          <input name="cuti_lahir_kuota" type="text" class="form-control" value="90" autofocus="on" placeholder="" />
                        </div>
                        <label class="col-sm-1 control-label">Sisa</label>
                        <div class="col-sm-1">
                          <input name="" type="text" class="form-control" value="0" autofocus="on" placeholder="" />
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-4 control-label">Cuti Alasan Penting Terpakai</label>
                        <div class="col-sm-1">
                          <?php echo form_error('cuti_alpen_pakai', '<p style="color:red;">', '</p>'); ?>
                          <input name="cuti_alpen_pakai" type="text" class="form-control" value="0" autofocus="on" placeholder="" />
                        </div>
                        <label class="col-sm-1 control-label">Jatah Cuti</label>
                        <div class="col-sm-1">
                          <?php echo form_error('cuti_alpen_kuota', '<p style="color:red;">', '</p>'); ?>
                          <input name="cuti_alpen_kuota" type="text" class="form-control" value="30" autofocus="on" placeholder="" />
                        </div>
                        <label class="col-sm-1 control-label">Sisa</label>
                        <div class="col-sm-1">
                          <input name="" type="text" class="form-control" value="0" autofocus="on" placeholder="" />
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-4 control-label">Cuti Diluar Tanggungan Negara Terpakai</label>
                        <div class="col-sm-1">
                          <?php echo form_error('cuti_dtn_pakai', '<p style="color:red;">', '</p>'); ?>
                          <input name="cuti_dtn_pakai" type="text" class="form-control" value="0" autofocus="on" placeholder="" />
                        </div>
                        <label class="col-sm-1 control-label">Jatah Cuti</label>
                        <div class="col-sm-1">
                          <?php echo form_error('cuti_dtn_kuota', '<p style="color:red;">', '</p>'); ?>
                          <input name="cuti_dtn_kuota" type="text" class="form-control" value="60" autofocus="on" placeholder="" />
                        </div>
                        <label class="col-sm-1 control-label">Sisa</label>
                        <div class="col-sm-1">
                          <input name="" type="text" class="form-control" value="0" autofocus="on" placeholder="" />
                        </div>
                      </div>
                      <div class="row">
                        <div class="d-flex justify-content-center">
                          <div class="col-sm-5"></div>
                          <div class="col-sm-2">
                            <a type="button" onclick="history.back(-1)" class="btn btn-sm btn-danger">Batal </a>
                            <input id="submitButton" type="submit" name="simpan" value="Simpan" class="btn btn-sm btn-primary" />&nbsp;
                          </div>
                          <div class="col-sm-5"></div>
                        </div>
                      </div>
              </form>
            </div><!-- /.box-body -->
          </div><!-- /.box -->

        </section><!-- /.Left col -->
      </div><!-- /.row (main row) -->

    </section><!-- /.content -->
  </div><!-- /.content-wrapper -->