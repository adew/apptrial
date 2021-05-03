<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Details
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?= base_url('admin') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
      <li>Details</li>
      <!-- <li><a href="<?= base_url('admin/details/') . $this->uri->segment(3) ?>" class="active">Details</a></li> -->
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-6 align-self-stretch">
        <!-- /.box -->
        <div class="box box-primary">
          <!-- <div class="box-header">
              <h3 class="box-title"><i class="fa fa-fw fa-users" aria-hidden="true"></i> Users</h3>
            </div> -->
          <!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <div class="box-body box-profile">
                <span class=""><img class="profile-user-img img-responsive img-circle" src="<?= base_url('dist/img/') . $avatar ?>" alt="User profile picture"></span>
                <div class="table-responsive">
                  <table class="table">
                    <tbody>
                      <?php foreach ($data_user as $list => $value) : ?>
                        <tr>
                          <th style="width:30%">Nama</th>
                          <td><?= $value->nama ?></td>
                        </tr>
                        <tr>
                          <th>NIP</th>
                          <td><?= $value->nip ?></td>
                        </tr>
                        <tr>
                          <th>Jabatan</th>
                          <td><?= $value->jabatan ?></td>
                        </tr>
                        <tr>
                          <th>Unit Kerja</th>
                          <td><?= $value->unit_kerja ?></td>
                        </tr>
                      <?php endforeach; ?>

                    </tbody>
                  </table>
                </div>
                <!-- /.box-body -->
              </div>
            </div>

          </div>


        </div>
        <!-- /.box-body -->
      </div>
      <div class="col-md-6">
        <!-- /.box -->
        <div class="box box-primary">
          <!-- <div class="box-header">
              <h3 class="box-title"><i class="fa fa-fw fa-users" aria-hidden="true"></i> Users</h3>
            </div> -->
          <!-- /.box-header -->
          <!-- <h3 class="box-title">Data PKP Bulanan</h3> -->
          <div class="table-responsive">
            <table class="table no-margin">
              <thead>
                <tr>
                  <th>Bulan</th>
                  <th>Nama File</th>
                  <th>Score</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($data_pkp as $list => $value) : ?>
                  <tr>
                    <td><?= $value->bulan ?></td>
                    <td><a href="<?= base_url('uploads/') . $value->file_pkp ?>"><?= $value->file_pkp ?></td>
                    <td><span class="label label-success"><?= $value->skor ?></span></td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- <div class="box-header">
              <h3 class="box-title"><i class="fa fa-fw fa-users" aria-hidden="true"></i> Users</h3>
            </div> -->
          <!-- /.box-header -->

          <div class="box-body">
            <div class="box-body box-profile">
              <h3 class="box-title">Grafik</h3>
              <div class="graph-container">
                <div class="graph" id="examplefirst"> </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
</div>
</div>

<!-- /.col -->
</div>
<!-- /.row -->
</section>
<!-- /.content -->
</div>