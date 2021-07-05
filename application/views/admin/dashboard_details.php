<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Details
    </h1>
    <!-- <ol class="breadcrumb">
      <li><a href="<?= base_url('admin') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
      <li>Details</li> -->
    <!-- <li><a href="<?= base_url('admin/details/') . $this->uri->segment(3) ?>" class="active">Details</a></li> -->
    <!-- </ol> -->
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row d-flex align-items-stretch">
      <div class="col-md-6">
        <!-- /.box -->
        <div class="box box-warning" style="height:390px;">
          <div class="box-header">
            <i class="ion ion-clipboard"></i>
            <h3 class="box-title">Profil Pegawai</h3>
            <div class="box-tools pull-right">

            </div>
          </div><!-- /.box-header -->
          <!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <div class="box-body box-profile">
                <span class=""><img class="profile-user-img img-responsive img-circle" src="<?php echo base_url('uploads/profile/' . $avatar) ?>" style="height:125px"></span>
                <br>
                <div class="table-responsive">
                  <table class="table">
                    <tbody>
                      <?php foreach ($data_user as $list => $value) : ?>
                        <tr>
                          <th style="width:30%">Nama</th>
                          <td><?= $value->nama ?></td>
                        </tr>
                        <tr>
                          <th>NIP</th>
                          <td><?= $value->nip ?></td>
                        </tr>
                        <tr>
                          <th>Jabatan</th>
                          <td><?= $value->jabatan ?></td>
                        </tr>
                        <tr>
                          <th>Unit Kerja</th>
                          <td><?= $value->unit_kerja ?></td>
                        </tr>
                      <?php endforeach; ?>

                    </tbody>
                  </table>
                </div>
                <!-- /.box-body -->
              </div>
            </div>
          </div>
        </div>
        <!-- /.box-body -->
      </div>
      <div class="col-md-6">
        <!-- /.box -->
        <div class="scroller box box-warning" style="height:390px;">
          <div class="box-header">
            <i class="ion ion-clipboard"></i>
            <h3 class="box-title">Riwayat PKP</h3>
            <div class="box-tools pull-right">

            </div>
          </div><!-- /.box-header -->
          <div class="table-responsive">
            <table class="table no-margin">
              <thead>
                <tr>
                  <th>Bulan</th>
                  <th>Nama File</th>
                  <th>Score</th>
                </tr>
              </thead>
              <tbody>
                <?php if ($data_pkp != null) { ?>
                  <?php foreach ($data_pkp as $list => $value) : ?>
                    <tr>
                      <td><?= $value->bulan ?></td>
                      <td>
                        <?php if ($this->session->userdata('role') == 1) { ?>
                          <a href="<?= base_url('uploads/') . $value->file_pkp ?>"><?= $value->file_pkp ?></a>
                        <?php } else { ?>
                          <span><?= $value->file_pkp ?></span>
                        <?php } ?>

                      </td>
                      <td><span class="label label-success"><?= $value->skor ?></span></td>
                    </tr>
                  <?php endforeach; ?>
                <?php } else {
                  echo '<tr><td colspan="5" style="text-align:center">DATA KOSONG
                    </td><tr/>';
                } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="box box-warning">
          <div class="box-body box-profile">
            <h3 class="box-title">Grafik PKP</h3>
            <div class="graph-container">
              <div class="graph" id="examplefirst"> </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Main row -->
    <div class="row">
      <!-- Left col -->
      <section class="col-lg-6 connectedSortable">
        <!-- Custom tabs (Charts with tabs)-->
        <!-- TO DO List -->
        <div class="box box-warning">
          <div class="box-header">
            <i class="ion ion-clipboard"></i>
            <h3 class="box-title">Jatah Cuti</h3>
            <div class="box-tools pull-right">
            </div>
          </div><!-- /.box-header -->
          <!-- <div class="scroller box-body" style="height: 300px; overflow-y: scroll;"> -->
          <div class="scroller box-body">
            <!-- <div class="col-xs-12 table-responsive"> -->
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Jenis Cuti</th>
                  <th>Cuti Terpakai</th>
                  <th>Jatah Cuti</th>
                  <th>Sisa Cuti</th>
                </tr>
              </thead>
              <tbody>
                <?php if ($jatah_cuti != null) { ?>
                  <tr>
                    <td>1</td>
                    <td class="bhead">Cuti Tahunan</td>
                    <td><?= $jatah_cuti->c_tahunan_pakai ?></td>
                    <td><?= $jatah_cuti->c_tahunan_kuota ?></td>
                    <td><?= $jatah_cuti->c_tahunan_kuota - $jatah_cuti->c_tahunan_pakai ?></td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td class="bhead">Cuti Besar</td>
                    <td><?= $jatah_cuti->c_besar_pakai ?></td>
                    <td><?= $jatah_cuti->c_besar_kuota ?></td>
                    <td><?= $jatah_cuti->c_besar_kuota - $jatah_cuti->c_besar_pakai ?></td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td class="bhead">Cuti Sakit</td>
                    <td><?= $jatah_cuti->c_sakit_pakai ?></td>
                    <td><?= $jatah_cuti->c_sakit_kuota ?></td>
                    <td><?= $jatah_cuti->c_sakit_kuota - $jatah_cuti->c_sakit_pakai ?></td>
                  </tr>
                  <tr>
                    <td>4</td>
                    <td class="bhead">Cuti Lahir</td>
                    <td><?= $jatah_cuti->c_lahir_pakai ?></td>
                    <td><?= $jatah_cuti->c_lahir_kuota ?></td>
                    <td><?= $jatah_cuti->c_lahir_kuota - $jatah_cuti->c_lahir_pakai ?></td>
                  </tr>
                  <tr>
                    <td>5</td>
                    <td class="bhead">Cuti Alasan Penting</td>
                    <td><?= $jatah_cuti->c_alpen_pakai ?></td>
                    <td><?= $jatah_cuti->c_alpen_kuota ?></td>
                    <td><?= $jatah_cuti->c_alpen_kuota - $jatah_cuti->c_alpen_pakai ?></td>
                  </tr>
                  <tr>
                    <td>6</td>
                    <td class="bhead">Cuti Diluar Tanggungan Negara</td>
                    <td><?= $jatah_cuti->c_dtn_pakai ?></td>
                    <td><?= $jatah_cuti->c_dtn_kuota ?></td>
                    <td><?= $jatah_cuti->c_dtn_kuota - $jatah_cuti->c_dtn_pakai ?></td>
                  </tr>
                <?php } else {
                  echo '<tr><td colspan="5" style="text-align:center">DATA KOSONG
                    </td><tr/>';
                } ?>
              </tbody>
            </table>
            <!-- </div> -->
          </div><!-- /.box -->

      </section><!-- /.Left col -->
      <!-- right col (We are only adding the ID to make the widgets sortable)-->
      <section class="col-lg-6 connectedSortable">

        <div class="box box-warning">
          <div class="box-header">
            <i class="ion ion-clipboard"></i>
            <h3 class="box-title">Riwayat Cuti</h3>
            <div class="box-tools pull-right">

            </div>
          </div><!-- /.box-header -->
          <div class="box-body" style="overflow-y: scroll;">

            <!-- <table id="example" class="table table-responsive table-hover table-bordered"> -->
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Waktu Pelaksanaan</th>
                  <th>Jenis Cuti</th>
                  <th>Lama Cuti </th>
                  <th>Keterangan </th>
                </tr>
              </thead>
              <tbody>
                <?php if ($list_data != null) { ?>
                  <?php foreach ($list_data as $value) : ?>

                    <tr>
                      <td><?= $value->tgl_awal . ' <b> s/d </b> ' . $value->tgl_akhir ?></td>
                      <?php switch ($value->jenis_cuti) {
                        case 'cuti_tahunan':
                          $j_cuti = 'Cuti Tahunan';
                          break;
                        case 'cuti_besar':
                          $j_cuti = 'Cuti Besar';
                          break;
                        case 'cuti_sakit':
                          $j_cuti = 'Cuti Sakit';
                          break;
                        case 'cuti_lahir':
                          $j_cuti = 'Cuti Lahir';
                          break;
                        case 'cuti_alpen':
                          $j_cuti = 'Cuti Alasan Penting';
                          break;
                        case 'cuti_dtn':
                          $j_cuti = 'Cuti Diluar Tanggunggan Negara';
                          break;
                      } ?>
                      <td><?= $j_cuti ?></td>
                      <td><?= $value->lama_cuti ?></td>
                      <?php if ($value->status_al == 0 || $value->status_pb == 0) {
                        $status_cuti = '<span class="label label-warning">Menunggu</span>';
                      } elseif ($value->status_al == 1 && $value->status_pb == 1) {
                        $status_cuti = '<span class="label label-success">Disetujui</span>&nbsp;';
                        // $status_cuti .= '<a href="' . base_url() . 'cuti/exportword/' . $value->id . '" class="label label-default export-word"><i class="fa fa-download"></i> Export</a>';
                      } else {
                        $status_cuti = '<span class="label label-danger">Ditolak</span>';
                      } ?>
                      <td><?= $status_cuti ?></td>
                    </tr>
                  <?php endforeach; ?>
                <?php } else {
                  echo '<tr><td colspan="5" style="text-align:center">DATA KOSONG
                    </td><tr/>';
                } ?>
              </tbody>
            </table>
          </div><!-- /.box-body -->
          <!--<div class="box-footer clearfix no-border">
                  <a href="input-kategori.php" class="btn btn-sm btn-default pull-right"><i class="fa fa-plus"></i> Tambah Kategori</a>
                  </div>-->
        </div>






      </section><!-- right col -->
    </div><!-- /.row (main row) -->

</div>
</div>

<!-- /.col -->
</div>
<!-- /.row -->
</section>
<!-- /.content -->
</div>