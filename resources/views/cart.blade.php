@if (Session::has("Cart") != null)
<div class="select-items">
  <table>
      <tbody>
         @foreach(Session::get('Cart')->products as $item)
          <tr>
              <td class="si-pic"><img src="public/upload/{{ $item['productInfo']->productImage }}" style="vertical-align: middle;  width:80px;margin-right: 30px" alt=""></td>
              <td class="si-text">
                  <div class="product-selected">
                      <b>{{ number_format($item['productInfo']->listPrice) }}₫ x {{ $item['quanty'] }}</b>
                      <h6>{{ $item['productInfo']->productName }}</h6>
                  </div>
              </td>
              <td class="si-close">
            
                
                <h4><a class="" data-id="{{ $item['productInfo']->productID }}" role="button"><i class="far fa-times"></i></a></h4>
         
              </td>
          </tr>
                       
         @endforeach
      </tbody>
  </table>
</div>
<div class="select-total">
  <h6>TỔNG TIỀN:</h6>
  <h5>{{number_format(Session::get('Cart')->totalPrice)}}₫</h5>
  <input hidden id="total-quanty-cart" type="number" value="{{ Session::get('Cart')->totalQuanty }}">
</div>  
<div class="select-button">
  <a href="{{ url('List-Carts') }}" class="primary-btn view-card"> <b>XEM GIỎ HÀNG</b> </a>
  <a href="#" class="primary-btn checkout-btn"><b>THANH TOÁN</b></a>
</div>
@else 
                               <h4 style="color: #4A235A;">Vui lòng thêm sản phẩm</h4>

@endif