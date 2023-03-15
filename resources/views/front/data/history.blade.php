@extends('front.layouts.include')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Plot Payment History</h1>
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
                                <option selected disabled>Please Select Plot No</option>
                                @foreach($dataSanple as $key=>$row)
                                    <option value="{{route('search.history',['plot_id'=>$row->PLOT_ID] ) }}">{{$row->PHASE_NO}}/{{$row->SECTOR_NAME}}/{{$row->PLOT_NO}}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Plot No</th>
                                    <th>Owner Name</th>
                                    <th>Challan No</th>
                                    <th>Reference No</th>
                                    <th>Issue Date</th>
                                    <th>Due Date</th>
                                    <th>Pay Date</th>
                                    <th>Amount (PKR)</th>
                                    <th>Amount (In Words)</th>
                                </tr>
                                </thead>
                              <tbody>
                              @foreach($data as $k=>$row)
                                <tr>
                                    <td>{{$row->PLOT_NO}}</td>
                                    <td>{{$row->MEM_NAME}}</td>
                                    <td>{{$row->CH_NO}}</td>
                                    <td>{{$row->REF_NO}}</td>
                                    <td>{{$row->ISSUE_DATE}}</td>
                                    <td>{{$row->DUE_DATE}}</td>
                                    <td>{{$row->PAY_DATE}}</td>
                                    <td>{{number_format($row->TOT_AMT,2)}}</td>
                                    <td>{{$row->AMT_IN_WORDS}}</td>
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
