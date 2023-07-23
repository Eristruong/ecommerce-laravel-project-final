@extends('layout.user.main')
@section('content')
@if(Session::has('message'))
  <script type="text/javascript">
     swal({
         title:'',
         text:"{{Session::get('message')}}",
         button: "Đồng ý!",
         icon: "success"
     }).then((value) => {
       //location.reload();
     }).catch(swal.noop);
 </script>
 @endif
<div class="container-fluid" style="height:80px"></div>
<!-- kết thúc slide -->
<!-- list sản phẩm -->
<div class="container bg-white jumbotron border border-info">
   <h3 style="font-weight: bold; color: #4A235A;">Thông tin khách hàng</h3>
   <div class="row">
      <form action="{{ url('Check-Out') }}" method="post" enctype="multipart/form-data">
         {{ csrf_field() }}
         <div class="col-sm-12 mt-3">
            <div class="row">
               <div class="col-sm-8">
                  <div class="form-group">
                     <input type="hidden" name="id" id="id" class="form-control" value="{{ Auth::user()->id }}">
                  </div>
                  <div class="form-group">
                     <label for="name" style="font-weight: bold">Họ tên</label>
                     <input type="text" name="name" id="name" class="form-control" value="{{ Auth::user()->name }}">
                  </div>
                  <div class="form-group">
                     <label for="email" style="font-weight: bold">Email</label>
                     <input type="text" name="email" id="email" class="form-control" value="{{ Auth::user()->email }}">
                  </div>
                  <div class="form-group">
                     <label for="phonenumber" style="font-weight: bold">Số điện thoại</label>
                     <input type="text" name="phonenumber" id="phonenumber" class="form-control" value="{{ Auth::user()->phonenumber }}">
                  </div>
                  <div class="form-group">
                     <div class="row">
                        <div class="col">
                           <label for="address" style="font-weight: bold">Tỉnh thành</label>
                           <select id="mySelect" name="provinceSelect" class="form-control input-inline mr-2" style="width: 200px">
                              <option selected>chọn tỉnh thành</option>
                              @foreach ($provinces as $province)
                              <option value="{{$province->ProvinceID}}">{{$province->ProvinceName}}</option>
                             @endforeach
                          </select>
                        </div>
                     <div class="col">
                        <label for="address" style="font-weight: bold">Quận huyện</label>
                        <select id="districtSelect" name="districtSelect" class="form-control input-inline mr-2" style="width: 200px">
                           <option selected>chọn quận huyện</option>
                        
                       </select>
                     </div>
                     <div class="col">
                        <label for="address" style="font-weight: bold">Phường xã</label>
                        <select id="wardSelect" name="wardSelect" class="form-control input-inline mr-2" style="width: 200px">
                           <option selected>chọn phường xã</option>
                         
                       </select>
                     </div>
                     </div>
                    
                  </div>
                  <div class="form-group">
                     <label for="address" style="font-weight: bold">Địa chỉ</label>
                     <input type="text" name="address" id="address" class="form-control" value="">
                  </div>
               </div>
               <div class="col-sm-4">
                  <div class="form-group">
                     <label for="note" style="font-weight: bold;">Ghi chú</label>
                     <textarea style="height: 300px; " name="note" id="note" class="form-control" value="Ghi chú"></textarea>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-sm-12">
            <table class="table table-hover">
               <thead class="bg-info text-white">
                  <tr>
                     <th></th>
                     <th>Sản phẩm</th>
                     <th>Đơn giá</th>
                     <th></th>
                     <th>Thành tiền</th>
                  </tr>
               </thead>
               <tbody>
                  @if (Session::has("Cart") != null)
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
                     <td>
                        <p><b>{{ $item['quanty'] }}</b></p>
                     </td>
                     <td>
                        <p style="color: #4A235A;"><b>{{ number_format($item['price']) }}₫</b>
                        <p>
                     </td>
                  </tr>
                  @endforeach
                  <tr>
                     <td colspan="4">&nbsp;
                        <span>
                        <a class="btn btn-success update" href="{{ url('/List-Carts')}}">Quay về giỏ
                        hàng</a>
                        </span>
                     </td>
                     <td colspan="2">
                        <table class="table table-condensed total-result">
                           <tbody>
                              <tr>
                                 <td class="font-weight-bold text-info">Tổng tiền :</td>
                                 <td class="font-italic text-danger"><h5>{{number_format(Session::get('Cart')->totalPrice)}}₫</h5></td>
                              </tr>
                              <tr>
                                 <td>
                                 </td>
                                 <td>
                                     <label><b>Phương thức thanh toán</b>: </label>
                                     <select name="thanhtoan" class="form-control input-inline mr-2" style="width: 200px">
                                         <option value="tienmat">Tiền mặt</option>
                                         <option value="tructuyen">Trực tuyến</option>
                                     </select>
                                    <div class="form-group">
                                       <input type="submit" class="btn btn-info btn-xl mt-3" value="Gửi đơn hàng">
                                    </div>
                                 </td>
                                 <td>
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                     </td>
                  </tr>
                  @else
                  <tr style="color: #4A235A;">
                     <td>Bạn chưa có sản phẩm trong giỏ hàng</td>
                  </tr>
                  <tr>
                     <td colspan="4">&nbsp;
                        <a class="btn btn-default update" href="{{ url('/')}}">Mua hàng</a>
                     </td>
                  </tr>
                  @endif
               </tbody>
            </table>
         </div>
      </form>
   </div>
</div>

<script>

  // Hàm được gọi khi danh sách chọn thay đổi giá trị
  function handleSelectProvince() {
   var selectedValue = $("#mySelect").val();
   
   // Gửi giá trị được chọn bằng AJAX đến Laravel controller
   $.ajax({
      url: "{{ route('process.selectidpro') }}",
      type: "POST",
      headers: {
        "X-CSRF-TOKEN": "{{ csrf_token() }}"
      },
      data: {
         "_token" : "{{ csrf_token() }}",
        "selectedValue": selectedValue
      },
      dataType: "json",
      success: function(data) {
        // Nhận và xử lý response

        // Ví dụ: Cập nhật danh sách chọn khác với dữ liệu response
        var otherSelectElement = $("#districtSelect");
        otherSelectElement.empty(); // Xóa tất cả các tùy chọn hiện có trong danh sách chọn khác.

        // Thêm các tùy chọn mới vào danh sách chọn khác
        for (var i = 0; i < data.length; i++) {
          var option = $("<option>").val(data[i].DistrictID).text(data[i].DistrictName);
            console.log(option)
          otherSelectElement.append(option);
        }
      },
      error: function(xhr, status, error) {
        console.error("Lỗi AJAX:", error);
      }
    });
  }

  function handleSelectDistrict() {
   var selectedValue = $("#districtSelect").val();

// Gửi giá trị được chọn bằng AJAX đến Laravel controller
$.ajax({
      url: "{{ route('process.selectidward') }}",
      type: "POST",
      headers: {
        "X-CSRF-TOKEN": "{{ csrf_token() }}"
      },
      data: {
         "_token" : "{{ csrf_token() }}",
        "selectedValue": selectedValue
      },
      dataType: "json",
      success: function(data) {
        // Nhận và xử lý response
        console.log("Response từ server:", data);

        // Ví dụ: Cập nhật danh sách chọn khác với dữ liệu response
        var otherSelectElement = $("#wardSelect");
        otherSelectElement.empty(); // Xóa tất cả các tùy chọn hiện có trong danh sách chọn khác.

        // Thêm các tùy chọn mới vào danh sách chọn khác
        for (var i = 0; i < data.length; i++) {
          let WardName = data[i].WardName;
          let WardCode = data[i].WardCode;
          var option = $("<option>").val(WardCode.concat("-", WardName)).text(WardName);
            console.log(option)
          otherSelectElement.append(option);
        }
      },
      error: function(xhr, status, error) {
        console.error("Lỗi AJAX:", error);
      }
    });
}

   // Gán hàm handleSelectChange() vào sự kiện "change" của danh sách chọn
   $("#districtSelect").on("change", handleSelectDistrict);
   $("#mySelect").on("change", handleSelectProvince);
</script>

@endsection