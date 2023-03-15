@extends('front.layouts.include')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Dashboard</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('front.index')}}">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row" style="justify-content: center" >
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="background-color: #3d3f7e; color: white">
                            <h3 class="card-title">Dashboard</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>Phase / Sector / Plot No</th>
                                    <th>Payment Schedule</th>
                                    <!-- <th>Payment Challan</th> -->
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $row)
                                    <tr>
                                        <td>{{$row->PHASE_NO}}/{{$row->SECTOR_NAME}}/{{$row->PLOT_NO}}</td>
                                        <td><a href="{{route('schedule',['plot_id'=>$row->PLOT_ID])}}">View</a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	<!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    <!-- /End of Dashboard -->


    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-6">
            <div class="card">
                   <div class="card-header" style="background-color: #3d3f7e; color: white">
                       <h3 class="card-title">Summary</h3>
                   </div>
              <div class="card-body">
		<table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>Ser #</th>
                      <th>Description</th>
                      <th>Amount (PKR)</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1.</td>
                      <td>Total Amount</td>
                      <td>2,650,000</td>
                    </tr>
                    <tr>
                      <td>2.</td>
                      <td>Amount Received</td>
                      <td>159,100</td>
                    </tr>
                    <tr>
                      <td>3.</td>
                      <td>Current Overdue Amount</td>
                      <td>1,490,900</td>
                    </tr>
                    <tr>
                      <td>4.</td>
                      <td>Balance Amount</td>
                      <td>2,490,900</td>
                    </tr>
		    <tr>
                      <td>5.</td>
                      <td>Total Dues Till (Date)</td>
                      <td>490,900</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <!-- /.col-md-6 -->
          <div class="col-lg-6">
            <div class="card">
                   <div class="card-header" style="background-color: #3d3f7e; color: white">
                       <h3 class="card-title">Generate Challan</h3>
                   </div>
              <div class="card-body">
                <div class="form-group">
			<div class="custom-control custom-radio">
                          <input class="custom-control-input" type="radio" id="customRadio1" name="customRadio">
                          <label for="customRadio1" class="custom-control-label">Total Amount</label>
                        </div>
		</div>
                <div class="form-group">
			<div class="custom-control custom-radio">
                          <input class="custom-control-input" type="radio" id="customRadio1" name="customRadio">
                          <label for="customRadio1" class="custom-control-label">Amount Received</label>
                        </div>
		</div>
                <div class="form-group">
			<div class="custom-control custom-radio">
                          <input class="custom-control-input" type="radio" id="customRadio1" name="customRadio">
                          <label for="customRadio1" class="custom-control-label">Current Overdue Amount</label>
                        </div>
		</div>
                <div class="form-group">
			<div class="custom-control custom-radio">
                          <input class="custom-control-input" type="radio" id="customRadio1" name="customRadio">
                          <label for="customRadio1" class="custom-control-label">Balance Amount</label>
                        </div>
		</div>
                <div class="form-group">
			<div class="custom-control custom-radio">
                          <input class="custom-control-input" type="radio" id="customRadio1" name="customRadio">
                          <label for="customRadio1" class="custom-control-label">Total Dues Till (Date)</label>
                        </div>
		</div>


		<div class="form-group">
			<input type="text"  name="partial_payment" class="form-control" id="partial_payment" placeholder="Enter Partial Payment Amount">
		</div>
		<a href="#" class="btn btn-primary">Generate</a>
              </div>
            </div>
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
    <!-- /End of Summary -->



        </div>
        <!-- /.row -->
      </div>
     <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
    <!-- /End of Summary -->

</div>


@endsection
