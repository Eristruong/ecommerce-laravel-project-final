<table class="table">
  <thead>
      <tr></tr>
  </thead>
  <tbody>
   
 
      @foreach ($products as $product)
  <tr>
     
    
      <td><img src="public/upload/{{ $product->productImage }}" style="vertical-align: middle;  width:80px;margin-right: 30px"></td>
      <td>
        <p style="color: #4A235A;"><b>{{ $product->productName }}</b></p>
     </td>
     <td>
      <p><b>{{ number_format( $product->listPrice ) }}₫</b>
          <p>
  </td>
  <td>

      <a  class="btn btn-danger text-white" onclick="ChoosePro({{ $product->productID }})">Chọn</a>

  </td>
    </tr>
                                     
      @endforeach 

 </tbody>
   


</table>