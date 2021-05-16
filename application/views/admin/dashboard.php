<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Data Kinerja Pegawai
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?= base_url('admin') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Kinerja Pegawai</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <!-- /.box -->
        <div class="box box-primary">
          <div class="box-body">
            <div class="card">
              <div class="card-body p-0">
                <ul class="users-list clearfix">
                  <?php foreach ($list_data as $list => $value) : ?>
                    <li><a href="<?= base_url('pkp/details/') . $value->nip ?>">
                        <img src="<?= base_url('uploads/profile/') . $value->foto_profil ?>" style="width:128px; height:128px;" alt="User Image">
                        <span class="users-list-name"><?= $value->nama ?></span>
                        <span class="users-list-date">NIP <?= $value->nip ?></span></a>
                    </li>
                  <?php endforeach; ?>
                </ul>
                <!-- /.users-list -->
              </div>

            </div>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
  </section>
  <!-- /.content -->
</div>