<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Users;
use Illuminate\Support\Facades\DB;
use App\Bill;
use App\BillDetail;
use App\Customer;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('infouser');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (DB::table('customers') != null) {
            $customer = DB::table('customers')
            ->join('bills', 'customers.id', '=', 'bills.customerID')
            ->select('customers.*', 'bills.total as bill_total', 'bills.note as bill_note', 'bills.status as bill_status', 'bills.payment as bill_payment')
            ->where('customers.userID', '=', $id)
            ->first();
        }else{
            $customer = '';
        }
      

       if (DB::table('bills') != null) {
           if ($customer != null) {
            $bills = DB::table('bills')
            ->join('bill_details', 'bills.bill_id', '=', 'bill_details.bill_id')
            ->leftjoin('products', 'bill_details.productID', '=', 'products.productID')
            ->where('bills.customerID', '=', $customer->id)
            ->select('bills.*', 'bill_details.*', 'products.productName as product_name')
            ->get();
           }else{
               $bills = '';
           }
       
       }else{
           $bills = '';
       }

        return view('orderdetail',['customer'=>$customer,'bills'=>$bills]);
      

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
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
        $user = Users::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phonenumber = $request->phonenumber;
        $user->address = $request->address;
        $user->save();
        return view('infouser');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        BillDetail::where('bill_id', $id)->delete();
        Bill::where('customerID', $id)->delete();
        Customer::find($id)->delete();
        Session::flash('message', "Cảm ơn bạn đã tin tưởng mua sản phẩm từ chúng tôi !");

        return redirect()->route('home');
    }
}
