<!-- /.content-wrapper -->
<footer class="main-footer">

    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
        <b>Member Portal</b> DHA Lahore
    </div>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('front/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('front/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('front/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('front/plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('front/plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset('front/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('front/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('front/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('front/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('front/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('front/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('front/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('front/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('front/dist/js/adminlte.js')}}"></script>

<script src="{{asset('front/dist/js/pages/dashboard.js')}}"></script>

{{--<-- DataTables  & Plugins -->--}}
<script src="{{asset('front/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('front/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('front/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('front/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('front/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('front/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('front/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('front/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('front/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('front/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('front/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('front/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>

<!-- Select2 -->
<script src="{{asset('front/plugins/select2/js/select2.full.min.js')}}"></script>
<script>
    $(document).ready(function() {
        var total = 0;
        $('input[type="checkbox"]').click(function() {
            if ($(this).prop("checked") == true) {
                total += parseInt($(this).closest('tr').find('.amount').text());
            } else if ($(this).prop("checked") == false) {
                total -= parseInt($(this).closest('tr').find('.amount').text());
            }
            $('#total_amount').text(total);
        });
    });
</script>
{!! Toastr::message() !!}
<script>
    $(function () {
        // Summernote
        $('#summernote').summernote()
//Initialize Select2 Elements
        $('.select2').select2()
    })
</script>
<script>
    $(function () {
        $("#example1").DataTable({
            "paging": false,
            "responsive": true,
            "lengthChange": false,
            "searching": false,
            "autoWidth": false,
            "ordering": false,
            "info": false,
            "buttons": ["excel", "pdf", "print"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": false,
            "responsive": true,
            "lengthChange": false,
            "searching": false,
            "autoWidth": false,
            "ordering": false,
            "info": false,
        });
    });
</script>
</body>
</html>
