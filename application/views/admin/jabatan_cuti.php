<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Jabatan
      <!-- <small>Human Resource Management System</small> -->
    </h1>
    <ol class="breadcrumb">
      <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li class="active">Data Jabatan</li>
    </ol>
  </section>
  <!-- <?php if ($this->session->flashdata('msg_berhasil')) { ?>
    <div class="col-sm-4 col-sm-offset-4 alert alert-success alert-dismissible">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <strong>Success!</strong><br> <?php echo $this->session->flashdata('msg_berhasil'); ?>
    </div>
  <?php } ?> -->
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
            <h3 class="box-title">Data Jabatan</h3>
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
            <a href="<?php echo base_url('cuti/inputjabatan') ?>" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Tambah Jabatan</a>
          </div>
          <div class="box-body">

            <table id="example" class="table table-responsive table-hover table-bordered">
              <thead>
                <tr>
                  <th>
                    No
                  </th>
                  <th>
                    Nama Jabatan
                  </th>
                  <th>
                    Deskripsi
                  </th>
                  <th>
                    Tools
                  </th>
                </tr>
              </thead>
              <tbody">
                <?php foreach ($list_data as $list => $value) : ?>
                  <tr>

                    <td><?= $list + 1 ?></td>
                    <td class="text-left"><?= $value->jabatan ?></td>
                    <td><?= $value->deskripsi ?></td>
                    <td>

                      <div id="thanks"><a class="btn btn-sm btn-primary" data-placement="bottom" data-toggle="tooltip" title="Edit Jabatan" href="edit-departemen.php?aksi=edit&kd="><span class="glyphicon glyphicon-edit"></span></a>

                        <a type="button" id="btn-delete" class="btn btn-danger btn-delete" data-placement="bottom" data-toggle="tooltip" title="Hapus Jabatan" href="<?= base_url('cuti/proses_delete_jabatan/' . $value->id) ?>" name="btn_delete" style="margin:auto;"><i class="fa fa-trash" aria-hidden="true"></i></a>

                    </td>
                  </tr>
                <?php endforeach; ?>
          </div>

          </tbody>
          </table>
        </div><!-- /.box-body -->

    </div><!-- /.box -->

  </section><!-- /.Left col -->
</div><!-- /.row (main row) -->

</section><!-- /.content -->
</div><!-- /.content-wrapper -->