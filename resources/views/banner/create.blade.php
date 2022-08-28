@extends('layout.admin.main')
@section('content')
<h5 style="font-weight: bold">Thêm ảnh cho Banner quảng cáo</h5>

<div class="container">
    <div class="row">
        <div class="col-sm-10">
            <form action="{{ route('banner.store') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}  
            <div class="form-group">
                <label for="categoryID" style="font-weight: bold">Hình ảnh:</label>
               

            </div>
           
            
            <div class="form-group">
                <label for="slide1" style="font-weight: bold">Chọn hình ảnh cho slide:</label>
                <input type="file" name="slide1" id="slide1" class="form-control-file"> 
            </div>
            <div class="form-group">
                <label for="ads" style="font-weight: bold">Chọn hình ảnh cho slide:</label>
                <input type="file" name="ads" id="ads" class="form-control-file"> 
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-info btn-sm" value="Tạo sản phẩm">
            </div>
            </form>
        </div>
    </div>
</div>

@endsection