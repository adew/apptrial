  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Pengajuan Cuti
        <!-- <small>Human Resource Management System</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= base_url('admin') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Pengajuan Cuti</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-12 connectedSortable">

          <!-- TO DO List -->
          <div class="box box-primary">
            <div class="box-header">
              <i class="ion ion-clipboard"></i>
              <h3 class="box-title">Input Data Cuti</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
              <div class="form-panel">
                <form class="form-horizontal style-form" action="<?= base_url('cuti/pengajuancuti') ?>" method="post" enctype="multipart/form-data" name="form1" id="form1">
                  <?php if ($this->session->flashdata('msg_gagal')) { ?>
                    <div class="alert alert-error alert-dismissible">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      <strong>Error</strong><br> <?php echo $this->session->flashdata('msg_gagal'); ?>
                    </div>
                  <?php } ?>
                  <?php if ($this->session->flashdata('msg_berhasil')) { ?>
                    <div class="alert alert-success alert-dismissible">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      <strong>Berhasil</strong><br> <?php echo $this->session->flashdata('msg_berhasil'); ?>
                    </div>
                  <?php } ?>
                  <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">NIP</label>
                    <div class="col-sm-4">
                      <input name="nip" type="text" id="kode" class="form-control" placeholder="NIP" value="<?= $this->session->userdata('nip') ?>" autofocus="on" readonly />
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Nama Pegawai</label>
                    <div class="col-sm-4">
                      <input name="nama" type="text" id="kode" class="form-control" placeholder="Nama Pegawai" value="<?= $this->session->userdata('nama') ?>" autofocus="on" readonly />
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Tanggal Awal Cuti</label>
                    <div class="col-sm-4">
                      <input type='text' class="input-group date form-control" data-date="" data-date-format="yyyy-mm-dd" name='tanggal_awal' id="tanggal_awal" placeholder='Tanggal Awal Cuti' autocomplete='off' required='required' />

                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Tanggal akhir Cuti</label>
                    <div class="col-sm-4">
                      <input type='text' class="input-group date form-control" data-date="" data-date-format="yyyy-mm-dd" name='tanggal_akhir' id="tanggal_akhir" placeholder='Tanggal Akhir Cuti' autocomplete='off' required='required' />

                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Lama Cuti</label>
                    <div class="col-sm-1">
                      <input name="lama_cuti" type="text" id="lama_cuti" class="form-control" placeholder="Jumlah" value="0" autocomplete="off" readonly />
                      <!--<span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span>-->
                    </div>
                    <label class="col-sm-2 col-sm-2 control-label" style="text-align: left !important;">Hari</label>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Jenis Cuti</label>
                    <div class="col-sm-3">
                      <select name="jenis_cuti" id="jenis_cuti" class="form-control select2" required>
                        <!-- <option value=""> Pilih Jenis Cuti </option> -->
                        <?php foreach ($jenis_cuti as $value) : ?>
                          <option value="<?= $value->jenis_cuti ?>"> <?= $value->jenis_cuti; ?> </option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Keterangan</label>
                    <div class="col-sm-4">
                      <textarea name="keterangan" type="text" id="keterangan" class="form-control" placeholder="Keterangan" autocomplete="off" required></textarea>
                      <!--<span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span>-->
                    </div>
                  </div>
                  <!-- <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Status</label>
                    <div class="col-sm-4">
                      <select name='status' id='status' class='form-control' required>
                        <option value="">-- Pilih Status --</option>
                        <option value="Approved">Approved</option>
                        <option value="Rejected">Rejected</option>
                        <option value="Pending">Pending</option>
                      </select>
                    </div>
                  </div> -->
                  <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label"></label>
                    <div class="col-sm-10">
                      <a type="button" onclick="history.back(-1)" class="btn btn-sm btn-danger">Batal </a>
                      <input type="submit" name="simpan" value="Simpan" class="btn btn-sm btn-primary" />&nbsp;
                    </div>
                  </div>
                </form>
              </div>
            </div><!-- /.box-body -->
            <!-- <div class="box-footer clearfix no-border">
      <a href="#" class="btn btn-default pull-right"><i class="fa fa-plus"></i> Tambah Admin</a>
    </div> -->
          </div><!-- /.box -->

        </section><!-- /.Left col -->
      </div><!-- /.row (main row) -->

    </section><!-- /.content -->
  </div><!-- /.content-wrapper -->