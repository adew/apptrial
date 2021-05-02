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
  $(document).ready(function() {

    var months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

    Morris.Line({
      element: 'examplefirst',
      data: [{
        m: '2021-01', // <-- valid timestamp strings
        // a: 0,
        b: 90
      }, {
        m: '2021-02',
        // a: 54,
        b: 92
      }, {
        m: '2021-03',
        // a: 243,
        b: 88
      }, {
        m: '2021-04',
        // a: 206,
        b: 89
      }, {
        m: '2021-05',
        // a: 161,
        b: 0
      }, {
        m: '2021-06',
        // a: 187,
        b: 0
      }, {
        m: '2021-07',
        // a: 210,
        b: 0
      }, {
        m: '2021-08',
        // a: 204,
        b: 0
      }, {
        m: '2021-09',
        // a: 224,
        b: 0
      }, {
        m: '2021-10',
        // a: 301,
        b: 0
      }, {
        m: '2021-11',
        // a: 262,
        b: 0
      }, {
        m: '2021-12',
        // a: 199,
        b: 0
      }, ],
      xkey: 'm',
      ykeys: ['a', 'b'],
      labels: ['2014', '2021'],
      xLabelFormat: function(x) { // <--- x.getMonth() returns valid index
        var month = months[x.getMonth()];
        return month;
      },
      dateFormat: function(x) {
        var month = months[new Date(x).getMonth()];
        return month;
      },
    });
  });

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