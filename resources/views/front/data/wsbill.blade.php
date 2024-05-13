@extends('front.layouts.include')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Water Sewerage Bill</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('front.index')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Water Sewerage Bill</li>
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
                            <select name="search" class="form-control select2" style="width: 250px;" onchange="location = this.options[this.selectedIndex].value;">
                                @foreach($dataSanple as $key=>$row)
                                    <option value="{{route('search.history',['plot_id'=>$row->PLOT_ID] ) }}" {{$row->PLOT_ID ? 'selected' : '' }}>{{$row->PHASE_NO}}/{{$row->SECTOR_NAME}}/{{$row->PLOT_NO}}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th style="min-width: 45px">Plot No</th>
                                    <th style="min-width: 45px">Reference No</th>
                                    <th style="min-width: 90px">Billing Month</th>
                                    <th style="min-width: 90px">Due Date</th>
                                    <th style="min-width: 45px">Amount within Due Date</th>
                                    <th style="min-width: 110px">Amount After Due Date</th>
                                    <th style="min-width: 110px">Actions</th>
                                </tr>
                                </thead>
                              <tbody>
                              @foreach($data as $k=>$row)
                                <tr>
                                    <td>{{$row->PLOT_NO}}</td>
                                    <td>{{$row->CUST_REF_NO}}</td>
                                    <td>{{$row->BILLING_PRD}}</td>
                                    <td>{{$row->DUE_DATE}}</td>
                                    <td>{{number_format($row->AMT_WITHIN_DD)}}</td>
                                    <td>{{number_format($row->AMT_AFTER_DD)}}</td>
                                    <td> <a id="myModal" onclick="challanInformation({{ltrim($row->CUST_REF_NO, '342547')}})"  class="btn btn-success editt">Pay Now</a>  <a href="#OnlinePaymentDialogue" class="btn btn-info edit OnlinePaymentPopup" data-toggle="modal" data-id={{$row->CUST_REF_NO}}>Pay Online</a> <a href="{{route('print.waterbill',['ref_no'=>$row->CUST_REF_NO])}}" class="btn btn-primary edit" target="_blank" id={{$row->CUST_REF_NO}}>Print Bill</a>  </td>
                                </tr>
                              @endforeach
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
    <!-- /.Online Payment-Modal -->
    <div class="modal" id="OnlinePaymentDialogue" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">X</button>
                </div>
                <div class="modal-body" style="padding-top: 0;">
                    <h3 style="text-align: center">Payment Through 1-Bill</h3>
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
                    <!--                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
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
                                                <input type="hidden" id="val_ch_id" name="ch_id" >
                                                <input type="hidden" id="val_plot_no"  name="plot_no" >
                                                <!--                                                <input type="hidden" id="nplot_id"  name="plot_id" >-->
                                                <input type="hidden" id="val_ref_no"  name="ref_no" >
                                                <input type="hidden" id="val_mem_name" name="mem_name" >
                                                <input type="hidden" id="val_due_date" name="due_date" >
                                                <input type="hidden" id="val_amt_within" name="ch_amount_within" >
                                                <input type="hidden" id="val_amt_after" name="ch_amount_after" >
                                                <input type="hidden" id="val_amt_challan" name="amt_challan" >
                                                <input type="hidden" id="val_bank_fee" name="bank_fee" >
                                                <!--                                                <input type="hidden" id="namt_in_words" name="amt_in_words" >-->
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h3 class="card-title">Card Holder’s Information</h3>
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
                                                        <b>Plot No</b> <a class="float-right" id="nt_plot_no"></a>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <b>Challan No: </b> <a class="float-right" id="nt_ref_no"></a>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <b>Due Date: </b> <a class="float-right" id="nt_due_date"></a>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <b>Challan Amount: </b> <a class="float-right" id="nt_amt_challan"></a>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <b>Bank Fee (2.5%): </b> <a class="float-right" id="nt_bank_fee"></a>
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
    <script>
        function challanInformation(ch_id){
            //const str = ch_id;
            //ch_id = parseInt(str.toString().slice(6));
            console.log('challan ID = ' + ch_id)

            $.ajax({
                type: 'POST',
                url: '{{ route('challanapi') }}',
                data: {
                    _token: "{{ csrf_token() }}",
                    //ins_id: ins_id,
                    ch_id: ch_id,
                },
                success: function (response) {
                    var amt_challan;
                    var bill_status = response.BILL_STATUS;
                    var amt_after_due_date = parseInt(response.AMOUNT_AFTER_DUEDATE,0) / 100;
                    var amt_within_due_date = parseInt(response.AMOUNT_WITHIN_DUEDATE,0) / 100;
                    var challan_due_date = response.DUE_DATE;
                    console.log('Provided Date is ' + challan_due_date);
                    var year = challan_due_date.substring(0, 4);
                    var month = challan_due_date.substring(4, 6);
                    var day = challan_due_date.substring(6, 8);
                    var challan_due_date = year + "-" + month + "-" + day;
                    var CurrentDate = new Date();
                    var year = CurrentDate.getFullYear();
                    var month = (CurrentDate.getMonth() + 1).toString().padStart(2, '0'); // Months are 0-indexed, so we add 1
                    var day = CurrentDate.getDate().toString().padStart(2, '0');
                    var CurrentDate = year + "-" + month + "-" + day;
                    console.log("Current Date is " + CurrentDate + " and challan due date is " + challan_due_date);
                    if(challan_due_date > CurrentDate){
                        amt_challan = amt_within_due_date;
                        var bank_fee = Math.round((amt_within_due_date * 2.5)/100);
                        console.log('Challan date is Greater than the current date. Due Amount till current date is ' + amt_challan);
                    }else{
                        amt_challan = amt_after_due_date;
                        var bank_fee = Math.round((amt_after_due_date * 2.5)/100);
                        console.log('Challan date is Lower than the current date. Due Amount till current date is ' + amt_challan);
                    }
                    if(bill_status=="P"){
                        alert ("Bill is Already Paid");
                        return false;
                    }else{
                        var year = response.DUE_DATE.substring(0, 4);
                        var month = response.DUE_DATE.substring(4, 6);
                        var day = response.DUE_DATE.substring(6, 8);
                        const date = new Date();
                        date.setMonth(month - 1);
                        const formatter = new Intl.DateTimeFormat('en-us', {
                            month: 'short',
                        });
                        month = formatter.format(date);
                        var due_date = day + "-" + month + "-" + year;
                        $('#nt_ref_no').text(response.REF_NO);
                        $('#nt_due_date').text(due_date);
                        $('#nt_amt_within').text(amt_within_due_date);
                        $('#nt_amt_after').text(amt_after_due_date);
                        $('#nt_amt_challan').text(amt_challan);
                        $('#nt_bank_fee').text(bank_fee);
                        $('#nt_plot_no').text(response.RESERVED);
                        // Hidden fields data from here
                        $('#val_ch_id').val(ch_id);
                        $('#val_ch_status').val(response.BILL_STATUS);
                        $('#val_ref_no').val(response.REF_NO);
                        $('#val_amt_within').val(amt_within_due_date);
                        $('#val_amt_after').val(amt_after_due_date);
                        $('#val_amt_challan').val(amt_challan);
                        $('#val_bank_fee').val(bank_fee);
                        $('#val_plot_no').val(response.RESERVED);
                        $('#val_mem_name').val(response.CONSUMER_NAME);
                        $('#val_due_date').val(response.DUE_DATE);
                        //$('#nplot_id').val(response.PLOT_ID);
                        //$('#nch_amount').val(response.TOT_AMT);
                        //$('#namt_in_words').val(response.AMT_IN_WORDS);
                        //var elementId = $(this).attr('id');
                        //var elementValue = $(this).val();
                        $("#myModal").attr("data-toggle", "modal");
                        $("#myModal").attr("data-target", "#exampleModalTwo");
                        $("#exampleModalTwo").modal("show");
                    }

                    console.log('Bill Status = ' + response.BILL_STATUS);
                }

            });
        }

        $("#myTable").on("click",".OnlinePaymentPopup", function(){
            var ChallanId = $(this).data('id');
            var alert_text = "Login to your respective Online Banking Application (Any Bank). Go to Bill Payments section and click on 1Bill Option. Click on Invoice / Fixed Payments Biller Option. Click on New Payee and provide your Reference Number and proceed to next step. Billing details will be displayed. Proceed further and make payment as advised by the application. ";
            //alert(alert_text);
            //$('#OnlinePaymentPopupModal').modal('show');
            $(".modal-body #ChallanId").text(ChallanId);
        });
    </script>

@endsection
