<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PaymentController extends Controller
{
    public function index()
    {
        return view('payment.index');
    }

    public function result()
    {
        return view('payment.result');
    }

    public function payWithMoMo()
    {
        $endPoint = env('MOMO_END_POINT');
        $partnerCode = env('MOMO_PARTNER_CODE');
        $accessKey = env('MOMO_ACCESS_KEY');
        $secretKey = env('MOMO_SECRET_KEY');
        $orderInfo = "Thanh toán qua MoMo";
        $amount = "10000";
        $orderId = time() ."";
        $returnUrl = route('admin.home');
        $notifyurl = route('user.home');
        $bankCode = env('MOMO_BANK_CODE');
        $requestId = time()."";
        $requestType = "captureMoMoWallet";
        $extraData = "";
        $rawHash = "partnerCode=" . $partnerCode .
            "&accessKey=" . $accessKey . 
            "&requestId=" . $requestId . 
            "&amount=" . $amount . 
            "&orderId=" . $orderId . 
            "&orderInfo=" . $orderInfo . 
            "&returnUrl=" . $returnUrl . 
            "&notifyUrl=" . $notifyurl . 
            "&extraData=" . $extraData;
        // $rawHash = "partnerCode=".$partnerCode."&accessKey=".$accessKey."&requestId=".$requestId."&bankCode=".$bankCode."&amount=".$amount."&orderId=".$orderId."&orderInfo=".$orderInfo."&returnUrl=".$returnUrl."&notifyUrl=".$notifyurl."&extraData=".$extraData."&requestType=".$requestType;
        $signature = hash_hmac("sha256", $rawHash, $secretKey);
        $data =  array(
            'partnerCode' => $partnerCode,
            'accessKey' => $accessKey,
            'requestId' => $requestId,
            'amount' => $amount,
            'orderId' => $orderId,
            'orderInfo' => $orderInfo,
            'returnUrl' => $returnUrl,
            'bankCode' => $bankCode,
            'notifyUrl' => $notifyurl,
            'extraData' => $extraData,
            'requestType' => $requestType,
            'signature' => $signature
        );
        $result = $this->requestDataPost($endPoint, $data);
        $jsonResult = json_decode($result, true);  // decode json
        return redirect($jsonResult['payUrl']);
    }

    public static function requestDataPost($url, $data)
    {
        $respons = Http::acceptJson([
            'application/json'
        ])->post($url,$data);
        return $respons->body();
    }
}
