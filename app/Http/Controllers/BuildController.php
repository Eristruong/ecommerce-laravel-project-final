<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use Illuminate\Support\Facades\DB;
use App\Cart;

class BuildController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $products = Product::all();
        return view('build',['categories'=>$categories,'products'=>$products]);
    }

    /**
     * Show the form for creating a new resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function choose(Request $request, $productID)
    {
        $categoryID = Product::where('productID', $productID)->select('categoryID')->first();
        $category = DB::table('categories')->where('categoryID',$categoryID->categoryID)->first();
        $product = DB::table('products')->where('productID', $productID)->first();
        if($product != null){
            // nếu Session('Cart') khác null thì gán cho biến $oldcart ngược lại thì gán null 
                $oldcart =  Session('Build') ? Session('Build') : null;
                $newcart = new Cart($oldcart);
                $newcart->AddCart($product, $product->productID);
                $request->session()->put('Build', $newcart);
        }
       
        return view('buildpc',['category'=>$category, 'product'=>$product]);
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
        $products = Product::where('categoryID', $id)->get();
        return view('buildviewajax',['products'=>$products]);
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
