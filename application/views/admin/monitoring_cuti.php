<style>
  .bhead {
    font-weight: bold;
    font-style: italic;
  }
</style>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Monitoring Cuti
      <!-- <small>Control panel</small> -->
    </h1>
    <!-- <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Monitoring Cuti</li>
    </ol> -->
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Main row -->
    <div class="row">
      <!-- Left col -->
      <section class="col-lg-6 connectedSortable">
        <!-- Custom tabs (Charts with tabs)-->
        <!-- TO DO List -->
        <div class="box box-warning">
          <div class="box-header">
            <i class="ion ion-clipboard"></i>
            <h3 class="box-title">Jatah Cuti Anda</h3>
            <div class="box-tools pull-right">
            </div>
          </div><!-- /.box-header -->
          <!-- <div class="scroller box-body" style="height: 300px; overflow-y: scroll;"> -->
          <div class="scroller box-body">
            <div class="col-xs-12 table-responsive">
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
                  <tr>
                    <td>1</td>
                    <td class="bhead">Cuti Tahunan</td>
                    <td>0</td>
                    <td>12</td>
                    <td>0</td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td class="bhead">Cuti Besar</td>
                    <td>0</td>
                    <td>30</td>
                    <td>0</td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td class="bhead">Cuti Sakit</td>
                    <td>0</td>
                    <td>14</td>
                    <td>0</td>
                  </tr>
                  <tr>
                    <td>4</td>
                    <td class="bhead">Cuti Lahir</td>
                    <td>0</td>
                    <td>90</td>
                    <td>0</td>
                  </tr>
                  <tr>
                    <td>5</td>
                    <td class="bhead">Cuti Alasan Penting</td>
                    <td>0</td>
                    <td>30</td>
                    <td>0</td>
                  </tr>
                  <tr>
                    <td>6</td>
                    <td class="bhead">Cuti Diluar Tanggungan Negara</td>
                    <td>0</td>
                    <td>60</td>
                    <td>0</td>
                  </tr>
                </tbody>
              </table>
            </div>
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
          <div class="box-body" style="height: 300px; overflow-y: scroll;">

            <table id="example" class="table table-responsive table-hover table-bordered">
              <thead>
                <tr>
                  <th>Waktu Pelaksanaan</th>
                  <th>Jenis Cuti</th>
                  <th>Jumlah Cuti </th>
                  <th>Keterangan </th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($list_data as $value) : ?>
                  <tr>
                  <tr>
                    <td><?= $value->tgl_awal . ' s/d ' . $value->tgl_akhir ?></td>
                    <td><?= $value->jenis_cuti ?></td>
                    <td><?= $value->lama_cuti ?></td>
                    <td><?= $value->keterangan ?></td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div><!-- /.box-body -->
          <!--<div class="box-footer clearfix no-border">
                  <a href="input-kategori.php" class="btn btn-sm btn-default pull-right"><i class="fa fa-plus"></i> Tambah Kategori</a>
                  </div>-->
        </div>






      </section><!-- right col -->
    </div><!-- /.row (main row) -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->