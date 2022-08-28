@extends('layout.user.main')
@section('content')
<div style="height: 100px;"></div>
    <div class=" container-fluid jumbotron">
        <h3 style="font-weight: bold; color: #4A235A;">Xây dựng cấu hình cho máy tính của bạn</h3>
    
        @foreach ($categories as $category)
      
        <div class="card" style=" max-width: 1100px;">
            <div class="card-body">
        <div class="row">
            <div class="col-3 font-weight-bold">{{ $category->categoryName }}</div>
            <div class="col-3" id="choose-products">
            <div class=""><img src="http://static.360buyimg.com/master-of-loader/pc/img/mother-board-icon.82595f5e.svg" style="vertical-align: middle;  width:80px;margin-right: 30px"></div>
            <div class=""><p style="color: #4A235A;"><b>Vui lòng chọn linh kiện</b></p></div>
          </div>
            <div class="col-3">
                                        <!-- Button to Open the Modal -->
  <a class="btn btn-primary" onclick="ViewPro({{ $category->categoryID }})" data-toggle="modal" data-target="#myModal">
   <span class="text-white">Chọn</span>
   </a>
 
   <!-- The Modal -->
   <div class="modal fade" id="myModal">
     <div class="modal-dialog modal-dialog-centered" style=" max-width: 1000px;">
       <div class="modal-content">
      
         
         <!-- Modal body -->
         <div class="modal-body">
            <div id="change-view-product">
                <div class="spinner">
                    <div class="bounce1"></div>
                    <div class="bounce2"></div>
                    <div class="bounce3"></div>
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

        <br>

                    
        @endforeach      
    
          
    </div>
        
<script>
         function ViewPro(categoryID){
        $.ajax({
        type: 'GET',
        url: 'View-Pro/'+categoryID,
        }).done(function (response) {
        $("#change-view-product").empty();
        $("#change-view-product").html(response);
        });
            }


        function ChoosePro(productID){
        $.ajax({
        type: 'GET',
        url: 'choose-product/'+productID,
        }).done(function (response) {
          $("#choose-products").empty();
        $("#choose-products").html(response);
        });
      
  }
</script>
  
@endsection