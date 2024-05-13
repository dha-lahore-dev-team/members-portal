@extends('front.layouts.include')
<style>
    .select2-container {
        display: flow-root!important;
    }
</style>
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        @if($find->cc_response_code==100 || $find->cc_response_code==00 || $find->cc_response_code==0)
                            <h1 style="color: green;">Congratulations!</h1>
                        @else
                            <h1 style="color: red;">Transaction Failed!</h1>
                        @endif
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('front.index')}}">Challan </a></li>
                            <li class="breadcrumb-item active">Payments</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <section class="content">
            <div class="container-fluid">
                <p>{{$responseMsg}}</p>
                <div class="row">
                    <div class="col-12">
                        <div class="card card-outline">
                            <div class="card-header">
                                <h3 class="card-title"><strong>Transaction Details</strong></h3>
                            </div>
                            <div class="card-body">
                                <ul>
                                    <li class="list-group-item">
                                        <b>Order Reference No.: </b> <a class="float-right">{{$find->o_reference}}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Challan Amount (PKR):</b> <a class="float-right">{{$find->amt_challan}}/-</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-footer">

                            </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection
