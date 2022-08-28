@extends('layout.admin.main')
@section('content')
<h5 style="font-weight: bold">Chỉnh sữa chi tiết sản phẩm</h5>
<div class="container">
    <div class="row">
        <div class="col-sm-10">
            <form action="{{ route('prodetail.update',$prodetail->id) }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            @method('PUT')
            <div class="form-group">
                <label for="categoryID" style="font-weight: bold">Tên sản phẩm:</label>
                <select name="productID" id="productID" class="form-control">
                    @foreach ($products as $product)
                    <option value="{{ $product->productID }}" {{ ($product->productID==$prodetail->productID)?'selected':''}}>
                    {{ $product->productName }}
                    </option>
                        
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="productName" style="font-weight: bold">Tên thương hiệu</label>
                <input type="text" name="brand" id="brand" class="form-control" value="{{ $prodetail->brand }}">
            </div>
            <div class="form-group">
                <label for="productName" style="font-weight: bold">Thời gian bảo hành</label>
                <input type="text" name="guarantee" id="guarantee" class="form-control" value="{{ $prodetail->guarantee }}">
            </div>

            <div class="form-group">
                <label for="productImage1" style="font-weight: bold">Chọn hình ảnh thứ nhất :</label>
                <input type="file" name="productImage1" id="productImage1" class="form-control-file"> 
            </div>
            <div class="form-group">
                <label for="productImage1" style="font-weight: bold">Chọn hình ảnh thứ hai :</label>
                <input type="file" name="productImage2" id="productImage2" class="form-control-file"> 
            </div>
            <div class="form-group">
                <label for="productImage1" style="font-weight: bold">Chọn hình ảnh thứ ba :</label>
                <input type="file" name="productImage3" id="productImage3" class="form-control-file"> 
            </div>
            <div class="form-group">
                <label for="description" style="font-weight: bold">Mô tả sản phẩm</label>
                <textarea name="description" class="form-control summernote" id="summernote" value="">{{ $prodetail->description }}</textarea>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-info btn-sm" value="Lưu thay đổi">

            </div>

            
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
   
   $('.summernote').summernote({
       height: 240,
       minHeight: null,
       maxHeight: null,
       focus: false
   });
   
   });
     </script>
@endsection