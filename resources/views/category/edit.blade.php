@extends('layout.admin.main')
@section('content')
<h5 style="font-weight:bold">Chỉnh sửa danh mục </h5>
  <div class="container">
      <div class="row">
          <div class="col-sm-10">
              <form action="{{ route('category.update',$category->categoryID) }}" method="post">
            {{ csrf_field() }}
            @method('PUT')
            <div class="form-group">
                <label for="categoryname" style="font-weight: bold">Tên danh mục</label>
                <input type="text" name="categoryName" id="categoryname" class="form-control" value={{ $category->categoryName }}>

            </div>
            <div class="form-group">
                <label for="description" style="font-weight: bold">Bài viết danh mục</label>
                <textarea name="cate_description" class="form-control summernote" id="summernote"></textarea>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-info btn-sm" value="Lưu">
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