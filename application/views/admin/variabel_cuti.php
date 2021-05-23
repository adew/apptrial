<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Jenis Cuti
      <!-- <small>Human Resource Management System</small> -->
    </h1>
    <!-- <ol class="breadcrumb">
      <li><a href="<a href=" <?= base_url('admin') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li class="active">Data Jenis Cuti</li>
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
            <h3 class="box-title">Data Jenis Cuti</h3>
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
          <div class="box-footer clearfix no-border">
            <a href="<?php echo base_url('cuti/inputvariabelcuti') ?>" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Tambah</a>
          </div>
          <div class="box-body">
            <table id="example" class="table table-responsive table-hover table-bordered">
              <thead>
                <tr>
                  <th>
                    No
                  </th>
                  <th>
                    Jenis Cuti
                  </th>
                  <th>
                    Deskripsi
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
                    <td><?= $value->jenis_cuti ?></td>
                    <td><?= $value->deskripsi ?></td>
                    <td>

                      <!-- <div id="thanks"><a href="#" class="btn btn-sm btn-primary" data-placement="bottom" data-toggle="tooltip" title="Edit Cuti"><i class="glyphicon glyphicon-edit"></i></a> -->

                      <a type="button" id="btn-delete" class="btn btn-xs btn-danger btn-delete" href="<?= base_url('cuti/proses_delete_jeniscuti/' . $value->id) ?>" name="btn_delete" style="margin:auto;"><i class="fa fa-trash" aria-hidden="true"></i></a>

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