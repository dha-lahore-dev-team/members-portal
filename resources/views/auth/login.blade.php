<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Member Portal DHA Lahore | Login</title>

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
<div class="register-box" style="width: 25%">
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <img src="{{url('front/dist/img/logo_dhalahore.png')}}" alt="DHA Lahore Logo" height="80" width="80">
    		<br>
    		<br>

	    <h1><b>Member's </b> Login<h1>
        </div>
        <div class="card-body">

            <form action="{{route('details')}}" method="post">
                @csrf
                <div class="form-group">
                    <label>Phase<span style="color: red">*</span></label>
                    <select id="phase" name="phase" class="form-control select2" style="width: 100%;" required>
                        <option id="phase" selected="selected">Please Select Phase</option>
                        @foreach($phase as $row)
                            <option value="{{$row->PHS}}" >{{'PHASE-'.$row->PHS}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Sector<span style="color: red">*</span></label>
                    <select name="sector" id="sector" class="form-control select2" style="width: 100%;" required>

                    </select>
                </div>
                <div class="form-group">
                    <label>Plot No<span style="color: red">*</span></label>
                    <input type="text" class="form-control" name="plot_no" placeholder="XXXX/XX " required>
                </div>
                <div class="form-group">
                    <label>CNIC<span style="color: red">*</span></label>
                    <input type="text" class="form-control" name="cnic_no" placeholder="XXXXXXXXXXXXX " required>
                </div>

                <div class="row">
                    <!-- /.col -->
		    <div class="form-group" >
                     <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="terms_conditions" required>
                        <label class="custom-control-label" for="terms_conditions">I have read and agree to the <a  style="color: #3d3f7e;cursor: pointer;background-color: transparent;" class="TermsConditions"><u>Terms & Policies</u></a>.</label>
                     </div>
                   </div>
                    <!-- /.col -->
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
<div class="modal fade" id="TermsConditionsModal" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <button type="button" style="text-align: right;margin-right: 11px;" class="close" data-dismiss="modal">&times;</button>
            <div class="modal-body" style="padding-top: 0px;">
                <p><center><strong><u>TERMS &amp; CONDITIONS</u></strong></center></p>
                  <div align="justify">
                  <ol type="1">
                  <li>Applicant will upload Computerized  National Identity Card (original / coloured copy) of plot owner.</li>
                  <li>Challans will be sent at the  given email within 2-3 working days.</li>
                  <li>In Case of NDC / Site Plan  request:
                  <ol type="a">
                  <li>Challans for dues will be  issued as per due date mentioned on acknowledgement receipts issued by DHA&rsquo;s PR  Branch.</li>
                  <li>Applicant needs to upload  NDC / Site Plan slips along with scanned copy of original ID card.</li>
                  </ol>
                  </li>
                  <li>Challans will be valid till  the end of month.</li>
                  <li><strong><u>Payment  Instructions</u></strong><strong>:</strong>&nbsp;&nbsp; Customers can make payments through any of  the following methods:
                  <ol type="a">
                  <li>Online payments by using  Internet Banking and follow the instructions at DHA&rsquo;s website <a href="https://dhalahore.org/online-payment-procedure/">https://dhalahore.org/online-payment-procedure/</a> </li>
                  <li>Take a printout of challan  and deposit cash in our authorised / designated branches within DHA.</li>
                  <li>Through Pay Order / Demand  Draft in favour of &ldquo;<strong>DHA Lahore</strong>&rdquo; and  send it to DHA&rsquo;s Main office along with covering letter clearly mentioning plot  number and purpose of payment.</li>
                  </ol>
                  </li>
                  <li>Error and omissions expected  (E &amp; OE).</li>
                </ol>
            </div>


                <div style="clear:both;"></div>
                <button type="button" style="text-align: center;margin: auto;" class="close" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- jQuery -->
<script src="{{asset('front/plugins/jquery/jquery.min.js')}}"></script>

<!-- Bootstrap 4 -->
<script src="{{asset('front/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('front/dist/js/adminlte.min.js')}}"></script>
<!-- Select2 -->
<script src="{{asset('front/plugins/select2/js/select2.full.min.js')}}"></script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script>

    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2();

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })
    });



    $('#phase').change(function() {

        $('#sector').html('<option value="">Please Select Sector</option>');
        var id = $(this).val();
        $.ajax({
            type: 'POST',
            url: '{{route('fetchsector')}}',
            data: {
                _token: "{{ csrf_token() }}",
                phase: id,
            },
            dataType: 'json',
            async: false,
            success : function(response) {
                console.log(response);
                $.each(response, function(i, item) {

                    $('#sector').append('<option value="'+item.SEC+'">'+item.SEC+'</option>');
                });

            },
            error: function() {
                $('#sector').html('<option value="">Sector Not Available</option>');
            }
        });

    });


</script>

<script src="{{url('front/dist/js/bootstrap.min.js')}}" type="text/javascript" charset="utf-8" async defer></script>

<script type="text/javascript">
    // Terms & Conditions Light Box display Called
    $('.TermsConditions').click(function () {
        $('#TermsConditionsModal').modal({
            backdrop: 'static',
            keyboard: false
        });
    });
</script>
{!! Toastr::message() !!}
</body>
</html>
