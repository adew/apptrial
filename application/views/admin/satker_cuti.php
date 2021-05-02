<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Satker
      <!-- <small>Human Resource Management System</small> -->
    </h1>
    <ol class="breadcrumb">
      <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li class="active">Data Satker</li>
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
            <h3 class="box-title">Data Satker</h3>
            <div class="box-tools pull-right">
              <form action='departemen.php' method="POST">
                <div class="input-group" style="width: 230px;">
                  <input type="text" name="qcari" class="form-control input-sm pull-right" placeholder="Cari Usename Atau Nama">
                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-sm btn-default tooltips" data-placement="bottom" data-toggle="tooltip" title="Cari Data"><i class="fa fa-search"></i></button>
                    <a href="departemen.php" class="btn btn-sm btn-success tooltips" data-placement="bottom" data-toggle="tooltip" title="Refresh"><i class="fa fa-refresh"></i></a>
                  </div>
                </div>
              </form>
            </div>
          </div><!-- /.box-header -->
          <div class="box-footer clearfix no-border">
            <a href="<?php echo base_url('cuti/inputsatker') ?>" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Tambah Satker</a>
          </div>
          <div class="box-body">
            <table id="example" class="table table-responsive table-hover table-bordered">
              <thead>
                <tr>
                  <th>
                    <center>No </center>
                  </th>
                  <th>
                    <center>Id Satker </center>
                  </th>
                  <th>
                    <center>Nama Satker </center>
                  </th>
                  <th>
                    <center>Tools </center>
                  </th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td>
                    <center>
                      <div id="thanks"><a class="btn btn-sm btn-primary" data-placement="bottom" data-toggle="tooltip" title="Edit Satker" href="edit-departemen.php?aksi=edit&kd="><span class="glyphicon glyphicon-edit"></span></a>
                        <a onclick="return confirm ('Yakin hapus .?');" class="btn btn-sm btn-danger tooltips" data-placement="bottom" data-toggle="tooltip" title="Hapus Satker" href="departemen.php?aksi=hapus&kd="><span class="glyphicon glyphicon-trash"></a>
                    </center>
                  </td>
                </tr>
          </div>

          </tbody>
          </table>
        </div><!-- /.box-body -->

    </div><!-- /.box -->

  </section><!-- /.Left col -->
</div><!-- /.row (main row) -->

</section><!-- /.content -->
</div><!-- /.content-wrapper -->