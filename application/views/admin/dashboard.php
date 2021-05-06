<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Data Pegawai
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?= base_url('admin') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Pegawai</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">

        <!-- /.box -->
        <div class="box box-primary">
          <!-- <div class="box-header">
              <h3 class="box-title"><i class="fa fa-fw fa-users" aria-hidden="true"></i> Users</h3>
            </div> -->
          <!-- /.box-header -->
          <div class="box-body">

            <div class="card">
              <div class="card-body p-0">
                <ul class="users-list clearfix">
                  <?php foreach ($list_data as $list => $value) : ?>
                    <li><a href="<?= base_url('admin/details/') . $value->nip ?>">
                        <img src="<?= base_url('uploads/profile/') . $value->foto_profil ?>" style="width:128px; height:128px;" alt="User Image">
                        <span class="users-list-name"><?= $value->nama ?></span>
                        <span class="users-list-date">NIP <?= $value->nip ?></span></a>
                    </li>
                  <?php endforeach; ?>
                  <!-- <li><a href="<?= base_url('admin/details') ?>">
                      <img src="<?= base_url() ?>dist/img/foto2.jpg" style="width:128px; height:128px;" alt="User Image">
                      <span class="users-list-name">RACHEL AGUSTINA PATTY, S.H.</span>
                      <span class="users-list-date">NIP 197001251990032001</span></a>
                  </li>
                  <li><a href="<?= base_url('admin/details') ?>">
                      <img src="<?= base_url() ?>dist/img/foto3.jpg" style="width:128px; height:128px;" alt="User Image">
                      <span class="users-list-name">HENDRI DUNAN MUSKITTA, S.H.</span>
                      <span class="users-list-date">NIP 197602231998031001</span></a>
                  </li>
                  <li><a href="<?= base_url('admin/details') ?>">
                      <img src="<?= base_url() ?>dist/img/foto4.jpg" style="width:128px; height:128px;" alt="User Image">
                      <span class="users-list-name">NOVA KARTIKA SARI, S.Pd., S.H.</span>
                      <span class="users-list-date">NIP 198111012005022002</span></a>
                  </li> -->

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