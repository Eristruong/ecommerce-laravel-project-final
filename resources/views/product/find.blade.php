@extends('layout.admin.main')
@section('content')
<div class="container jumbotron   border border-success">
    <h2>Tìm kiếm sản phẩm</h2>
           
    <table class="table">
      <thead> 
        <tr>
          <th>Tên danh mục</th>
            <th>Tên sản phẩm</th>
            <th>Ảnh sản phẩm</th>
         <th>Giá sản phẩm</th>
       
    
        </tr>
      </thead>
      <tbody>
       @foreach ($result as $row)
       <tr>
        <td>{{ $row->categoryName }}</td>
        <td>{{ $row->productName }}</td>
      
        <td>
             <div class="product-image-thumb" ><img src="../public/upload/{{ $row->productImage }}" alt="Product Image"></div>
        </td>
        <td>
          {{number_format($row->listPrice)}}đ 
        </td>
        
      </tr>
       @endforeach
       


      </tbody>
    </table>
    
    <p class="d-flex justify-content-end">
        <a class="btn btn-info btn-sm fa fa-plus" href="{{ route('product.create') }}">Thêm Sản phẩm</a>
    </p>
  </div>
@endsection