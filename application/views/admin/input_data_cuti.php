  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Pengajuan Cuti
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
              <h3 class="box-title">Input Data Cuti</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
              <form class="form-horizontal style-form" action="<?= base_url('cuti/pengajuancuti') ?>" method="post" enctype="multipart/form-data" name="form1" id="form1">
                <div class="row">
                  <div class="form-panel">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="col-sm-3 control-label">NIP</label>
                        <div class="col-sm-6">
                          <?php echo form_error('nip', '<p class="callout callout-warning" style=" role="alert">', '</p>'); ?>
                          <input name="nip" type="text" id="kode" class="form-control" value="<?= $this->session->userdata('nip') ?>" autofocus="on" readonly />
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Nama Pegawai</label>
                        <div class="col-sm-6">
                          <input name="nama" type="text" id="kode" class="form-control" value="<?= $this->session->userdata('nama') ?>" autofocus="on" readonly />
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Jabatan</label>
                        <div class="col-sm-6">
                          <input name="jabatan" type="text" id="jabatan" class="form-control" value="<?= $this->session->userdata('jabatan') ?>" autofocus="on" readonly />
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Unit Kerja</label>
                        <div class="col-sm-6">
                          <textarea style="align-content:center; overflow:auto;" name="unit_kerja" type="text" id="keterangan" class="form-control" readonly>
                          <?= $this->session->userdata('unit_kerja') ?>
                          </textarea>
                          <!-- <input name="unit_kerja" type="text" style="height:50px;" id="kode" class="form-control" value="<?= $this->session->userdata('unit_kerja') ?>" autofocus="on" readonly /> -->
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Masa Kerja</label>
                        <div class="col-sm-2">
                          <?php echo form_error('masa_kera', '<p class="callout callout-warning" style=" role="alert">', '</p>'); ?>
                          <input name="masa_kerja" type="text" id="kode" class="form-control" value="" autofocus="on" placeholder="" />
                        </div>
                        <label class="col-sm-4 control-label" style="text-align:left !important; font-weight: normal !important; padding-left: 0px;">tahun</label>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Nomor HP</label>
                        <div class="col-sm-6">
                          <?php echo form_error('nomor_hp', '<p class="callout callout-warning" style=" role="alert">', '</p>'); ?>
                          <input name="nomor_hp" type="text" id="nomor_hp" class="form-control" value="" autofocus="on" placeholder="Nomor hp aktif" />
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Tanggal Mulai Cuti</label>
                        <div class="col-sm-6">
                          <?php echo form_error('tanggal_awal', '<p class="callout callout-warning" style=" role="alert">', '</p>'); ?>
                          <input type='text' class="input-group date form-control" data-date="" data-date-format="yyyy-mm-dd" name='tanggal_awal' id="tanggal_awal" placeholder='Pilih tanggal mulai cuti' autocomplete='off' required='required' />
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Tanggal akhir Cuti</label>
                        <div class="col-sm-6">
                          <?php echo form_error('tanggal_akhir', '<p class="callout callout-warning" style=" role="alert">', '</p>'); ?>
                          <input type='text' class="input-group date form-control" data-date="" data-date-format="yyyy-mm-dd" name='tanggal_akhir' id="tanggal_akhir" placeholder='Pilih tanggal akhir cuti' autocomplete='off' required='required' />
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Jenis Cuti</label>
                        <div class="col-sm-6">
                          <?php echo form_error('jenis_cuti', '<p class="callout callout-warning" style=" role="alert">', '</p>'); ?>
                          <select name="jenis_cuti" id="jenis_cuti" class="form-control select2" required>
                            <!-- <option value=""> Pilih Jenis Cuti </option> -->
                            <?php foreach ($jenis_cuti as $value) : ?>
                              <option value="<?= $value->jenis_cuti ?>"> <?= $value->jenis_cuti; ?> </option>
                            <?php endforeach; ?>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Alasan Cuti</label>
                        <div class="col-sm-6">
                          <?php echo form_error('keterangan', '<p class="callout callout-warning" style=" role="alert">', '</p>'); ?>
                          <textarea name="keterangan" type="text" id="keterangan" class="form-control" placeholder="Keterangan" autocomplete="off" required></textarea>
                          <!--<span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span>-->
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Lama Cuti</label>
                        <div class="col-sm-2">
                          <?php echo form_error('lama_cuti', '<p class="callout callout-warning" style=" role="alert">', '</p>'); ?>
                          <input name="lama_cuti" type="text" id="lama_cuti" class="form-control" placeholder="" value="" autocomplete="off" />
                        </div>
                        <label class="col-sm-4 control-label" style="text-align:left !important; font-weight: normal !important; padding-left: 0px;">hari</label>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Alamat Selama Menjanlankan cuti</label>
                        <div class="col-sm-6">
                          <?php echo form_error('alamat_cuti', '<p class="callout callout-warning" style=" role="alert">', '</p>'); ?>
                          <textarea name="alamat_cuti" type="text" id="alamat_cuti" class="form-control" required></textarea>
                          <!--<span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span>-->
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Pertimbangan Atasan Langsung</label>
                        <div class="col-sm-6">
                          <?php echo form_error('atasan__langsung', '<p class="callout callout-warning" style=" role="alert">', '</p>'); ?>
                          <select name="atasan_langsung" id="atasan_langsung" class="form-control select2" required>
                            <option value=""> Pilih Atasan Langsung </option>
                            <?php foreach ($data_user as $value) : ?>
                              <option value="<?= $value->nip ?>"> <?= $value->nama; ?> </option>
                            <?php endforeach; ?>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Pejabat Yang Berwenang</label>
                        <div class="col-sm-6">
                          <?php echo form_error('pejabat_berwenang', '<p class="callout callout-warning" style=" role="alert">', '</p>'); ?>
                          <select name="pejabat_berwenang" id="pejabat_berwenang" class="form-control select2" required>
                            <option value=""> Pilih Pejabat Berwenang</option>
                            <?php foreach ($data_user as $value) : ?>
                              <option value="<?= $value->nip ?>"> <?= $value->nama; ?> </option>
                            <?php endforeach; ?>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="d-flex justify-content-center">
                    <div class="col-sm-5"></div>
                    <div class="col-sm-2">
                      <a type="button" onclick="history.back(-1)" class="btn btn-sm btn-danger">Batal </a>
                      <input type="submit" name="simpan" value="Simpan" class="btn btn-sm btn-primary" />&nbsp;
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