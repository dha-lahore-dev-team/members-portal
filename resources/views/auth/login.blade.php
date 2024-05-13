<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Member Portal DHA Lahore | Login</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('front/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{asset('front/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('front/dist/css/adminlte.min.css')}}">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="{{asset('front/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css')}}">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{asset('front/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('front/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('front/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet" href="{{asset('front/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css')}}">
    <!-- BS Stepper -->
    <link rel="stylesheet" href="{{asset('front/plugins/bs-stepper/css/bs-stepper.min.css')}}">
    <!-- dropzonejs -->
    <link rel="stylesheet" href="{{asset('front/plugins/dropzone/min/dropzone.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('front/dist/css/adminlte.min.css')}}">
    <link rel="stylesheet" href="https://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <!-- Custom style -->
    <link rel="stylesheet" href="{{asset('front/dist/css/custom.css')}}">

</head>
<body class="hold-transition register-page">
<div class="register-box">
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <img src="{{url('front/dist/img/logo_dhalahore.png')}}" alt="DHA Lahore Logo" height="80" width="80">
    		<br>
    		<br>

	    <h1><b>Member's </b> Login</h1>
        </div>
        <div class="card-body">

            <form action="{{route('details')}}" method="post">
                @csrf
                <div class="form-group">
                    <label>Phase<span style="color: red">*</span></label>
                    <select id="phase" name="phase" class="form-control select2" style="width: 100%;" required>
                        <option id="phase" selected="selected">Please Select Phase</option>
                        @foreach($phase as $row)
                            <option value="{{$row->PHS}}" >{{'PHASE-'.$row->PHS}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Sector<span style="color: red">*</span></label>
                    <select name="sector" id="sector" class="form-control select2" style="width: 100%;" required>

                    </select>
                </div>
                <div class="form-group">
                    <label>Plot No<span style="color: red">*</span></label>
                    <input type="text" maxlength="15" pattern="[0-9/]*" class="form-control" name="plot_no" placeholder="XXXX/XX " required>
                </div>
                <div class="form-group">
                    <label>CNIC<span style="color: red">*</span></label>
                    <input type="text" maxlength="15" pattern="[0-9]*" class="form-control" name="cnic_no" placeholder="XXXXXXXXXXXXX " required>
                </div>

                <div class="row">
                    <!-- /.col -->
		    <div class="form-group" >
                     <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="terms_conditions" required>
                        <label class="custom-control-label" for="terms_conditions">I have read and agree to the
                            <a  style="color: #3d3f7e;cursor: pointer;background-color: transparent;" class="TermsConditions"><u>Terms & Policies</u></a>.
                        </label>
                     </div>
                   </div>
                    <!-- /.col -->
                </div>


                <div class="row">
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

        </div>
        <!-- /.form-box -->
    </div><!-- /.card -->
</div>
<div class="row">
    <a href="#" class="faqs">Having trouble logging in?</a>
</div>
<!-- /.login-box -->
<div class="modal fade" id="TermsConditionsModal" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <button type="button" style="text-align: right;margin-right: 11px;" class="close" data-dismiss="modal">&times;</button>
            <div class="modal-body" style="padding-top: 0px;">
                <h2 align="center"><strong align="center">DHA LAHORE MEMBER AREA PORTAL</strong></h2>
                <h3 align="center">Terms &amp; Conditions </h3>
                <p><strong>It is highly forbidden to make an account on  the &quot;DHA Lahore Member Area Portal&quot; (hereinafter referred to as web  portal) using someone else's personal information; doing so can result in a  lifetime block and legal action may be taken against the offender.</strong></p>
                <p>Before using  this web portal, carefully read these terms of use. You acknowledge that you  have read and understood and accepted these terms of use and you agree to abide  by all applicable laws and regulations by using this website. Please refrain  from using the Portal if you do not agree to these terms of usage. Without  regard to their provisions on conflicts of law, the internal laws of the  Islamic state of Pakistan shall govern and interpret these terms &amp;  conditions.</p>
                <ol>
                    <li>The DHA Lahore <a href="http://www.dhalahore.org"><u>(https://dhalahore.org)</u></a>, which also runs the following child websites <a href="https://members.dhalahore.org"><u>(https://members.dhalahore.org)</u></a>, <a href="https://eservices.dhalahore.org"><u>(https://eservices.dhalahore.org)</u></a>, <a href="https://opp.dhalahore.org"><u>(https://opp.dhalahore.org)</u></a>, <a href="https://ballotapp.dhalahore.org"><u>(https://ballotapp.dhalahore.org)</u></a> and <u><strong>https://*.dhalahore.org</strong></u> is the  owner and operator of this website (the &quot;Site&quot;). The Site and its  contents may only be accessed for personal use. No content from dhalahore.org  or any other website that dhalahore.org owns, operates, licenses, or controls  may be used for any commercial or reselling purposes. No contents may also be  downloaded more than once for personal, non-commercial use, provided that all  copyright and other proprietary notices are preserved. No materials may also be  copied, reproduced, republished, uploaded, posted, communicated, or distributed  in any way. Dhalahore.org copyright and other intellectual rights are violated  if the materials are modified or used for any other reason.</li>
                    <li>Use of such  material on any other website or networked computer environment is prohibited  for the purposes of this Term. DHA LAHORE owns all trademarks, service marks,  and trade names (collectively, the &quot;Marks&quot;). It is expressly  forbidden to utilize material or descriptions, to create derivative works using  this website or its contents, or to use data mining, robots, or other similar  data collecting and extracting methods. The user is not permitted to frame any  part of the website or any of its contents.</li>
                    <li>Although DHA  LAHORE makes a good faith effort to include accurate and current material on  the Site, DHA LAHORE makes no warranties or claims as to its correctness. DHA  LAHORE disclaims all liability and responsibility for any inaccuracies or  omissions in the information included on this website.</li>
                    <li>The use  (including without limitation republication) or misuse of information that is  voluntarily or involuntarily made public through the Site by any third party is  beyond the control of DHA LAHORE, and DHA LAHORE shall have no liability for  any damages resulting there from. Be careful with the information you share if  you decide to provide any of your personally identifiable information as you do  so at your own risk.</li>
                    <li>You acknowledge  and agree that all activities that you participate in during the Event are  completely voluntary and carried out at your own risk and discretion. You  hereby assume all risks associated with all activities, including all risks of  financial or property loss to yourself or others. </li>
                    <li>This website  contains areas where additional terms and conditions apply. For the purpose of  using that area, in the event of any conflict between the terms and conditions  of the other area and these Terms and Conditions, the terms and conditions of  the other area shall prevail. DHA LAHORE may revise these Terms and Conditions  from time to time by updating this posting. You are bound by those revisions  and should therefore periodically visit this page to review the current Terms  of Service to which you are bound.</li>
                    <li>You must not submit  or upload malicious code to DHA Lahore website or any of its child websites or  use or misuse the data for your own commercial gain. &ldquo;Malicious code&rdquo; means any  software (sometimes referred to as &ldquo;Virus&rdquo;, &ldquo;Worm&rdquo;, &ldquo;Trojan Horse&rdquo;, &ldquo;Time  Bomb&rdquo;, &ldquo;Clock Lock&rdquo;, &ldquo;Device Blocker&rdquo;, &ldquo;Trap&rdquo;, &ldquo;Passcode&rdquo;, &ldquo;Cancelbots&quot; or  &quot;Trap Devices&quot;) that: (a) are designed to trap data, storage media,  programs, systems, equipment, or communications based on an event, including  but not limited to (i) exceeding the number of copies, (ii) exceeding number of  users, (iii) expiry of the term, (iv) forward to a certain date or a different  number, or (v) use a certain feature; or (b) will allow unauthorized persons to  use the result; or (c) will allow an unauthorized person to gain access to  another person's information without the other person's knowledge and  permission.</li>

                    <p><strong>(Prohibited Activities) You may not use the  dhalahore.org or its child websites for activities that:</strong></p>
                    <ol>
                        <ol type="a">
                            <li>Violating any  prevailing law, statute, ordinance or regulation</li>
                            <li>Links to the  promotion of commercial content (including website links) as the primary  purpose of registration, content generated by automated programs, unwanted  repetitive content, nonsensical content, or anything that appears to be a mass  solicitation.</li>
                            <li>&nbsp;In connection with transactions that
                                <ol>
                                    <li>Disclose personal  data to third parties in violation of applicable laws.</li>
                                    <li>Support pyramid  or Ponzi schemes, matrix programs, other get-rich-quick programs or certain  tiered marketing programs.</li>
                                    <li>Related to purchases real estate, annuity or  lottery contracts, tolerance schemes, offshore banking or credit card debt  financing or refinancing transactions.</li>
                                    <li>Intended for the  sale of a specified item before the seller takes possession of or owns the item.</li>
                                    <li>Originates from a payment processor to collect  payment for names of merchants.</li>
                                    <li>Associated with any of the following money  services activities: selling traveler's checks or money orders, currency  exchange or check cashing.</li>
                                    <li>Providing certain  credit repair or debt settlement services.</li>
                                </ol>
                            </li>
                            <li>Use of other  people's personal data</li>
                        </ol>
                    </ol>
                    <li>Termination. DHA  reserves the right to block your access to our websites for any reason. If your  account has been suspended, user shall not be allowed to create a replacement  account that engages in similar activity.</li>
                    <li>THE MATERIALS ON  THIS SITE ARE PROVIDED &quot;AS IS&quot; WITHOUT WARRANTIES OF ANY KIND, EITHER  EXPRESS OR IMPLIED. DHA LAHORE IS NOT RESPONSIBLE OR LIABLE FOR ANY CONTENT OR  MATERIAL PUBLISHED ON THE SITE. TO THE FULLEST EXTENT PERMITTED BY APPLICABLE  LAW, VOLUNTEERSPOT DISCLAIMS ALL WARRANTIES, EXPRESS OR IMPLIED, INCLUDING BUT  NOT LIMITED TO THE IMPLIED WARRANTIES OF MERCHANTABILITY, FITNESS FOR A  PARTICULAR PURPOSE, NON-INFRINGEMENT OR OTHERWISE.

                        <p><strong>Contributor  Warranty Disclaimer:</strong></p>

                    </li>
                    <li>YOU AGREE THAT DHA  LAHORE IS NOT RESPONSIBLE FOR OFFERS MADE BY THIRD PARTIES THROUGH OUR WEBSITE.  THIS INCLUDES THE FAILURE OF ANY GOODS OR SERVICES TO MEET YOUR EXPECTATIONS.</li>
                    <li>DHA LAHORE IS NOT  RESPONSIBLE FOR ANY FAILURE DUE TO OUR THIRD PARTY PAYMENT PROCESSES.</li>
                    <li>THE PROVISION OF  OUR SERVICES TO YOU IS CONDITIONED ON YOUR ACCEPTANCE OF THIS AND ALL OTHER  PARTS OF THIS AGREEMENT. </li>
                    <li>DHA LAHORE reserves  the right to amend these terms and conditions from time to time and will post  such changes on <a href="http://www.dhalahore.org">www.dhalahore.org</a> and its child websites. Changes will take  effect when posted. You may keep yourself updated with the new set of changes  by reading the Terms and visiting the Website regularly. You understand and  agree that your express acceptance of the Terms or your use of the Application  and Services after the posting date constitutes your acceptance of the updated  Terms and Policies. If you do not agree to the amended terms and policies, you  may end your relationship and immediately discontinue your access to web  portal.</li>
                    <li>These terms &amp;  conditions shall be governed by and construed in accordance with the law of  Pakistan, and the parties submit to the exclusive jurisdiction of the courts of  Lahore.</li>
                    <li>You agree that any cause of action brought by  you arising out of or related to your use of the service and/or the website  must commence within a period of six (06) months from the date of cause of  action.</li>
                </ol>



                <div style="clear:both;"></div>
                <button type="button" style="text-align: center;margin: auto;" class="close" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="faqsModal" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <button type="button" style="text-align: right;margin-right: 11px;" class="close" data-dismiss="modal">&times;</button>
            <div class="modal-body" style="padding-top: 0px;">
                <h2 align="center"><strong align="center">DHA LAHORE MEMBER AREA PORTAL</strong></h2>
                <h3 align="center">Frequently Asked Questions </h3>
                <p><strong>How can I log in to the Member's Area Portal?</strong><br>
                    To log in, you need to provide your plot number and CNIC. If the provided plot number and CNIC are valid and registered in the system, an OTP will be sent to your registered mobile number or email address for authentication.</p>
                <p><strong>What should I do if I encounter technical issues during login?</strong><br>
                    If you experience technical problems, such as login errors or issues accessing the portal, contact the portal's support team or customer service for assistance.</p>
                <p><strong>I am unable to Login, what should I do?</strong><br>
                    If you cannot find your registered phone number or email address associated with your plot and CNIC, we recommend updating your particulars. Contact us at <a href="https://dhalahore.org/customer-care/" target="_blank">Customer Care</a> and our team will assist you in updating your contact details.</p>
                <p><strong>Why should I change my contact details?</strong><br>
                    Keeping your contact details updated will ensure that you will receive important notifications, including OTPs for login and other relevant communication. By having accurate and up-to-date contact information, you can have a seamless experience with the Member's Area Portal.</p>

                <div style="clear:both;"></div>
                <button type="button" style="text-align: center;margin: auto;" class="close" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- jQuery -->
<script src="{{asset('front/plugins/jquery/jquery.min.js')}}"></script>

<!-- Bootstrap 4 -->
<script src="{{asset('front/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('front/dist/js/adminlte.min.js')}}"></script>
<!-- Select2 -->
<script src="{{asset('front/plugins/select2/js/select2.full.min.js')}}"></script>
<script src="https://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script>

    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2();

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })
    });



    $('#phase').change(function() {

        $('#sector').html('<option value="">Please Select Sector</option>');
        var id = $(this).val();
        $.ajax({
            type: 'POST',
            url: '{{route('fetchsector')}}',
            data: {
                _token: "{{ csrf_token() }}",
                phase: id,
            },
            dataType: 'json',
            async: false,
            success : function(response) {
                console.log(response);
                $.each(response, function(i, item) {

                    $('#sector').append('<option value="'+item.SEC+'">'+item.SEC+'</option>');
                });

            },
            error: function() {
                $('#sector').html('<option value="">Sector Not Available</option>');
            }
        });

    });


</script>

<script src="{{url('front/dist/js/bootstrap.min.js')}}" type="text/javascript" charset="utf-8" async defer></script>

<script type="text/javascript">
    // Terms & Conditions Light Box display Called
    $('.TermsConditions').click(function () {
        $('#TermsConditionsModal').modal({
            backdrop: 'static',
            keyboard: false
        });
    });

    // FAQs Light Box display Called
    $('.faqs').click(function () {
        $('#faqsModal').modal({
            backdrop: 'static',
            keyboard: false
        });
    });
</script>
{!! Toastr::message() !!}
</body>
</html>
