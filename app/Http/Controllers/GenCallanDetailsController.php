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
use Auth;

class GenCallanDetailsController extends Controller
{
    public function challanDetails(Request $request)
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
        $response1 = $client->request('get', 'http://192.168.43.120/mems_infoportal/api/wb_info/memgenchallan?qry_id='.$user->qey_id.'&plot_id=' .$request->plot_id.'&ch_type=1&ch_amt='.$request->amount, [
            'headers' => $headers,
        ]);
        $checkChallanId = json_decode($response1->getBody()->getContents());
        if($checkChallanId->RESPONSE_MESSAGE = "CHALLAN GENERATED"){
            $response2 = $client->request('get', 'http://192.168.43.120/mems_infoportal/api/wb_info/all_challan_history?plot_id=' .$request->plot_id, [
                'headers' => $headers,
            ]);
            $data = json_decode($response2->getBody()->getContents());
            //{{dd($data[0]['PLOT_NO']);}}
            return response()->json($data);
        }
        else{
            return 0;
        }
    }
    public function fetchUnpidChallans(Request $request)
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
        $response = $client->request('get', 'http://192.168.43.120/mems_infoportal/api/wb_info/all_challan_history?plot_id=' .$request->plot_id, [
                'headers' => $headers,
            ]);
        if($response){
        $data = json_decode($response->getBody()->getContents());
        return response()->json($data);
        }
        else{
            return 0;
        }
    }

    public function detailsChallan($ch_no)
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
        $response = $client->request('get', 'http://192.168.43.120/mems_infoportal/api/wb_info/challan_view?challan_id='.$ch_no, [
            'headers' => $headers,
        ]);
        $data = json_decode($response->getBody()->getContents());
        foreach ($data as $row) {
            if($row->CH_NO==$ch_no){
                $find = $row;
                return view('pdf.challan_details',compact('find'));
            }
        }
    }
    public function detailsChallanApi(Request $request)
    {
        $ch_id = '342547' . $request->ch_id;
        //dd($ch_id);
        //$ins_id = $request->ins_id;
        $username = 'lkasoidrhfpaspoe';
        $password = "f8c98f7e4c394b0796baaab0108b028f";
        $credentials = base64_encode("{$username}:{$password}");
        $client = new Client();
        $headers = [
            'Authorization' => 'Basic ' . $credentials,
            'X-API-KEY' => '493ee3eb-2ee0-43ca-af0b-f1170359ef99'
        ];
        $user = Auth::user();
        $response = $client->request('get', 'http://10.1.1.151/dha_payment/api/Application_info/consumer_detail?ref_no=' . $ch_id . '&bank_mnemonic=HBLCC', [
            'headers' => $headers,
        ]);
        //dd($response->getBody()->getContents());
        $data = json_decode($response->getBody()->getContents());
        foreach ($data as $row) {
            if ($row == $ch_id) {
                $find = $row;
                return response()->json($data);
            }
        }
    }
    public function payment($ch_id)
    {
        $customer = Auth::user();
        if (isset($customer)) {
            $username = 'lkasoidrhfpaspoe';
            $password = "f8c98f7e4c394b0796baaab0108b028f";
            $credentials = base64_encode("{$username}:{$password}");
            $client = new Client();
            $headers = [
                'Authorization' => 'Basic ' . $credentials,
                'X-API-KEY' => 'b8e25326-dfc4-4788-DHA-1011141'
            ];
            $user = Auth::user();
            $response = $client->request('get', 'http://192.168.43.120/mems_infoportal/api/wb_info/challan_view?challan_id='.$ch_id, [
                'headers' => $headers,
            ]);
            $data = json_decode($response->getBody()->getContents());
            foreach ($data as $row) {
                if($row->ch_id === $ch_id){
                    $find = $row;
                    return view('front.data.single-challan',compact('find'));
                }
            }
        }
        return redirect('payment-fail');
    }
}
