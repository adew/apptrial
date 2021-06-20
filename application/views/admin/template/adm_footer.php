<footer class="main-footer">
  <div class="pull-right hidden-xs">
    <b>Version</b> 1.0.0
  </div>
  <span>Copyright &copy; <?= date('Y') ?>.<b> Agent Of Change</b>.</span>
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

  function detail_cuti(url, nip) {
    $.ajax({
      url: url,
      type: "POST",
      dataType: 'JSON',
      success: function(response) {
        switch (response.data.jenis_cuti) {
          case 'cuti_tahunan':
            $j_cuti = 'Cuti Tahunan';
            break;
          case 'cuti_besar':
            $j_cuti = 'Cuti Besar';
            break;
          case 'cuti_sakit':
            $j_cuti = 'Cuti Sakit';
            break;
          case 'cuti_lahir':
            $j_cuti = 'Cuti Lahir';
            break;
          case 'cuti_alpen':
            $j_cuti = 'Cuti Alasan Penting';
            break;
          case 'cuti_dtn':
            $j_cuti = 'Cuti Diluar Tanggunggan Negara';
            break;
        }

        $('#dc1').text(response.data.nip);
        $('#dc2').text(response.data.nama);
        $('#dc3').text(response.data.jabatan);
        $('#dc4').text(response.data.unit_kerja);
        $('#dc5').text(response.data.masa_kerja + ' Tahun');
        $('#dc6').text(response.data.nomor_hp);
        $('#dc7').text(response.data.tgl_awal);
        $('#dc8').text(response.data.tgl_akhir);
        $('#dc9').text($j_cuti);
        $('#dc10').text(response.data.keterangan);
        $('#dc11').text(response.data.lama_cuti + ' Hari');
        $('#dc12').text(response.data.alamat_cuti);
        $('#dc13').text(response.data.nama1);
        $('#dc14').text(response.data.nama2);
        $('#detail-cuti').attr('data-id', response.data.id);
        if (response.data.status_pb == 2) {
          $('#approve_pb').html('');
          $('#approve_pb').html('<label style="padding:8px;" class="label label-danger"><i class="fa fa-info-circle" aria-hidden="true"></i>&nbspPengajuan cuti ditolak</label>');
        } else if (response.data.status_pb == 1) {
          $('#approve_pb').html('');
          $('#approve_pb').html('<label style="padding:8px;" class="label label-success"><i class="fa fa-info-circle" aria-hidden="true"></i>&nbspPengajuan cuti diterima</label>');
        } else {
          if (response.data.nip == nip) {
            $('#approve_pb').html('');
          } else {
            $('#approve_pb').html('');
            if (response.data.pejabat_berwenang == nip && response.data.status_al != 0) {
              $('#approve_pb').html('<a id="approve_pb1" style="margin-right: 5px;" href="<?= base_url('cuti/cutiditolak/pb') ?>" type="button" class="btn btn-sm btn-danger btn-reject"><i class="fa fa-times-circle"></i>Ditolak</a><a id="approve_pb2" href="<?= base_url('cuti/cutidisetujui/pb') ?>" class="btn btn-sm btn-success btn-accept"><span class="fa fa-check-circle"></span>Disetujui</a>');
            }
          }
        }
        //======================
        if (response.data.status_al == 2) {
          $('#approve_al').html('');
          $('#approve_al').html('<label style="padding:8px;" class="label label-danger"><i class="fa fa-info-circle" aria-hidden="true"></i>&nbspPengajuan cuti ditolak</label>');
        } else if (response.data.status_al == 1) {
          $('#approve_al').html('');
          $('#approve_al').html('<label style="padding:8px;" class="label label-success"><i class="fa fa-info-circle" aria-hidden="true"></i>&nbspPengajuan cuti diterima</label>');
        } else {
          if (response.data.nip == nip) {
            $('#approve_al').html('');
          } else {
            $('#approve_al').html('');
            if (response.data.atasan_langsung == nip) {
              $('#approve_al').html('<a id="approve_al1" style="margin-right: 5px;" href="<?= base_url('cuti/cutiditolak/al') ?>" type="button" class="btn btn-sm btn-danger btn-reject" name="btn_delete"><i class="fa fa-times-circle"></i>Ditolak</a><a id="approve_al2" href="<?= base_url('cuti/cutidisetujui/al') ?>" class="btn btn-sm btn-success btn-accept"><span class="fa fa-check-circle"></span>Disetujui</a>');
            }
          }
        }

        $('#detail-cuti').modal('show');

      }
    });
  }

  $("#detail-cuti").on("hidden.bs.modal", function() {
    location.reload();
  });

  // SELECT JATAH CUTI
  $('#nipjc').on('change', function() {
    var nip = $('#nipjc').val();
    var th = $('#tahunjc').val();
    load_jatah_cuti(nip, th);
  });

  $('#tahunjc').on('change', function() {
    var nip = $('#nipjc').val();
    var th = $('#tahunjc').val();
    load_jatah_cuti(nip, th);
  });


  function load_jatah_cuti(nip, th) {
    $.ajax({
      url: '<?= site_url("cuti/load_jatah_cuti/") ?>' + nip + '/' + th,
      type: "GET",
      dataType: 'JSON',
      success: function(response) {
        if (response.status == true) {
          $('#cuti_tahunan_pakai').val(response.data.c_tahunan_pakai);
          $('#cuti_besar_pakai').val(response.data.c_besar_pakai);
          $('#cuti_sakit_pakai').val(response.data.c_sakit_pakai);
          $('#cuti_lahir_pakai').val(response.data.c_lahir_pakai);
          $('#cuti_alpen_pakai').val(response.data.c_alpen_pakai);
          $('#cuti_dtn_pakai').val(response.data.c_dtn_pakai);

          $('#cuti_tahunan_sisa').val($('#cuti_tahunan_kuota').val() - response.data.c_tahunan_pakai);
          $('#cuti_besar_sisa').val($('#cuti_besar_kuota').val() - response.data.c_besar_pakai);
          $('#cuti_sakit_sisa').val($('#cuti_sakit_kuota').val() - response.data.c_sakit_pakai);
          $('#cuti_lahir_sisa').val($('#cuti_lahir_kuota').val() - response.data.c_lahir_pakai);
          $('#cuti_alpen_sisa').val($('#cuti_alpen_kuota').val() - response.data.c_alpen_pakai);
          $('#cuti_dtn_sisa').val($('#cuti_dtn_kuota').val() - response.data.c_dtn_pakai);
        } else {
          $('#cuti_tahunan_pakai').val('');
          $('#cuti_besar_pakai').val('');
          $('#cuti_sakit_pakai').val('');
          $('#cuti_lahir_pakai').val('');
          $('#cuti_alpen_pakai').val('');
          $('#cuti_dtn_pakai').val('');

          $('#cuti_tahunan_sisa').val('');
          $('#cuti_besar_sisa').val('');
          $('#cuti_sakit_sisa').val('');
          $('#cuti_lahir_sisa').val('');
          $('#cuti_alpen_sisa').val('');
          $('#cuti_dtn_sisa').val('');
        }


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
        // alert(jsonObject.status);
        if (jsonObject.status == true) {
          graph.setData(jsonObject.data);
        } else {
          $('#examplefirst').html('<span colspan="8" style="text-align:center">DATA KOSONG</span>');
        }

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

  $(document).on("click", ".btn-reject", function(e) {
    var getLink = $(this).attr('href') + '/' + $('#detail-cuti').attr('data-id');
    // alert(getLink);
    // return false;
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
                swal.close()
                if (response.pihak == "al") {
                  $('#approve_al').html('');
                  $('#approve_al').html('<label style="padding:8px;" class="label label-danger"><i class="fa fa-info-circle" aria-hidden="true"></i>&nbspPengajuan cuti ditolak</label>');
                } else {
                  $('#approve_pb').html('');
                  $('#approve_pb').html('<label style="padding:8px;" class="label label-danger"><i class="fa fa-info-circle" aria-hidden="true"></i>&nbspPengajuan cuti ditolak</label>');
                }
              });
            }, 300);
          }
        }
      });
    });
    return false;
  });

  $(document).on("click", ".btn-accept", function(e) {
    var getLink = $(this).attr('href') + '/' + $('#detail-cuti').attr('data-id');
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
                swal.close();
                if (response.pihak == "al") {
                  $('#approve_al').html('');
                  $('#approve_al').html('<label style="padding:8px;" class="label label-success"><i class="fa fa-info-circle" aria-hidden="true"></i>&nbspPengajuan cuti diterima</label>');
                } else {
                  $('#approve_pb').html('');
                  $('#approve_pb').html('<label style="padding:8px;" class="label label-success"><i class="fa fa-info-circle" aria-hidden="true"></i>&nbspPengajuan cuti diterima</label>');
                }
              });
            }, 300);
          }
        }
      });
    });
    return false;
  });

  $(document).on("click", "#example .export-word", function(e) {
    e.preventDefault;
    // var getLink = './exportword/' + $(this).attr('data-id');
    var getLink = $(this).attr('href');

    location.href = getLink;
  });

  $(function() {
    $(".select2").select2();
  });

  $("#tanggal_awal").datepicker({
    // dateFormat: 'dd-mm-yy',
    autoclose: true,
    todayHighlight: true,
    orientation: "top",
  })
  $("#tanggal_awal").datepicker({
    dateFormat: 'mm-dd-yy'
  });

  $("#tanggal_akhir").datepicker({
    // dateFormat: 'dd-mm-yy',
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
    $.ajax({
      url: '<?= site_url("cuti/notif_cuti/") ?>',
      dataType: 'JSON',
      async: false,
      contentType: "application/json; charset=utf-8",
      success: function(response) {
        // $('#notif_cuti').html(response.data.jumlah);
        // alert(response.data.jumlah);
        if (response.data.jumlah != 0) {
          $('#notif_cuti').html('<span class="label bg-red pull-right">' + response.data.jumlah + '</span>');
        }
      }
    });
  });

  $(document).ready(function() {
    $("li.nav-item a").on("click", function() {
      $(".nav-item.active").removeClass("active");
      $(this).parent().addClass("active");
    }).filter(function() {
      return window.location.href.indexOf($(this).attr('href').trim()) > -1;
    }).click();
  });

  // $('input#submitButton').click(function() {
  $("#form1").submit(function(event) {
    event.preventDefault();
    var getLink = $(this).attr('action');

    $.ajax({
      url: getLink,
      type: 'post',
      dataType: 'json',
      data: $('form#form1').serialize(),
      success: function(data) {
        if (data.status == true) {
          setTimeout(function() {
            swal({
              title: data.message,
              // text: "Message!",
              type: "success",
              timer: 2000,
              showConfirmButton: false
            }, function() {
              swal.close();
            });
          }, 300);
        }
      }
    });
  });
</script>
</body>

</html>