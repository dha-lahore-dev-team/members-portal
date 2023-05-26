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
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <!-- Custom style -->
    <link rel="stylesheet" href="{{asset('front/dist/css/custom.css')}}">



</head>
<body class="hold-transition register-page">
<div class="register-box">
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <h1>PIN Code <b>Verification</b><h1>
        </div>
        <div class="card-body">

            <form action="{{route('otp.send')}}" method="post">
                @csrf
                <input type="hidden" value="{{$data['details']->id}}" name="details_id">
                <input type="hidden" value="{{$data['details']->QEY_ID}}" name="qey_id">

                <?php $a=7;?>
                @if($data['details']->CELL_NO)
                <div class="input-group mb-3">
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" name="customCheckbox3" type="checkbox" id="customCheckbox3" checked>
                        <label for="customCheckbox3" class="custom-control-label">I want to receive PIN Code on my registered Mobile No. ({{$data['masked_cell_no']}})</label>
                        <input type="hidden" name="phone" value="{{$data['details']->CELL_NO}}" class="form-control" placeholder="Phone#">
                    </div>
                </div>
                @endif
                @if($data['details']->EMAIL)
                <div class="input-group mb-3 email">
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input"  name="customCheckbox2" type="checkbox" id="customCheckbox2">
                        <label for="customCheckbox2" class="custom-control-label">I want to receive PIN Code on my registered Email Address ({{$data['masked_email']}})</label>
                        <input type="hidden"  name="email" value="{{$data['details']->email}}" class="form-control" placeholder="email">
                    </div>
                </div>
                @endif
                <div class="row">
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Send PIN Code</button>
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
    $(document).ready(function(){

        $('#customCheckbox2').click(function(){
            if($(this).prop("checked") == true){

                $("#customCheckbox3").prop("checked", false);
                $("#customCheckbox2").prop("checked", true);

            }
            else if($(this).prop("checked") == false){

                $("#customCheckbox2").prop("checked", false);
                $("#customCheckbox3").prop("checked", true);


            }
        });
        $('#customCheckbox3').click(function(){
            if($(this).prop("checked") == true){

                $("#customCheckbox2").prop("checked", false);
                $("#customCheckbox3").prop("checked", true);

            }
            else if($(this).prop("checked") == false){

                $("#customCheckbox3").prop("checked", false);
                $("#customCheckbox2").prop("checked", true);


            }
        });
    });



</script>
<script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
{!! Toastr::message() !!}
</body>
</html>
