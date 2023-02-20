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
        if ($phase->RESPONSE_MESSAGE == 'VERIFIED') {
            $detials = new Details();
            $detials->phase = $request->phase;
            $detials->sector = $request->sector;
            $detials->plot_no = $request->plot_no;
            $detials->cnic_no = $request->cnic_no;
            $detials->QEY_ID = $phase->QEY_ID;
            $detials->CELL_NO = $phase->CELL_NO;
            $detials->EMAIL = $phase->EMAIL;
            $detials->RESPONSE_MESSAGE = $phase->RESPONSE_MESSAGE;

            $detials->save();
            $user = new User();
            $user->email = $detials->EMAIL;
            $user->qey_id = $phase->QEY_ID;
            $user->password = Hash::make('12345678');
            $user->save();
            $data['details'] = $detials;
            return view('front.auth.otp_send', compact('data'));
        }else{
            Toastr::error($phase->RESPONSE_MESSAGE,'Login Failed!');
            return redirect()->back();
        }
    }

    public function otpSend(Request $request)
    {
        $otpp = mt_rand(1000000, 9999999);
        $otp = new OtpDetails();
        $otp->details_id = $request->details_id;
        $otp->qey_id = $request->qey_id;
        $otp->otp = $otpp;
        $otp->check = $request->customCheckbox2; ;
        if ($request->customCheckbox2 == 'on') {
            $otp->send = $request->email;
            $details = [
                'otp' => $otpp,];
            Mail::to($request->email)->send(new NotifyMail($details));
        } else {
            $otp->send = $request->phone;
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
            // Available alpha caracters
            $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $pin = mt_rand(1000000000, 9999999999)
                . mt_rand(1000000000, 9999999999)
                . $characters[rand(0, strlen($characters) - 1)];
            $string = str_shuffle($pin);
            $response = $client->request('get', 'https://api.itelservices.net/send.php?transaction_id=' . $string . '&api_key=WUMKp21gth2UKEpsLp5I7yKABrmyi673&number=92' . $request->phone . '&text=' . $otpp . '&from=4473&type=sms', [
                'headers' => $headers,
            ]);
        }
        $otp->save();
        return view('front.auth.otp_verify', compact('otp'));

    }

    public function otpVerify(Request $request)
    {
        $otp = OtpDetails::where('qey_id', '=', $request->qey_id)->first();
        $details = Details::where('id','=',$otp->details_id )->first();
        $createdAt = Carbon::createFromFormat('Y-m-d H:i:s', $otp->created_at);
        $now = Carbon::now();
        $diffInMinutes = $createdAt->diffInMinutes($now);
        if ($diffInMinutes <= 3) {
            if ($request->input('otp') == $otp->otp) {
                $otp->status = 1;
                $otp->update();
                $credentials = [
                    'qey_id' => $details->QEY_ID,
                    'password' => '12345678'
                ];
                if (Auth::attempt($credentials)) {
                    $user = Auth::user();
                    return view('front.index',compact('user'));
                }

            } else {
                Toastr::error('OTP does not match. Please try again :)','Success');
                return view('front.auth.otp_verify', compact('otp'));

            }
        }
        else{
            Toastr::error('OTP Expired. Please Try again :)','Success');
            return view('front.auth.otp_verify', compact('otp'));


        }

    }
    public function resend($id)
    {
        $otp = OtpDetails::find($id);
        $otp->otp = mt_rand(1000000, 9999999);
        $otp->created_at = Carbon::now();
        $otp->update();
        if($otp->check=="on"){
            $details = [
                'otp' => $otp->otp,];
            Mail::to($otp->send)->send(new NotifyMail($details));

        }
        else{
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
            // Available alpha caracters
            $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $pin = mt_rand(1000000000, 9999999999)
                . mt_rand(1000000000, 9999999999)
                . $characters[rand(0, strlen($characters) - 1)];
            $string = str_shuffle($pin);
            $response = $client->request('get', 'https://api.itelservices.net/send.php?transaction_id=' . $string . '&api_key=WUMKp21gth2UKEpsLp5I7yKABrmyi673&number=92' . $otp->send . '&text=' . $otp->otp . '&from=4473&type=sms', [
                'headers' => $headers,
            ]);
    }

        Toastr::success('Otp Again Send :)','Success');
        return view('front.auth.otp_verify', compact('otp'));
    }
    public function frontIndex()
    {
        $user = Auth::user();
        return view('front.index',compact('user'));
    }
    public function schedule($qey_id,$key)
    {
        $username = 'lkasoidrhfpaspoe';
        $password = "f8c98f7e4c394b0796baaab0108b028f";
        $credentials = base64_encode("{$username}:{$password}");
        $client = new Client();
        $headers = [
            'Authorization' => 'Basic ' . $credentials,
            'X-API-KEY' => 'b8e25326-dfc4-4788-DHA-1011141'
        ];
        $response = $client->request('get', 'http://192.168.43.120/mems_infoportal/api/wb_info/memplotdues?qry_id='.$qey_id, [
            'headers' => $headers,
        ]);
        $data = json_decode($response->getBody()->getContents());
        return view('front.data.schedule',compact('data','key'));


    }
    public function surcharge($qey_id,$key)
    {
        $username = 'lkasoidrhfpaspoe';
        $password = "f8c98f7e4c394b0796baaab0108b028f";
        $credentials = base64_encode("{$username}:{$password}");
        $client = new Client();
        $headers = [
            'Authorization' => 'Basic ' . $credentials,
            'X-API-KEY' => 'b8e25326-dfc4-4788-DHA-1011141'
        ];
        $response = $client->request('get', 'http://192.168.43.120/mems_infoportal/api/wb_info/memplotdues?qry_id='.$qey_id, [
            'headers' => $headers,
        ]);
        $data = json_decode($response->getBody()->getContents());
        return view('front.data.surcharge',compact('data','key'));


    }
    public function challan($qey_id,$key)
    {
        $username = 'lkasoidrhfpaspoe';
        $password = "f8c98f7e4c394b0796baaab0108b028f";
        $credentials = base64_encode("{$username}:{$password}");
        $client = new Client();
        $headers = [
            'Authorization' => 'Basic ' . $credentials,
            'X-API-KEY' => 'b8e25326-dfc4-4788-DHA-1011141'
        ];
        $response = $client->request('get', 'http://192.168.43.120/mems_infoportal/api/wb_info/memplotdues?qry_id='.$qey_id, [
            'headers' => $headers,
        ]);
        $data = json_decode($response->getBody()->getContents());
        return view('front.data.challan',compact('data','key'));


    }
}
