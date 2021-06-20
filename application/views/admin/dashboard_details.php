<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Details
    </h1>
    <!-- <ol class="breadcrumb">
      <li><a href="<?= base_url('admin') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
      <li>Details</li> -->
    <!-- <li><a href="<?= base_url('admin/details/') . $this->uri->segment(3) ?>" class="active">Details</a></li> -->
    <!-- </ol> -->
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row d-flex align-items-stretch">
      <div class="col-md-6">
        <!-- /.box -->
        <div class="box box-warning" style="height:350px;">
          <!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <div class="box-body box-profile">
                <span class=""><img class="profile-user-img img-responsive img-circle" src="<?php echo base_url('uploads/profile/' . $avatar) ?>" style="height:120px"></span>
                <br>
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
        <div class="scroller box box-warning" style="height:350px;">
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
                <?php if ($data_pkp != null) { ?>
                  <?php foreach ($data_pkp as $list => $value) : ?>
                    <tr>
                      <td><?= $value->bulan ?></td>
                      <td>
                        <?php if ($this->session->userdata('role') == 1) { ?>
                          <a href="<?= base_url('uploads/') . $value->file_pkp ?>"><?= $value->file_pkp ?></a>
                        <?php } else { ?>
                          <span><?= $value->file_pkp ?></span>
                        <?php } ?>

                      </td>
                      <td><span class="label label-success"><?= $value->skor ?></span></td>
                    </tr>
                  <?php endforeach; ?>
                <?php } else {
                  echo '<tr><td colspan="5" style="text-align:center">DATA KOSONG
                    </td><tr/>';
                } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="box box-warning">
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

<!-- /.col -->
</div>
<!-- /.row -->
</section>
<!-- /.content -->
</div>