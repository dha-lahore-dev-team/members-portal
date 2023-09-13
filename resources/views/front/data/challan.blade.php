@extends('front.layouts.include')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Challan</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('front.index')}}">Home</a></li>
                            <li class="breadcrumb-item active">Challan</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header" style="background-color: #3d3f7e; color: white">
                                <h5>Generate Challan</h5>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">

                                            <select name="plot_id" id="plot_id" class="form-control"  >
                                                <option value="" selected>Choose Plot No</option>
                                                @foreach($dataSanple as $key=>$row)
                                                    <option value="{{$row->PLOT_ID}}">{{$row->PHASE_NO}}/{{$row->SECTOR_NAME}}/{{$row->PLOT_NO}}</option>
                                                    <input type="text" name="qey_id" id="qey_id" value="{{$row->QRY_ID}}" hidden>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-3 hideclass" style="display: none">
                                        <div class="info-box bg-light">
                                            <div class="info-box-content">
                                                <span class="info-box-text text-center text-muted">Total Dues</span>
                                                <span class="info-box-number text-center text-muted mb-0">PKR. <span id="tot_amt_info"></span>/-</span>
                                            </div>
                                            <!-- /.info-box-content -->
                                        </div>
                                        <!-- /.info-box -->
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-3 hideclass" style="display: none">
                                        <div class="info-box bg-light">
                                            <div class="info-box-content">
                                                <span class="info-box-text text-center text-muted">Amount Paid (till To-date)</span>
                                                <span class="info-box-number text-center text-muted mb-0">PKR. <span id="tot_paid_info"></span>/-</span>
                                            </div>
                                            <!-- /.info-box-content -->
                                        </div>
                                        <!-- /.info-box -->
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-3 hideclass" style="display: none">
                                        <div class="info-box bg-light">
                                            <div class="info-box-content">
                                                <span class="info-box-text text-center text-muted">Balance Amount</span>
                                                <span class="info-box-number text-center text-muted mb-0">PKR. <span id="tot_bal_info"></span>/-</span>
                                            </div>
                                            <!-- /.info-box-content -->
                                        </div>
                                        <!-- /.info-box -->
                                    </div>
                                </div>
                                <!-- Info boxes -->
                                <div class="row">
                                    <div class="col-12 hideclass" style="display: none">
                                        <div class="callout callout-success">
                                            <h5><i class="fas fa-info"></i> Payment Info:</h5>
                                            Upcoming Payment will only be selectable when Overdue payment is Null.
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-12 col-sm-6 col-md-3 hideclass" style="display: none">
                                        <div class="info-box bg-warning">
                                            <div class="info-box-content">
                                                <span class="info-box-text">Balance Amount</span>
                                                <span class="info-box-number">PKR. <span id="tot_bal"></span>/-</span>
                                            </div>
                                            <!-- /.info-box-content -->
                                        </div>
                                        <!-- /.info-box -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-12 col-sm-6 col-md-3 hideclass" style="display: none">
                                        <div class="info-box bg-danger">
                                            <div class="info-box-content">
                                                <span class="info-box-text">Over Due</span>
                                                <span class="info-box-number">PKR. <span id="tot_amt"></span>/-</span>
                                            </div>
                                            <!-- /.info-box-content -->
                                        </div>
                                        <!-- /.info-box -->
                                    </div>
                                    <!-- fix for small devices only -->
                                    <div class="clearfix hidden-md-up"></div>

                                    <div class="col-12 col-sm-6 col-md-3 hideclass" style="display: none">
                                        <div class="info-box bg-success">
                                            <div class="info-box-content">
                                                <span class="info-box-text">Upcoming Payment</span>
                                                <span class="info-box-number">PKR. <span id="up_amt"></span>/-</span>
                                            </div>
                                            <!-- /.info-box-content -->
                                        </div>
                                        <!-- /.info-box -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-12 col-sm-6 col-md-3 hideclass" style="display: none">
                                        <div class="info-box bg-info">
                                            <div class="info-box-content">
                                                <span class="info-box-text">Partial Payment</span>
                                                <span class="info-box-number"><span id="up_amt"></span> </span>
                                            </div>
                                            <!-- /.info-box-content -->
                                        </div>
                                        <!-- /.info-box -->
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->
                                <div class="row">
                                    <div class="col-md-3 hideclass" style="display: none">
                                        <div class="form-group">
                                            <div class="custom-control custom-radio">
                                                <input class="custom-control-input" type="radio" id="customRadio3" name="amount_total" >
                                                <label for="customRadio3" class="custom-control-label">Balance Amount</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3 hideclass" style="display: none">
                                        <div class="form-group">
                                            <div class="custom-control custom-radio">
                                                <input class="custom-control-input" type="radio" id="customRadio1" name="amount_total" >
                                                <label for="customRadio1" class="custom-control-label">Over Due</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3 hideclass" style="display: none">
                                        <div class="form-group">
                                            <div class="custom-control custom-radio">
                                                <input class="custom-control-input" type="radio" id="customRadio2" name="amount_total" >
                                                <label for="customRadio2" class="custom-control-label">Upcoming Payment</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3 hideclass" style="display: none">
                                        <div class="form-group">
                                            <div class="custom-control custom-radio">
                                                <input class="custom-control-input" value="0" type="radio" id="customRadio4" name="amount_total" >
                                                <label for="customRadio4" class="custom-control-label">Partial Payment</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 hideclass" style="display: none">
                                        <div class="form-group">
                                            <input  type="number" class="form-control" id="amount" onkeydown="if(event.key==='.'){event.preventDefault();}" onpaste="let pasteData = event.clipboardData.getData('text'); if(pasteData){pasteData.replace(/[^0-9]*/g,'');} "  placeholder="Amount" min="1" step="1" pattern="[0-9]">
                                        </div>
                                    </div>
                                    <div class="col-md-3 hideclass" style="display: none">
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-primary" value="Generate" id="genrate_chalan">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
        <!-- Main content -->
        <section class="content" id="content" style="display: none">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header" style="background-color: green; color: white">
                                <h5>Unpaid Challans</h5>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
<!--                                        <th>Plot No</th>-->
                                        <th>Challan No</th>
                                        <th>Reference No</th>
                                        <th>Total Amount (PKR)</th>
                                        <th>Due Date</th>
                                        <th>Action</th>
                                        {{--                                            <th>Action</th>--}}
                                    </tr>
                                    </thead>
                                    <tbody id="myTable">

                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
<!--    &lt;!&ndash; /.Card Payment-Modal &ndash;&gt;
    <div class="modal fade" id="CardPaymentPopupModal" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">X</button>
                </div>
                <div class="modal-body" style="padding-top: 0px;">
                    <h3 align="center">Credit Card Payment</h3>
                    <p>Payment Through Credit / Debit Card Will be Available Soon!</p>
                    <div style="clear:both;"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>-->
    <!-- /.Online Payment-Modal -->
    <div class="modal" id="OnlinePaymentDialogue" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">X</button>
                </div>
                <div class="modal-body" style="padding-top: 0px;">
                    <h3 align="centre">Payment Through 1-Bill</h3>
                    <ol>
                        <li>Log into your respective Online Banking Application (Any Bank).</li>
                        <li>Go to Bill Payments section.</li>
                        <li>Click on <strong>"1 Bill"</strong> option.</li>
                        <li>Click on <strong>"Invoice / Fixed Payments"</strong> Biller Option.</li>
                        <li>Click on <strong>"New Payee"</strong>.</li>
                        <li>Enter your Reference Number i.e. <strong><span id="ChallanId"></span></strong> and proceed to next step.</li>
                        <li>Billing details will be displayed.</li>
                        <li>Proceed further and make payment as advised by the application.</li>
                    </ol>
                    <div style="clear:both;"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" id="exampleModalTwo"  role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <section class="content">
                        <div class="container-fluid">
                            <div class="row" style="justify-content: center">
                                <div class="col-md-12 col-sm-12 col-12">
                                    <div class="card card-outline">
                                        <div class="card-body box-profile">
<!--                                            <div class="text-center">
                                                <img class="profile-user-img img-fluid img-circle" src="https://www.hbl.com/assets/theme_images/whatsapp/logo_whatsapp.png?12345" alt="User profile picture">
                                            </div>

                                            <h3 class="profile-username text-center">Habib Bank Limited</h3>

                                            <p class="text-muted text-center"><i class="fas fa-map-marker-alt mr-1"></i> Pakistan</p>-->

                                            <form action="{{ route('hbl',request()->getQueryString()) }}" method="POST" class="needs-validation" id="hbl-form">
                                                @csrf
                                                <input type="hidden" id="nch_id" name="ch_id" >
<!--                                                <input type="hidden" id="nplot_no"  name="plot_no" >
                                                <input type="hidden" id="nplot_id"  name="plot_id" >-->
                                                <input type="hidden" id="nref_no"  name="ref_no" >
                                                <input type="hidden" id="nmem_name" name="mem_name" >
                                                <input type="hidden" id="ndue_date" name="due_date" >
                                                <input type="hidden" id="namount_within" name="ch_amount_within" >
                                                <input type="hidden" id="namount_after" name="ch_amount_after" >
<!--                                                <input type="hidden" id="namt_in_words" name="amt_in_words" >-->
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h3 class="card-title">Personal Information</h3>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="form-group col-6">
                                                                <input type="text" name="fname" required class="form-control" placeholder="First Name" required maxlength="15">
                                                            </div>
                                                            <div class="form-group col-6">
                                                                <input type="text" name="lname" required class="form-control" placeholder="Last Name" required maxlength="15">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group col-12">
                                                                <input type="textarea" name="address" required class="form-control" placeholder="Address" required maxlength="50">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group col-6">
                                                                <input type="text" name="country" required class="form-control" placeholder="Country" required maxlength="15">
                                                            </div>
                                                            <div class="form-group col-6">
                                                                <input type="text" name="state" required class="form-control" placeholder="State" required maxlength="15">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group col-6">
                                                                <input type="text" name="city" required class="form-control" placeholder="City" required maxlength="15">
                                                            </div>
                                                            <div class="form-group col-6">
                                                                <input type="text" name="code" required class="form-control" placeholder="Postal Code" required maxlength="10">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group col-6">
                                                                <input type="email" name="email" required class="form-control" placeholder="E-Mail" required maxlength="30">
                                                            </div>
                                                            <div class="form-group col-6">
                                                                <input type="text" name="phone" required class="form-control" placeholder="Contact No" required maxlength="15">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <ul class="list-group list-group-unbordered mb-3">
                                                    <li class="list-group-item">
                                                        <b>Challan ID</b> <a class="float-right" id="ntref_no"></a>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <b>Due Date </b> <a class="float-right" id="ntduedate"></a>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <b>Challan Amount</b> <a class="float-right" id="ntammount"></a>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <b>Bank Fee (2.5%)</b> <a class="float-right" id="ntbankfee"></a>
                                                    </li>
                                                </ul>
                                                <button type="submit" class="btn btn-primary btn-block"><b>Pay Through Credit / Debit Card</b></button>
                                            </form>

                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                </div>

                            </div>
                        </div>
                    </section>
                </div>
                {{--                <div class="modal-footer">--}}
                {{--                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>--}}
                {{--                    <button type="button" class="btn btn-primary">Save changes</button>--}}
                {{--                </div>--}}
            </div>
        </div>
    </div>
    <script src="jquery-3.6.3.min.js"></script>
    <script>
        $('#amount').prop('readonly', true);
        $('input[type="radio"]').change(function() {
            if ($("#customRadio4").prop('checked')) {
                // append goes here
                $("#amount").val(0);
                $('#amount').prop('readonly', false);
            }else{
                $("#amount").val($(this).val());
                $('#amount').prop('readonly', true);
            }
        });
        $(document).on('change', 'select', function(event) {
            event.preventDefault();
            var plot_id = $(this).val();
            var qey_id = $('#qey_id').val();
            $.ajax({
                type: 'POST',
                url: '{{ route('fetchamount') }}',
                data: {
                    _token: "{{ csrf_token() }}",
                    plot_id: plot_id,
                    qey_id: qey_id,
                },
                success: function(response) {
                    console.log(response.amount[0].TOT_BAL)
                    if(response.amount[0].TOT_BAL==null){
                        $(".hideclass").hide();
                        //alert('Invalid Property Selected.')
                    }
                    else{
                        $(".hideclass").show();
                    }
                    // Radio Button with Values set here
                    $("#customRadio3").val(response.amount[0].TOT_BAL);
                    $("#customRadio1").val(response.amount[0].TOT_OVERDUE);
                    $("#customRadio2").val(response.amount[0].UPCOMING_INST_DUE_AMT);
                    $("#amount").val(response.amount[0].TOT_BAL);
                    $('input[id="customRadio3"]').prop('checked', true);
                    if(response.amount[0].TOT_OVERDUE!=0){
                        $('input[id="customRadio2"]').prop('disabled', true);
                    }
                    //TOP Info Boxes
                    $('#tot_amt_info').text(parseInt(response.amount[0].TOT_AMT).toLocaleString());
                    $('#tot_paid_info').text(parseInt(response.amount[0].TOT_PAID).toLocaleString());
                    $('#tot_bal_info').text(parseInt(response.amount[0].TOT_BAL).toLocaleString());

                    // Detail Info Box Values Display here
                    $('#tot_bal').text(parseInt(response.amount[0].TOT_BAL).toLocaleString());
                    $('#tot_amt').text(parseInt(response.amount[0].TOT_OVERDUE).toLocaleString());
                    /*                  $('#tot_paid').text(response.amount[0].TOT_PAID);*/
                    $('#up_amt').text(parseInt(response.amount[0].UPCOMING_INST_DUE_AMT).toLocaleString());
                }

            });
            $.ajax({
                type: 'POST',
                url: '{{ route('fetchunpaidchallans') }}',
                data: {
                    _token: "{{ csrf_token() }}",
                    plot_id: plot_id,
                },
                success: function (response) {
                    if (response == 0) {
                        //alert('Could not Generate Challan. Please Try Again')
                    } else {
                        $('#content').show();
                        // select the table body element
                        var tableBody = $('#myTable');
                        // create an array of data
                        var data = response;
// loop through the data and create a new row for each element
                        var event_data = '';
                        $.each(data, function (index, value) {
                            // Replace the placeholder ":ch_id" with the actual value of value.ch_id
                            var TOT_AMT = value.TOT_AMT;
                            event_data += '<tr class="'+ value.CH_NO + '">';
                            // event_data += '<td class="co">' + value.PLOT_NO + '</td>';
                            event_data += '<td class="co">' + value.CH_NO + '</td>';
                            event_data += '<td class="po">' + value.REF_NO + '</td>';
                            event_data += '<td class="sa">' + parseInt(TOT_AMT).toLocaleString() + '</td>';
                            event_data += '<td class="pr">' + value.DUE_DATE + '</td>';
                            event_data += '<td> <a data-toggle="modal" data-target="#exampleModalTwo" id="myModal" onclick="challanInformation('+value.CH_NO+')" class="btn btn-success editt">Pay Now</a>  <a href="#OnlinePaymentDialogue" class="btn btn-info edit OnlinePaymentPopup" data-toggle="modal" data-id="'+ value.REF_NO + '">Pay Online</a> <a href="{{route('challan.details',['ch_no'=>":CH_NO"])}}" class="btn btn-primary edit" target="_blank" id="'+ value.CH_NO + '">Print Challan</a>  </td>';

                            event_data += '</tr>';
                            event_data = event_data.replace(':CH_NO', value.CH_NO);
                            //event_data = event_data.replace(':plot_id', plot_id);
                        });

                        // append the new row to the table body
                        $("#myTable").empty();
                        $("#myTable").append(event_data);
                    }
                }
            });
        });
        $("#genrate_chalan").on("click", function () {
            var plot_id = $("#plot_id option:selected").val();
            var amount = Math.round($("#amount").val());
            //alert(amount);
            //exit();
            $.ajax({
                type: 'POST',
                url: '{{ route('fetchchallan') }}',
                data: {
                    _token: "{{ csrf_token() }}",
                    plot_id: plot_id,
                    amount: amount,
                },
                success: function (response) {
                    if (response == 0) {
                        alert('Could not Generate Challan. Please Try Again')
                    } else {

                        $('#content').show();
// select the table body element
                        var tableBody = $('#myTable');
                        // create an array of data
                        var data = response;
// loop through the data and create a new row for each element
                        var event_data = '';
                        $.each(data, function (index, value) {
                            // Replace the placeholder ":ch_id" with the actual value of value.ch_id
                            var TOT_AMT = value.TOT_AMT;
                            event_data += '<tr class="'+ value.CH_NO + '">';
                            event_data += '<td class="co">' + value.PLOT_NO + '</td>';
                            event_data += '<td class="co">' + value.CH_NO + '</td>';
                            event_data += '<td class="po">' + value.REF_NO + '</td>';
                            event_data += '<td class="sa">' + parseInt(TOT_AMT).toLocaleString() + '</td>';
                            event_data += '<td class="pr">' + value.DUE_DATE + '</td>';
                            event_data += '<td>  <a data-toggle="modal" data-target="#exampleModalTwo" id="myModal" onclick="challanInformation('+value.CH_NO+')" class="btn btn-success editt">Pay Now</a>    <a href="#OnlinePaymentDialogue" class="btn btn-info edit OnlinePaymentPopup" data-toggle="modal" data-id="'+ value.REF_NO + '">Pay Online</a> <a href="{{route('challan.details',['ch_no'=>":CH_NO"])}}" class="btn btn-primary edit" target="_blank" id="'+ value.CH_NO + '">Print Challan</a>  </td>';
                            event_data += '</tr>';
                            event_data = event_data.replace(':CH_NO', value.CH_NO);
                            //event_data = event_data.replace(':plot_id', plot_id);
                        });

                        // append the new row to the table body
                        $("#myTable").empty();
                        $("#myTable").append(event_data);
                    }

                    //console.log(response)
                }

            });

        });

        function getInformation(ch_id){
            $('#enter-data').text(ch_id);
            console.log(id)
        }

        function challanInformation(ch_id){
            console.log(ch_id)
            $.ajax({
                type: 'POST',
                url: '{{ route('challanapi') }}',
                data: {
                    _token: "{{ csrf_token() }}",
                    //ins_id: ins_id,
                    ch_id: ch_id,
                },
                success: function (response) {

                    var bill_status = response.BILL_STATUS;

                    var amt_after_due_date = parseInt(response.AMOUNT_AFTER_DUEDATE,0) / 100;

                    var amt_within_due_date = parseInt(response.AMOUNT_WITHIN_DUEDATE,0) / 100;
                    var bank_fee = Math.round((amt_within_due_date * 2.5)/100);
                    //var bank_fee = (amt_within_due_date * 2.5)/100;
                    if(bill_status=="P"){
                        alert ("Bill is Already Paid");
                    }else{
                        $('#ntref_no').text(response.REF_NO);
                        $('#ntduedate').text(response.DUE_DATE);
                        $('#ntammount').text(amt_within_due_date);
                        $('#addammount').text(amt_after_due_date);
                        $('#ntbankfee').text(bank_fee);
                        $('#nch_id').val(ch_id);
                        $('#nch_status').val(response.BILL_STATUS);
                        $('#nref_no').val(response.REF_NO);
                        $('#namount_within').val(amt_within_due_date);
                        $('#nammount_after').val(amt_after_due_date);
                        //$('#nplot_no').val(response.PLOT_NO);
                        //$('#nplot_id').val(response.PLOT_ID);
                        $('#nmem_name').val(response.CONSUMER_NAME);
                        $('#ndue_date').val(response.DUE_DATE);
                        //$('#nch_amount').val(response.TOT_AMT);
                        //$('#namt_in_words').val(response.AMT_IN_WORDS);
                    }

                    console.log(response.BILL_STATUS);
                }

            });
        }

        // Card Payment Popup Light Box display Called
        $("#myTable").on("click",".CardPaymentPopup", function(){
            alert("Payment Through Credit / Debit Card Will be Available Soon!");
        });
        $("#myTable").on("click",".OnlinePaymentPopup", function(){
            var ChallanId = $(this).data('id');
            var alert_text = "Log into your respective Online Banking Application (Any Bank). Go to Bill Payments section and click on 1Bill Option. Click on Invoice / Fixed Payments Biller Option. Click on New Payee and provide your Reference Number and proceed to next step. Billing details will be displayed. Proceed further and make payment as advised by the application. ";
            //alert(alert_text);
            //$('#OnlinePaymentPopupModal').modal('show');
            $(".modal-body #ChallanId").text(ChallanId);
        });

        $('#myModal').on('click', function() {
            console.log('Credit Card Modal Clicked')
            var elementId = $(this).attr('id');
            var elementValue = $(this).val();
        });
    </script>
@endsection
