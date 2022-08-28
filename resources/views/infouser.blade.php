@extends('layout.user.main')
@section('content')
<div style="height: 90px;"></div>
 <div class="container-fluid jumbotron">
     <div class="row">
<div class="col-sm-2">
    <div class="row">
    <button type="button" class="btn btn-danger"> <i class="fas fa-user"></i> Thông tin tài khoản</button>
</div>
<div class="row mt-3">
    <button type="button" class="btn btn-danger"> <i class="fas fa-info-circle"></i> Chi tiết đặt hàng</button>
</div>
</div>
<div class="  bg-white border rounded border-info col-sm-10">
    <h3 class="mt-3" style="font-weight: bold; color: #4A235A;">Thông tin tài khoản</h3>
    <div class="row">
      
        <div class="col-sm-10 mt-3">
            <form action="{{ route('info.update',Auth::user()->id) }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            @method('PUT')
           
            <div class="form-group">
                <label for="name" style="font-weight: bold">Tên người dùng</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ Auth::user()->name }}">
            </div>
            <div class="form-group">
                <label for="email" style="font-weight: bold">Email</label>
                <input type="text" name="email" id="email" class="form-control" value="{{ Auth::user()->email }}">
              
            </div>

            <div class="form-group">
                <label for="phonenumber" style="font-weight: bold">Số điện thoại</label>
                <input type="text" name="phonenumber" id="address" class="form-control" value="{{ Auth::user()->phonenumber }}">
            </div>
            <div class="form-group">
                <label for="address" style="font-weight: bold">Địa chỉ</label>
                <input type="text" name="address" id="address" class="form-control" value="{{ Auth::user()->address }}">
            </div>
         
      
            <div class="form-group">
                <input type="submit" class="btn btn-info btn-sm" value="Cập Nhật">

            </div>

            
            </form>
        </div>
    </div>
</div>
</div>
</div>
    
@endsection