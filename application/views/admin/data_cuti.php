<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Cuti Pegawai
      <!-- <small>Human Resource Management System</small> -->
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?= base_url('admin') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li class="active">Data Cuti</li>
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

          <div class="box-body">

            <table id="example" class="table table-responsive table-hover table-bordered">
              <thead>
                <tr>
                  <th style="width: 3%;">
                    No
                  </th>
                  <th style="width: 10%;">
                    Waktu Pengajuan
                  </th>
                  <th style="width: 20%;">
                    Nama
                  </th>
                  <th style="width: 8%;">
                    Dari Tanggal
                  </th>
                  <th style="width: 8%;">
                    Sampai Tanggal
                  </th>
                  <th style="width: 5%;">
                    Lama Cuti
                  </th>
                  <th>
                    Jenis Cuti
                  </th>
                  <th>
                    Keterangan
                  </th>
                  <th style="width: 8%;">
                    Status
                  </th>
                  <th style="width: 8%;">
                    <!-- Tools -->
                  </th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($list_data as $list => $value) : ?>
                  <tr>
                    <td><?= $list + 1 ?></td>
                    <td><?= $value->creat_at ?></td>
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



                    <!-- <td><?= $list + 1 ?></td>
                    <td><?= $value->bulan ?></td>
                    <td><a href="<?= base_url('uploads/') . $value->file_pkp ?>"><?= $value->file_pkp ?></a></td>
                    <td><?= $value->skor ?></td>
                    <td><?= $value->creat_at ?></td> -->

                    <td>
                      <a href="<?= base_url('cuti/cutiditolak/' . $value->id) ?>" type="button" class="btn btn-xs btn-danger btn-reject" data-placement="bottom" data-toggle="tooltip" title="Ditolak" name="btn_delete" style="margin:auto;"><i class="fa fa-times-circle" aria-hidden="true"></i></a>
                      <a href="<?= base_url('cuti/cutidisetujui/' . $value->id) ?>" class="btn btn-xs btn-success btn-accept" data-placement="bottom" data-toggle="tooltip" title="Disetujui"><span class="fa fa-check-circle"></span></a>

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