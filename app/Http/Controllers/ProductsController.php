<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Category;
use App\Cart;
use App\Comment;
use Illuminate\Support\Facades\DB;
use App\ProductDetail;


class ProductsController extends Controller
{
   
   public function showlist($id)
   {
       $category = Category::where('categories.categoryID',$id)->first();
       $products = Product::where('categoryID',$id)->paginate(8);
       return view('listproduct',['category'=>$category,'products'=>$products]);

   }
   public function showdetail($id)
   {   
       $categoryID = Product::where('productID', $id)->select('categoryID')->first();
       $products = Product::where('categoryID',$categoryID->categoryID)->get();
       $prodetail = ProductDetail::where('productID',$id)->first();
        $comments = Comment::where('productID',$id)->latest('created_at')->get();
       $product = Product::where('productID',$id)->first();
       return view('productdetail',['product'=>$product, 'prodetail'=>$prodetail, 'comments'=>$comments, 'products'=>$products]);

   }
   public function AddItemCart(Request $request, $productID)
   {   //lay giỏ hàng cũ 
    $product = DB::table('products')->where('productID', $productID)->first();
    if($product != null){
        // nếu Session('Cart') khác null thì gán cho biến $oldcart ngược lại thì gán null 
            $oldcart =  Session('Cart') ? Session('Cart') : null;
            $newcart = new Cart($oldcart);
            $newcart->AddCart($product, $product->productID);
            
            $request->session()->put('Cart', $newcart);
    }
 
    return redirect()->route('list.cart');
   }
   
}
