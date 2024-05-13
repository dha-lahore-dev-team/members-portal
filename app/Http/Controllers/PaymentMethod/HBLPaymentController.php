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
    // Test Environment
/*    private $publicPEMKey = "-----BEGIN PUBLIC KEY-----
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
*/
    //Live Environment
    private $publicPEMKey = "-----BEGIN PUBLIC KEY-----
MIICIjANBgkqhkiG9w0BAQEFAAOCAg8AMIICCgKCAgEAmSDzZeuGLAo+/++ilz8V
kcVIVZBnRm9iyWztvCPFQFEWt4GeWmJ3fnYwh0Y78loFAPqX8GE/TPuANPBFFfrG
OShBdyPLbDG2T5Exks3Gnfegg6LdXGTxwEmixgmvzn7vfkcksJd3cgc4r+FamTOE
8IwprCbPfHYQaDhYJRP+hlPogRx99Gipppcu6y7XASG6OMuGyIn0J6KJ73Zd4a32
C0xbGbk7+K8gdg6k56B+MGU/uOhP9Z+uBdnkUADQMCypaS22cRO7j1+niJo8dA3f
5VeGqy3UUShvplvaeHBH/OGdXrJS3tSVVFhbuTTOcazknRLX2g2KD5wjgZsxCBJF
oAl5T8fI51T81jF4NqgwymN+mixI7r8U5fxhjWBuEV8or+vseh+wasp2f/paCR3f
l2PyQhkUe8VpaUwM6299g4CVk58jQgyCc2tqueoYN7UpzaLmVaeNUZiUXN/ke/gD
vUwr0xdpO2CGtc5obH4eEFququsBUCMvlbUE6jtz/9ltolyEMWYUG71yYIXSvQX4
3FNDrQbc9cjDE5u5c2Lsp8oWUQCb9M5yGuAM/YnnoyQU8TJrRv0T+svDeQUUIayG
7Y/qHVm3Z0TjzeOWXGePMQsRDHEseSasSS1nafHkKxkY14Hqf59caK57ZqtRcFh8
WF82fDtY4WyIfsrKsoTVMRECAwEAAQ==
-----END PUBLIC KEY-----
";

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
            $amt_tobe_paid = $request->amt_challan + $request->bank_fee;
        $data = array(
            "USER_ID" => "dhalahoreadmin",
            // "PASSWORD" => "dCAc99Su5!", // Test Environment
            "PASSWORD" => "BCZ3X#c#mL", // Live Environment
            "CLIENT_NAME" => "dhalahoreadmin",
            "RETURN_URL" => "https://members.dhalahore.org/payment-success/$request->ref_no/$request->bank_fee/$request->amt_challan/$amt_tobe_paid",
            "CANCEL_URL" => "https://members.dhalahore.org/payment-fail",
            "CHANNEL" => "HBLPay_DHALahore_Website",
            "TYPE_ID" => "0",
            "ORDER" => array(
                "DISCOUNT_ON_TOTAL" => "0",
                "SUBTOTAL" => $amt_tobe_paid,
                "OrderSummaryDescription" => array(
                    array(
                        "ITEM_NAME" => "Challan Payment",
                        "QUANTITY" => "1",
                        "UNIT_PRICE" => $amt_tobe_paid,
                        "OLD_PRICE" => "0",
                        "CATEGORY" => "DHA Lahore Dues",
                        "SUB_CATEGORY" => "Challan Payment"
                    )
                )
            ),
            "SHIPPING_DETAIL" => array(
                "NAME" => "null",
                "ICON_PATH" => "null",
                "DELIEVERY_DAYS" => "0",
                "SHIPPING_COST" => "0"
            ),
            "ADDITIONAL_DATA" => array(
                "REFERENCE_NUMBER" => $request->ref_no,
                "CUSTOMER_ID" => 123, // Customer ID as per our system
                "CURRENCY" => "PKR",
                "BILL_TO_FORENAME" => $request->fname,
                "BILL_TO_SURNAME" => $request->lname,
                "BILL_TO_EMAIL" => $request->email,
                "BILL_TO_PHONE" => $request->phone,
                "BILL_TO_ADDRESS_LINE" => $request->address,
                "BILL_TO_ADDRESS_CITY" => $request->city,
                "BILL_TO_ADDRESS_STATE" => "PB",
                "BILL_TO_ADDRESS_COUNTRY" => "PK",
                "BILL_TO_ADDRESS_POSTAL_CODE" => $request->code,
                /*"SHIP_TO_FORENAME" => $request->fname,
                "SHIP_TO_SURNAME" => $request->lname,
                "SHIP_TO_EMAIL" => $request->email,
                "SHIP_TO_PHONE" => $request->phone,
                "SHIP_TO_ADDRESS_LINE" => $request->address,
                "SHIP_TO_ADDRESS_CITY" => $request->city,
                "SHIP_TO_ADDRESS_STATE" =>  $request->state,
                "SHIP_TO_ADDRESS_COUNTRY" => $request->country,
                "SHIP_TO_ADDRESS_POSTAL_CODE" => $request->code,*/
                "MerchantFields" => array(
                    "MDD1" => "WC",
                    "MDD2" => "YES",
                    "MDD4" => $request->plot_no, //Dynamic Value
                    "MDD5" => "No",
                    "MDD7" => "1", //Dynamic Value as per Qty
                    "MDD20" => "NO"
                )
            )
        );

        // Encode the data to JSON
        $stringData = json_encode($data, JSON_PRETTY_PRINT);
            $cyb = new Cyb($this->publicPEMKey);
            //dd($cyb);
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
            // $url = "https://testpaymentapi.hbl.com/hblpay/api/checkout"; // Test Environment
            $url = "https://digitalbankingportal.hbl.com/hostedcheckout/api/checkout"; //Live Environment
            $response = Http::asJson()->post($url, json_decode($arrJson, true));

            $jsonCyberSourceResult = $response->json();
            if ($jsonCyberSourceResult["IsSuccess"] && $jsonCyberSourceResult["ResponseMessage"] == "Success" && $jsonCyberSourceResult["ResponseCode"] == 0) {
                $sessionId = base64_encode($jsonCyberSourceResult["Data"]["SESSION_ID"]);
                //$payNowUrl = 'https://testpaymentapi.hbl.com/HBLPay/Site/index.html#/checkout?data=' . $sessionId; // Test Environment
                $payNowUrl = 'https://digitalbankingportal.hbl.com/hostedcheckout/site/index.html#/checkout?data=' . $sessionId; // Live Environment
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
