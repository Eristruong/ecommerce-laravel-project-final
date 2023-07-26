@extends('layout.admin.main')
@section('content')

<div class="container jumbotron border border-success">
  @if(Session::has('suc-message'))
  <script type="text/javascript">
     swal({
         title:'Thành công!',
         text:"{{Session::get('suc-message')}}",
         timer:5000,
         type:'success'
     }).then((value) => {
       //location.reload();
     }).catch(swal.noop);
 </script>
 @endif

 @if (Session::has('err-message'))
 <script type="text/javascript">
  swal({
      title:'Đơn hàng chưa được hoàn tất !',
      text:"{{Session::get('err-message')}}",
      button: "Đồng ý!",
      icon: "error"
  }).then((value) => {
    //location.reload();
  }).catch(swal.noop);
</script>
 @endif
    <h2>Danh sách các đơn hàng</h2>
           
    <table class="table table-hover dataTable">
      <thead> 
        <tr role="row" class="bg-success text-white">
          <th>Tên người đặt</th>
          @if ($status == 'Đã giao')
          <th>Thời gian đã bán</th>
          @elseif($status == 'Đang Giao')    
          <th>Thời gian đặt hàng</th>
          <th>Mã vận đơn</th>
          @else
          <th>Thời gian đặt hàng</th>
          @endif
    
         <th>Email</th>
        <th>Trạng thái</th>
       <th>Thao tác</th>
       <th></th>
    
        </tr>
      </thead>
      <tbody>
        @foreach($customers as $customer)
        <tr>
          <td>{{ $customer->name }}</td>
     
          @if ($status == 'Đã giao')
          <td>{{ $customer->soldtime }}</td>
          @elseif($status == 'Đang Giao')    
          <td>{{ $customer->date_order }}</td> 
          <td>{{ $customer->order_code }}</td>
          @else
          <td>{{ $customer->date_order }}</td> 
          @endif
          <td>{{ $customer->email }}</td>
             <td>
               {{ $customer->status }}
             </td>
          
          <td> 
           @if ($status == 'Đang Giao')
           <a class="button btn btn-success" href="{{ route('detail.shipping',$customer->id) }}"><i class="fas fa-info-circle"></i> Chi tiết</a>
           <a class="button btn btn-danger" href="{{ route('cancel.shipping',$customer->order_code) }}"><i class="fas fa-trash-alt"></i> Hủy vận chuyển</a>
           @elseif($status == 'Đã giao')
           <form class="d-inline-block " action="{{  route('bill.destroy',$customer->bill_id) }}" method="post" >
            {{ csrf_field() }}
            @method('DELETE')
            {{-- HTML không có các method PUT, PATCH, DELETE, nên cần dùng lệnh @method để có thể gán các method này --}}
            {{-- or --}}
            {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
            {{-- <input type="hidden" name="_method" value="delete"> --}}
           
           <button type="submit" class="button btn btn-danger"> <i class="fas fa-trash-alt"></i> Xóa đơn hàng</button>
            </form>
           @else
           <a class="button btn btn-success" href="{{ route('bill.edit',$customer->id) }}"><i class="fas fa-info-circle"></i> Chi tiết</a>
           <form class="d-inline-block " action="{{  route('bill.destroy',$customer->bill_id) }}" method="post" >
            {{ csrf_field() }}
            @method('DELETE')
            {{-- HTML không có các method PUT, PATCH, DELETE, nên cần dùng lệnh @method để có thể gán các method này --}}
            {{-- or --}}
            {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
            {{-- <input type="hidden" name="_method" value="delete"> --}}
           
           <button type="submit" class="button btn btn-danger"> <i class="fas fa-trash-alt"></i> Xóa đơn hàng</button>
            </form>
           @endif
          
          </td>
        </tr>
       

        @endforeach
      </tbody>
    </table>
   

  </div>
    
@endsection