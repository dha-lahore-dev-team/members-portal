<?php

namespace App\Http\Controllers\PaymentMethod;
use App\Http\Controllers\Controller;
use App\Models\OrderPaymant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    private  $privateKey="-----BEGIN RSA PRIVATE KEY-----
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
-----END RSA PRIVATE KEY-----";
    public function payment($ch_id,$ins_id)
    {
        $customer = Auth::user();
        if (isset($customer)) {
            return view('front.data.single-challan',compact($ch_id,$ins_id));
        }
        return redirect('payment-fail');
    }
    function decryptData($data, $privatePEMKey)
    {
        $DECRYPT_BLOCK_SIZE = 512;
        $decrypted = '';

        $data = str_split(base64_decode($data), $DECRYPT_BLOCK_SIZE);
        foreach($data as $chunk)
        {
            $partial = '';

            $decryptionOK = openssl_private_decrypt($chunk, $partial, $privatePEMKey, OPENSSL_PKCS1_PADDING);

            if($decryptionOK === false)
            {
                $decrypted = '';
                return $decrypted;
            }
            $decrypted .= $partial;
        }

        return utf8_decode($decrypted);
    }
    public function success($ch_id,$plot_id,$amount)
    {
        $encryptedData = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);
        $encryptedData = str_replace("data=", "", $encryptedData);
        $url_params = $this->decryptData($encryptedData, $this->privateKey);
        $splitToArray = explode("&",$url_params);
        $responseCode = str_replace("RESPONSE_CODE=","",$splitToArray[0]);
        $responseMsg = str_replace("RESPONSE_MESSAGE=","",$splitToArray[1]);
        $orderRefNumber = str_replace("ORDER_REF_NUMBER=","",$splitToArray[2]);
        $paymentType=str_replace("PAYMENT_TYPE=","",$splitToArray[3]);
        $guid=str_replace("GUID=","",$splitToArray[6]);
        dd($url_params);
        $order = new OrderPaymant();
        $order->ch_id = $ch_id;
        $order->plot_id = $plot_id;
        $order->amount = $amount;
        $order->q_id = Auth::user()->qey_id;
        $order->code = $responseCode;
        $order->guid = $guid;
        $order->o_reference = $orderRefNumber;
        $order->p_type = $paymentType;
        if($responseCode!=100 || $responseCode!=0){
            $order->status = 2;
        }
        $order->save();
        return \redirect()->route('challan.two');
    }
    public function fail()
    {
        return view('digital_payment.fail');
    }

}
