  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Cuti
        <!-- <small>Human Resource Management System</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Cuti</li>
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
              <h3 class="box-title">Input Data Cuti</h3>
            </div><!-- /.box-header -->
            <?php
            if (isset($_POST['simpan'])) {
              $kode          = $_POST['kode'];
              $nik           = $_POST['nik'];
              $tanggal_awal  = $_POST['tanggal_awal'];
              $tanggal_akhir = $_POST['tanggal_akhir'];
              $jumlah        = $_POST['jumlah'];
              $jenis_cuti    = $_POST['jenis_cuti'];
              $ket           = $_POST['ket'];
              $status        = $_POST['status'];

              $sql = mysqli_query($koneksi, "SELECT * FROM karyawan WHERE nik='$nik'");
              if (mysqli_num_rows($sql) == 0) {
                header("Location: cuti.php");
              } else {
                $row = mysqli_fetch_assoc($sql);
              }

              $jumlah_cuti = $row['jumlah_cuti'];
              $nama = $row['nama'];

              if ($jumlah_cuti == 0) {
                echo "<script>alert('cuti $nama sudah habis, tidak bisa membuat cuti!'); window.location = 'cuti.php'</script>";
              } else if ($jumlah_cuti <= 0) {
                echo "<script>alert('cuti $nama sudah habis, tidak bisa membuat cuti!'); window.location = 'cuti.php'</script>";
              } else {

                $query = mysqli_query($koneksi, "INSERT INTO cuti (kode, nik, tanggal_awal, tanggal_akhir, jumlah, jenis_cuti, ket, status) VALUES ('$kode', '$nik', '$tanggal_awal', '$tanggal_akhir', '$jumlah', '$jenis_cuti', '$ket', '$status')");

                $qu     = mysqli_query($koneksi, "UPDATE karyawan SET jumlah_cuti=(jumlah_cuti-'$jumlah') WHERE nik='$nik'");
                if ($query && $qu) {
                  echo "<script>alert('cuti $nama berhasil di buat!'); window.location = 'cuti.php'</script>";
                  //echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data berhasil disimpan.</div>';
                } else {
                  echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data gagal disimpan, silahkan coba lagi.</div>';
                }
              }
            }

            ?>
            <div class="box-body">
              <div class="form-panel">
                <form class="form-horizontal style-form" action="#" method="post" enctype="multipart/form-data" name="form1" id="form1">
                  <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Kode</label>
                    <div class="col-sm-4">
                      <input name="kode" type="text" id="kode" class="form-control" placeholder="Tidak perlu di isi" value="" autofocus="on" readonly="readonly" />
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Karyawan</label>
                    <div class="col-sm-4">
                      <select name="nik" id="nik" class="form-control select2" required>
                        <option value=""> --- Pilih Karyawan --- </option>

                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Tanggal Awal Cuti</label>
                    <div class="col-sm-4">
                      <input type='text' class="input-group date form-control" data-date="" data-date-format="yyyy-mm-dd" name='tanggal_awal' id="tanggal_awal" placeholder='Tanggal Awal Cuti' autocomplete='off' required='required' />

                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Tanggal akhir Cuti</label>
                    <div class="col-sm-4">
                      <input type='text' class="input-group date form-control" data-date="" data-date-format="yyyy-mm-dd" name='tanggal_akhir' id="tanggal_akhir" placeholder='Tanggal Akhir Cuti' autocomplete='off' required='required' />

                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Jumlah Cuti</label>
                    <div class="col-sm-1">
                      <input name="jumlah" type="text" id="jumlah_cuti" class="form-control" placeholder="Jumlah" value="0" autocomplete="off" readonly />
                      <!--<span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span>-->
                    </div>
                    <label class="col-sm-2 col-sm-2 control-label" style="text-align: left !important;">Hari</label>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Jenis Cuti</label>
                    <div class="col-sm-4">
                      <select name="jenis_cuti" id="jenis_cuti" class="form-control select2" required>
                        <option value=""> --- Pilih Jenis Cuti --- </option>

                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Keterangan</label>
                    <div class="col-sm-4">
                      <textarea name="ket" type="text" id="ket" class="form-control" placeholder="Keterangan" autocomplete="off" required></textarea>
                      <!--<span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span>-->
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Status</label>
                    <div class="col-sm-4">
                      <select name='status' id='status' class='form-control' required>
                        <option value="">-- Pilih Status --</option>
                        <option value="Approved">Approved</option>
                        <option value="Rejected">Rejected</option>
                        <option value="Pending">Pending</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label"></label>
                    <div class="col-sm-10">
                      <a type="button" onclick="history.back(-1)" class="btn btn-sm btn-danger">Batal </a>
                      <input type="submit" name="simpan" value="Simpan" class="btn btn-sm btn-primary" />&nbsp;
                    </div>
                  </div>
                </form>
              </div>
            </div><!-- /.box-body -->
            <!-- <div class="box-footer clearfix no-border">
      <a href="#" class="btn btn-default pull-right"><i class="fa fa-plus"></i> Tambah Admin</a>
    </div> -->
          </div><!-- /.box -->

        </section><!-- /.Left col -->
      </div><!-- /.row (main row) -->

    </section><!-- /.content -->
  </div><!-- /.content-wrapper -->