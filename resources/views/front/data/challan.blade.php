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

                                            <select name="plot_id" class="form-control"  >
                                                <option value="" selected>Please Select Plot No</option>
                                                @foreach($dataSanple as $key=>$row)
                                                    <option value="{{$row->PLOT_ID}}">{{$row->PHASE_NO}}/{{$row->SECTOR_NAME}}/{{$row->PLOT_NO}}</option>
                                                    <input type="text" name="qey_id" id="qey_id" value="{{$row->QRY_ID}}" hidden>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                        <!-- Info boxes -->
                                        <div class="row">
                                            <div class="col-12 col-sm-6 col-md-3 hideclass" style="display: none">
                                                <div class="info-box bg-info">
                                                    <div class="info-box-content">
                                                        <span class="info-box-text">Total Amount</span>
                                                        <span class="info-box-number">PKR. <span id="tot_amt"></span>/-</span>
                                                    </div>
                                                    <!-- /.info-box-content -->
                                                </div>
                                                <!-- /.info-box -->
                                            </div>
                                            <!-- /.col -->
                                            <div class="col-12 col-sm-6 col-md-3 hideclass" style="display: none">
                                                <div class="info-box bg-success">
                                                    <div class="info-box-content">
                                                        <span class="info-box-text">Amount Paid</span>
                                                        <span class="info-box-number">PKR. <span id="tot_paid"></span>/-</span>
                                                    </div>
                                                    <!-- /.info-box-content -->
                                                </div>
                                                <!-- /.info-box -->
                                            </div>
                                            <!-- /.col -->

                                            <!-- fix for small devices only -->
                                            <div class="clearfix hidden-md-up"></div>

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
                                                        <span class="info-box-text">Upcoming Payment</span>
                                                        <span class="info-box-number">PKR. <span id="up_amt"></span>/-</span>
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
                                                <input class="custom-control-input" type="radio" id="customRadio1" name="amount_total" >
                                                <label for="customRadio1" class="custom-control-label">Total Outstanding</label>
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
                                                <input class="custom-control-input" type="radio" id="customRadio3" name="amount_total" >
                                                <label for="customRadio3" class="custom-control-label">Full Payment</label>
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
                                            <input type="text" class="form-control" id="amount" placeholder="Amount" >
                                        </div>
                                    </div>
                                    <div class="col-md-3 hideclass" style="display: none">
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-primary" value="Generate" >
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
    </div>
    <script src="jquery-3.6.3.min.js"></script>
    <script>
        $('#amount').prop('readonly', true);
        $('input[type="radio"]').change(function() {
            if ($(this).val() == 0) {
                $("#amount").val(0);
                $('#amount').prop('readonly', false);
            } else{
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
                    $("#customRadio1").val(response.amount[0].TOT_OVERDUE);
                    $("#customRadio2").val(response.amount[0].TOT_RECEIVABLE_TILL_MONTH);
                    $("#customRadio3").val(response.amount[0].TOT_BAL);
                    $("#amount").val(response.amount[0].TOT_OVERDUE);
                    $('input[id="customRadio1"]').prop('checked', true);
                    $('#tot_amt').text(response.amount[0].TOT_AMT);
                    $('#tot_paid').text(response.amount[0].TOT_PAID);
                    $('#tot_bal').text(response.amount[0].TOT_BAL);
                    $('#up_amt').text(response.amount[0].UPCOMING_INST_DUE_AMT);
                }

            })
        });
    </script>
@endsection
