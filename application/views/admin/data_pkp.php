<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      PKP
      <!-- <small>Human Resource Management System</small> -->
    </h1>
    <ol class="breadcrumb">
      <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li class="active">Data PKP</li>
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
            <h3 class="box-title">Data PKP</h3>
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
            <a href="<?php echo base_url('admin/inputdatapkp') ?>" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Tambah PKP</a>
          </div>
          <div class="box-body">

            <table id="example" class="table table-responsive table-hover table-bordered text-center">
              <thead>
                <tr>
                  <!-- <th>
                    No
                  </th> -->
                  <th>
                    Bulan
                  </th>
                  <th>
                    File PKP
                  </th>
                  <th>
                    Skor
                  </th>
                  <th>
                    Waktu Upload
                  </th>
                  <th>
                    <!-- Tools -->
                  </th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($list_data as $list => $value) : ?>
                  <tr>

                    <!-- <td><?= $list + 1 ?></td> -->
                    <td><?= $value->bulan ?></td>
                    <td><a href="<?= base_url('uploads/') . $value->file_pkp ?>"><?= $value->file_pkp ?></a></td>
                    <td><?= $value->skor ?></td>
                    <td><?= $value->creat_at ?></td>
                    <td>

                      <!-- <a class="btn btn-sm btn-primary" data-placement="bottom" data-toggle="tooltip" title="Edit PKP" href="#"><span class="glyphicon glyphicon-edit"></span></a> -->

                      <a type="button" id="btn-delete" class="btn btn-sm btn-danger btn-delete" data-placement="bottom" data-toggle="tooltip" title="Hapus Cuti" href="<?= base_url('cuti/proses_delete_jeniscuti/' . $value->id) ?>" name="btn_delete" style="margin:auto;"><i class="fa fa-trash" aria-hidden="true"></i></a>

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