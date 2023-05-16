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
<?php
$createdAt = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $otp->created_at);
$now = \Carbon\Carbon::now();
$diffInMinutes = $createdAt->diffInMinutes($now);
?>
<div class="register-box" style="width: 35%">
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <h1><b>Authentication</b> PIN Code<h1>
        </div>
        <div class="card-body">

            <form action="{{route('otp.verify')}}" method="post">
                @csrf
                <input type="hidden" value="{{$otp->details_id}}" name="details_id">
                <input type="hidden" value="{{$otp->qey_id}}" name="qey_id">
                <input type="hidden" value="{{$otp->otp}}" name="otp">
                <div class="form-group">
                    <label>Enter PIN Code </label>
                    <input type="text" class="form-control"  name="otp" placeholder=" Type Authentication PIN Code here...  ">
                </div>

                <div class="row">
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Verify</button>
                    </div>
                    <div class="col-4">
                        <p id="timer" style="color: #ced4da;font-size: 25px"></p>

                    </div>
                    <div class="col-4">

                    </div>
                    <div class="col-4" style="margin-left: 20px">
                        <a href="{{ route('resend',['id'=>$otp->id]) }}">Resend</a>

                    </div>
                    <!-- /.col -->
                </div>
            </form>

        </div>
        <!-- /.form-box -->
    </div><!-- /.card -->
</div>


{{--<script>--}}
{{--    // Get the created_at timestamp from the Blade template--}}
{{--    var createdAt = "{{ $otp->created_at }}";--}}

{{--    // Convert the created_at string to a JavaScript Date object--}}
{{--    createdAt = new Date(createdAt);--}}

{{--    // Set the expiration time to 30 minutes from the created_at time--}}
{{--    var expirationTime = new Date(createdAt.getTime() + 30 * 60 * 1000);--}}
{{--    console.log(expirationTime);--}}
{{--    // Update the expiration time in the HTML every second--}}
{{--    setInterval(function() {--}}
{{--        var now = new Date();--}}
{{--        if (now >= expirationTime) {--}}
{{--            $("#expiration-time").text("Expired");--}}
{{--        } else {--}}
{{--            var timeLeft = (expirationTime - now) / 1000;--}}
{{--            $("#expiration-time").text(timeLeft + " seconds left");--}}
{{--        }--}}
{{--    }, 1000);--}}
{{--</script>--}}


<script>
    // Set the timer duration in milliseconds
    var duration = 183 * 1000;

    // Update the timer display every second
    var intervalId = setInterval(function() {
        duration -= 1000;
        var minutes = Math.floor(duration / (60 * 1000));
        var seconds = Math.floor((duration % (60 * 1000)) / 1000);
        $("#timer").text(minutes + ":" + seconds);
        if (duration <= 0) {
            clearInterval(intervalId);
            $("#timer").text("Time's up!");
        }
    }, 1000);
</script>
<script>

</script>
<!-- jQuery -->
<script src="{{asset('front/plugins/jquery/jquery.min.js')}}"></script>

<!-- Bootstrap 4 -->
<script src="{{asset('front/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('front/dist/js/adminlte.min.js')}}"></script>
<!-- Select2 -->
<script src="{{asset('front/plugins/select2/js/select2.full.min.js')}}"></script>
<script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
{!! Toastr::message() !!}



</body>
</html>
