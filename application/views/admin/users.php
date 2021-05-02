<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Tabel Users
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?= base_url('admin') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="<?= base_url('admin/users') ?>" class="active">Users</a></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">

        <!-- /.box -->
        <div class="box box-primary">
          <div class="box-header">
            <h3 class="box-title"><i class="ion-ios-people-outline step size-96" aria-hidden="true"></i> Users</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">

            <!-- <?php if ($this->session->flashdata('msg_berhasil')) { ?>
              <div class="alert alert-success alert-dismissible" style="width:100%">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Success!</strong><br> <?php echo $this->session->flashdata('msg_berhasil'); ?>
              </div>
            <?php } ?> -->

            <a href="<?= base_url('admin/form_user') ?>" style="margin-bottom:10px;" type="button" class="btn btn-primary" name="tambah_data"><i class="fa fa-plus-circle" aria-hidden="true"></i> Tambah Data</a>
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>NIP/NRP</th>
                  <th>Nama</th>
                  <th>Jabatan</th>
                  <th>Unit Kerja</th>
                  <th>Role</th>
                  <th>Last Login</th>
                  <th class="text-center" style="width: 130px;">Action</th>

                </tr>
              </thead>
              <tbody>
                <tr>
                  <?php if (is_array($list_users)) { ?>
                    <?php foreach ($list_users as $dd) : ?>
                      <td><?= $dd->nip ?></td>
                      <td><?= $dd->nama ?></td>
                      <td><?= $dd->jabatan ?></td>
                      <td><?= $dd->unit_kerja ?></td>
                      <?php if ($dd->role == 1) { ?>
                        <td>User Admin</td>
                      <?php } else { ?>
                        <td>User Biasa</td>
                      <?php } ?>
                      <td><?= $dd->last_login ?></td>
                      <td class="text-center">
                        <a type="button" class="btn btn-info" href="<?= base_url('admin/update_user/' . $dd->id) ?>" name="btn_update" style="margin-right:20px;"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                        <a type="button" class="btn btn-danger btn-delete" href="<?= base_url('admin/proses_delete_user/' . $dd->id) ?>" name="btn_delete" style="margin:auto;"><i class="fa fa-trash" aria-hidden="true"></i></a>
                      </td>

                </tr>
              <?php endforeach; ?>
            <?php } else { ?>
              <td colspan="7" align="center"><strong>Data Kosong</strong></td>
            <?php } ?>
              </tbody>
            </table>
          </div>
          <!-- /.box-body -->
        </div>


        <!-- /.col -->
      </div>
      <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<footer class="main-footer">
  <div class="pull-right hidden-xs">
    <b>Version</b> 2.4.0
  </div>
  <strong>Copyright &copy; <?= date('Y') ?></strong>

</footer>
<div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?php echo base_url() ?>assets/web_admin/bower_components/jquery/dist/jquery.min.js"></script>
<script src="<?php echo base_url() ?>assets/sweetalert/dist/sweetalert.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url() ?>assets/web_admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url() ?>assets/web_admin/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>assets/web_admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url() ?>assets/web_admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url() ?>assets/web_admin/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() ?>assets/web_admin/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url() ?>assets/web_admin/dist/js/demo.js"></script>
<!-- page script -->
<script>
  jQuery(document).ready(function($) {
    $('.btn-delete').on('click', function() {
      var getLink = $(this).attr('href');
      swal({
        title: 'Delete Data',
        text: 'Yakin Ingin Menghapus Data ?',
        html: true,
        confirmButtonColor: '#d9534f',
        showCancelButton: true,
      }, function() {
        window.location.href = getLink
      });
      return false;
    });
  });

  // $(function() {
  //   $('#example1').DataTable({
  //     'paging': true,
  //     'lengthChange': false,
  //     'searching': false,
  //     'ordering': false,
  //     'info': true,
  //     'autoWidth': false

  //   })
  //   $('#example2').DataTable({
  //     'paging': true,
  //     'lengthChange': false,
  //     'searching': false,
  //     'ordering': true,
  //     'info': true,
  //     'autoWidth': false
  //   })
  // });
</script>
</body>

</html>