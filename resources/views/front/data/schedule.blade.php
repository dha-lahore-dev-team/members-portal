@extends('front.layouts.include')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Plot Payment Schedule</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('front.index')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Plot Payment Schedule</li>
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
                            <h3 class="card-title">Plot Payment Schedule</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Ser #</th>
                                    <th>Description</th>
                                    <th>Due Date</th>
                                    <th>Inst Amount (PKR)</th>
                                    <th>Challan No</th>
                                    <th>Payment Date</th>
                                    <th>Paid Amount (PKR)</th>
                                    <th>Payment Status</th>
                                    <th>Balance Amount (PKR)</th>
                                </tr>
                                </thead>
                              <tbody>
                              @foreach($data as $k=>$row)
                                <tr>
                                    <td>{{$row->SERIAL_NO}}</td>
                                    <td>{{$row->COA_DESCRIPTION}}</td>
                                    <td>{{$row->DUE_DATE}}</td>
                                    <td>{{number_format($row->INST_AMT,2)}}</td>
                                    <td>{{$row->CH_NO}}</td>
                                    <td>{{$row->PAY_DATE}}</td>
                                    <td>{{$row->PAID_AMT}}</td>
                                    @if($row->BAL_AMT=='0.00')
                                        <td><span class="badge badge-success">Paid</span></td>
                                    @elseif($row->SUR_AMT!=null)
                                        <td><span class="badge badge-danger">Overdue Payment</span></td>
                                    @else
                                        <td><span class="badge badge-warning">Upcoming Payment</span></td>
                                    @endif
                                    <td>{{number_format($row->BAL_AMT,2)}}</td>
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
