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
                        <h1>Single Challan Page</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('front.index')}}">Policies</a></li>
                            <li class="breadcrumb-item active">Single Challan</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <section class="content">
            <div class="container-fluid">
                @if($find->code==100 || $find->code==100)
                    <h6 style="color: green;font-size: 20px; text-align: center">{{$responseMsg}}</h6>
                @else
                    <h6 style="color: red;font-size: 20px; text-align: center"">{{$responseMsg}}</h6>
                @endif
                <div></div>
        <div class="row" style="justify-content: center">
            <div class="col-md-6 col-sm-6 col-12">
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle" src="https://www.hbl.com/assets/theme_images/whatsapp/logo_whatsapp.png?12345" alt="User profile picture">
                        </div>

                        <h3 class="profile-username text-center">Habib Bank Limited</h3>

                        <p class="text-muted text-center"><i class="fas fa-map-marker-alt mr-1"></i> Pakistan</p>

                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Query ID</b> <a class="float-right">{{$find->q_id}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Response Code </b> <a class="float-right">{{$find->code}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Order Reference </b> <a class="float-right">{{$find->o_reference}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Payment Type </b> <a class="float-right">{{$find->p_type}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Challan Amount</b> <a class="float-right">PKR:{{$find->amount}}</a>
                            </li>
                        </ul>
{{--                        <form action="{{ route('hbl',request()->getQueryString()) }}" method="POST" class="needs-validation" id="hbl-form">--}}
{{--                            @csrf--}}
{{--                            <input type="hidden" name="ch_id" value="{{$find->ch_id}}">--}}
{{--                            <input type="hidden" name="qey_id" value="{{$find->qey_id}}">--}}
{{--                            <input type="hidden" name="status" value="{{$find->status}}">--}}
{{--                            <input type="hidden" name="due_date" value="{{$find->due_date}}">--}}
{{--                            <input type="hidden" name="ch_amount" value="{{$find->ch_amount}}">--}}
{{--                            <input type="hidden" name="ins_id" value="{{$find->ins_id}}">--}}
{{--                        <button type="submit" class="btn btn-primary btn-block"><b>Pay Payment</b></button>--}}
{{--                        </form>--}}
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>

        </div>
            </div>
        </section>

    </div>

@endsection
