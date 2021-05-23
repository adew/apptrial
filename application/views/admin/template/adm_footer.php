<footer class="main-footer">
  <div class="pull-right hidden-xs">
    <b>Version</b> 1.0.0
  </div>
  <strong>Copyright &copy; <?= date('Y') ?>.</strong>
</footer>

<!-- <div class="control-sidebar-bg"></div>
</div> -->
<!-- ./wrapper -->
<!-- <script src="https://code.jquery.com/jquery-1.8.3.min.js"></script>
<script src="https://code.jquery.com/ui/1.9.2/jquery-ui.js"></script> -->
<!-- jQuery 3 -->
<script src="<?php echo base_url() ?>assets/web_admin/bower_components/jquery/dist/jquery.min.js"></script>
<script src="<?php echo base_url() ?>assets/sweetalert/dist/sweetalert.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url() ?>assets/web_admin/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url() ?>assets/web_admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="<?php echo base_url() ?>assets/web_admin/bower_components/raphael/raphael.min.js"></script>
<script src="<?php echo base_url() ?>assets/web_admin/bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url() ?>assets/web_admin/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?php echo base_url() ?>assets/web_admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url() ?>assets/web_admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url() ?>assets/web_admin/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url() ?>assets/web_admin/bower_components/moment/min/moment.min.js"></script>
<script src="<?php echo base_url() ?>assets/web_admin/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?php echo base_url() ?>assets/web_admin/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url() ?>assets/web_admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url() ?>assets/web_admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url() ?>assets/web_admin/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() ?>assets/web_admin/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url() ?>assets/web_admin/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url() ?>assets/web_admin/dist/js/demo.js"></script>

<script src="<?php echo base_url() ?>assets/web_admin/bower_components/select2/dist/js/select2.full.min.js"></script>


<script>
  function delete_row(url) {
    // var getLink = $(this).attr('href');
    swal({
      title: '',
      text: 'Yakin Ingin Menghapus Data ?',
      html: true,
      confirmButtonColor: '#d9534f',
      showCancelButton: true,
    }, function() {
      // window.location.href = getLink
      $.ajax({
        url: url,
        type: "POST",
        dataType: 'JSON',
        success: function(response) {
          if (response.status == true) {
            setTimeout(function() {
              swal({
                title: "Data berhasil dihapus",
                // text: "Message!",
                type: "success",
                timer: 2000,
                showConfirmButton: false
              }, function() {
                window.location.reload();
              });
            }, 300);
          } else {
            setTimeout(function() {
              swal({
                title: "Data gagal dihapus",
                // text: "Message!",
                type: "error",
                timer: 2000,
                showConfirmButton: false
              }, function() {
                window.location = "<?= base_url('pkp/datapkp'); ?>";
              });
            }, 300);
          }

        }
      });
    });
    return false;
  }

  function detail_cuti(url) {
    $.ajax({
      url: url,
      type: "POST",
      dataType: 'JSON',
      success: function(response) {
        $('#dc1').text(response.data.nip);
        $('#dc2').text(response.data.nama);
        $('#dc3').text(response.data.jabatan);
        $('#dc4').text(response.data.unit_kerja);
        $('#dc5').text(response.data.masa_kerja + ' Tahun');
        $('#dc6').text(response.data.nomor_hp);
        $('#dc7').text(response.data.tgl_awal);
        $('#dc8').text(response.data.tgl_akhir);
        $('#dc9').text(response.data.jenis_cuti);
        $('#dc10').text(response.data.keterangan);
        $('#dc11').text(response.data.lama_cuti + ' Hari');
        $('#dc12').text(response.data.alamat_cuti);
        $('#dc13').text(response.data.nama1);
        $('#dc14').text(response.data.nama2);
        $('#detail-cuti').modal('show');

      }
    });
  }
</script>



<script>
  //GRAPH
  var months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
  $(document).ready(function() {
    var graph = Morris.Line({
      element: 'examplefirst',
      // data: jsonObject,
      xkey: 'label',
      ykeys: ['skor'],
      labels: ['2021'],
      xLabelFormat: function(x) { // <--- x.getMonth() returns valid index
        var month = months[x.getMonth()];
        return month;
      },
      dateFormat: function(x) {
        var month = months[new Date(x).getMonth()];
        return month;
      },
    });

    $.ajax({
      url: '<?= site_url("pkp/get_data/") . $this->uri->segment(3) ?>',
      dataType: 'JSON',
      async: false,
      contentType: "application/json; charset=utf-8",
      success: function(jsonObject) {
        graph.setData(jsonObject);
      }
    });
  });
  //GRAPH

  $('.btn-delete').on('click', function() {
    var getLink = $(this).attr('href');
    swal({
      title: '',
      text: 'Yakin Ingin Menghapus Data ?',
      html: true,
      confirmButtonColor: '#d9534f',
      showCancelButton: true,
    }, function() {
      window.location.href = getLink
    });
    return false;
  });

  $('.btn-reject').on('click', function() {
    var getLink = $(this).attr('href');
    swal({
      title: '',
      text: 'Anda akan menolak pengajuan cuti?',
      html: true,
      confirmButtonColor: '#d9534f',
      showCancelButton: true,
    }, function() {
      // window.location.href = getLink
      $.ajax({
        url: getLink,
        type: "POST",
        dataType: 'JSON',
        success: function(response) {
          if (response.status == true) {
            setTimeout(function() {
              swal({
                title: "Status berhasil diganti",
                // text: "Message!",
                type: "success",
                timer: 2000,
                showConfirmButton: false
              }, function() {
                window.location.reload();
              });
            }, 300);
          }
        }
      });
    });
    return false;
  });

  $('.btn-accept').on('click', function() {
    var getLink = $(this).attr('href');
    swal({
      title: '',
      text: 'Anda akan menyetujui pengajuan cuti?',
      html: true,
      confirmButtonColor: '#00a65a',
      showCancelButton: true,
    }, function() {
      // window.location.href = getLink
      $.ajax({
        url: getLink,
        type: "POST",
        dataType: 'JSON',
        success: function(response) {
          if (response.status == true) {
            setTimeout(function() {
              swal({
                title: "Status berhasil diganti",
                // text: "Message!",
                type: "success",
                timer: 2000,
                showConfirmButton: false
              }, function() {
                window.location.reload();
              });
            }, 300);
          }
        }
      });
    });
    return false;
  });

  $(function() {
    $(".select2").select2();
  });

  $("#tanggal_awal").datepicker({
    dateFormat: 'dd-mm-yy',
    autoclose: true,
    todayHighlight: true,
    orientation: "top",
  })

  $("#tanggal_akhir").datepicker({
    dateFormat: 'dd-mm-yy',
    autoclose: true,
    todayHighlight: true,
    orientation: "top",
  })
  // .on("change", function() {
  //   var start = $('#tanggal_awal').datepicker('getDate');
  //   var end = $('#tanggal_akhir').datepicker('getDate');
  //   var days = Math.floor((end - start) / 1000 / 60 / 60 / 24);
  //   if (days <= 12) {
  //     $('#lama_cuti').val(days);
  //   } else {
  //     alert('Tidak boleh lebih dari 12 hari');
  //     $('#tanggal_awal').datepicker("setDate", new Date());
  //     $('#tanggal_akhir').datepicker("setDate", new Date());
  //   }
  // });
  $(document).ready(function() {
    $("li.nav-item a").on("click", function() {
      $(".nav-item.active").removeClass("active");
      $(this).parent().addClass("active");
    }).filter(function() {
      return window.location.href.indexOf($(this).attr('href').trim()) > -1;
    }).click();
  });
</script>
</body>

</html>