<style>
  .users-list li.menunews:hover {
    background-color: #d6eae9 !important;
  }

  .users-list li a:hover .users-list-name {
    color: black !important;
  }
</style>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Data Kinerja Pegawai
    </h1>
    <!-- <ol class="breadcrumb">
      <li><a href="<?= base_url('admin') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Kinerja Pegawai</li>
    </ol> -->
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <section class="col-lg-12 connectedSortable">
        <div class="scroller box box-warning" style="overflow-y: scroll; max-height:500px;">
          <div class="box-body">
            <?php foreach ($list_data as $list => $value) : ?>
              <ul class="users-list">
                <!-- <div class="col-md-3 col-sm-6 col-xs-12"> -->
                <!-- <div class="col"> -->
                <li class="col-md-3 col-sm-6 col-xs-12 menunews"><a href="<?= base_url('pkp/details/') . $value->nip ?>">
                    <img src="<?= base_url('uploads/profile/') . $value->foto_profil ?>" style="max-width:128px; max-height:128px;" alt="User Image">
                    <span class="users-list-name" style="display: block;"><?= $value->nama ?></span>
                    <span class="user-list" style="display: block; color:black !important">NIP <?= $value->nip ?></span>
                  </a>
                </li>
                <!-- </div> -->
                <!-- </div> -->
              </ul>
            <?php endforeach; ?>
          </div>
        </div>
      </section>
    </div>
    <!-- /.col -->
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>