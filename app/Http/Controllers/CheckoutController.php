<?php

namespace App\Http\Controllers;

use App\Bill;
use App\BillDetail;
use App\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use PHPUnit\Framework\Constraint\Count;
use Illuminate\Support\Facades\Mail;
use App\Mail\ShoppingMail;


class CheckoutController extends Controller
{
    public function getCheckOut() 
    { 
       return view('checkout');
       
    }

    public function postCheckOut(Request $request) 
    {
                
        
           if ($request->thanhtoan == "tienmat") {
            $cartInfor = Session('Cart') ? Session('Cart') : null;
            // save
            $customer = new Customer();
            $customer->userID = $request->id;
            $customer->name =  $request->name;
            $customer->email =  $request->email;
            $customer->address = $request->address;
            $customer->phone_number = $request->phonenumber;
            $customer->note = $request->note;
            $customer->save();
            

            $bill = new Bill;
            $bill->customerID = $customer->id;
            $bill->date_order = date('Y-m-d H:i:s');
            $bill->total = str_replace(',', '', $cartInfor->totalPrice);
            $bill->note = $request->note;
            $bill->payment = 'Tiền mặt';
            $bill->codevnpay = '';
            $bill->save();

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

             
          Session::flash('message', "Đơn hàng của bạn đang chờ được xử lí !");
       
          return redirect()->route('info.show', $request->id);
           } else {

            $cartInfor = Session('Cart') ? Session('Cart') : null;
            // save
            $customer = new Customer();
            $customer->userID = $request->id;
            $customer->name =  $request->name;
            $customer->email =  $request->email;
            $customer->address = $request->address;
            $customer->phone_number = $request->phonenumber;
            $customer->note = $request->note;
            $customer->save();
            

            $bill = new Bill;
            $bill->customerID = $customer->id;
            $bill->date_order = date('Y-m-d H:i:s');
            $bill->total = str_replace(',', '', $cartInfor->totalPrice);
            $bill->note = $request->note;
          
            $bill->save();

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
           
            
    

    }
    public function __construct()
    {
        $this->middleware('auth'); 
    }
}


