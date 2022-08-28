@extends('layout.admin.main')
@section('content')
<div class="container jumbotron   border border-success">
    @foreach ($categories as $category)
    <h2>{{ $category->categoryName }}</h2>
    @endforeach
    
           
    <table class="table">
      <thead class="bg-danger text-white"> 
        <tr>
          <th>Tên sản phẩm</th>
            <th>hình ảnh</th>
         <th>Giá sản phẩm</th>
        <th>Giảm giá</th>
       <th>Thao tác</th>
    
        </tr>
      </thead>
      <tbody>
       @foreach ($products as $product)
       <tr>
        <td>{{ $product->productName }}</td>
      
        <td>
          <div class="product-image-thumb" ><img src="/weblinhkien/public/upload/{{ $product->productImage }}" alt="Product Image"></div>
     </td>
        <td>
          {{number_format($product->listPrice)}}đ
        </td>
        <td>{{ $product->discountPercent }}%</td>
        <td> 
            <a class="button btn btn-success" href="{{ route('product.edit',$product->productID) }}"><i class="fas fa-tools"></i>  Sửa</a>
            <form class="d-inline-block " action="{{ route('product.destroy',$product->productID) }}" method="post" >
              {{ csrf_field() }}
              @method('DELETE')
              {{-- HTML không có các method PUT, PATCH, DELETE, nên cần dùng lệnh @method để có thể gán các method này --}}
              {{-- or --}}
              {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
              {{-- <input type="hidden" name="_method" value="delete"> --}}
              
              <input type="submit" value="Xóa" class="button btn btn-danger">
              </form>
          
          </td>
      </tr>
       @endforeach
       


      </tbody>
    </table>
    <p class="d-flex justify-content-end">
      <a class="btn btn-info btn-sm fa fa-plus" href="{{ route('product.create') }}">Thêm sản phẩm</a>
  </p>
  </div>
@endsection