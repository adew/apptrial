

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Update User
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Satuan Barang</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <div class="container">
            <!-- general form elements -->
          <div class="box box-primary" style="width:94%;">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-fw fa-user" aria-hidden="true"></i> Update Users Data</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div class="container">
            <form action="<?=base_url('admin/proses_update_user')?>" role="form" method="post">

              <?php if($this->session->flashdata('msg_berhasil')){ ?>
                <div class="alert alert-success alert-dismissible" style="width:91%">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Success!</strong><br> <?php echo $this->session->flashdata('msg_berhasil');?>
               </div>
              <?php } ?>

              <?php if(validation_errors()){ ?>
              <div class="alert alert-warning alert-dismissible">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Warning!</strong><br> <?php echo validation_errors(); ?>
             </div>
            <?php } ?>

              <div class="box-body">
                <?php foreach($list_data as $d){ ?>
                  <input type="hidden" name="id" value="<?=$d->id?>">
                <div class="form-group" style="display:block;">
                  <label for="username" style="width:87%;margin-left: 0px;">Username</label>
                  <input type="text" name="username" style="width: 30%;margin-right: 67px;margin-left: 0px;"  required="" class="form-control" id="username" value="<?=$d->username?>">
                </div>
                <div class="form-group" style="display:block;">
                  <label for="email" style="width:73%;">Email</label>
                  <input type="email" name="email" style="width:30%;margin-right: 67px;" class="form-control" id="email" required="" value="<?=$d->email?>">
              </div>
              <div class="form-group" style="display:block;">
                <label for="role" style="width:73%;">Role</label>
                <select class="form-control" name="role" style="width:11%;margin-right: 18px;">
                  <?php if($d->role == 1){ ?>
                  <option value="1" selected="">User Admin</option>
                  <option value="0">User Biasa</option>
                  <?php }else{ ?>
                  <option value="1">User Admin</option>
                  <option value="0" selected="">User Biasa</option>
                  <?php } ?>
                </select>
            </div>
            <?php } ?>
              <!-- /.box-body -->
              <?php if(isset($token_generate)){ ?>
                <input type="hidden" name="token"  class="form-control" value="<?= $token_generate?>">
              <?php }else {
                redirect(base_url('admin/update_user'));
              }?>

              <div class="box-footer" style="width:93%;">
                <a type="button" class="btn btn-default" style="width:10%;margin-right:26%" onclick="history.back(-1)" name="btn_kembali"><i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali</a>
                <a type="button" class="btn btn-info" style="width:13%;margin-right:29%" href="<?=base_url('admin/users')?>" name="btn_listusers"><i class="fa fa-table" aria-hidden="true"></i> Lihat Users</a>
                <button type="submit" style="width:20%" class="btn btn-primary"><i class="fa fa-check" aria-hidden="true"></i> Submit</button>
              </div>
            </form>
          </div>
          </div>
          <!-- /.box -->

          <!-- Form Element sizes -->

          <!-- /.box -->


          <!-- /.box -->

          <!-- Input addon -->

          <!-- /.box -->

        </div>
        <!--/.col (left) -->
        <!-- right column -->
        <!-- <div class="col-md-6">
          <!-- Horizontal Form -->

          <!-- /.box -->
          <!-- general form elements disabled -->

          <!-- /.box -->

        </div>
        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 
