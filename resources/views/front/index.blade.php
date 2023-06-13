@extends('front.layouts.include')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-8">
                        <h1>Welcome <strong></strong>{{Auth::user()->name}}!</h1>
                    </div>
                    <div class="col-sm-4">
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
                                    <th>Financial History</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $row)
                                    <tr>
                                        <td>{{$row->PHASE_NO}}/{{$row->SECTOR_NAME}}/{{$row->PLOT_NO}}</td>
                                        <td><a href="{{route('schedule',['plot_id'=>$row->PLOT_ID])}}">View</a></td>
                                        <td><a href="{{route('history.two')}}">View</a></td>
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
                       <h3 class="card-title">Payment Through 1-Bill (Pay Online)</h3>
                   </div>
              <div class="card-body">
                    <ol style="margin-top: 10px;">
                      <li>Log into your respective Online Banking Application (Any Bank).</li>
                      <li>Go to Bill Payments section.</li>
                      <li>Click on <strong>"1 Bill"</strong> option.</li>
                      <li>Click on <strong>"Invoice / Fixed Payments"</strong> Biller Option.</li>
                      <li>Enter your Reference Number e.g. 342547XXXXXXXXXXX and proceed to next step.</li>
                      <li>Billing details will be displayed.</li>
                      <li>Proceed further and make payment as advised by the application.</li>
                    </ol>
              </div>
            </div>
              <div class="card">
                  <div class="card-header" style="background-color: #3d3f7e; color: white">
                      <h3 class="card-title">Payment Through Credit & Debit Card (Pay Now)</h3>
                  </div>
                  <div class="card-body">
                      <!-- accepted payments column -->
                      <div>
                          <img src="{{asset('front/dist/img/credit/visa.png')}}" alt="Visa">
                          <img src="{{asset('front/dist/img/credit/mastercard.png')}}" alt="Mastercard">
                          {{--<img src="{{asset('front/dist/img/credit/american-express.png')}}" alt="American Express">--}}
                          {{--<img src="{{asset('front/dist/img/credit/paypal2.png')}}" alt="Paypal">--}}
                          <ol style="margin-top: 10px;">
                              <li>Once you have generated the challan, Click on the <strong>"Pay Now"</strong>.</li>
                              <li>Provide the Card information on the Payment Page.</li>
                              <li>Click on Proceed to complete the Process.</li>
                          </ol>
                      </div>
                      <!-- /.col -->
                  </div>
              </div>
          </div>
            <!-- /.col-md-6 -->
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header" style="background-color: #3d3f7e; color: white">
                        <h3 class="card-title">Over the Counter Payment</h3>
                    </div>
                    <div class="card-body">
                        <!-- accepted payments column -->
                        <div>
                            <p>Over the counter payment is also available through any of the following banks:-</p>
                            <ol style="margin-top: 10px;">
                                <li>Al Baraka Bank Pakistan Ltd.</li>		<li>  JS Bank</li>		<li>Meezan Bank Ltd.</li>
                                <li>Allied Bank Ltd.</li>			<li>MCB Bank Ltd.</li>	<li>Bank Islamic Ltd.</li>
                                <li>Askari Bank Ltd.</li>			<li>Sindh Bank Ltd.</li>
                                <li>Bank Al-Falah</li>				<li>Soneri Bank</li>
                                <li>Bank Al-Habib</li>				<li>The Bank of Punjab</li>
                                <li>Dubai Islamic Bank</li>			<li>United Bank Ltd.</li>
                                <li>Faysal Bank</li>				<li>National Bank of Pakistan</li>

                            </ol>
                        </div>
                        <!-- /.col -->
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
