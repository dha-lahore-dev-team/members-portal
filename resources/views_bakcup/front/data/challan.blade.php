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
                                            Following Info Boxes will reflect the complete Payment Details against the selected Plot No..
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-12 col-sm-6 col-md-3 hideclass" style="display: none">
                                        <div class="info-box bg-warning">
                                            <div class="info-box-content">
                                                <span class="info-box-text">All Dues</span>
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
                                                <label for="customRadio3" class="custom-control-label">All Dues</label>
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
                                        <th>Plot No</th>
                                        <th>Challan No</th>
                                        <th>Reference No</th>
                                        <th>Total Amount</th>
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
    <!-- /.Card Payment-Modal -->
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
    </div>
    <!-- /.Online Payment-Modal -->
    <div class="modal fade" id="OnlinePaymentDialogue" role="dialog">
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
                            event_data += '<td class="co">' + value.PLOT_NO + '</td>';
                            event_data += '<td class="co">' + value.CH_NO + '</td>';
                            event_data += '<td class="po">' + value.REF_NO + '</td>';
                            event_data += '<td class="sa">' + parseInt(TOT_AMT).toLocaleString() + '</td>';
                            event_data += '<td class="pr">' + value.DUE_DATE + '</td>';
                            event_data += '<td>  <button type="button" class="btn btn-success edit CardPaymentPopup" id="'+ value.CH_NO + '">Pay Now</button>    <a href="#OnlinePaymentDialogue" class="btn btn-info edit OnlinePaymentPopup" data-toggle="modal" data-id="'+ value.REF_NO + '">Pay Online</a> <a href="{{route('challan.details',['ch_no'=>":CH_NO"])}}" class="btn btn-primary edit" target="_blank" id="'+ value.CH_NO + '">Print Challan</a>  </td>';
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
                            event_data += '<td>  <button type="button" class="btn btn-success edit CardPaymentPopup" id="'+ value.CH_NO + '">Pay Now</button>    <a href="#OnlinePaymentDialogue" class="btn btn-info edit OnlinePaymentPopup" data-toggle="modal" data-id="'+ value.REF_NO + '">Pay Online</a> <a href="{{route('challan.details',['ch_no'=>":CH_NO"])}}" class="btn btn-primary edit" target="_blank" id="'+ value.CH_NO + '">Print Challan</a>  </td>';
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
        // Card Payment Popup Light Box display Called
        $("#myTable").on("click",".CardPaymentPopup", function(){
            $('#CardPaymentPopupModal').modal('show');
        });
        $("#myTable").on("click",".OnlinePaymentPopup", function(){
            var ChallanId = $(this).data('id');
            //alert(ChallanId);
            //$('#OnlinePaymentPopupModal').modal('show');
            $(".modal-body #ChallanId").text(ChallanId);
        });
    </script>
@endsection
