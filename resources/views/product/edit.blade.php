@extends('layout.admin.main')
@section('content')
<h5 style="font-weight: bold">Chỉnh sữa sản phẩm</h5>
<div class="container">
    <div class="row">
        <div class="col-sm-10">
            <form action="{{ route('product.update',$product->productID) }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            @method('PUT')
            <div class="form-group">
                <label for="categoryID" style="font-weight: bold">Danh mục:</label>
                <select name="categoryID" id="categoryID" class="form-control">
                    @foreach ($categories as $category)
                    <option value="{{ $category->categoryID }}" {{ ($category->categoryID==$product->categoryID)?'selected':''}}>
                    {{ $category->categoryName }}
                    </option>
                        
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="productName" style="font-weight: bold">Tên Sản Phẩm</label>
                <input type="text" name="productName" id="productName" class="form-control" value="{{ $product->productName }}">
            </div>
            <div class="form-group">
                <label for="productImage" style="font-weight: bold">Hình ảnh sản phẩm</label>
                <input type="file" name="productImage" id="productImage" class="form-control">
              
            </div>

            <div class="form-group">
                <label for="listPrice" style="font-weight: bold">Giá sản phẩm</label>
                <input type="text" name="listPrice" id="listPrice" class="form-control" value="{{ $product->listPrice }}">
            </div>
            <div class="form-group">
                <label for="discountPercent" style="font-weight: bold">Phần trăm khuyến mãi</label>
                <input type="text" name="discountPercent" id="discountPercent" class="form-control" value="{{ $product->discountPercent }}">
            </div>
            <div class="form-group">
                <label for="description" style="font-weight: bold">Mô tả sản phẩm</label>
                <textarea name="description" class="form-control summernote" id="summernote" value="">{{ $product->description }}</textarea>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-info btn-sm" value="Lưu sản phẩm">

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