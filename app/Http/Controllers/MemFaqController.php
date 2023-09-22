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


class MemFaqController extends Controller
{
    public function index()
    {
        return view('front.pages.faq');
    }
}
