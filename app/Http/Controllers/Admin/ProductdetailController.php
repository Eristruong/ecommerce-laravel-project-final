<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\ProductDetail;
use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\DB;

class ProductdetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $products = DB::table('productdetails')
                    ->join('products', 'productdetails.productID', '=', 'products.productID')
                    ->select('productdetails.*', 'products.productName as productName')
                    ->get();
       
        return view('productdetail.index',['products'=>$products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        return view('productdetail.create',['products'=>$products]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $des= 'public/upload';
        $imgname1 = $request->file('productImage1')->getClientOriginalName();
       if ($request->file('productImage2') != null) {
        $imgname2 = $request->file('productImage2')->getClientOriginalName();
       }
       if ($request->file('productImage3') != null) {
        $imgname3 = $request->file('productImage3')->getClientOriginalName();
       }
       $product = new ProductDetail();
       $product->productID = $request->productID;
       $product->brand = $request->brand;
       $product->guarantee = $request->guarantee;
       $product->productImage1 = $imgname1;
       if (isset($imgname2)) {
        $product->productImage2 = $imgname2;
       } else {
        $product->productImage2 = '';
       }
       if (isset($imgname3)) {
        $product->productImage3 = $imgname3;
       } else {
        $product->productImage3 = '';
       }
       $product->description = $request->description;
       $product->save();
       $request->file('productImage1')->move($des,$imgname1);
       if (isset($imgname2)) {
        $request->file('productImage2')->move($des,$imgname2);
       }
       if (isset($imgname3)) {
        $request->file('productImage3')->move($des,$imgname3);
       }
       return redirect()->route('prodetail.index');
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
        $products = Product::all();
        $prodetail = ProductDetail::find($id);
        return view('productdetail.edit',['products'=>$products, 'prodetail'=>$prodetail]);
      
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
        $des= 'public/upload';
        $imgname1 = $request->file('productImage1')->getClientOriginalName();
       if ($request->file('productImage2') != null) {
        $imgname2 = $request->file('productImage2')->getClientOriginalName();
       }
       if ($request->file('productImage3') != null) {
        $imgname3 = $request->file('productImage3')->getClientOriginalName();
       }
       $product = ProductDetail::find($id);
       $product->productID = $request->productID;
       $product->brand = $request->brand;
       $product->guarantee = $request->guarantee;
       $product->productImage1 = $imgname1;
       if (isset($imgname2)) {
        $product->productImage2 = $imgname2;
       } else {
        $product->productImage2 = '';
       }
       if (isset($imgname3)) {
        $product->productImage3 = $imgname3;
       } else {
        $product->productImage3 = '';
       }
       $product->description = $request->description;
       $product->save();
       $request->file('productImage1')->move($des,$imgname1);
       if (isset($imgname2)) {
        $request->file('productImage2')->move($des,$imgname2);
       }
       if (isset($imgname3)) {
        $request->file('productImage3')->move($des,$imgname3);
       }
       return redirect()->route('prodetail.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ProductDetail::find($id)->delete();
        return redirect()->route('prodetail.index ');
    }
}
