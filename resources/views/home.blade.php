@extends('layout.user.main')

@section('content')
@if(Session::has('message'))
  <script type="text/javascript">
     swal({
         title:'Cảm ơn bạn đã mua hàng!',
         text:"{{Session::get('message')}}",
         button: "Đồng ý!",
         icon: "success"
     }).then((value) => {
       //location.reload();
     }).catch(swal.noop);
 </script>
 @endif
 <!-- slide trình chiếu -->
 <div class="container-fluid" style="height:150px"></div>
 <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
   <ul class="carousel-indicators">
     <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
     <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
     <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
     <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
     <li data-target="#carouselExampleIndicators" data-slide-to=""></li>
   </ul>
   <div class="carousel-inner">
     <div class="carousel-item active">
       <img class="d-block w-100" src="public/upload/{{ $slide->slide }}" alt="First slide">
     </div>
   @foreach ($slides as $item)
   <div class="carousel-item">
    <img class="d-block w-100" src="public/upload/{{ $item->slide1 }}">
  </div>
   @endforeach
  
   </div>
 
   <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
     <span class="carousel-control-prev-icon" aria-hidden="true"></span>
     <span class="sr-only">Previous</span>
   </a>
   <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
     <span class="carousel-control-next-icon" aria-hidden="true"></span>
     <span class="sr-only">Next</span>
   </a>
 </div>
 <!-- kết thúc slide -->
<!-- list sản phẩm -->
<div class="container bg-white jumbotron">
  <div class="row mt-3 ">
    <h4 class="list-product-title col-sm-12 bg-danger text-white"> <i class="fas fa-bolt"></i>   KHUYẾN MÃI ONLINE</h4>
   <div class="list-product-subtitle text-secondary">
     <h5>Các sản phẩm đang trong thời gian khuyến mãi </h5></div>
     <div class="spinner-grow text-danger"></div>
     <!-- phần bảng sản phẩm 4x4 -->
   <div class="product-group mt-2">
     <div class="row ">
      <!-- dat foreach -->
      @foreach ($products as $product)
      <div class="col-md-3 col-sm-6 col-12">
          <div class="card card-product">
            <img class="card-img-top" src="./public/upload/{{ $product->productImage }}" alt="Card image cap">
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
                <a class="btn btn-outline-success btn-detail mt-2 font-weight-bold" href="{{ route('detail.show',$product->productID) }}"> Xem chi tiết</a>
                <span class="badge badge-danger text-white"><h6>{{ $product->discountPercent }}%</h6></span>
           
              </div>
              
            </div>
          </div>
           
         </div>
         @endforeach
    <!--end-->
         
     
        
     
       </div>

     </div>
     <div class="product-group mt-5">
      <div class="row ">
       
      </div>

    </div>
  <!-- Kết thúc phần bảng -->
  </div>
  <div class="row mt-5">
    <div class="col-12">
      <button type="button" class="btn btn-outline-danger btn-block ">Xem tất cả</button>
    </div>
  </div>
</div>
<!-- Kết thúc list -->

<!-- 3 banner quảng cáo - 2 list sản phẩm -->
<div class="container">
 <div class="row mt-5">
 <div class="col-sm-4">
   
   <img src="http://img1.phongvu.vn/media/banner/pv-banner-390x190-36830.jpg" alt="ads" class="rounded" width="390" height="190" >
 </div>
 <div class="col-sm-4">
  <img src="https://img1.phongvu.vn/media/banner/pv-banner-660x390-b0959.jpg" alt="ads" class="rounded" width="390" height="190">
 </div>
 <div class="col-sm-4">
  <img src="http://img1.phongvu.vn/media/banner/pv-banner-390x190-35706.jpg" alt="ads" class="rounded"width="390" height="190" >
 </div>
</div>
</div>
<div class="container">
<div class=" mt-5 text-info">
<img src="public/frontend/image/icon/Capture.PNG" alt=""   class="mb-3"> 
<h3 style="display: inline;">THÙNG CASE</h3>
</div>
<div class="container bg-white jumbotron">
<div class="row bg-white" >
  <div class="product-group">
    <div class="row ">
      <!-- dat foreach -->
      @foreach ($vocase as $item)
      <div class="col-md-3 col-sm-6 col-12">
          <div class="card card-product">
            <img class="card-img-top" src="./public/upload/{{ $item->productImage }}" alt="Card image cap">
            <div class="card-body">
              <h6 class="card-title product-title mb-3">
                <a  data-toggle="tooltip" data-placement="bottom" title="
                {{ $item->productName }}"> 
                {{ $item->productName }}
              </a>
               
              </h6>
              <div class="card-text">
                <span class="new-price"> {{number_format($item->listPrice)}}đ </span>
                <span class="old-price text-secondary"> {{number_format($item->listPrice)}}đ </span>
                <br>
                <a class="btn btn-success btn-add-to-cart mt-2" onclick="AddCart({{ $item->productID }})" href="javascript:"><i class="fas fa-cart-arrow-down"></i></a>
                <a class="btn btn-outline-success btn-detail mt-2 font-weight-bold" href="{{ route('detail.show',$item->productID) }}"> Xem chi tiết</a>
                <span class="badge badge-danger text-white"><h6>{{ $item->discountPercent }}%</h6></span>
           
              </div>
              
            </div>
          </div>
           
         </div>
         @endforeach
      
    </div>

  </div>
</div>
<div class="row mt-5">
  
    <a href="case.html"  type="button" class="btn btn-outline-danger  " style="margin: auto; width: 30%;">Xem tất cả</a>
  
</div>
</div>
</div>
<div class="container">
<div class=" mt-5 text-info">
  <img src="public/frontend/image/icon/Capture.PNG" alt=""   class="mb-3"> 
  <h3 style="display: inline;">MÀN HÌNH</h3>
</div>
 <div class="container bg-white jumbotron">
  <div class="row bg-white" >
    <div class="product-group">
      <div class="row ">
         <!-- dat foreach -->
      @foreach ($monitor as $item)
      <div class="col-md-3 col-sm-6 col-12">
          <div class="card card-product">
            <img class="card-img-top" src="./public/upload/{{ $item->productImage }}" alt="Card image cap">
            <div class="card-body">
              <h6 class="card-title product-title mb-3">
                <a  data-toggle="tooltip" data-placement="bottom" title="
                {{ $item->productName }}"> 
                {{ $item->productName }}
              </a>
               
              </h6>
              <div class="card-text">
                <span class="new-price"> {{number_format($item->listPrice)}}đ </span>
                <span class="old-price text-secondary"> {{number_format($item->listPrice)}}đ </span>
                <br>
                <a class="btn btn-success btn-add-to-cart mt-2" onclick="AddCart({{ $item->productID }})" href="javascript:"><i class="fas fa-cart-arrow-down"></i></a>
                <a class="btn btn-outline-success btn-detail mt-2 font-weight-bold" href="{{ route('detail.show',$item->productID) }}"> Xem chi tiết</a>
                <span class="badge badge-danger text-white"><h6>{{ $item->discountPercent }}%</h6></span>
           
              </div>
              
            </div>
          </div>
           
         </div>
         @endforeach
      </div>

    </div>
  </div>
  <div class="row mt-5">

      <a href="card.html"   type="button" class="btn btn-outline-danger  " style="margin: auto; width: 30%;">Xem tất cả</a>
      
  </div>
 </div>
</div>


<script>
  function AddCart(productID){
      $.ajax({
        type: 'GET',
        url: 'Add-Cart/'+productID,
        }).done(function (response) {
          RenderCart(response);
          alertify.success('Đã thêm vào giỏ hàng');
        });
      
  }
  $("#change-item-cart").on("click", ".si-close a" , function(){
    $.ajax({
        type: 'GET',
        url: 'Delete-Item-Cart/'+$(this).data("id"),
        }).done(function (response) {
          RenderCart(response);
          alertify.warning('Đã xóa sản phẩm');
        });

  });
  function RenderCart(response){
          $("#change-item-cart").empty();
          $("#change-item-cart").html(response);
          $("#total-quanty-show").text($("#total-quanty-cart").val());
   }
</script>
@endsection