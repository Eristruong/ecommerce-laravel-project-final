@extends('layout.user.main')
@section('content')
<div class="container-fluid" style="height:110px"></div>
<div class="container bg-white jumbotron " >
  <div class="row p-2" style="border:1px solid rgba(105, 105, 105, 0.26);">
   <div class="list-product-subtitle text-secondary ">
     <h5>{{ $category->categoryName }}</h5></div>
     <div class="spinner-grow text-danger"></div>
   <div class="product-group mt-2">
     <div class="row ">
       <!-- dat foreach -->
       @foreach ($products as $product)
       <div class="col-md-3 col-sm-6 col-12">
           <div class="card card-product">
             <img class="card-img-top" src="../public/upload/{{ $product->productImage }}" alt="Card image cap">
             <div class="card-body">
               <h6 class="card-title product-title mb-3">
                 <a  data-toggle="tooltip" data-placement="bottom" title="
                 {{ $product->productName }}"> 
                 {{ $product->productName }}
               </a>
                
               </h6>
               <div class="card-text">
                 <span class="new-price"> {{number_format($product->listPrice)}}đ </span>
                 <span class="old-price text-secondary"> {{number_format($product->listPrice)}}đ </span>
                 <br>
                 <a class="btn btn-success btn-add-to-cart mt-2" onclick="AddCart({{ $product->productID }})" href="javascript:"><i class="fas fa-cart-arrow-down"></i></a>
                 <a class="btn btn-outline-success btn-detail mt-2 font-weight-bold" href="{{ route('detail.show',$product->productID,$product->categoryID) }}"> Xem chi tiết</a>
                 <span class="badge badge-danger text-white"><h6>{{ $product->discountPercent }}%</h6></span>
            
               </div>
               
             </div>
           </div>
            
          </div>
          @endforeach
   </div>
   </div>
  
    <div class="d-flex justify-content-center  mt-5 mb-5">{{ $products->links() }}</div>
</div>
  <div class="row p-3 gt">
    <div> {!!$category->cate_description!!}</div>
    <button type="button" class="btn btn-dark btn-block" >XEM ĐẦY ĐỦ</button>

  </div>
</div>
  


@endsection