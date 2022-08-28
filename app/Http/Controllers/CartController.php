<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Product;
use App\Cart;
use Illuminate\Support\Facades\Session;
use Illuminate\Session\Store\Illuminate\Session\SessionManager;
use PHPUnit\Framework\Constraint\Count;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ViewListCart()
    {
        return view('list');
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
    public function AddCart(Request $request, $productID)
    {    
        $product = DB::table('products')->where('productID', $productID)->first();
        if($product != null){
            // nếu Session('Cart') khác null thì gán cho biến $oldcart ngược lại thì gán null 
                $oldcart =  Session('Cart') ? Session('Cart') : null;
                $newcart = new Cart($oldcart);
                $newcart->AddCart($product, $product->productID);
                $request->session()->put('Cart', $newcart);
        }
        return view('cart');
    }
    public function DeleteItemCart(Request $request, $productID)
    {   //lay giỏ hàng cũ 
        $oldcart =  Session('Cart') ? Session('Cart') : null;
        $newcart = new Cart($oldcart); //tạo đôi tượng newcart
        $newcart->DeleteItemCart($productID);
         // kiểm tra giỏ hàng nếu còn thì đẩy session lên lại nếu ko còn thì xóa giỏ hàng
       if(Count( $newcart->products ) > 0 ){
       
           $request->Session()->put('Cart', $newcart);
       }
       else{
           $request->Session()->forget('Cart');
       }
       return view('cart');
    }
    public function DeleteListItemCart(Request $request, $productID)
    {   //lay giỏ hàng cũ 
        $oldcart =  Session('Cart') ? Session('Cart') : null;
        $newcart = new Cart($oldcart);
        $newcart->DeleteItemCart($productID);
         // kiểm tra giỏ hàng nếu còn thì đẩy session lên lại nếu ko còn thì xóa giỏ hàng
         if(( $newcart->products ) != null ){
       
           $request->Session()->put('Cart', $newcart);
       }
       else{
           $request->Session()->forget('Cart');
       }
       return view('listcart');
    }
    /* lưu từng quanty của sản phẩm
    public function SaveListItemCart(Request $request, $productID, $quanty)
    {   
        $oldcart =  Session('Cart') ? Session('Cart') : null;
        $newcart = new Cart($oldcart); //tạo đôi tượng newcart
        $newcart->UpdateItemCart($productID, $quanty);
         // kiểm tra giỏ hàng nếu còn thì đẩy session lên lại nếu ko còn thì xóa giỏ hàng
        $request->Session()->put('Cart', $newcart);
        return view('listcart');
    }
    */
    public function SaveAllItem(Request $request)
    {
       
       foreach($request->data as $item)
       {
        $oldcart =  Session('Cart') ? Session('Cart') : null;
        $newcart = new Cart($oldcart); //tạo đôi tượng newcart
        $newcart->UpdateItemCart($item["key"], $item["value"]);
           // kiểm tra giỏ hàng nếu còn thì đẩy session lên lại nếu ko còn thì xóa giỏ hàng
       $request->Session()->put('Cart', $newcart);
       }
        return view('listcart');
     
 
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
