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
    <style>
        .disabled {
            pointer-events: none;
            color: gray;
        }
    </style>
</head>
<body class="hold-transition register-page">
<?php
$createdAt = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $otp->created_at);
$now = \Carbon\Carbon::now();
$diffInMinutes = $createdAt->diffInMinutes($now);
?>
<div class="register-box">
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <h1> PIN Code <b>Authentication</b><h1>
        </div>
        <div class="card-body">

            <form action="{{route('otp.verify')}}" method="post" id="yourForm">
                @csrf
                <input type="hidden" value="{{$otp->details_id}}" name="details_id">
                <input type="hidden" value="{{$otp->qey_id}}" name="qey_id" id="qey_id">
                {{--<input type="hidden" value="{{$otp->otp}}" name="otp">--}}
                <div class="form-group">
                    <label>Enter PIN Code </label>
                    <input type="text" required class="form-control" id="otp"  name="otp" placeholder=" Type Authentication PIN Code here...  ">
                </div>

                <div class="row">
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="button" class="btn btn-primary btn-block" id="verify">Verify</button>
                    </div>
                    <div class="col-4">
                        <p id="timer" style="color: #ced4da;font-size: 25px"></p>
                    </div>
                    <div class="col-4">
                        <a href="{{ route('resend',['id'=>$otp->id]) }}" id="disabled" class="btn btn-primary btn-block disabled">Resend</a>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

        </div>
        <!-- /.form-box -->
    </div><!-- /.card -->
</div>
<script src='https://code.jquery.com/jquery-3.6.0.min.js?ver=3.6.0' id='jquery-js'></script>
<script>
    // Set the timer duration in milliseconds
    var duration = 60 * 1000;

    // Update the timer display every second
    var intervalId = setInterval(function() {
        duration -= 1000;
        var minutes = Math.floor(duration / (60 * 1000));
        var seconds = Math.floor((duration % (60 * 1000)) / 1000);
        $("#timer").text(minutes + ":" + seconds);
        if (duration <= 0) {
            clearInterval(intervalId);
            $("#timer").text("OTP Expired");
            $('#disabled').removeClass('disabled');
            $('#verify').addClass('disabled');
            $('#otp').addClass('disabled');

        }
    }, 1000);
    $("#verify").on("click", function () {
        var qey_id = $("#qey_id").val();
        var otp = $("#otp").val();
        //alert(qey_id);
        //exit();
        $.ajax({
            type: 'POST',
            url: '{{ route('otpverify') }}',
            data: {
                _token: "{{ csrf_token() }}",
                qey_id: qey_id,
                otp: otp,
            },
            success: function (response) {

                if (response == 0) {
                    $('#yourForm').submit();
                } else {
                    $("#error-massage").show();
                    $("#error-massage").text(response);
                }

                // console.log(response)
            }

        });

    });
</script>
<!-- jQuery -->
<script src="{{asset('front/plugins/jquery/jquery.min.js')}}"></script>

<!-- Bootstrap 4 -->
<script src="{{asset('front/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('front/dist/js/adminlte.min.js')}}"></script>
<!-- Select2 -->
<script src="{{asset('front/plugins/select2/js/select2.full.min.js')}}"></script>
<script src="https://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
<script src="https://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
{!! Toastr::message() !!}



</body>
</html>
