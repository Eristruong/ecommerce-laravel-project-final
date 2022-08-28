@extends('layout.admin.main')
@section('content')
<div class="container jumbotron   border border-success">
    <h2>Chi tiết sản phẩm</h2>
           
    <table class="table">
      <thead class="bg-danger text-white"> 
        <tr>
          <th>Tên sản phẩm</th>
            <th>hình ảnh chi tiết</th>
         <th>Tên thương hiệu</th>
        <th>Thời gian bảo hành</th>
       <th>Thao tác</th>
    
        </tr>
      </thead>
      <tbody>
       @foreach ($products as $product)
       <tr>
        <td>
           {{ $product->productName }} 
        <td>
             <div class="product-image-thumb" ><img src="../public/upload/{{ $product->productImage1 }}" alt="Product Image"></div>
             @if ($product->productImage2 != null)
             <div class="product-image-thumb" ><img src="../public/upload/{{ $product->productImage2 }}" alt="Product Image"></div>
             @endif
             @if ($product->productImage3 != null)
             <div class="product-image-thumb" ><img src="../public/upload/{{ $product->productImage3 }}" alt="Product Image"></div>    
             @endif
             
        </td>
        <td>
            {{ $product->brand }} 
        </td>
        <td>  {{ $product->guarantee }} Tháng</td>
        <td> 
            <a class="button btn btn-success" href="{{ route('prodetail.edit',$product->id) }}"><i class="fas fa-tools"></i>  Sửa</a>
            <form class="d-inline-block " action="{{ route('prodetail.destroy',$product->id) }}" method="post" >
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
        <a class="btn btn-info btn-sm fa fa-plus" href="{{ route('prodetail.create') }}">Thêm chi tiết cho Sản phẩm</a>
    </p>
  </div>
@endsection