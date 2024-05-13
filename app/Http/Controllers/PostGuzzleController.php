<?php

namespace App\Http\Controllers;

use App\Mail\NotifyMail;
use App\Models\Details;
use App\Models\OtpDetails;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Mail;
use Auth;
use illuminate\support\Str;


class PostGuzzleController extends Controller
{
    public function index()
    {
        $username = 'lkasoidrhfpaspoe';
        $password = "f8c98f7e4c394b0796baaab0108b028f";
        $credentials = base64_encode("{$username}:{$password}");
        $client = new Client();
        $headers = [
            'Authorization' => 'Basic ' . $credentials,
            'X-API-KEY' => 'b8e25326-dfc4-4788-DHA-1011141'
        ];
        $response = $client->request('get', 'http://192.168.43.120/mems_infoportal/api/wb_info/memportalph', [
            'headers' => $headers,
        ]);
        $phase = json_decode($response->getBody()->getContents());
        return view('auth.login', compact('phase'));
    }


    public function fetchSector(Request $request)
    {
        $client = new Client();
        $username = 'lkasoidrhfpaspoe';
        $password = "f8c98f7e4c394b0796baaab0108b028f";
        $credentials = base64_encode("{$username}:{$password}");
        $headers = [
            'Authorization' => 'Basic ' . $credentials,
            'X-API-KEY' => 'b8e25326-dfc4-4788-DHA-1011141',
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Cookie' => 'ci_session=499e480351880278b3b10c6e9d7bf550070f78ba',
        ];
        $response = $client->request('get', 'http://192.168.43.120/mems_infoportal/api/wb_info/memportalsect?phase=' . $request->phase, [
            'headers' => $headers,
        ]);
        $phase = json_decode($response->getBody()->getContents());
        return $phase;
    }

    public function getDetails(Request $request)
    {
        $client = new Client();
        $username = 'lkasoidrhfpaspoe';
        $password = "f8c98f7e4c394b0796baaab0108b028f";
        $credentials = base64_encode("{$username}:{$password}");
        $headers = [
            'Authorization' => 'Basic ' . $credentials,
            'X-API-KEY' => 'b8e25326-dfc4-4788-DHA-1011141',
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'HOST' => 'members.dhalahore.org',
        ];
        $response = $client->request('get', 'http://192.168.43.120/mems_infoportal/api/wb_info/memportalaccess?phase=' . $request->phase . '&sect=' . $request->sector . '&plot_no=' . $request->plot_no . '&cnic_no=' . $request->cnic_no, [
            'headers' => $headers,
        ]);

        $phase = json_decode($response->getBody()->getContents());
        $user  = User::where('qey_id','=',$phase->QEY_ID)->first();
        if ($phase->RESPONSE_MESSAGE == 'VERIFIED') {
            $detials = new Details();
            $detials->phase = $request->phase;
            $detials->sector = $request->sector;
            $detials->plot_no = $request->plot_no;
            $detials->cnic_no = $request->cnic_no;
            $detials->QEY_ID = $phase->QEY_ID;
            $detials->CELL_NO = $phase->CELL_NO;
            $detials->EMAIL = $phase->EMAIL;
            //$detials->MEM_NAME = $phase->MAM_NAME;
            $detials->RESPONSE_MESSAGE = $phase->RESPONSE_MESSAGE;
            $detials->save();

            $user = new User();
            $user->email = $detials->EMAIL;
            $user->qey_id = $phase->QEY_ID;
            $user->name = $phase->MEM_NAME;
            $user->password = Hash::make('12345678');
            $user->save();
            $data['details'] = $detials;
            $data['masked_cell_no'] = Str::mask($detials->CELL_NO, '*', 2, -2);
            $data['masked_email'] = Str::mask($detials->EMAIL,'*', 2, -13);
            return view('front.auth.otp_send', compact('data'));
        }else{
            Toastr::error($phase->RESPONSE_MESSAGE,'Login Failed!');
            return redirect()->back();
        }
    }

    public function otpSend(Request $request)
    {
        $client = new Client();
        $username = 'lkasoidrhfpaspoe';
        $password = "f8c98f7e4c394b0796baaab0108b028f";
        $credentials = base64_encode("{$username}:{$password}");
        $headers = [
            'Authorization' => 'Basic ' . $credentials,
            'X-API-KEY' => 'b8e25326-dfc4-4788-DHA-1011141',
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'HOST' => 'members.dhalahore.org',
        ];
        //$api_url = 'http://192.168.43.120/mems_infoportal/api/wb_info/memportalaccess?phase=' . $request->phase . '&sect=' . $request->sector . '&plot_no=' . $request->plot_no . '&cnic_no=' . $request->cnic_no;
        //dd($api_url);
        $response_one = $client->request('get', 'http://192.168.43.120/mems_infoportal/api/wb_info/memportalaccess?phase=' . $request->phase . '&sect=' . $request->sector . '&plot_no=' . $request->plot_no . '&cnic_no=' . $request->cnic_no, [
            'headers' => $headers,
        ]);
        $phase = json_decode($response_one->getBody()->getContents());
        //dd($request);
        //$otpp = mt_rand(1000000, 9999999);
        $otpp = '123456';
	$otp_text = 'This is an automated SMS from DHA Members Portal. Your verification PIN is ' . $otpp . '. Please enter the PIN for instant verification. Thank you!';
        $otp = new OtpDetails();
        $otp->details_id = $request->details_id;
        $otp->qey_id = $request->qey_id;
        $otp->otp = $otpp;
        //$otp->check = $request->customCheckbox2;
        //$otp->check = $request->radio1;
        //{{dd($request);}}
        if ($request->radio1 == "email") {
	    // Email Using the Laravel Library
            ///*
		$otp->check = 2;
            $otp->send = $phase->EMAIL;
            $details = [
                'otp' => $otp_text,];
            Mail::to($phase->EMAIL)->send(new NotifyMail($details));
	    $otp->save();
            Toastr::success('PIN Code Sent at Registered Email Address Successfully','Success');
            return view('front.auth.otp_verify', compact('otp'));
	    //*/
	    // Email Through Laravel Completes here
	    // Email Using the API System
	    /*
            $otp->check = 2;
            $client = new Client();
            $username = 'dhalhrgapisys';
            $password = "f8c98f7e4c394b0796b84jfgfb0108b028f";
            $credentials = base64_encode("{$username}:{$password}");
            $headers = [
                'Authorization' => 'Basic ' . $credentials,
                'X-API-KEY' => 'b8e25326-keys-4788-gapi-9c4ca0ceb555',
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ];
            $send_otp = $client->request('get', 'http://10.1.1.165/apinet/api/application_info/email?email_from=no-reply@dhalahore.org&email_from_name=No Reply&email_to='.$phase->EMAIL.'&email_subject=OTP - DHA Lahore Member Portal&email_message='. $otp_text, [
                'headers' => $headers,
            ]);
            $send_otp_response = json_decode($send_otp->getBody()->getContents());
	    if($send_otp_response->STATUS_ID=='00'){
                $otp->save();
            	Toastr::success('PIN Code Sent at Registered Email Address Successfully','Success');
            	return view('front.auth.otp_verify', compact('otp'));
            }else{
                Toastr::error('Failed to send PIN Code. Please try again :)','danger');
                return view('front.auth.otp_verify', compact('otp'));
            }
	    */
	    // Email Through API Completes here
        } else {
            $otp->send = $phase->CELL_NO;
            $otp->check = 1;
            $client = new Client();
            $username = 'dhalhrgapisys';
            $password = "f8c98f7e4c394b0796b84jfgfb0108b028f";
            $credentials = base64_encode("{$username}:{$password}");
            $headers = [
                'Authorization' => 'Basic ' . $credentials,
                'X-API-KEY' => 'b8e25326-keys-4788-gapi-9c4ca0ceb555',
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ];
            $send_otp = $client->request('get', 'http://10.1.1.165/apinet/api/application_info/smstitel?mobile_no='.$otp->send.'&message='.$otp_text, [
                'headers' => $headers,
            ]);
            $send_otp_response = json_decode($send_otp->getBody()->getContents());
            if($send_otp_response->STATUS_ID=='013'){
                $otp->save();
                Toastr::success('PIN Code Sent at Registered Cell No Successfully','Success');
                return view('front.auth.otp_verify', compact('otp'));
            }else{
                Toastr::error('Failed to send PIN Code. Please try again :)','danger');
                return view('front.auth.otp_verify', compact('otp'));
            }
        }
    }

    public function otpVerify(Request $request)
    {
        $otp = OtpDetails::where('qey_id', '=', $request->qey_id)->first();
        $details = Details::where('id','=',$otp->details_id )->first();
        $createdAt = Carbon::createFromFormat('Y-m-d H:i:s', $otp->created_at);
        $now = Carbon::now();
        $diffInMinutes = $createdAt->diffInMinutes($now);
        if ($diffInMinutes <= 20) {
            if ($request->input('otp') == $otp->otp) {
                $otp->status = 1;
                $otp->update();
                $credentials = [
                    'qey_id' => $details->QEY_ID,
                    'password' => '12345678'
                ];
                if (Auth::attempt($credentials)) {
                    $user = Auth::user();
                    //return view('front.index',compact('user'));
                    return redirect()->route('front.index');
                }

            } else {
                Toastr::error('PIN Code does not match. Please try again :)','Failed');
                return view('front.auth.otp_verify', compact('otp'));

            }
        }
        else{
            Toastr::error('PIN Code Expired. Please Try again :)','Failed');
            return view('front.auth.otp_verify', compact('otp'));
        }

    }
    public function otpVerifyTwo(Request $request)
    {
        $otp = OtpDetails::where('qey_id', '=', $request->qey_id)->first();
        //dd($otp->otp);
        //dd($request->qey_id);
        //dd($request->input('otp'));
        $createdAt = Carbon::createFromFormat('Y-m-d H:i:s', $otp->created_at);
        $now = Carbon::now();
        $diffInMinutes = $createdAt->diffInMinutes($now);
        //dd($diffInMinutes);
        if ($diffInMinutes <= 20) {
            if ($request->input('otp') == $otp->otp) {
                return 0;
            } else {
                return response()->json('Provided PIN Code does not match. Please try again!');
            }
        }
        else{
            return  response()->json('Provided PIN Code has been expired. Please Try again!');
        }

    }
    public function resend($id)
    {
        $otp = OtpDetails::find($id);
        //$otp->otp = mt_rand(1000000, 9999999);
        $otp->otp = '123456';
	$otp_text = 'This is an automated SMS from DHA Members Portal. Your verification PIN is ' . $otp->otp . '. Please enter the PIN for instant verification. Thank you!';
        $otp->created_at = Carbon::now();
        $otp->update();
        //dd($otp);
        if($otp->check==2){
        /*
	    $details = [
                'otp' => $otp_text,];
            Mail::to($otp->send)->send(new NotifyMail($details));
            $otp->save();
            Toastr::success('PIN Code Sent again at Registered Email Address Successfully','Success');
            return view('front.auth.otp_verify', compact('otp'));
	*/
	// Email Through Laravel Completes here
	// Email Using the API System
            $client = new Client();
            $username = 'dhalhrgapisys';
            $password = "f8c98f7e4c394b0796b84jfgfb0108b028f";
            $credentials = base64_encode("{$username}:{$password}");
            $headers = [
                'Authorization' => 'Basic ' . $credentials,
                'X-API-KEY' => 'b8e25326-keys-4788-gapi-9c4ca0ceb555',
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ];
            $send_otp = $client->request('get', 'http://10.1.1.165/apinet/api/application_info/email?email_from=no-reply@dhalahore.org&email_from_name=No Reply&email_to='.$otp->send.'&email_subject=OTP - DHA Lahore Member Portal&email_message='. $otp_text, [
                'headers' => $headers,
            ]);
            $send_otp_response = json_decode($send_otp->getBody()->getContents());
	    if($send_otp_response->STATUS_ID=='00'){
                $otp->save();
            	Toastr::success('PIN Code Sent at Registered Email Address Successfully','Success');
            	return view('front.auth.otp_verify', compact('otp'));
            }else{
                Toastr::error('Failed to send PIN Code. Please try again :)','danger');
                return view('front.auth.otp_verify', compact('otp'));
            }
        }
        else{
            $client = new Client();
            $username = 'dhalhrgapisys';
            $password = "f8c98f7e4c394b0796b84jfgfb0108b028f";
            $credentials = base64_encode("{$username}:{$password}");
            $headers = [
                'Authorization' => 'Basic ' . $credentials,
                'X-API-KEY' => 'b8e25326-keys-4788-gapi-9c4ca0ceb555',
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ];
            $send_otp = $client->request('get', 'http://10.1.1.165/apinet/api/application_info/smstitel?mobile_no='.$otp->send.'&message='.$otp_text, [
                'headers' => $headers,
            ]);
            $send_otp_response = json_decode($send_otp->getBody()->getContents());
            if($send_otp_response->STATUS_ID=='013'){
                $otp->save();
                Toastr::success('PIN Code Sent at Registered Cell No Successfully','Success');
                return view('front.auth.otp_verify', compact('otp'));
            }else{
                Toastr::error('Failed to send PIN Code. Please try again :)','danger');
                return view('front.auth.otp_verify', compact('otp'));
            }
        }
    }
    public function frontIndex()
    {
        $user = Auth::user();
        $username = 'lkasoidrhfpaspoe';
        $password = "f8c98f7e4c394b0796baaab0108b028f";
        $credentials = base64_encode("{$username}:{$password}");
        $client = new Client();
        $headers = [
            'Authorization' => 'Basic ' . $credentials,
            'X-API-KEY' => 'b8e25326-dfc4-4788-DHA-1011141'
        ];
        $response = $client->request('get', 'http://192.168.43.120/mems_infoportal/api/wb_info/memasset?qry_id='.$user->qey_id, [
            'headers' => $headers,
        ]);
        $data = json_decode($response->getBody()->getContents());
        return view('front.index',compact('data'));
    }
    public function schedule($plot_id)
    {
        $username = 'lkasoidrhfpaspoe';
        $password = "f8c98f7e4c394b0796baaab0108b028f";
        $credentials = base64_encode("{$username}:{$password}");
        $client = new Client();
        $headers = [
            'Authorization' => 'Basic ' . $credentials,
            'X-API-KEY' => 'b8e25326-dfc4-4788-DHA-1011141'
        ];
        $user = Auth::user();
        $response = $client->request('get', 'http://192.168.43.120/mems_infoportal/api/wb_info/memplotdues?plot_id='.$plot_id.'&qry_id='.$user->qey_id, [
            'headers' => $headers,
        ]);
        $data = json_decode($response->getBody()->getContents());
        $response = $client->request('get', 'http://192.168.43.120/mems_infoportal/api/wb_info/memasset?qry_id=' . $user->qey_id, [
            'headers' => $headers,
        ]);
        $dataSanple = json_decode($response->getBody()->getContents());
        return view('front.data.schedule',compact('data','dataSanple'));

    }
    public function surcharge($plot_id)
    {
        $username = 'lkasoidrhfpaspoe';
        $password = "f8c98f7e4c394b0796baaab0108b028f";
        $credentials = base64_encode("{$username}:{$password}");
        $client = new Client();
        $headers = [
            'Authorization' => 'Basic ' . $credentials,
            'X-API-KEY' => 'b8e25326-dfc4-4788-DHA-1011141'
        ];
        $response = $client->request('get', 'http://192.168.43.120/mems_infoportal/api/wb_info/memplotdues?plot_id='.$plot_id, [
            'headers' => $headers,
        ]);
        $data = json_decode($response->getBody()->getContents());
        return view('front.data.surcharge',compact('data'));


    }
    public function challan($plot_id)
    {

        $username = 'lkasoidrhfpaspoe';
        $password = "f8c98f7e4c394b0796baaab0108b028f";
        $credentials = base64_encode("{$username}:{$password}");
        $client = new Client();
        $headers = [
            'Authorization' => 'Basic ' . $credentials,
            'X-API-KEY' => 'b8e25326-dfc4-4788-DHA-1011141'
        ];
        $response = $client->request('get', 'http://192.168.43.120/mems_infoportal/api/wb_info/memplotdue?plot_id='.$plot_id, [
            'headers' => $headers,
        ]);
        $data = json_decode($response->getBody()->getContents());
        return view('front.data.challan',compact('data'));


    }

    public function scheduleTwo()
    {
        $username = 'lkasoidrhfpaspoe';
        $password = "f8c98f7e4c394b0796baaab0108b028f";
        $credentials = base64_encode("{$username}:{$password}");
        $client = new Client();
        $headers = [
            'Authorization' => 'Basic ' . $credentials,
            'X-API-KEY' => 'b8e25326-dfc4-4788-DHA-1011141'
        ];
        $user = Auth::user();
        $response = $client->request('get', 'http://192.168.43.120/mems_infoportal/api/wb_info/memasset?qry_id=' . $user->qey_id, [
            'headers' => $headers,
        ]);
        $dataSanple = json_decode($response->getBody()->getContents());
        $memasset = $dataSanple[0];
        $response = $client->request('get', 'http://192.168.43.120/mems_infoportal/api/wb_info/memplotdues?plot_id='.$memasset->PLOT_ID.'&qry_id='.$user->qey_id, [
            'headers' => $headers,
        ]);
        $data = json_decode($response->getBody()->getContents());
        return view('front.data.schedule',compact('data','dataSanple'));


    }
    public function historyTwo()
    {
        $username = 'lkasoidrhfpaspoe';
        $password = "f8c98f7e4c394b0796baaab0108b028f";
        $credentials = base64_encode("{$username}:{$password}");
        $client = new Client();
        $headers = [
            'Authorization' => 'Basic ' . $credentials,
            'X-API-KEY' => 'b8e25326-dfc4-4788-DHA-1011141'
        ];
        $user = Auth::user();
        $response = $client->request('get', 'http://192.168.43.120/mems_infoportal/api/wb_info/memasset?qry_id=' . $user->qey_id, [
            'headers' => $headers,
        ]);
        $dataSanple = json_decode($response->getBody()->getContents());
        $memasset = $dataSanple[0];
        $response = $client->request('get', 'http://192.168.43.120/mems_infoportal/api/wb_info/challan_history?plot_id='.$memasset->PLOT_ID, [
            'headers' => $headers,
        ]);
        $data = json_decode($response->getBody()->getContents());
        return view('front.data.history',compact('data','dataSanple'));


    }

    public function challanTwo()
    {
        $username = 'lkasoidrhfpaspoe';
        $password = "f8c98f7e4c394b0796baaab0108b028f";
        $credentials = base64_encode("{$username}:{$password}");
        $client = new Client();
        $headers = [
            'Authorization' => 'Basic ' . $credentials,
            'X-API-KEY' => 'b8e25326-dfc4-4788-DHA-1011141'
        ];
        $user = Auth::user();
        //{{dd($user->qey_id);}}
        $response = $client->request('get', 'http://192.168.43.120/mems_infoportal/api/wb_info/memasset?qry_id=' . $user->qey_id, [
            'headers' => $headers,
        ]);
        $dataSanple = json_decode($response->getBody()->getContents());
        $plot_detail = $dataSanple[0];
        $response = $client->request('get', 'http://192.168.43.120/mems_infoportal/api/wb_info/amount_detail?plot_id=' . $plot_detail->PLOT_ID.'&qry_id='.$user->qey_id, [
            'headers' => $headers,
        ]);
        $data = json_decode($response->getBody()->getContents());
        return view('front.data.challan',compact('data','dataSanple'));


    }
    public function searchSchedule($plot_id)
    {
        $username = 'lkasoidrhfpaspoe';
        $password = "f8c98f7e4c394b0796baaab0108b028f";
        $credentials = base64_encode("{$username}:{$password}");
        $client = new Client();
        $headers = [
            'Authorization' => 'Basic ' . $credentials,
            'X-API-KEY' => 'b8e25326-dfc4-4788-DHA-1011141'
        ];
        $user = Auth::user();
        $response = $client->request('get', 'http://192.168.43.120/mems_infoportal/api/wb_info/memplotdues?plot_id='.$plot_id.'&qry_id='.$user->qey_id, [
            'headers' => $headers,
        ]);
        $data = json_decode($response->getBody()->getContents());
        $response = $client->request('get', 'http://192.168.43.120/mems_infoportal/api/wb_info/memasset?qry_id=' . $user->qey_id, [
            'headers' => $headers,
        ]);
        $dataSanple = json_decode($response->getBody()->getContents());
        return view('front.data.schedule',compact('data','dataSanple'));

    }

    public function searchHistory($plot_id)
    {
        $username = 'lkasoidrhfpaspoe';
        $password = "f8c98f7e4c394b0796baaab0108b028f";
        $credentials = base64_encode("{$username}:{$password}");
        $client = new Client();
        $headers = [
            'Authorization' => 'Basic ' . $credentials,
            'X-API-KEY' => 'b8e25326-dfc4-4788-DHA-1011141'
        ];
        $response = $client->request('get', 'http://192.168.43.120/mems_infoportal/api/wb_info/challan_history?plot_id='.$plot_id, [
            'headers' => $headers,
        ]);
        $data = json_decode($response->getBody()->getContents());
        $user = Auth::user();
        $response = $client->request('get', 'http://192.168.43.120/mems_infoportal/api/wb_info/memasset?qry_id=' . $user->qey_id, [
            'headers' => $headers,
        ]);
        $dataSanple = json_decode($response->getBody()->getContents());
        return view('front.data.history',compact('data','dataSanple'));

    }
    public function fetchAmount(Request $request)
    {
        $client = new Client();
        $username = 'lkasoidrhfpaspoe';
        $password = "f8c98f7e4c394b0796baaab0108b028f";
        $credentials = base64_encode("{$username}:{$password}");
        $headers = [
            'Authorization' => 'Basic ' . $credentials,
            'X-API-KEY' => 'b8e25326-dfc4-4788-DHA-1011141',
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Cookie' => 'ci_session=499e480351880278b3b10c6e9d7bf550070f78ba',
        ];
        $response = $client->request('get', 'http://192.168.43.120/mems_infoportal/api/wb_info/amount_detail?plot_id=' . $request->plot_id . '&qry_id=' . $request->qey_id, [
            'headers' => $headers,
        ]);
        $data['amount'] = json_decode($response->getBody()->getContents());
        return response()->json($data);;
    }
}
