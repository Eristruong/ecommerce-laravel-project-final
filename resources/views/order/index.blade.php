@extends('layout.admin.main')
@section('content')

<div class="container jumbotron border border-success">
  @if(Session::has('message'))
  <script type="text/javascript">
     swal({
         title:'Thành công!',
         text:"{{Session::get('message')}}",
         timer:5000,
         type:'success'
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
            <th>Địa chỉ</th>
         <th>Ngày đặt hàng</th>
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
          <td>{{ $customer->address }}</td>
          <td>{{ $customer->created_at }}</td>
          <td>{{ $customer->email }}</td>
             <td>
               {{ $customer->status }}
             </td>
          
          <td> 
            <a class="button btn btn-success" href="{{ route('bill.edit',$customer->id) }}"><i class="fas fa-info-circle"></i> Chi tiết</a>
            <form class="d-inline-block " action="{{  route('bill.destroy',$customer->id) }}" method="post" >
              {{ csrf_field() }}
              @method('DELETE')
              {{-- HTML không có các method PUT, PATCH, DELETE, nên cần dùng lệnh @method để có thể gán các method này --}}
              {{-- or --}}
              {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
              {{-- <input type="hidden" name="_method" value="delete"> --}}
             
             <button type="submit" class="button btn btn-danger"> <i class="fas fa-trash-alt"></i> Xóa</button>
              </form>
          
          </td>
        </tr>
       

        @endforeach
      </tbody>
    </table>
   

  </div>
    
@endsection