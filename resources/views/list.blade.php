@extends('layout.user.main')
@section('content')
<div class="container-fluid" style="height:80px"></div>
<!-- kê´t thu´c slide -->
<!-- list sa?n phâ?m -->
<div class="container bg-white jumbotron">
   <div class="row">
      <h4 class="list-product-title col-sm-12 bg-danger text-white" style="text-align: left;"> <i class="fa fa-shopping-basket"></i> Giỏ Hàng của bạn </h4>
      <div class="table" id="list-cart">
         @if (Session::has("Cart") != null)
         <table class="table table-hover">
            <thead class="bg-info text-white">
               <tr>
                  <th></th>
                  <th>Sản Phẩm</th>
                  <th>Đơn Giá</th>
                  <th>Số Lượng</th>
                  <th>Giá Tiền</th>
                  <th>Action</th>
               </tr>
            </thead>
            <tbody>
            
               @foreach(Session::get('Cart')->products as $item)
               <tr>
                  <td> <img src="public/upload/{{ $item['productInfo']->productImage }}" style="vertical-align: middle;  width:80px;margin-right: 30px">
                  </td>
                  <td>
                     <p style="color: #4A235A;"><b>{{ $item['productInfo']->productName }}</b></p>
                  </td>
                  <td>
                     <p class="font-italic">{{ number_format($item['productInfo']->listPrice) }}₫</p>
                  </td>
                  <td class="d-flex">
                     <input data-id="{{ $item['productInfo']->productID }}" type="number" id="quanty-item-{{ $item['productInfo']->productID }}" style="width: 70%;" name="soluong" min="1" max="9" value="{{ $item['quanty'] }}" class="form-control" required>
                    <!--  <h2> <a href="#" onclick="SaveListItemCart({{ $item['productInfo']->productID }});"  role="button"><i class="fad fa-save"></i></a></h2> -->
                  </td>
                  <td style="font-weight: bold; color: #4A235A;">{{ number_format($item['price']) }}₫</td>
                  <td> 
                     <button type="button" class="btn btn-danger" onclick="DeleteListItemCart({{ $item['productInfo']->productID }});">Xóa</button>
                  </td>
               </tr>
               @endforeach    
             
            </tbody>
         </table>
      
         <a href="#" class="btn btn-info btn-sm edit-all" role="button" style="float: right;">
            <b>Lưu thay đổi</b> 
        </a>
        <br>
        @endif

         @if (Session::has("Cart") != null)
         <div style="color: #4A235A;">
            <p>
            <h5>Giỏ hàng hiện tại của bạn đang có {{ Session::get('Cart')->totalQuanty }} Sản phẩm</h5>
            </p>
            <p class="font-weight-bold">TỔNG TIỀN CỦA BẠN LÀ: 
            <h4>{{number_format(Session::get('Cart')->totalPrice)}}₫</h4>
            </p>
         </div>
         <a href="{{ url('checkout') }}">
         <b><input type="submit" value="ĐẶT HÀNG NGAY" style=" background: linear-gradient(to right, #DC143C,#7D3C98);  color: #ffffff; font-size: 15px;  font-weight: bold;" class="button btn btn-light"></b></a>
         @else
         
            <h2 style="color: #4A235A;">Bạn Chưa có sản phẩm trong giỏ hàng vui lòng thêm sản phẩm !</h2>
       
         @endif  
      </div>
   </div>
</div>
<script>
   function DeleteListItemCart(productID){
     $.ajax({
         type: 'GET',
         url: 'Delete-List-Item-Cart/'+productID,
         }).done(function (response) {
           RenderListCart(response);
           alertify.success('Đã xóa sản phẩm');
         });
   }

   
   /*
   lưu từng quanty
   function SaveListItemCart(productID){
     $.ajax({
         type: 'GET',
         url: 'Save-List-Item-Cart/'+productID+'/'+$("#quanty-item-"+productID).val(),
         }).done(function (response) {
           RenderListCart(response);
           alertify.success('Đã cập nhật sản phẩm');
         });
   }
   */
    $("#change-item-cart").on("click", ".si-close a" , function(){
              $.ajax({
                  type: 'GET',
                  url: 'Delete-Item-Cart/'+$(this).data("id"),
                  }).done(function (response) {
                     $("#change-item-cart").empty();
                     $("#change-item-cart").html(response);
                    alertify.warning('Đã xóa sản phẩm');
                  });
          
            });
   function RenderListCart(response){
           $("#list-cart").empty();
           $("#list-cart").html(response);
   
   }
   $(".edit-all").on("click", function(){
            var lists = [];
            $("table tbody tr td").each(function(){
              $(this).find("input").each(function(){
                 var element = { key: $(this).data("id"), value: $(this).val()};
                 lists.push(element);
              });
            });
            $.ajax({
         url: 'All-Save',
         type: 'POST',
         data: {
            "_token" : "{{ csrf_token() }}",
            "data" : lists
         }
         }).done(function (response) {
           RenderListCart(response);
           alertify.success('Đã cập nhật sản phẩm');
         });
   });
   
</script>
@endsection