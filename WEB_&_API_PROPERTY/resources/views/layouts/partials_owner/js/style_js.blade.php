<script src="/template/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="/template/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Select2 -->
<script src="{{ url('/template') }}/plugins/select2/js/select2.full.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
$.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="/template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="/template/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="/template/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="/template/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="/template/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="/template/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="/template/plugins/moment/moment.min.js"></script>
<script src="/template/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="/template/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="/template/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="/template/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="/template/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/template/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="/template/dist/js/pages/dashboard.js"></script>
<script src="/template/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/template/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="/template/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="/template/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="/template/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="/template/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="/template/plugins/jszip/jszip.min.js"></script>
<script src="/template/plugins/pdfmake/pdfmake.min.js"></script>
<script src="/template/plugins/pdfmake/vfs_fonts.js"></script>
<script src="/template/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="/template/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="/template/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script>
$(function () {
    $('.select2').select2(),
    $('.select2bs4').select2({
        theme: 'bootstrap4'
    }),
    $("#example1").DataTable({
        "responsive": true, "lengthChange": true, "autoWidth": false
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
    });
});
</script>