@extends('layout.user.main')
@section('content')
<div class="container-fluid " style="height:90px"></div>
<!-- end -->

<div class="container jumbotron bg-white">
  <div class="row ">
    <div class="col-sm-4">
    <div class="pic p-0 img_sp">
    <img src="../public/upload/{{ $product->productImage }}" alt="" style="" class="xzoom" xoriginal="../public/upload/{{ $product->productImage }}">
  </div>
  <div class="img_sp_chitiet xzoom-thums">
              <a href="../public/upload/{{ $product->productImage }}" class="card">
                <img src="../public/upload/{{ $product->productImage }}" xpreview="../public/upload/{{ $product->productImage }}" class="xzoom-gallery">
              </a>
              @if (isset($prodetail->productImage1))
              <a href="../public/upload/{{ $prodetail->productImage1 }}" class="card">
                <img src="../public/upload/{{ $prodetail->productImage1 }}" class="xzoom-gallery">
              </a>
              @endif
              @if (isset($prodetail->productImage2))
              <a href="../public/upload/{{ $prodetail->productImage2 }}" class="card">
                <img src="../public/upload/{{ $prodetail->productImage2 }}" class="xzoom-gallery">   
              </a>
              @endif
              @if (isset($prodetail->productImage3))
              <a href="../public/upload/{{ $prodetail->productImage3 }}" class="card">
                <img src="../public/upload/{{ $prodetail->productImage3 }}" class="xzoom-gallery">
              </a>
              @endif
            </div>
 
</div>
<div class="col-sm-8">
  <h4 style="color: #4A235A;" class="font-weight-bold">{{ $product->productName }}</h4>
  <div class="no-review font-weight-bold mt-3">Chưa có đánh giá</div>
  <div class="d-flex flex-column p-2" style="background-color: rgba(219, 219, 219, 0.26);">
    <div class="d-flex justify-content-around ">
      <div class="p-2 text-secondary">Giá niêm yết</div>
      <div class="p-2 old-price"><h5>{{number_format($product->listPrice)}}đ</h5></div>
     
    </div>
    <div class="d-flex justify-content-around ">
      <div class="p-2 text-secondary">Giá khuyến mãi</div>
      <div class="p-2 new-price">
        <h5>{{number_format($product->listPrice)}}đ</h5>
        
        </div>
   
    </div>

  </div>
  <div class=" d-flex ml-5 pb-4" style="border-bottom: solid 1px rgba(145, 145, 145, 0.404);">
    <div class="p-2 text-secondary">
      Vận chuyển
    </div>
    <div class="p-2 ml-5">
      <img src="../public/frontend/a.png" alt="" class="mb-2" style="height: 25px;">
      Miễn phí vận chuyển <a  class="text-secondary">(với đơn hàng trên 500.000đ)</a>
    </div>
    
  </div>
  <div class="d-flex pt-2" style="margin-left: 100px;">
    <div class="p-2 text-secondary">
      Chọn số lượng
    </div>
   <input type="number" style="width: 15%;" name="soluong" min="1" max="9" value="1" class="form-control" required>
 
    
  </div>
  <div class="f-lex mt-4" style="margin-left: 100px;"> 
    <a style="width:170px;" href="{{ route('add.itemcart',$product->productID) }}" class="btn btn-danger mr-4">MUA NGAY</a>
    <a style="width:220px; border: 2px solid;" onclick="AddCart({{ $product->productID }})" href="javascript:" class="btn btn-outline-danger font-weight-bold"><i class="fas fa-cart-arrow-down"></i> THÊM VÀO GIỎ HÀNG</a>
 
  </div>
  <div class="like-share mt-4 ml-5">
     <iframe src="https://www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2Fvku.udn.vn&width=600&layout=standard&action=like&size=large&share=true&height=35&appId" width="600" height="35" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>

  </div>

  
 
</div>
</div>


  
    
  <div class="row">
    <div class="col-4">
  <div class=" font-weight-bold">Mô Tả</div>
  <h6>{{ $product->productName }}</h6>
  <div> {!!$product->description!!}</div>
 
 
    <!-- Button to Open the Modal -->
<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal" style="margin-left: 100px;">
  Xem Thêm
</button>

<!-- The Modal -->
<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">
    
      <!-- Modal Header -->
      <div class="modal-header">
        <h5 class="modal-title" style="margin-left: 150px;">Thông số kỹ thuật</h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      
      <!-- Modal body -->
      <div class="d-flex justify-content-around  mb-2 p-2" style="border-bottom: solid 1px rgba(145, 145, 145, 0.404);">
        <div class=" text-secondary">Thương hiệu</div>
        <div class="">@if (isset($prodetail->brand))
          {{ $prodetail->brand }}
        @endif</div>
     
       
      </div>
      <div class="d-flex justify-content-around mb-2 p-2" style="border-bottom: solid 1px rgba(145, 145, 145, 0.404);">
      <div class=" text-secondary">Bảo hành</div>
      <div class="  ">
        @if (isset($prodetail->guarantee))
        {{ $prodetail->guarantee }}
        @endif tháng</div>
     
    </div>
    <div class="d-flex justify-content-around mb-2 p-2" style="border-bottom: solid 1px rgba(145, 145, 145, 0.404);">
      <div class=" p-2 font-weight-bold">Cấu hình chi tiết</div>
      
     
    </div>
    
    <div class="d-flex justify-content-around mb-2 p-2" style="border-bottom: solid 1px rgba(145, 145, 145, 0.404);">
      <div class=" text-secondary">CPU</div>
      <div class="">Core i7-9700</div>
     
    </div>
    
  
 
</div>



</div>



</div>





      
      
      
    </div>
  </div>
</div>
</div>
</div>
</div>
<div class="container text-secondary"><h4>Các Sản phẩm liên quan</h4>
</div>
<div class="container">
<!--slider 1 bags------------------------------------------>
<div class="heading">
</div>
<!--swiper slider-->
<div class="swiper-container" style="z-index: 1px;">
    <div class="swiper-wrapper">
    <!--slide 1-------------------------------------->
    @foreach ($products as $pro)
    <div class="swiper-slide">
      <div class="slider-box">
<p class="time">New</p>
<div class="img-box">
<img src="../public/upload/{{ $pro->productImage }}">
</div>

<p class="detail product-title"  data-toggle="tooltip" data-placement="bottom" title="
{{ $pro->productName }}">{{ $pro->productName }}
</p>

<a href="#" class="text-danger">{{number_format($pro->listPrice)}}đ</></a>
<div class="cart">
<a onclick="AddCart({{ $pro->productID }})" href="javascript:">Thêm vào giỏ hàng</a>
</div>
</div>
      
      </div>    
    @endforeach
    
      
  </div>
</div>
</div>
      

<div class="container text-secondary"><h4>Về Sản Phẩm</h4>
   
</div>
<div class="font-weight-bold text-dark p-2" style="background: rgba(155, 155, 155, 0.438); margin-left: 105px; margin-right: 105px;">THÔNG TIN CHI TIẾT</div>

<div class="container jumbotron bg-white">
  <div>
    @if (isset($prodetail->description))
    {!!$prodetail->description!!}
    @endif
  </div>
<button type="button" class="btn btn-dark btn-block" >XEM ĐẦY ĐỦ</button>

        </div>
        <!-- Phần comment -->
        <div class="container">
        
      
          <div class="row">
               <div class="col-md-8 col-md-offset-2">
                  <div class="card">
                      <div class="card-header bg-info text-white"><h4>Nhận xét về sản phẩm</h4></div>
      
                      <div class="card-body comment-container" >
                          
                          @foreach($comments as $comment)
                              <div class="well">
                                  <i><b> {{ $comment->name }} :</b></i>&nbsp;&nbsp;
                                  <span> {{ $comment->comment }} </span>
                                  <div style="margin-left:10px;">
                             
                                    
                                        
                                    @if (Auth::check())
                                      <a style="cursor: pointer;" pid="{{ $product->productID }}" cid="{{ $comment->id }}" name_a="{{ Auth::user()->name }}" token="{{ csrf_token() }}" class="reply text-primary"><b>Trả lời</b></a>&nbsp;
                                      @endif
                                      <a style="cursor: pointer;"  class="delete-comment text-danger" token="{{ csrf_token() }}" comment-did="{{ $comment->id }}" ><b>Xóa</b></a>
                                      <div class="reply-form">
                                          
                                          <!-- Dynamic Reply form -->
                                          
                                      </div>
                                      @foreach($comment->replies as $rep)
                                           @if($comment->id === $rep->comment_id)
                                              <div class="well">
                                                  <i><b> {{ $rep->name }} :</b></i>&nbsp;&nbsp;
                                                  <span> {{ $rep->reply }} </span>
                                                  <div style="margin-left:10px;">
                                                    @if (Auth::check())
                                                      <a rname="{{ Auth::user()->name }}" rid="{{ $comment->id }}" style="cursor: pointer;" class="reply-to-reply text-primary" token="{{ csrf_token() }}"><b>Trả lời</b></a>&nbsp;<a did="{{ $rep->id }}" class="delete-reply text-danger" token="{{ csrf_token() }}" ><b>Xóa</b></a>
                                                      @endif
                                                    </div>
                                                  <div class="reply-to-reply-form">
                                          
                                                      <!-- Dynamic Reply form -->
                                                      
                                                  </div>
                                                  
                                              </div>
                                          @endif 
                                      @endforeach
                                      
                                  </div>
                              </div>
                          @endforeach
      
                      </div>
                  </div>
              </div>
          </div>
          <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="card">
                    <div class="card-header"></div>
    
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form id="comment-form" method="post" action="{{ route('comments.store') }}" >
                            {{ csrf_field() }}
                            @if (Auth::check())
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" >                          
                            @endif
                            <div class="form-group">
                              <input type="hidden" name="productID" id="productID" class="form-control" value="{{ $product->productID }}">
                            </div>
                            <div class="row" style="padding: 10px;">
                                <div class="form-group">
                                    <textarea style="width: 700px;" class="form-control" name="comment" placeholder="Viết gì đó..!"></textarea>
                                </div>
                            </div>
                            <div class="row" style="padding: 0 10px 0 10px;">
                                <div class="form-group">
                                    <input type="submit" class="btn btn-outline-success btn-lg" style="width: 100%" name="submit">
                                </div>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
      
         
      
      </div>
        
        <script>
            function AddCart(productID){
                $.ajax({
                  type: 'GET',
                  url: '../Add-Cart/'+productID,
                  }).done(function (response) {
                    RenderCart(response);
                    alertify.success('Đã thêm vào giỏ hàng');
                  });
                
            }
            $("#change-item-cart").on("click", ".si-close a" , function(){
              $.ajax({
                  type: 'GET',
                  url: '../Delete-Item-Cart/'+$(this).data("id"),
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

//js của comment
$(document).ready(function(){
        

        $(".comment-container").delegate(".reply","click",function(){

            var well = $(this).parent().parent();
            var pid = $(this).attr("pid");
            var cid = $(this).attr("cid");
            var name = $(this).attr('name_a');
            var token = $(this).attr('token');
            var form = '<form method="post" action="../replies"><input type="hidden" name="_token" value="'+token+'"><input type="hidden" name="productID" value="'+ pid +'"><input type="hidden" name="comment_id" value="'+ cid +'"><input type="hidden" name="name" value="'+name+'"><div class="form-group"><textarea class="form-control" name="reply" placeholder="Enter your reply" > </textarea> </div> <div class="form-group"> <input class="btn btn-primary" type="submit"> </div></form>';

            well.find(".reply-form").append(form);



        });

        $(".comment-container").delegate(".delete-comment","click",function(){

        	var cdid = $(this).attr("comment-did");
        	var token = $(this).attr("token");
        	var well = $(this).parent().parent();
        	$.ajax({
                    url : "../comments/"+cdid,
                    method : "POST",
                    data : {_method : "delete", _token: token},
                    success:function(response){
                    if (response == 1 || response == 2) {
                        well.hide();
                    }else{
                      alertify.success('bạn chỉ có thể xóa được bình luận của bạn của bạn');
                        console.log(response);
                    }
                }
            });

        });

        $(".comment-container").delegate(".reply-to-reply","click",function(){
            var well = $(this).parent().parent();
            var cid = $(this).attr("rid");
            var rname = $(this).attr("rname");
            var token = $(this).attr("token")
            var form = '<form method="post" action="../replies"><input type="hidden" name="_token" value="'+token+'"><input type="hidden" name="comment_id" value="'+ cid +'"><input type="hidden" name="name" value="'+rname+'"><div class="form-group"><textarea class="form-control" name="reply" placeholder="Enter your reply" > </textarea> </div> <div class="form-group"> <input class="btn btn-primary" type="submit"> </div></form>';

            well.find(".reply-to-reply-form").append(form);

        });

        $(".comment-container").delegate(".delete-reply", "click", function(){

            var well = $(this).parent().parent();

            if (confirm("Bạn có muốn xóa bình luật này..!")) {
                var did = $(this).attr("did");
                    var token = $(this).attr("token");
                    $.ajax({
                        url : "../replies/"+did,
                        method : "POST",
                        data : {_method : "delete", _token: token},
                        success:function(response){
                            if (response == 1) {
                                well.hide();
                                //alert("Your reply is deleted");
                            }else if(response == 2){
                              alertify.warning('Bạn không thể xóa bình luận của người khác');
                            }else{
                                alert('Something wrong in project setup');
                            }
                        }
                    })
            }

            

        });

    }); 
    var swiper = new Swiper('.swiper-container', {
      slidesPerView: 4.2,
      spaceBetween: 30,
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
    });

    
          </script>
          
@endsection