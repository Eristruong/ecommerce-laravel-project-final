@extends('layout.admin.main')
@section('content')

<div class="container jumbotron border border-success">
  @if(Session::has('message'))
  <script type="text/javascript">
     swal({
         title:'OK!',
         text:"{{Session::get('message')}}",
         timer:5000,
         icon: "success"
     }).then((value) => {
       //location.reload();
     }).catch(swal.noop);
 </script>
 @endif
    <h2>Chi tiết đơn hàng</h2>
    <div class="row">
        <div class="col-sm-8 border border-grey rounded-lg bg-white">
            
               
                    <div class="container"   style="">
                        <h4></h4>
                        <table class="table table-hover">
                            <thead>
                                <tr role="row" class="bg-success text-white">
                                <th>Thông tin khách hàng</th>
                                <th class=""></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td><b>Thông tin người đặt hàng</b></td>
                                <td>{{ $customer->name }}</td>
                            </tr>
                            <tr>
                                <td><b>Ngày đặt hàng</b></td>
                                <td>{{ $customer->created_at }}</td>
                            </tr>
                            <tr>
                                <td><b>Số điện thoại</b></td>
                                <td>{{ $customer->phone_number }}</td>
                            </tr>
                            <tr>
                                <td><b>Địa chỉ</b></td>
                                <td>{{ $addresses['address'] }}</td>
                            </tr>
                            <tr>
                                <td><b>Email</b></td>
                                <td>{{ $customer->email }}</td>
                            </tr>
                            <tr>
                                <td><b>Ghi chú</b></td>
                                <td>{{ $customer->bill_note }}</td>
                            </tr>
                            <tr>
                                <td><b>Hình thức thanh toán</b></td>
                                <td>{{ $customer->bill_payment }}</td>
                            </tr>
                            <tr>
                                <td><b>Số tiền đã nhận - VNPAY</b></td>
                                <td>{{ number_format($customer->total_received) }} đ</td>
                            </tr>
                            <tr>
                                <td><b>Số tiền còn lại cần thanh toán</b></td>
                                <td>{{ number_format($customer->total_remain) }} đ</td>
                            </tr>
                            @if ($customer->bill_codevnpay != null)
                            <tr>
                                <td><b>Mã giao dịch VNPAY</b></td>
                                <td>{{ $customer->bill_codevnpay }}</td>
                            </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
        
                    <table class="table table-hover dataTable" >
                        <thead>
                        <tr role="row" class="bg-success text-white">
                            <th>STT</th>
                            <th>Tên sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Giá tiền</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($bills as $key => $bill)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $bill->product_name }}</td>
                                <td>{{ $bill->quantily }}</td>
                                <td>{{ number_format($bill->price) }} VNĐ</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="3"><b>Tổng tiền</b></td>
                            <td colspan="1"><b class="text-red">{{ number_format($customer->bill_total) }} VNĐ</b></td>
                        </tr>
                        </tbody>
                    </table>
             
            
        </div>
   
           
    <div class="col-sm-4">
        <div class="col-md-12 ml-4">
           @if ($customer->bill_status == 'Đang Giao')
           <form action="{{  route('status.shipping',$customer->bill_id) }}" method="POST">
            <input type="hidden" name="_method" value="PUT">
            {{ csrf_field() }}
            <h4>Thông tin vận đơn của đơn hàng</h4>
            <div class="row mt-4 border border-grey rounded-lg bg-white">
              <div class="col mt-2">
                <label>Mã vận đơn - GHN: </label>
              </div>
              <div class="col mt-2">
                 {{ $shipping->order_code }}
              </div>
             
            </div>
            <div class="row border border-grey rounded-lg bg-white">
              <div class="col mt-2">
                <label>Loại gói dịch vụ: </label>
              </div>
              <div class="col mt-2">
                {{ ($resData['service_type_id'] == '2') ? 'Chuyển phát thương mại điện tử' : 'Chuyển phát truyền thống'}}
              </div>
             
            </div>
            <div class="row border border-grey rounded-lg bg-white">
              <div class="col mt-2">
                <label>Số tiền NVC thu hộ: </label>
              </div>
              <div class="col mt-2">
                {{ number_format($resData['cod_amount']) }} đ
              </div>
             
            </div>
            <div class="row border border-grey rounded-lg bg-white">
              <div class="col mt-2">
                <label>Cho xem hàng: </label>
              </div>
              <div class="col mt-2">
                {{ ($resData['required_note'] == 'CHOTHUHANG') ? 'Cho xem hàng' : 'Không xem hàng'}}
              </div>
             
            </div>
            <div class="row border border-grey rounded-lg bg-white">
              <div class="col mt-2">
                <label>Loại phương tiện vận chuyển: </label>
              </div>
              <div class="col mt-2">
                {{ $shipping->trans_type }}
              </div>
             
            </div>
            <div class="row border border-grey rounded-lg bg-white">
              <div class="col mt-2">
                <label>Thời gian lấy hàng dự kiến: </label>
              </div>
              <div class="col mt-2">
                {{ $resData['pickup_time']}}
              </div>
             
            </div>
            <div class="row border border-grey rounded-lg bg-white">
              <div class="col mt-2">
                <label>Thời gian giao hàng dự kiến: </label>
              </div>
              <div class="col mt-2">
                {{ $shipping->expected_delivery_time }}
              </div>
             
            </div>
            <div class="row border border-grey rounded-lg bg-white">
              <div class="col mt-2">
                <label>Trạng thái vận đơn: </label>
              </div>
              <div class="col mt-2">
                {{ ($resData['status'] == 'ready_to_pick') ? 'Chờ lấy hàng' : 'update later'}}
              </div>
             
            </div>
            <div class="row border border-grey rounded-lg bg-white">
              <div class="col mt-2">
                <label>Phí vận chuyển đơn hàng: </label>
              </div>
              <div class="col mt-2 text-danger">
               <b>{{ number_format($shipping->total_fee) }}đ</b> 
              </div>
             
            </div>
           @else
           <form action="{{  route('bill.update',$customer->bill_id) }}" method="POST">
            <input type="hidden" name="_method" value="PUT">
            {{ csrf_field() }}
            <h4>Tạo vận đơn cho nhà vận chuyển</h4>
            <br> 
            <h5>Địa chỉ người nhận hàng: </h5>
           <div class="row mt-4">
       
                  <div class="col">
                    <label>Tỉnh thành: </label>
                    <select name="provinceID" id="mySelect" class="form-control">
                        @foreach ($provinces as $province)
                        <option value="{{ $province->ProvinceID }}" {{ ($province->ProvinceID==$customer->address->idProvince)?'selected':''}}>
                        {{ $province->ProvinceName }}
                        </option>
                            
                        @endforeach
                    </select>
                  </div>

                  <div class="col">
                    <label>Quận huyện: </label>
                    <select name="districtID" id="districtSelect" class="form-control">
                        <option value="">Chọn quận huyện</option>
                        
                    </select>
                  </div>
           </div>
           <div class="row mt-3">
            <div class="col">
                <label>Phường xã: </label>
                <select name="wardID" id="wardSelect" class="form-control">
                    <option value="">Chọn phường xã</option>
                </select>
              </div>
              <div class="col form-group">
                <label>Địa chỉ: </label>
                 <input type="text" name="address" id="" value="" class="form-control">
              </div>
           </div>
           <br>
           <h5>Thông tin đóng gói cho đơn hàng: </h5>
           <div class="row">
        
            <div class="col form-group">
                <label>Cận nặng gói hàng: </label>
                <input type="text"  name="weight" id="" value="" class="form-control" placeholder="đơn vị gram">

            </div>
            <div class="col form-group">
                <label>Chiều dài gói hàng: </label>
                <input type="text"  name="length" id="" value="" class="form-control" placeholder="tối đa 150cm">
            </div>
           </div>
           <div class="row">

            <div class="col form-group">
                <label>Chiều rộng gói hàng: </label>
                <input type="text"  name="width" id="" value="" class="form-control" placeholder="tối đa 150cm">

              </div>
              <div class="col form-group">
                <label>Chiều cao gói hàng: </label>
                <input type="text"  name="height" id="" value="" class="form-control" placeholder="tối đa 150cm">
              </div>

           </div>
           <div class="row">
              <div class="col">
                  <Label>Cho xem hàng</Label>
                  <select name="ordercheck" id="" class="form-control">

                    <option value="CHOTHUHANG">Cho xem hàng</option>
                    <option value="KHONGCHOXEMHANG">Không cho xem hàng</option>
                  </select>
              </div>
           </div>
           <div class="row mt-3">
             <div class="col">
                <Label>Ghi chú</Label>
                <input type="text" name="note" id="" class="form-control">
             </div>
           </div>

           @endif
               



                    <div class="form-inline mt-4">
                        <label>Trạng thái giao hàng: </label>
                        <select name="status" class="form-control input-inline mr-2" style="width: 200px">
                          @if ($customer->bill_status == 'Đang Giao')
                          <option value="Đang Giao">Đang giao</option>
                          <option value="Đã giao">Đã giao</option>
                          @else
                          <option value="Chưa giao">Chưa giao</option>
                          <option value="Đang Giao">Đang giao</option>
                          @endif
                            
                            {{-- <option value="Đã giao">Đã giao</option> --}}

                        </select>
    
                        <input type="submit" value="Xử lý" class="btn btn-primary">
                    </div>
               
                </form>
            </div>
     
       
    
      </div>


    </div>
   
    
<script>

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
            // console.log(option)
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
      //   console.log("Response từ server:", data);

        // Ví dụ: Cập nhật danh sách chọn khác với dữ liệu response
        var otherSelectElement = $("#wardSelect");
        otherSelectElement.empty(); // Xóa tất cả các tùy chọn hiện có trong danh sách chọn khác.

        // Thêm các tùy chọn mới vào danh sách chọn khác
        for (var i = 0; i < data.length; i++) {
          let WardName = data[i].WardName;
          let WardCode = data[i].WardCode;
          var option = $("<option>").val(WardCode.concat("-", WardName)).text(WardName);
            // console.log(option)
          otherSelectElement.append(option);
        }
      },
      error: function(xhr, status, error) {
        console.error("Lỗi AJAX:", error);
      }
    });
}

function getShippingOrderFee()
   {
      var cartTotalPrice = {{ $customer->bill_total }};
      var IdDistrict = $("#districtSelect").val();
      var WardCode = $("#wardSelect").val().split("-")[0];
      
      // Gửi giá trị được chọn bằng AJAX đến Laravel controller
$.ajax({
      url: "{{ route('process.getorderfee') }}",
      type: "POST",
      headers: {
        "X-CSRF-TOKEN": "{{ csrf_token() }}"
      },
      data: {
         "_token" : "{{ csrf_token() }}",
        "IdDistrict": IdDistrict,
        "WardCode": WardCode
      },
      dataType: "json",
      success: function(data) {
        // Nhận và xử lý response
        console.log("Response từ server:", data);

        const shipFee = data.service_fee;
        const numericValue = parseFloat(shipFee);
        // Render lại nội dung của thẻ <td> với giá trị mới
         const shipFeeElement = document.getElementById('shipfee');
        shipFeeElement.innerHTML = `<h6>${numericValue.toLocaleString()}đ</h6>`;
        console.log(cartTotalPrice);
        const totalfeeElement = document.getElementById('totalfee');
        cartTotalPrice += numericValue;
        totalfeeElement.innerHTML = `<h5>${cartTotalPrice.toLocaleString()}đ</h5>`
      },
      error: function(xhr, status, error) {
        console.error("Lỗi AJAX:", error);
      }
    });
   }



  // Gán hàm handleSelectChange() vào sự kiện "change" của danh sách chọn

  $("#mySelect").on("change", handleSelectProvince);
  $("#districtSelect").on("change", handleSelectDistrict);

</script>

@endsection