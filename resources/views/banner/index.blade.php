@extends('layout.admin.main')
@section('content')
<div class="container jumbotron   border border-success">
    <h2>Quản lí Banner quảng cáo</h2>
           
    <table class="table">
      <thead class="bg-info text-white"> 
        <tr>
          <th>Ảnh slide active</th>
          
          <th>Thao tác</th>
        </tr>
      </thead>
      <tbody>
               <tr> 
                   <td><div class="" ><img src="../public/upload/{{ $slide->slide }}" alt="Product Image" style="width: 300px;"></div></td>
                      <td> <a class="button btn btn-success" href=""><i class="fas fa-tools"></i>  Sửa</a></td>
               </tr>
               <tr class="bg-info text-white">
                <th>Ảnh slide</th>
                
                <th>Thao tác</th>
              </tr>
               
               @foreach ($slides as $item)
               
           <tr>
            <td><div class="" ><img src="../public/upload/{{ $item->slide1 }}" alt="Product Image" style="width: 300px;"></div></td>
            
            <td> 
              <a class="button btn btn-success" href=""><i class="fas fa-tools"></i>  Sửa</a>
              <form class="d-inline-block " action="{{ route('banner.destroy',$item->id) }}" method="post" >
                {{ csrf_field() }}
                @method('DELETE')
                {{-- HTML không có các method PUT, PATCH, DELETE, nên cần dùng lệnh @method để có thể gán các method này --}}
                {{-- or --}}
                {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
                {{-- <input type="hidden" name="_method" value="delete"> --}}
                
                <input type="submit" value="Xóa" class="button btn btn-secondary">
                </form>
            
            </td>
          </tr>
          
        
  
       
       @endforeach

      </tbody>
    </table>
  
                <p class="d-flex justify-content-end">
                    <a class="btn btn-info btn-sm fa fa-plus" href="{{ route('banner.create') }}">Thêm banner</a>
                </p>

  </div>
@endsection