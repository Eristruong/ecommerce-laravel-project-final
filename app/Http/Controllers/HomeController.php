<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $products = Product::limit(8)->get();
        $slide = DB::table('banner')->select('slide')->first();
        $slides = DB::table('banner')->get();
        $vocase = Product::where('categoryID','7')->get();
        $monitor = Product::where('categoryID','9')->get();
        return view('home',['products'=>$products,'slide'=>$slide,'slides'=>$slides,'vocase'=>$vocase,'monitor'=>$monitor]);
    }

    public function find(Request $request)
    {
      //c1. Sử dụng store procedure
      /*
      $sql = "call timkiem(:condition)";
      $params = ['condition'=>$request->search];
      $result = DB::select($sql,$params);
      */
      //c2 sử dụng query buider
       if(!is_numeric($request->keywords))
       {
           $result = DB::table('categories')
           ->join('products','categories.categoryID','=','products.categoryID')
           ->select('categoryName','productName','productImage','listPrice')
           ->orWhere('categoryName','like','%'.$request->keywords.'%')
           ->orWhere('productName','like','%'.$request->keywords.'%')
           ->get();
       }
       else{
           $result = DB::table('categories')
           ->join('products','categories.categoryID','=','products.categoryID')
           ->select('categoryName','productName','productImage','listPrice')
           ->Where('listPrice','<=',$request->keywords) 
           ->get();         
       }
       
       return view('findhome',['result'=>$result]);
        

         /*
        $keyword = $request->keywords;
        $result = DB::table('products')->where('productName','like','%'.$keyword.'%')->get();
        return view('find',['product'=>$result]);
        */


    }
    
}
