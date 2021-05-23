<style>
  .orange {
    text-align: left;
    font-size: 15px;
    line-height: 11px;
    /* font-weight: bold; */
    width: 280px;
    background-color: #d6eae9;
  }

  /* .control-label {
    color: blue;
  } */
</style>


<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Cuti Pegawai
      <!-- <small>Human Resource Management System</small> -->
    </h1>
    <!-- <ol class="breadcrumb">
      <li><a href="<?= base_url('admin') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li class="active">Data Cuti</li>
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
            <h3 class="box-title">Data Cuti</h3>
            <div class="box-tools pull-right">
              <!-- <form action='departemen.php' method="POST">
                <div class="input-group" style="width: 230px;">
                  <input type="text" name="qcari" class="form-control input-sm pull-right" placeholder="Cari Usename Atau Nama">
                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-sm btn-default tooltips" data-placement="bottom" data-toggle="tooltip" title="Cari Data"><i class="fa fa-search"></i></button>
                    <a href="departemen.php" class="btn btn-sm btn-success tooltips" data-placement="bottom" data-toggle="tooltip" title="Refresh"><i class="fa fa-refresh"></i></a>
                  </div>
                </div>
              </form> -->
            </div>
          </div><!-- /.box-header -->

          <div class="scroller box-body" style="overflow-y: scroll;">
            <table id="example" class="table table-responsive table-hover table-bordered">
              <thead>
                <tr>
                  <th>
                    No
                  </th>
                  <th>
                    Waktu Pengajuan
                  </th>
                  <th>
                    Nama
                  </th>
                  <th>
                    Dari Tanggal
                  </th>
                  <th>
                    Sampai Tanggal
                  </th>
                  <th>
                    Lama Cuti
                  </th>
                  <th>
                    Jenis Cuti
                  </th>
                  <th>
                    Keterangan
                  </th>
                  <th>
                    Status
                  </th>
                  <th>
                    <!-- Tools -->
                  </th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($list_data as $list => $value) : ?>
                  <tr>
                    <td><?= $list + 1 ?></td>
                    <td><a href="#" onclick="detail_cuti('<?= base_url() . 'cuti/get_data/' . $value->id ?>')"><?= $value->creat_at ?></a></td>
                    <td><?= $value->nama ?></td>
                    <td><?= $value->tgl_awal ?></td>
                    <td><?= $value->tgl_akhir ?></td>
                    <td><?= $value->lama_cuti ?>&nbsp;Hari</td>
                    <td><?= $value->jenis_cuti ?></td>
                    <td><?= $value->keterangan ?></td>
                    <?php if ($value->status_cuti == 0) {
                      $status_cuti = '<span class="label label-warning">Menunggu</span>';
                    } elseif ($value->status_cuti == 1) {
                      $status_cuti = '<span class="label label-success">Disetujui</span>';
                    } else {
                      $status_cuti = '<span class="label label-danger">Ditolak</span>';
                    } ?>
                    <td><?= $status_cuti ?></td>

                    <td style="display:inline-flex;">
                      <a style="margin-right: 5px;" href="<?= base_url('cuti/cutiditolak/' . $value->id) ?>" type="button" class="btn btn-xs btn-danger btn-reject" name="btn_delete"><i class="fa fa-times-circle"></i>Ditolak</a>
                      <a href="<?= base_url('cuti/cutidisetujui/' . $value->id) ?>" class="btn btn-xs btn-success btn-accept"><span class="fa fa-check-circle"></span>Disetujui</a>
                    </td>
                  </tr>
                <?php endforeach; ?>

              </tbody>
            </table>
          </div><!-- /.box-body -->
        </div><!-- /.box -->

      </section><!-- /.Left col -->
    </div><!-- /.row (main row) -->

  </section><!-- /.content -->
</div><!-- /.content-wrapper -->

<div id="detail-cuti" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
          ×
        </button>
        <h4 class="modal-title" id="classModalLabel">
          Details Cuti
        </h4>
      </div>
      <!-- <div class="row" style="padding:0px 30px"> -->
      <div class="box box-body box-warning" style="margin-bottom: 2px;">
        <table class="table table-bordered table-striped">
          <tbody>
            <tr>
              <td class=" orange">NIP</td>
              <td>
                <div class="form-group">
                  <label id="dc1" class="col-sm-5 control-label"></label>
                  <div class="col-sm-6">
                  </div>
                </div>
              </td>
            </tr>
            <tr>
              <td class="orange">Nama Pegawai </td>
              <td>
                <div class="form-group">
                  <label id="dc2" class="col-sm-5 control-label"></label>
                  <div class="col-sm-6">
                  </div>
                </div>
              </td>
            </tr>
            <tr>
              <td class="orange">Jabatan</td>
              <td>
                <div class="form-group">
                  <label id="dc3" class="col-sm-5 control-label"></label>
                  <div class="col-sm-6">
                  </div>
                </div>
              </td>
            </tr>
            <tr>
              <td class="orange">Unit Kerja</td>
              <td>
                <div class="form-group">
                  <label id="dc4" class="col-sm-5 control-label"></label>
                  <div class="col-sm-6">
                  </div>
                </div>
              </td>
            </tr>
            <tr>
              <td class="orange">Masa Kerja</td>
              <td>
                <div class="form-group">
                  <label id="dc5" class="col-sm-5 control-label"></label>
                  <div class="col-sm-6">
                  </div>
                </div>
              </td>
            </tr>
            <tr>
              <td class="orange">Nomor HP </td>
              <td>
                <div class="form-group">
                  <label id="dc6" class="col-sm-5 control-label"></label>
                  <div class="col-sm-6">
                  </div>
                </div>
              </td>
            </tr>
            <tr>
              <td class="orange">Tanggal Awal Cuti</td>
              <td>
                <div class="form-group">
                  <label id="dc7" class="col-sm-5 control-label"></label>
                  <div class="col-sm-6">
                  </div>
                </div>
              </td>
            </tr>
            <tr>
              <td class="orange">Tanggal Akhir Cuti</td>
              <td>
                <div class="form-group">
                  <label id="dc8" class="col-sm-5 control-label"></label>
                  <div class="col-sm-6">
                  </div>
                </div>
              </td>
            </tr>
            <tr>
              <td class="orange">Jenis Cuti</td>
              <td>
                <div class="form-group">
                  <label id="dc9" class="col-sm-5 control-label"></label>
                  <div class="col-sm-6">
                  </div>
                </div>
              </td>
            </tr>
            <tr>
              <td class="orange">Alasan Cuti</td>
              <td>
                <div class="form-group">
                  <label id="dc10" class="col-sm-5 control-label"></label>
                  <div class="col-sm-6">
                  </div>
                </div>
              </td>
            </tr>
            <tr>
              <td class="orange">Lama Cuti</td>
              <td>
                <div class="form-group">
                  <label id="dc11" class="col-sm-5 control-label">
                  </label>
                  <div class="col-sm-6">
                  </div>
                </div>
              </td>
            </tr>
            <tr>
              <td class="orange">Pertimbangan Atasan Langsung</td>
              <td>
                <div class="form-group" style="color:blue">
                  <label id="dc13" class="col-sm-6 control-label"></label>
                  <div class="col-sm-6">
                    <a style="margin-right: 5px;" href="<?= base_url('cuti/cutiditolak/' . $value->id) ?>" type="button" class="btn btn-sm btn-danger btn-reject" name="btn_delete"><i class="fa fa-times-circle"></i>Ditolak</a>
                    <a href="<?= base_url('cuti/cutidisetujui/' . $value->id) ?>" class="btn btn-sm btn-success btn-accept"><span class="fa fa-check-circle"></span>Disetujui</a>
                  </div>
                </div>
              </td>
            </tr>
            <tr>
              <td class="orange">Pejabat Yang Berwenang</td>
              <td>
                <div class="form-group" style="color:blue">
                  <label id="dc14" class="col-sm-6 control-label"></label>
                  <div class="col-sm-6">
                    <a style="margin-right: 5px;" href="<?= base_url('cuti/cutiditolak/' . $value->id) ?>" type="button" class="btn btn-sm btn-danger btn-reject" name="btn_delete"><i class="fa fa-times-circle"></i>Ditolak</a>
                    <a href="<?= base_url('cuti/cutidisetujui/' . $value->id) ?>" class="btn btn-sm btn-success btn-accept"><span class="fa fa-check-circle"></span>Disetujui</a>
                  </div>
                </div>
              </td>
            </tr>
            <tr>
              <td class="orange">Alamat Selama Menjalankan Cuti</td>
              <td>
                <div class="form-group">
                  <label id="dc12" class="col-sm-5 control-label"></label>
                  <div class="col-sm-6">
                  </div>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="modal-footer" style="padding:4px;">
        <button type="button" class="btn btn-info btn-flat col-md-4 col-md-offset-4"><i class="fa fa-download"></i> Export to Word</button>
      </div>
    </div>
  </div>
</div>