<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Member Portal | DHA Lahore</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('front/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{asset('front/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('front/dist/css/adminlte.min.css')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="{{asset('front/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css')}}">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{asset('front/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('front/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('front/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet" href="{{asset('front/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css')}}">
    <!-- BS Stepper -->
    <link rel="stylesheet" href="{{asset('front/plugins/bs-stepper/css/bs-stepper.min.css')}}">
    <!-- dropzonejs -->
    <link rel="stylesheet" href="{{asset('front/plugins/dropzone/min/dropzone.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('front/dist/css/adminlte.min.css')}}">
    <link rel="stylesheet" href="https://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <!-- Custom style -->
    <link rel="stylesheet" href="{{asset('front/dist/css/custom.css')}}">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
</head>
<body class="hold-transition register-page">
<div class="register-box">
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a href="#" class="h1"><b>Login</b>Page</a>
        </div>
        <div class="card-body">

            <form action="{{route('details')}}" method="post">
                @csrf
                <div class="form-group">
                    <label>Category</label>
                    <select id="category_id" name="category_id" class="form-control select2" style="width: 100%;">
                        <option id="category_id" selected="selected">Please Select Category</option>
                        @foreach($category as $row)
                        <option value="{{$row->PHS}}" >{{'PHS-'.$row->PHS}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Policy</label>
                    <select name="policy"id="policy" class="form-control select2" style="width: 100%;">

                    </select>
                </div>
                <div class="form-group">
                    <label>Insurance </label>
                    <input type="text" class="form-control" name="insurance" placeholder="Insurance ">
                </div>
                <div class="form-group">
                    <label>SSN </label>
                    <input type="text" class="form-control" name="ssn" placeholder="SSN ">
                </div>

                <div class="row">
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

        </div>
        <!-- /.form-box -->
    </div><!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{asset('front/plugins/jquery/jquery.min.js')}}"></script>

<!-- Bootstrap 4 -->
<script src="{{asset('front/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('front/dist/js/adminlte.min.js')}}"></script>
<!-- Select2 -->
<script src="{{asset('front/plugins/select2/js/select2.full.min.js')}}"></script>
<script>

        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2();

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
        });



            $('#category_id').change(function() {

            $('#policy').html('<option value="">Select Policy</option>');
            var id = $(this).val();
            $.ajax({
                type: 'POST',
                url: '{{route('fetchpolicy')}}',
                data: {
                    _token: "{{ csrf_token() }}",
                    phase: id,
                },
                dataType: 'json',
                async: false,
            success : function(response) {
            console.log(response);
            $.each(response, function(i, item) {

                $('#policy').append('<option value="'+item.SEC+'">'+item.SEC+'</option>');
        });

        },
            error: function() {
            $('#policy').html('<option value="">Policy Not Available</option>');
        }
        });

        });


</script>
</body>
</html>
