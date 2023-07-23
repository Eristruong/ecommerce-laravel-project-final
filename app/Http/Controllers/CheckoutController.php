<?php

namespace App\Http\Controllers;

use App\Bill;
use App\BillDetail;
use App\Customer;
use App\Province;
use App\District;
use App\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use PHPUnit\Framework\Constraint\Count;
use Illuminate\Support\Facades\Mail;
use App\Mail\ShoppingMail;
use Illuminate\Support\Facades\Http;


class CheckoutController extends Controller
{
    public function getCheckOut() 
    { 
       $provinces = Province::all();

       

       return view('checkout',['provinces' => $provinces]);
       
    }
    public function getDistbyIdPro(Request $request)
    {
        // Xử lý giá trị được gửi từ AJAX và trả về response tương ứng.
        $ProvinceID = $request->input('selectedValue');
        $response = District::where('ProvinceID', $ProvinceID)->get();
                 
   
        return response()->json($response);
    }
    public function getWardbyIdPro(Request $request)
    {
        $DistrictID = $request->input('selectedValue');
        
        $url = 'https://dev-online-gateway.ghn.vn/shiip/public-api/master-data/ward?district_id='.$DistrictID;

   
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'token' => 'e7a8f89e-2551-11ee-a6e6-e60958111f48',
        ])->get($url);
  
       
        if ($response->successful()) {
            $data = $response->json();
           
       

            return response($data['data']);
        }
    }

    public function postCheckOut(Request $request) 
    {
                
      
        
            $cartInfor = Session('Cart') ? Session('Cart') : null;
            // save

            $address = new Address();
            $address->idProvince = $request->provinceSelect;
            $address->idDistrict = $request->districtSelect;
            $address->wardCode = strtok($request->wardSelect, "-");
            $address->WardName = strtok("-");
            $address->address = $request->address;
            $address->save();

            $customer = new Customer();
            $customer->userID = $request->id;
            $customer->name =  $request->name;
            $customer->email =  $request->email;
            $customer->IdAddress = $address->id;
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


