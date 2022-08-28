<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Product;
use App\Http\Requests\ProductRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        //use Eloquent ORM
        $products = Product::paginate(4);
        return view('product.index',['products'=>$products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('product.create',['categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
       
       $des= 'public/upload';
       $imgname = $request->file('productImage')->getClientOriginalName();
       $product = new Product();
       $product->categoryID = $request->categoryID;
       $product->productName = $request->productName;
       $product->productImage = $imgname;
       $product->discountPercent = $request->discountPercent;
       $product->description = $request->description;
       $product->listPrice = $request->listPrice;
       $product->save();
       $request->file('productImage')->move($des,$imgname);
       return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categories = Category::where('categories.categoryID',$id)->get();
        $products = Product::where('categoryID',$id)->get();
        return view('product.show',['categories'=>$categories,'products'=>$products]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = category::all();
        $product = Product::find($id);
        return view('product.edit',['categories'=>$categories,'product'=>$product]);
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
        $imgname = $request->file('productImage')->getClientOriginalName();
        $product = Product::find($id);
        $product->categoryID = $request->categoryID;
        $product->productName = $request->productName;
        $product->productImage = $imgname;
        $product->discountPercent = $request->discountPercent;
        $product->description = $request->description;
        $product->listPrice = $request->listPrice;
        $product->save();
        $request->file('productImage')->move($des,$imgname);
        return redirect()->route('product.index');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id)->delete();
        return redirect()->route('product.index'); 
    }
    public function __construct()
    {
        $this->middleware('AdminRole'); 
    }
}
