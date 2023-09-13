<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>
        @yield('title')
    </title>
    <!-- SEO Meta Tags-->
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <!-- Viewport-->
    <meta name="_token" content="{{csrf_token()}}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon and Touch Icons-->
    <link rel="shortcut icon" href="favicon.ico">
    <!-- Font -->
    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="{{asset('public/assets/admin')}}/css/vendor.min.css">
    <link rel="stylesheet" href="{{asset('public/assets/admin')}}/vendor/icon-set/style.css">
    <link rel="stylesheet" href="{{asset('public/assets/admin')}}/css/custom.css">
    <!-- CSS Front Template -->
    <link rel="stylesheet" href="{{asset('public/assets/admin')}}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('public/assets/admin')}}/css/theme.minc619.css?v=1.0">
    <link rel="stylesheet" href="{{asset('public/assets/admin')}}/css/style.css">

    <script
        src="{{asset('public/assets/admin')}}/vendor/hs-navbar-vertical-aside/hs-navbar-vertical-aside-mini-cache.js"></script>
    <link rel="stylesheet" href="{{asset('public/assets/admin')}}/css/toastr.css">
    {{--stripe--}}
    <script src="https://polyfill.io/v3/polyfill.min.js?version=3.52.1&features=fetch"></script>
    <script src="https://js.stripe.com/v3/"></script>
<style>
    #loader {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5);
  z-index: 9999;
  display: flex;
  justify-content: center;
  align-items: center;
}

#loader img {
  width: 50px;
  height: 50px;
}
</style>
</head>
<!-- Body-->
<body class="toolbar-enabled">
<!-- Page Content-->
<div class="container pb-5 mb-2 mb-md-4">
    <div class="row">
        <div class="col-md-12 pt-5">
            <center class="">
                <h1>Payment Methods</h1>
                <p>Select the payment method you want to use.</p>
            </center>
        </div>
        <section class="col-lg-12">
            <div class="checkout_details mt-3">
                <div class="row" style="justify-content: center;">

                        <div class="col-md-4 mb-4 cursor-pointer">
                            <div class="card" onclick="$('#hbl-form').submit()">
                                <div class="card-body pt-2 h--100px " style="padding-top: 1.5rem !important;background: #FFFFFF;box-shadow: 0px 1px 4px rgba(0, 0, 0, 0.15);border-radius: 6px;">
                                    <form action="{{ route('hbl',request()->getQueryString()) }}" method="POST" class="needs-validation" id="hbl-form">
                                        <input type="hidden" value="{{ csrf_token() }}" name="_token"/>
                                        <button class="btn btn-block click-if-alone" type="submit">
                                            <img width="100"
                                                 src="{{asset('assets/admin/img/hbl.png')}}"/>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </section>
    </div>
</div>
<div id="loader">
  <img src="{{asset('public/assets/admin/img/loader.gif')}}" alt="Loading...">
</div>

<!-- JS Front -->
<script src="{{asset('public/assets/admin')}}/js/custom.js"></script>
<script src="{{asset('public/assets/admin')}}/js/vendor.min.js"></script>
<script src="{{asset('public/assets/admin')}}/js/theme.min.js"></script>
<script src="{{asset('public/assets/admin')}}/js/sweet_alert.js"></script>
<script src="{{asset('public/assets/admin')}}/js/toastr.js"></script>
<script src="{{asset('public/assets/admin')}}/js/bootstrap.min.js"></script>

{!! Toastr::message() !!}
<script>
  window.onload = function() {
    document.getElementById("loader").style.display = "none";
  };
</script>
<script>
  document.onreadystatechange = function () {
    if (document.readyState === 'complete') {
      document.getElementById("loader").style.display = "none";
    }
  }
</script>
<script>
    function click_if_alone() {
        let total = $('.checkout_details .click-if-alone').length;
        if (Number.parseInt(total) == 1) {
            $('.click-if-alone')[0].click()
            $('.checkout_details').html('<div class="text-center"><h1>Redirecting to the payment page ......</h1></div>');
        }
    }
    @if(!Session::has('toastr::messages'))
        // click_if_alone();
    @endif
</script>
</body>
</html>
