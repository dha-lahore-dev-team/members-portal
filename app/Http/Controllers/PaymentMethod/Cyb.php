<?php
namespace App\Http\Controllers\PaymentMethod;
use App\Http\Controllers\Controller;


class Cyb extends Controller
{ private $publicPEMKey;

    public function __construct($publicPEMKey)
    {
        $this->publicPEMKey = $publicPEMKey;
    }

    public function rsaEncryptCyb($plainData)
    {
        $encryptionOk = openssl_public_encrypt($plainData, $encryptedData, $this->publicPEMKey, OPENSSL_PKCS1_PADDING);

        if ($encryptionOk === false) {
            return false;
        }

        return base64_encode($encryptedData);
    }
}
