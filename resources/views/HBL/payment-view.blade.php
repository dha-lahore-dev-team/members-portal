<html>
<head>
    <title>Merchant Check Out Page</title>
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
<script src="https://code.jquery.com/jquery-1.12.4.min.js"integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.2/rollups/aes.js"></script>                                                               
<body>
<center><h1>Please do not refresh this page...</h1></center>
<form method="Get" action="{{$payNowUrl}}" name="f1" id = "hbl-form">
</form>
<div id="loader">
  <img src="{{asset('public/assets/admin/img/loader.gif')}}" alt="Loading...">
</div>
<script src="{{asset('public/assets/admin')}}/js/custom.js"></script>
<script src="{{asset('public/assets/admin')}}/js/vendor.min.js"></script>
<script src="{{asset('public/assets/admin')}}/js/theme.min.js"></script>
<script src="{{asset('public/assets/admin')}}/js/sweet_alert.js"></script>
<script src="{{asset('public/assets/admin')}}/js/toastr.js"></script>
<script src="{{asset('public/assets/admin')}}/js/bootstrap.min.js"></script>
<script type="text/javascript">

window.onload = function() 
{
    document.getElementById("loader").style.display = "none";
    submitform();
};
document.onreadystatechange = function () {
    if (document.readyState === 'complete') {
        document.getElementById("loader").style.display = "none";
        }
    } 
function submitform()
{   
                                                                                                                                                                   
    document.getElementById("hbl-form").submit();
}
</script>
</body>
</html>