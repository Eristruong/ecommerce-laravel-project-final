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
            $bill->total_remain = $bill->total;
            $bill->payment = 'Tiền mặt - chưa thành toán 10% giá trị đơn hàng';
            $bill->codevnpay = '';
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



                //case khách hàng đặt cọc trước 10% giá trị đơn hàng mới được thanh toán tiền mặt khi nhận hàng

                $payment = $request->thanhtoan;

                if ($payment == "tienmat") {

                $request->Session()->put('payment' ,$payment);
                Session::flash('suc-message', "Đơn hàng của bạn đang chờ được xử lí !");
                 
                $data = [
                    'payment' => $payment,
                    'cartInfo' => $cartInfor
                ];
                
                 return redirect()->action('VnPayController@hanldevnpayment', ['data' => $data]);
                }
                else{

          
            
                $data = [
                   'id' => $request->id,
                   'name' => $request->name,
                   'email' => $request->email,
                   'address' => $request->address,
                   'phone_number' => $request->phonenumber,
                   'note' => $request->note,
                   'payment' => $payment,
                   'cartInfo' => $cartInfor
                ];
            return redirect()->action('VnPayController@hanldevnpayment', ['data' => $data]);
          
        
        }
           
            
    

    }
    public function __construct()
    {
        $this->middleware('auth'); 
    }
}


