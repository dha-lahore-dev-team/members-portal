<?php

namespace App\Http\Controllers\PaymentMethod;
use App\Http\Controllers\Controller;
ini_set('memory_limit', '-1');

// Custom Class
use App\Http\Controllers\PaymentMethod\Cyb;

// Facades
use App\Models\UserOrder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HBLPaymentController extends Controller
{
    private $publicPEMKey = "-----BEGIN PUBLIC KEY-----
MIICIjANBgkqhkiG9w0BAQEFAAOCAg8AMIICCgKCAgEAo5XbXFpig1ZPPKeanPn0
pRtheFwXxH3fud1KvnvwpQlMQFUHBDSFGQL1pS309QGotTDZZ20fa6b6KrC0fqZG
dBT++bPGb3vf377J3uRQbGyhK7spK+8Ee0Koa5fmj3YcWxvxd7oxLgchTW9KEBrI
fDknTmkif57y6UrNCaEz7P3K84mIqo/+4iR+xNkKQqvbVeOUmEvSzksQFbvB8tcI
HKuiPGFh1gNhP6WgeEZy0ZwqVZp4AHjl4ZxirMWXpFJZffPjJS0U8ppWSyEos/18
NDTVskrJsAD58nNtr9uiZgDWL0u6NGppMUum8PA3Qrvnjm+U7nB0TTJO7R4zXC0M
z7VIiYArljLOp21EdaegdsJn1ldk78c9i56lDg6lGrfJ1XhnC2+M7VtJgXml/G6x
TxEtL3fD/P78UxWxK4wAqY10xFS0k2aR9NpmV3D10eofLpBACSDM9ipDDBUf04Ff
SdE/YsNurXznT46pDLDkDtqSqKkQFSesBk46SXy/yv2B+WwJ5OfgEGg1pVBIhqZQ
GFHKDrI9ssuERZo2MEGYPvFJGtdyW3jci0vZVOs9Fi0kM2OzBO/XGFxPrU0kr1sC
nYGmv/XknD9wjjlXGB3Rg9qtqDEx4H8ADnDhw3Qx+nBRONr/u4qomhExhxipB7g7
DBe6lkcxEiOpPsIzxEf8i2kCAwEAAQ==
-----END PUBLIC KEY-----";

    public function payment(Request $request)
    {
        //dd($request);
        try
        {
            $order = new UserOrder();
            $order->user_id = Auth::user()->id;
            $order->fname = $request->fname;
            $order->lname = $request->lname;
            $order->email = $request->email;
            $order->phone = $request->phone;
            $order->address = $request->address;
            $order->state =$request->state;
            $order->city = $request->city;
            $order->p_code = $request->code;
            $order->save();
        $data = array(
            "USER_ID" => "dhalahoreadmin",
            "PASSWORD" => "dCAc99Su5!",
            "CLIENT_NAME" => "dhalahoreadmin",
            "RETURN_URL" => "http://127.0.0.1:8000/payment-success/$request->ref_no/$request->ref_no/$request->ch_amount_within",
            "CANCEL_URL" => "http://127.0.0.1:8000/payment-fail",
            "CHANNEL" => "HBLPay_DHALahore_Website",
            "TYPE_ID" => "0",
            "ORDER" => array(
                "DISCOUNT_ON_TOTAL" => "0",
                "SUBTOTAL" => $request->ch_amount_within,
                "OrderSummaryDescription" => array(
                    array(
                        "ITEM_NAME" => "Challan Payment",
                        "QUANTITY" => "1",
                        "UNIT_PRICE" => $request->ch_amount_within,
                        "OLD_PRICE" => "0",
                        "CATEGORY" => "DHA Lahore Dues",
                        "SUB_CATEGORY" => "Challan Payment"
                    )
                )
            ),
            "SHIPPING_DETAIL" => array(
                "NAME" => "DHA SERVICE",
                "ICON_PATH" => null,
                "DELIEVERY_DAYS" => "0",
                "SHIPPING_COST" => "0"
            ),
            "ADDITIONAL_DATA" => array(
                "REFERENCE_NUMBER" => $request->ref_no,
                "CUSTOMER_ID" => null,
                "CURRENCY" => "PKR",
                "BILL_TO_FORENAME" => $request->fname,
                "BILL_TO_SURNAME" => $request->lname,
                "BILL_TO_EMAIL" => $request->email,
                "BILL_TO_PHONE" => $request->phone,
                "BILL_TO_ADDRESS_LINE" => $request->address,
                "BILL_TO_ADDRESS_CITY" => $request->city,
                "BILL_TO_ADDRESS_STATE" => $request->state,
                "BILL_TO_ADDRESS_COUNTRY" => $request->country,
                "BILL_TO_ADDRESS_POSTAL_CODE" => $request->code,
                "SHIP_TO_FORENAME" => $request->fname,
                "SHIP_TO_SURNAME" => $request->lname,
                "SHIP_TO_EMAIL" => $request->email,
                "SHIP_TO_PHONE" => $request->phone,
                "SHIP_TO_ADDRESS_LINE" => $request->address,
                "SHIP_TO_ADDRESS_CITY" => $request->city,
                "SHIP_TO_ADDRESS_STATE" =>  $request->state,
                "SHIP_TO_ADDRESS_COUNTRY" => $request->country,
                "SHIP_TO_ADDRESS_POSTAL_CODE" => $request->code,
                //"PAYMENT_METHOD" => "VISA / MASTER",
                "MerchantFields" => array(
                    "MDD1" => "WC",
                    "MDD2" => "YES",
                    "MDD4" => "Product Name",
                    "MDD5" => "No",
                    "MDD7" => "1",
                    "MDD20" => "NO"
                )
            )
        );

        // Encode the data to JSON
        $stringData = json_encode($data, JSON_PRETTY_PRINT);
            $cyb = new Cyb($this->publicPEMKey);
            function recParamsEncryption($arrJson, $cyb)
            {
                foreach ($arrJson as $jsonIndex => $jsonValue)
                {
                    if (!is_array($jsonValue)) {
                        if ($jsonIndex !== "USER_ID") {
                            $arrJson[$jsonIndex] = $cyb->rsaEncryptCyb($jsonValue);
                        }
                    }
                    else
                    {
                        $arrJson[$jsonIndex] = recParamsEncryption($jsonValue, $cyb);
                    }
                }
                return $arrJson;
            }
            $cyb = new cyb($this->publicPEMKey);
            $arrJson = json_decode($stringData, true);
            $arrJson = recParamsEncryption($arrJson, $cyb);
            $arrJson = json_encode($arrJson);
            $url = "https://testpaymentapi.hbl.com/hblpay/api/checkout";
            $response = Http::asJson()->post($url, json_decode($arrJson, true));

            $jsonCyberSourceResult = $response->json();
            if ($jsonCyberSourceResult["IsSuccess"] && $jsonCyberSourceResult["ResponseMessage"] == "Success" && $jsonCyberSourceResult["ResponseCode"] == 0) {
                $sessionId = base64_encode($jsonCyberSourceResult["Data"]["SESSION_ID"]);
                $payNowUrl = 'https://testpaymentapi.hbl.com/HBLPay/Site/index.html#/checkout?data=' . $sessionId;
            return view('hbl.payment-view')->with([
                'payNowUrl'         => $payNowUrl,
                'arrJson'           => $arrJson,
            ]);
        }
        }
        catch(\Exception $e)
        {
            return \redirect()->route('payment-fail');
        }
    }
    public function success(Request $request)
    {

        return \redirect()->route('payment-success');
    }

    public function fail(Request $request)
    {
        return \redirect()->route('payment-fail');
    }
}
