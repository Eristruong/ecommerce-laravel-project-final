@extends('layout.admin.main')
@section('content')
<h5 style="font-weight: bold">Chỉnh sữa sản phẩm</h5>
<div class="container">
    <div class="row">
        <div class="col-sm-10">
            <form action="{{ route('user.update',$user->id) }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            @method('PUT')
            <div class="form-group">
                <label for="user" style="font-weight: bold">Quản lí người dùng</label>
               
            </div>
            <div class="form-group">
                <label for="name" style="font-weight: bold">Tên người dùng</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}">
            </div>
            <div class="form-group">
                <label for="email" style="font-weight: bold">Email</label>
                <input type="text" name="email" id="email" class="form-control" value="{{ $user->email }}">
              
            </div>

            <div class="form-group">
                <label for="phonenumber" style="font-weight: bold">Số điện thoại</label>
                <input type="text" name="phonenumber" id="address" class="form-control" value="{{ $user->phonenumber }}">
            </div>
            <div class="form-group">
                <label for="address" style="font-weight: bold">Địa chỉ</label>
                <input type="text" name="address" id="address" class="form-control" value="{{ $user->address }}">
            </div>
         
      
            <div class="form-group">
                <input type="submit" class="btn btn-info btn-sm" value="Lưu sản phẩm">

            </div>

            
            </form>
        </div>
    </div>
</div>
    
@endsection