<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Bill;
use App\BillDetail;
use App\Customer;

class VnPayController extends Controller
{
    public function create(Request $request, $price)
    {       
        $vnp_TmnCode = "867ETWWS"; //Mã website tại VNPAY 
        $vnp_HashSecret = "WIAJFTZTGBTULEORGCGESBOKVTSNZIKW"; //Chuỗi bí mật
        $vnp_Url = "http://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://localhost:8080/weblinhkien/Return-Result";
        $vnp_TxnRef = date("YmdHis"); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = "Thanh toán hóa đơn phí dich vụ";
        $vnp_OrderType = 'billpayment';
        $vnp_Amount = Session('Cart')->totalPrice * 100;
        $vnp_Locale = 'vn';
        $vnp_IpAddr = request()->ip();

        $inputData = array(
            "vnp_Version" => "2.0.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . $key . "=" . $value;
            } else {
                $hashdata .= $key . "=" . $value;
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
           // $vnpSecureHash = md5($vnp_HashSecret . $hashdata);
            $vnpSecureHash = hash('sha256', $vnp_HashSecret . $hashdata);
            $vnp_Url .= 'vnp_SecureHashType=SHA256&vnp_SecureHash=' . $vnpSecureHash;
        }
        return redirect($vnp_Url);
    }

    public function return(Request $request)
{

    if($request->vnp_ResponseCode == "00") {
      
        
         $oldbill = Bill::all()->last();
              $bill = Bill::all()->last();
              $bill->bill_id = $oldbill->bill_id;
              $bill->customerID = $oldbill->customerID;
              $bill->date_order = $oldbill->date_order;
              $bill->total = $oldbill->total;
              $bill->note = $oldbill->note;
              $bill->payment = 'Trực tuyến';
              $bill->codevnpay = $request->vnp_TransactionNo;
              $bill->save();


              Session::flash('message', "Đã thanh toán dịch vụ !");
              return redirect()->route('home');
    }
    
    Bill::all()->last()->delete();
    BillDetail::all()->last()->delete();
    Customer::all()->last()->delete();
    Session::flash('message', "Lỗi trong quá trình thanh toán phí dịch vụ");
       
    return redirect()->route('home');
    /*
    	NCB
        9704198526191432198
        NGUYEN VAN A
        07/15
        OTP 123456
    */
}
}
