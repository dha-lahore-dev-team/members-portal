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
                            <select name="search" class="form-control select2" style="width: 250px;" onchange="location = this.options[this.selectedIndex].value;">
                                @foreach($dataSanple as $key=>$row)
                                    <option value="{{route('search.schedule',['plot_id'=>$row->PLOT_ID] ) }}" {{$row->PLOT_ID ? 'selected' : '' }}>
                                        {{$row->PHASE_NO}}/{{$row->SECTOR_NAME}}/{{$row->PLOT_NO}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th style="min-width: 45px">Ser #</th>
                                    <th style="min-width: 45px">Description</th>
                                    <th style="min-width: 75px">Due Date</th>
                                    <th style="min-width: 135px">Inst Amount (PKR)</th>
                                    <th>Challan No</th>
                                    <th style="min-width: 100px">Payment Date</th>
                                    <th style="min-width: 140px">Paid Amount (PKR)</th>
                                    <th style="min-width: 45px; text-align: center;">Status</th>
                                    <th style="min-width: 170px">Balance Amount (PKR)</th>
                                </tr>
                                </thead>
                              <tbody>
                              @foreach($data as $k=>$row)
                                <tr>
                                    <td style="text-align: center">{{$row->SERIAL_NO}}</td>
                                    <td>{{$row->COA_DESCRIPTION}}</td>
                                    <td>{{$row->DUE_DATE}}</td>
                                    <td style="text-align: center">{{number_format($row->INST_AMT)}}</td>
                                    <td>{{$row->CH_NO}}</td>
                                    <td>{{$row->PAY_DATE}}</td>
                                    <td style="text-align: center">{{$row->PAID_AMT}}</td>
                                    @if($row->INST_STATUS=='PAID')
                                        <td style="text-align: center"><span class="badge badge-success">Paid</span></td>
                                    @elseif($row->INST_STATUS=='OVERDUE')
                                        <td style="text-align: center"><span c  lass="badge badge-danger">Overdue</span></td>
                                    @elseif($row->INST_STATUS=='UPCOMING')
                                        <td style="text-align: center"><span class="badge badge-warning">Upcoming</span></td>
                                    @else
                                        <td style="text-align: center"><span class="badge badge-info">-</span></td>
                                    @endif
                                    <td style="text-align: center">{{number_format($row->BAL_AMT)}}</td>
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
