<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Cuti
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
            <!-- <a href="<?php echo base_url('cuti/inputdatacuti') ?>" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Tambah Cuti</a> -->
          </div>
          <div class="box-body">

            <table id="example" class="table table-responsive table-hover table-bordered text-center">
              <thead>
                <tr>
                  <th>
                    No
                  </th>
                  <th>
                    Nama
                  </th>
                  <th>
                    Tanggal Awal Cuti
                  </th>
                  <th>
                    Tanggal Akhir Cuti
                  </th>
                  <th>
                    Jumlah Cuti
                  </th>
                  <th>
                    Jenis Cuti Cuti
                  </th>
                  <th>
                    Keterangan
                  </th>
                  <th>
                    <!-- Tools -->
                  </th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($list_data as $list => $value) : ?>
                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>


                    <!-- <td><?= $list + 1 ?></td>
                    <td><?= $value->bulan ?></td>
                    <td><a href="<?= base_url('uploads/') . $value->file_pkp ?>"><?= $value->file_pkp ?></a></td>
                    <td><?= $value->skor ?></td>
                    <td><?= $value->creat_at ?></td> -->

                    <td>
                      <a href="#" class="btn btn-sm btn-primary" data-placement="bottom" data-toggle="tooltip" title="Edit Cuti"><span class="fa fa-edit"></span></a>
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