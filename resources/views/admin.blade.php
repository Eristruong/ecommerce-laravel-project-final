@extends('layout.admin.main')
@section('content')
<div class="container jumbotron border border-success">
    <h2>Tổng quan</h2>
           
    <table class="table">
      <thead class="bg-primary text-white"> 
        <tr>
          <th>Tên danh mục</th>
          
          <th>Số lượng sản phẩm</th>
        </tr>
      </thead>
      <tbody>
           @foreach ($quantity as $row)
           <tr>
            <td class="font-weight-bold">{{ $row->categoryName }}</td>
            
            <td>hiện đang có {{ $row->quantity }} Sản phẩm</td>
          </tr>
           @endforeach

        
 

      </tbody>
    </table>
  </div>
@endsection