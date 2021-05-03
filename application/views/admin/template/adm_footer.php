<footer class="main-footer">
  <div class="pull-right hidden-xs">
    <b>Version</b> 2.4.0
  </div>
  <strong>Copyright &copy; <?= date('Y') ?></strong>
</footer>

<div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

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
      url: '<?= site_url("admin/get_data/") . $this->uri->segment(3) ?>',
      dataType: 'JSON',
      async: false,
      contentType: "application/json; charset=utf-8",
      success: function(jsonObject) {
        graph.setData(jsonObject);
      }
    });
  });
  // Morris.Line({
  //   element: 'examplefirst',
  //   data: [{
  //     label: '2021-01', // <-- valid timestamp strings
  //     skor: 90
  //   }, {
  //     label: '2021-02',
  //     skor: 92
  //   }, {
  //     label: '2021-03',
  //     skor: 88
  //   }, {
  //     label: '2021-04',
  //     skor: 89
  //   }, {
  //     label: '2021-05',
  //     skor: 0
  //   }, {
  //     label: '2021-06',
  //     skor: 0
  //   }, {
  //     label: '2021-07',
  //     skor: 0
  //   }, {
  //     label: '2021-08',
  //     skor: 0
  //   }, {
  //     label: '2021-09',
  //     skor: 0
  //   }, {
  //     label: '2021-10',
  //     skor: 0
  //   }, {
  //     label: '2021-11',
  //     skor: 0
  //   }, {
  //     label: '2021-12',
  //     skor: 0
  // }, ],
  // xkey: 'label',
  //   ykeys: ['skor'],
  //   labels: ['2021'],
  //   xLabelFormat: function(x) { // <--- x.getMonth() returns valid index
  //     var month = months[x.getMonth()];
  //     return month;
  //   },
  //   dateFormat: function(x) {
  //     var month = months[new Date(x).getMonth()];
  //     return month;
  //   },
  // });



  $('.btn-delete').on('click', function() {
    var getLink = $(this).attr('href');
    swal({
      title: 'Delete Data',
      text: 'Yakin Ingin Menghapus Data ?',
      html: true,
      confirmButtonColor: '#d9534f',
      showCancelButton: true,
    }, function() {
      window.location.href = getLink
    });
    return false;

  });
  $(function() {
    $(".select2").select2();
  });
</script>
</script>

<!-- <script>window.jQuery || document.write('<script src="js/libs/jquery-1.7.1.min.js"><\/script>')</script> -->
</body>

</html>