@extends('layout.admin.main')
@section('content')
<div class="container jumbotron border border-success">
    <h2>Danh sách người dùng hệ thống</h2>
           
    <table class="table">
      <thead class="bg-warning"> 
        <tr class="text-white">
          <th>Tên Người dùng</th>
            <th>Email</th>
         <th>Số điện thoại</th>
        <th>Địa chỉ</th>
       <th>Thao tác</th>
    
        </tr>
      </thead>
      <tbody>
        @foreach ($users as $user)
        <tr>
          <td>{{ $user->name }}</td>
          <td>{{ $user->email }}</td>
          <td>
               {{ $user->phonenumber }} 
          </td>
          <td>
              {{ $user->address }}
          </td>
          
          <td> 
            <a class="button btn btn-success" href="{{ route('user.edit',$user->id) }}"><i class="fas fa-tools"></i>  Sữa</a>
            <form class="d-inline-block " action="{{ route('user.destroy',$user->id) }}" method="post" >
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