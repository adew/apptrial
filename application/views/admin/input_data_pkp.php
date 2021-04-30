  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            PKP
            <!-- <small>Human Resource Management System</small> -->
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">PKP</li>
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
                  <h3 class="box-title">Input Data PKP</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div class="form-panel">
                      <form class="form-horizontal style-form" action="input-departemen.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">NIP/NRP</label>
                              <div class="col-sm-8">
                                  <input name="id" type="text" id="id" class="form-control" placeholder="214912309402394" value="" autofocus="on" readonly="readonly" />
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Bulan</label>
                              <div class="col-sm-8">
                              <select name="bulan" id="bulan" class="form-control select2 select2-hidden-accessible" required="" tabindex="-1" aria-hidden="true">
                              <?php foreach ($bulan as $key=>$item):?>
                              <option value="<?= $key ?>"> <?= $item ?> </option>
                              <?php endforeach;?>                                                                                           										                                  
                              </select>                              
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">File PKP</label>
                               <div class="col-sm-8">
                      <input type="file" name="filepkp" class="form-control" id="filepkp">
                    </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Total Skor</label>
                              <div class="col-sm-8">
                                  <input name="totalskor" type="text" id="totalskor" class="form-control" placeholder="Skor" autocomplete="off" required />                               
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"></label>
                              <div class="col-sm-10">
                                  <input type="submit" name="simpan" value="Simpan" class="btn btn-sm btn-primary" />&nbsp;
	                              <a href="input-departemen.php" class="btn btn-sm btn-danger">Batal </a>
                              </div>
                          </div>
                      </form>
                  </div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->

            </section><!-- /.Left col -->
          </div><!-- /.row (main row) -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->