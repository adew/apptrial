<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      PKP
      <!-- <small>Human Resource Management System</small> -->
    </h1>
    <!-- <ol class="breadcrumb">
      <li><a href="<?= base_url('admin') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li class="active">Data PKP</li>
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
            <h3 class="box-title">Data PKP</h3>
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
          <!-- <div class="box-footer clearfix no-border">
            <a href="<?php echo base_url('pkp/inputdatapkp') ?>" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Tambah PKP</a>
          </div> -->
          <div class="scroller box-body" style="overflow-y: scroll;">
            <table id="data_pkp" class="table table-responsive table-hover table-bordered text-center">
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
                <?php
                if (empty($list_data)) { ?>
                  <tr>
                    <td colspan="5">DATA KOSONG
                    <td>
                  </tr>

                  <?php } else {
                  foreach ($list_data as $list => $value) : ?>
                    <tr>

                      <!-- <td><?= $list + 1 ?></td> -->
                      <td><?= $value->bulan ?></td>
                      <td><a style="background-color: #bbff00;" href="<?= base_url('uploads/') . $value->file_pkp ?>"><b><?= $value->file_pkp ?></b></a></td>
                      <td><?= $value->skor ?></td>
                      <td><?= $value->creat_at ?></td>
                      <td>
                        <button type="button" class="btn btn-xs btn-danger" onclick="delete_row('<?= base_url() ?>pkp/proses_delete_pkp/<?= $value->id ?>')" name="btn_delete" style="margin:auto;"><i class="fa fa-trash" aria-hidden="true"></i></button>
                      </td>
                    </tr>
                <?php endforeach;
                } ?>
              </tbody>
            </table>
          </div><!-- /.box-body -->
        </div><!-- /.box -->

      </section><!-- /.Left col -->
    </div><!-- /.row (main row) -->

  </section><!-- /.content -->
</div><!-- /.content-wrapper -->