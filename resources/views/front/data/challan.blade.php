@extends('front.layouts.include')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Generate Challan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('front.index')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Generate Challan</li>
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
                            <h3 class="card-title">Generate Challan</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Ser #</th>
                                    <th>Due Date</th>
                                    <th>Due Amount (PKR)</th>
                                    <th>Payment Date</th>
                                    <th>Paid Amount (PKR)</th>
                                    <th>Payment Status</th>
                                    <th>Balance Amount (PKR)</th>
                                    <th>Surcharge Amount (PKR)</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                              <tbody>
                              @foreach($data as $k=>$row)
                                <tr>
                                    <td>{{$row->INST_NO}}</td>
                                    <td>{{$row->DUE_DATE}}</td>
                                    <td>{{number_format($row->INST_AMT,2)}}</td>
                                    <td>{{$row->PAY_DATE}}</td>
                                    <td>{{number_format($row->PAID_AMT,2)}}</td>
                                    @if($row->BAL_AMT=='0.00')
                                        <td><span class="badge badge-success">Paid</span></td>
                                    @elseif($row->SUR_AMT!=null)
                                        <td><span class="badge badge-danger">Overdue Payment</span></td>
                                    @else
                                        <td><span class="badge badge-warning">Upcoming Payment</span></td>
                                    @endif
                                    <td class="amount">{{$row->BAL_AMT}}</td>
                                    @if($row->SUR_AMT==null)
                                        <td>0</td>
                                    @else
                                        <td>{{number_format($row->SUR_AMT,2)}}</td>
                                    @endif
                                    <td>
                                        @if($row->BAL_AMT!='0.00')
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox">
                                            </div>
                                        @endif
                                    </td>
                                </tr>
                              @endforeach
                              </tbody>
                                <tfoot>
                                <tr>
                                    <th rowspan="1" colspan="3" style="color: green">Total Amount:</th>
                                    <th rowspan="1" style="color: green" colspan="2" id="total_amount">0</th>
                                    <th rowspan="1" colspan="1"></th><th rowspan="1" colspan="1"></th>
                                    <th rowspan="1" colspan="1"></th><th rowspan="1" colspan="1"></th>
                                </tr>
                                </tfoot>
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
