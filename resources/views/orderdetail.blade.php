@extends('layout.user.main')
@section('content')
@if(Session::has('message'))
  <script type="text/javascript">
     swal({
         title:'Cảm ơn bạn đã đặt hàng!',
         text:"{{Session::get('message')}}",
         button: "Đồng ý!",
         icon: "success"
     }).then((value) => {
       //location.reload();
     }).catch(swal.noop);
 </script>
 @endif
<div style="height: 90px;"></div>
<div class="container-flud jumbotron border border-info">
 
    <h2  class="mr-5" style="font-weight: bold; color: #4A235A;">Chi tiết đơn hàng của <b>{{ Auth::user()->name }}</b> </h2>
    <div class="row mt-3">
        <div class="col-sm-2">
    <div class="row">
    <button type="button" class="btn btn-info"> <i class="fas fa-user"></i> Thông tin tài khoản</button>
</div>
<div class="row mt-3">
    <button type="button" class="btn btn-info"> <i class="fas fa-info-circle"></i> Chi tiết đặt hàng</button>
</div>
</div>
        <div class="col-sm-10 bg-white">

            <table class="table table-hover " >
                <thead>
                <tr class="bg-info text-white">
                    <th>STT</th>
                    <th>Tên sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Giá tiền</th>
          
                </tr>
                </thead>
                <tbody>
                   @if($bills != null)
                   @foreach($bills as $key => $bill)
                   <tr>
                       <td>{{ $key+1 }}</td>
                       <td class="font-weight-bold">{{ $bill->product_name }}</td>
                       <td>{{ $bill->quantily }}</td>
                       <td>{{ number_format($bill->price) }} VNĐ</td>
                   </tr>
               @endforeach
               @else
               <tr>
                   <h2 style="color: #4A235A;">Bạn chưa có đơn hàng vui lòng đặt hàng !</h2>
               </tr>
                   @endif
                   
                   @if($customer != null)
                   <tr>
                    <td colspan="3" class="font-weight-bold">Trạng thái đơn hàng</td>
                    <td class="font-italic text-success">
                        {{ $customer->bill_status }}
                      </td>
                    
                </tr>
                <tr>
                    <td colspan="3" class="font-weight-bold">Hình thức thanh toán</td>
                    <td class="text-info">
                        <b>{{ $customer->bill_payment }}</b>
                      </td>
                    
                </tr>
         
                <tr>
                    <td colspan="3"><b>Tổng tiền</b></td>
                    <td colspan="1"><b class="text-danger">{{ number_format($customer->bill_total) }} VNĐ</b></td>
                </tr>
                
                @endif
                </tbody>
            </table>
        </div>
    </div>
    @if ($customer != null)
   @if (( $customer->bill_status == 'Đã giao'))
    <form style="float: right;" class="d-inline-block mt-2 mr-2" action="{{  route('info.destroy',$customer->id) }}" method="post" >
        {{ csrf_field() }}
        @method('DELETE')
        {{-- HTML không có các method PUT, PATCH, DELETE, nên cần dùng lệnh @method để có thể gán các method này --}}
        {{-- or --}}
        {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
        {{-- <input type="hidden" name="_method" value="delete"> --}}
       
       <button type="submit" class="button btn btn-danger btn-xl"><i class="fas fa-check-circle"></i> Đã nhận được hàng</button>
        </form>
       
        @endif
        
        @endif
               
    
    </div>
           
</div>
 
   


    
@endsection