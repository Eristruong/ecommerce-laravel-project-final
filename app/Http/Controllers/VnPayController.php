<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Bill;
use App\BillDetail;
use App\Customer;
use Illuminate\Support\Facades\Mail;
use App\Mail\ShoppingMail;




class VnPayController extends Controller
{
    public function hanldevnpayment(Request $request)
    {    
     
       
        $cartInfor = Session('Cart') ? Session('Cart') : null;
        // save
        $customer = new Customer();
        $customer->userID = $request->data['id'];
        $customer->name =  $request->data['name'];
        $customer->email =  $request->data['email'];
        $customer->address = $request->data['address'];
        $customer->phone_number = $request->data['phone_number'];
        $customer->note = $request->data['note'];
        $customer->save();
        

        $bill = new Bill;
        $bill->customerID = $customer->id;
        $bill->date_order = date('Y-m-d H:i:s');
        $bill->total = str_replace(',', '', $cartInfor->totalPrice);
        $bill->note = $request->data['note'];
      
        $bill->save();
 
        $request->Session()->put('bill' ,$bill);
 
        
        if (count( $cartInfor->products ) > 0) {
            foreach ($cartInfor->products as $item) {
                $billDetail = new BillDetail;
                $billDetail->bill_id = $bill->bill_id;
                $billDetail->productID = $item['productInfo']->productID;
                $billDetail->quantily = $item['quanty'];
                $billDetail->price = $item['price'];
                $billDetail->save();
            }
        }
      // del
      $request->Session()->forget('Cart');
      //gửi maill
           $bills = $cartInfor;
           $billdetails = $cartInfor->products;
           $date = $bill->date_order;
           $name = $customer->name;
           $phonenumber = $customer->phone_number;
            Mail::to($customer->email)->send(new ShoppingMail($bills, $billdetails, $date, $name, $phonenumber));


            $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
            $vnp_Returnurl = "http://localhost/weblinhkien/Return-Result";
            $vnp_TmnCode = "RM379I7H";//Mã website tại VNPAY 
            $vnp_HashSecret = "INZIGVORFJXMAREEEUIFYWLXXKLEZGSW";//Chuỗi bí mật
            
            $vnp_TxnRef = rand(1,10000); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này 
        
            $vnp_OrderInfo = "Thanh toán hóa đơn phí dich vụ";
            $vnp_OrderType = 'other';
            $vnp_Amount = $cartInfor->totalPrice * 100;
            $vnp_Locale = 'vn';
            // $vnp_BankCode = "NCB";
            $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
            //Add Params of 2.0.1 Version
            $startTime = date("YmdHis");
            $vnp_ExpireDate = date('YmdHis',strtotime('+15 minutes',strtotime($startTime)));

            $inputData = array(
                "vnp_Version" => "2.1.0",
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
    
            
            //var_dump($inputData);
            ksort($inputData);
            $query = "";
            $i = 0;
            $hashdata = "";
            foreach ($inputData as $key => $value) {
                if ($i == 1) {
                    $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
                } else {
                    $hashdata .= urlencode($key) . "=" . urlencode($value);
                    $i = 1;
                }
                $query .= urlencode($key) . "=" . urlencode($value) . '&';
            }
            
            $vnp_Url = $vnp_Url . "?" . $query;
            if (isset($vnp_HashSecret)) {
                $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//  
                $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
            }

            return redirect($vnp_Url);
    }

    public function return(Request $request)
{

    if($request->vnp_ResponseCode == "00") {
      
        $billinfo = Session('bill') ? Session('bill') : null;
        if (isset($billinfo)) {
            $bill = Bill::find($billinfo -> bill_id);
            $bill->payment = 'Trực tuyến';
            $bill->codevnpay = $request->vnp_TransactionNo;
            $bill->save();
            Session::flash('suc-message', "Đã thanh toán dịch vụ !");
        }else{
            Session::flash('err-message', "Lỗi thanh toán dịch vụ - không tìm thấy đơn hàng !");
        }
            
              $request->Session()->forget('bill');
              return redirect()->route('home');
    }
    
    Bill::all()->last()->delete();
    BillDetail::all()->last()->delete();
    Customer::all()->last()->delete();
    $request->Session()->forget('bill');
    Session::flash('err-message', "Lỗi trong quá trình thanh toán phí dịch vụ - vnpay");
       
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
