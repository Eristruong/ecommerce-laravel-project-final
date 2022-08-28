@extends('layout.user.main')
@section('content')
<div style="margin-top: 100px;">
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
             <div class="product-image-thumb" ><img src="./public/upload/{{ $row->productImage }}" style="width: 100px;" alt="Product Image"></div>
        </td>
        <td>
            {{number_format($row->listPrice)}}đ 
        </td>
        
      </tr>
       @endforeach
       


      </tbody>
    </table>
    
  </div>
</div>
@endsection