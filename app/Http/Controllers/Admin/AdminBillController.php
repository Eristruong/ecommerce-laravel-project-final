<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Bill;
use App\BillDetail;
use App\Customer;
use App\Province;
use App\District;
use App\Ward;
use App\Product;
use App\Category;
use Illuminate\Support\Facades\Http;
use App\Shipping;
use Carbon\Carbon;

class AdminBillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = DB::table('customers')
                    ->join('bills', 'customers.id', '=', 'bills.customerID')
                    ->where('bills.status', '!=', 'Đang Giao' )
                    ->select('customers.*', 'bills.status as status','bills.date_order as date_order','bills.bill_id as bill_id')
                    ->get();
      return view('order.index',['customers'=>$customers]);
    }

    public function indexshipping()
    {
        $customers = DB::table('customers')
        ->join('bills', 'customers.id', '=', 'bills.customerID')
        ->where('bills.status', '=', 'Đang Giao' )
        ->select('customers.*', 'bills.status as status','bills.date_order as date_order','bills.bill_id as bill_id')
        ->get();
      return view('order.index',['customers'=>$customers]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
                     $customer = Customer::join('bills', 'customers.id', '=', 'bills.customerID')
                    ->select('customers.*', 'bills.bill_id as bill_id', 'bills.total as bill_total', 'bills.note as bill_note', 'bills.status as bill_status', 'bills.payment as bill_payment', 'bills.codevnpay as bill_codevnpay', 'bills.total_received as total_received', 'bills.total_remain as total_remain')
                    ->where('customers.id', '=', $id)
                    ->first();

                    $provinceName = Province::where('ProvinceID', $customer->address['idProvince'])->select('ProvinceName')->first();
                    $districtName = District::where('DistrictID', $customer->address['idDistrict'])->select('DistrictName')->first();
                    $wardName = $customer->address['WardName'];
                    $address = $customer->address['address'];

                    $addresses = [

                        // 'provinceName' => $provinceName['ProvinceName'],
                        // 'districtName' => $districtName['DistrictName'],
                        // 'wardName' => $wardName,
                    
                        'address' => $address. ", " . $wardName . ", " . $districtName['DistrictName'] . ", " . $provinceName['ProvinceName']
                    ];

                    $provinces = Province::all();
                    $Districts = District::all();

                    $bills = DB::table('bills')
                    ->join('bill_details', 'bills.bill_id', '=', 'bill_details.bill_id')
                    ->leftjoin('products', 'bill_details.productID', '=', 'products.productID')
                    ->where('bills.customerID', '=', $id)
                    ->select('bills.*', 'bill_details.*', 'products.productName as product_name')
                    ->get();
                    

                    return view('order.show',['customer'=>$customer,'bills'=>$bills, 'addresses'=>$addresses, 'provinces'=>$provinces, 'districts'=>$Districts]);
                    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
     
        $bill = Bill::find($id);
        $bill->status = $request->input('status');  
        $bill->save();

        if($request->status== 'Đang Giao')
        {
         
            $to_district_id = $request->districtID;
            $to_ward_code = strtok($request->wardID, "-");
            $customer = Customer::where('id', $bill->customerID)->first();
        
    
            $url = 'https://dev-online-gateway.ghn.vn/shiip/public-api/v2/shipping-order/create';
            $token = 'e7a8f89e-2551-11ee-a6e6-e60958111f48';
            $shopId = '125212';
    

            $billDetails = BillDetail::where('bill_id', $bill->bill_id)->get();
            $items =[];
            foreach ($billDetails as $billDetail) {

                $product = Product::where('productID', $billDetail->productID)->first();
                $category = Category::where('categoryID', $product->categoryID)->first();
                 // Lặp qua từng phần tử $billDetails và thêm vào mảng $items
            $item = [
                'name' => $product->productName,
                'code' => $category->categoryName . "-" . $product->productID,
                'quantity' => $billDetail->quantily,
                'price' => $billDetail->price,
                'category' => [
                    "level1" => "linh kiện",
                ],
            ];

            $items[] = $item;
            }
     
    

            $data = [
                "payment_type_id" => 2,
                "note" => $request->note,
                "required_note" => $request->ordercheck,
                "return_phone" => "0834474442",
                "return_address" => "25 Nguyễn Bá Lân",
                "return_district_id" => null,
                "return_ward_code" => "",
                "client_order_code" => "",
                "to_name" => $customer->name,
                "to_phone" => "0" . (string)$customer->phone_number,
                "to_address" => $request->address,
                "to_ward_code" => $to_ward_code,
                "to_district_id" => (int)$to_district_id,
                "cod_amount" => $bill->total_remain,
                "content" => "hóa đơn linh kiện máy tính",
                "weight" => (int)$request->weight,
                "length" => (int)$request->length,         
                "width" => (int)$request->width,
                "height" => (int)$request->height,
                "cod_failed_amount" => 2000,
                "pick_station_id" => 1444,
                "insurance_value" => 100000,
                "service_id" => 0,
                "service_type_id" => 2,
                "coupon" => null,
                "pick_shift" => [2],
                "items" => $items,
            ];
            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
                'Token' => $token,
                'ShopId' => $shopId,
            ])->post($url, $data);
    
            $res = $response->json();
     
      
            if ($response->successful()) {
                $expectedDeliveryTime = $res['data']['expected_delivery_time'];
                $dateTime = Carbon::parse($expectedDeliveryTime);
                $formattedTime = $dateTime->format('Y-m-d H:i:s');

                $shipping = new Shipping();
                $shipping->bill_id = $bill->bill_id;
                $shipping->order_code = $res['data']['order_code'];
                $shipping->trans_type = $res['data']['trans_type'];
                $shipping->total_fee = $res['data']['total_fee'];
                $shipping->expected_delivery_time = $formattedTime;
                $shipping->save();
                
            
                Session::flash('suc-message', $res['message_display']);
                return redirect()->route('bill.index');
            }else{

                Session::flash('err-message', $res['message_display']);
                return redirect()->route('bill.index');
            }


            
        }
        Session::flash('suc-message', "Cập nhật thành công !");

        return redirect()->route('bill.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
   
        $Bill = Bill::where('bill_id', $id)->first();
        BillDetail::where('bill_id', $Bill->bill_id)->delete();
        Customer::find($Bill->customerID)->delete();
        Bill::where('bill_id', $Bill->bill_id)->delete();//
        Session::flash('message', "Đã xóa thành công đơn hàng");

        return redirect()->route('bill.index');
    }
  
}
