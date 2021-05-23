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
            <h3 class="box-title">Cuti Pegawai Yang Habis / Kurang</h3>
            <div class="box-tools pull-right">
            </div>
          </div><!-- /.box-header -->
          <div class="scroller box-body" style="height: 300px; overflow-y: scroll;">

          </div><!-- /.box -->

      </section><!-- /.Left col -->
      <!-- right col (We are only adding the ID to make the widgets sortable)-->
      <section class="col-lg-6 connectedSortable">

        <div class="box box-warning">
          <div class="box-header">
            <i class="ion ion-clipboard"></i>
            <h3 class="box-title">Cuti Hari Ini</h3>
            <div class="box-tools pull-right">

            </div>
          </div><!-- /.box-header -->
          <div class="box-body" style="height: 300px; overflow-y: scroll;">

            <table id="example" class="table table-responsive table-hover table-bordered">
              <thead>
                <tr>
                  <th>NIP</th>
                  <th>Nama</th>
                  <th>Jumlah Cuti </th>
                  <th>Keterangan </th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($list_data as $value) : ?>
                  <tr>
                  <tr>
                    <td><?= $value->nip ?></td>
                    <td><?= $value->nama ?></td>
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