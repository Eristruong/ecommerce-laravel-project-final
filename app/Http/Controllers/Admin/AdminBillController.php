<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Bill;
use App\BillDetail;
use App\Customer;

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
                    ->select('customers.*', 'bills.status as status')
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
                     $customer = DB::table('customers')
                    ->join('bills', 'customers.id', '=', 'bills.customerID')
                    ->select('customers.*', 'bills.bill_id as bill_id', 'bills.total as bill_total', 'bills.note as bill_note', 'bills.status as bill_status', 'bills.payment as bill_payment', 'bills.codevnpay as bill_codevnpay')
                    ->where('customers.id', '=', $id)
                    ->first();

                    $bills = DB::table('bills')
                    ->join('bill_details', 'bills.bill_id', '=', 'bill_details.bill_id')
                    ->leftjoin('products', 'bill_details.productID', '=', 'products.productID')
                    ->where('bills.customerID', '=', $id)
                    ->select('bills.*', 'bill_details.*', 'products.productName as product_name')
                    ->get();

                    return view('order.show',['customer'=>$customer,'bills'=>$bills]);
                    
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
        Session::flash('message', "Cập nhật thành công !");

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
        BillDetail::where('bill_id', $id)->delete();
        Bill::where('customerID', $id)->delete();
        Customer::find($id)->delete();
        Session::flash('message', "Đã xóa thành công đơn hàng");

        return redirect()->route('bill.index');
    }
  
}
