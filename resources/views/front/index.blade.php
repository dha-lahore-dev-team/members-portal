@extends('front.layouts.include')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Welcome <strong></strong>{{Auth::user()->name}}!</h1>
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
                       <h3 class="card-title">Payment Through 1-Bill</h3>
                   </div>
              <div class="card-body">
                  <p class="text-muted well well-sm shadow-none" style="margin-top: 20px;">
                    <ol>
                      <li>Log into your respective Online Banking Application (Any Bank).</li>
                      <li>Go to Bill Payments section.</li>
                      <li>Click on <strong>"1 Bill"</strong> option.</li>
                      <li>Click on <strong>"Invoice / Fixed Payments"</strong> Biller Option.</li>
                      <li>Enter your Reference Number e.g. 342547XXXXXXXXXXX and proceed to next step.</li>
                      <li>Billing details will be displayed.</li>
                      <li>Proceed further and make payment as advised by the application.</li>
                    </ol>
                  </p>
              </div>
            </div>
          </div>
          <!-- /.col-md-6 -->
          <div class="col-lg-6">
            <div class="card">
                   <div class="card-header" style="background-color: #3d3f7e; color: white">
                       <h3 class="card-title">Payment Through Bank Deposit / Credit & Debit Card</h3>
                   </div>
                   <div class="card-body">
                       <!-- accepted payments column -->
                       <div>
                           <img src="{{asset('front/dist/img/credit/visa.png')}}" alt="Visa">
                           <img src="{{asset('front/dist/img/credit/mastercard.png')}}" alt="Mastercard">
                       {{--<img src="{{asset('front/dist/img/credit/american-express.png')}}" alt="American Express">--}}
                       {{--<img src="{{asset('front/dist/img/credit/paypal2.png')}}" alt="Paypal">--}}

                           <p class="text-muted well well-sm shadow-none" style="margin-top: 20px;">
                                <ol>
                                    <li>Once you are at the detail page of the application, you need to choose <strong>"Pay Through Debit/ Credit Card"</strong>.</li>
                                    <li>Specify the type of card i.e. Debit / Credit Card and whether it is a Visa or Mastercard.</li>
                                    <li>Please provide the information on the Payment Page.</li>
                                </ol>
                           </p>
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
