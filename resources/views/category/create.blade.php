@extends('layout.admin.main')
@section('content')
<h5 style="font-weight: bold;">Thêm danh mục</h5>
 <div class="container">
     <div class="row">
         <div class="col-sm-10">
         <form action="{{ route('category.store') }}" method="post">
        {{csrf_field()}}
        <div class="form-group">
            <label for="categoryname" style="font-weight: bold">Danh mục sản phẩm</label>
            <input type="text" name="categoryName" id="categoryName" class="form-control">
          {{-- hiển thị thông báo lỗi  --}}
          @if ($errors->has('categoryName'))
          <p>{{ $errors->first('categoryName') }}</p>
              {{--  --}}
          @endif
        </div>
        <div class="form-group">
            <label for="description" style="font-weight: bold">Bài viết danh mục</label>
            <textarea name="cate_description" class="form-control summernote" id="summernote"></textarea>
        </div>
        <div class="form-group">
            <input type="submit" value="Thêm danh mục" class="btn btn-info btn-sm">

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