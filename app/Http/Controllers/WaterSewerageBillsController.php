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

class WaterSewerageBillsController extends Controller
{
    public function waterSewerageBill()
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
        return view('front.data.wsbill',compact('data','dataSanple'));


    }
    public function searchWaterSewerageBill($plot_id)
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
        return view('front.data.wsbill',compact('data','dataSanple'));

    }
}
