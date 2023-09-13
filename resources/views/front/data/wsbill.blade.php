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
                                    <td> <a data-toggle="modal" data-target="#exampleModalTwo" id="myModal" onclick="" class="btn btn-success editt">Pay Now</a>  <a href="#OnlinePaymentDialogue" class="btn btn-info edit OnlinePaymentPopup" data-toggle="modal" data-id="'+ value.REF_NO + '">Pay Online</a> <a href="{{route('challan.details',['ch_no'=>":CH_NO"])}}" class="btn btn-primary edit" target="_blank" id="'+ value.CH_NO + '">Print</a>  </td>
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


@endsection
