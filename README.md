
# ecommerce-laravel-project-final
Ecommerce website has VnPay payment and handle shipping GiaoHangNhanh for final exam in my college

1 Giao diện trang người dùng

  
Trang chủ hiển thị

  - Giao diện trang chủ gồm : Mục giới thiệu, sản phẩm, liên hệ, phần tìm kiếm , giỏ hàng và trang admin. Có chức năng tìm kiếm, hiển thị sản phẩm để giúp người dùng dễ dàng lựa chọn và đặt hàng  một cách nhanh chóng
    
![image](https://github.com/Eristruong/ecommerce-laravel-project-final/assets/66561370/5b4eb5e7-6405-416f-8b3f-269f60c39841)

![image](https://github.com/Eristruong/ecommerce-laravel-project-final/assets/66561370/314e6231-0714-49de-9586-990be892994e)



Trang Đăng nhập

![image](https://github.com/Eristruong/ecommerce-laravel-project-final/assets/66561370/6adcb081-5aa7-463c-bf47-4069b1756a35)

Trang giỏ hàng

  -Khi có lượng khách truy cập hoặc ghé thăm website, hệ thống sẽ tự động tạo cho người dùng một giỏ hàng riêng và trong giỏ hàng lúc đó sẽ trống. Nếu khách hàng liên tục xem các sản phẩm trên website, chọn hàng , đưa hàng vào giỏ hàng và thanh toán .

![image](https://github.com/Eristruong/ecommerce-laravel-project-final/assets/66561370/942a3a8e-d612-4811-b05d-a32f5854945f)


Trang đặt hàng
 - khi khách hàng chọn sản phẩm vào đơn hàng và tiến hành đặt hàng thì hệ thống sẽ sẽ chuyển khách hàng đến form nhập thông tin, địa chỉ, số điện thoại. 
ước tính chi phí vận chuyển.
Khách hàng bấm xác nhận thì đơn hàng sẽ được gửi về người quản trị để xác nhận và duyệt đơn hàng

![image](https://github.com/Eristruong/ecommerce-laravel-project-final/assets/66561370/cc29fe1f-b8f7-470a-b7cc-ea558436d6c1)
![image](https://github.com/Eristruong/ecommerce-laravel-project-final/assets/66561370/3614301b-b72c-4bbd-bf5e-f84335b5873f)



Email sau khi đặt hàng

  - khi khách hàng bấm gửi đơn hàng thì sẽ có email tự động của hệ thống phản hồi đến địa chỉ email mà khách hàng đã cung cấp.

![image](https://github.com/Eristruong/ecommerce-laravel-project-final/assets/66561370/4e55982d-2109-4a97-aeca-e1a867ddcf6c)

  - email tư động thông báo một đơn hàng mới được đặt từ phía khách hàng đến mail của nhân viên hệ thống
    
![image](https://github.com/Eristruong/ecommerce-laravel-project-final/assets/66561370/12ecfa72-7424-4f80-bd36-c40b9515adc5)



Thanh toán trực tuyến VNPAY cho đơn hàng

![image](https://github.com/Eristruong/ecommerce-laravel-project-final/assets/66561370/6e3d6d8c-e2e6-4f5b-96eb-a7c3d502f37c)
![image](https://github.com/Eristruong/ecommerce-laravel-project-final/assets/66561370/1244e46d-9170-46a2-854a-46f188ce2eac)
![image](https://github.com/Eristruong/ecommerce-laravel-project-final/assets/66561370/df48a590-e3a4-40fd-95d7-f554bedf3832)
![image](https://github.com/Eristruong/ecommerce-laravel-project-final/assets/66561370/2e320477-77eb-4cd5-865e-931621a9d9b7)

Tạo vận đơn thông qua nhà vận chuyển Giao hàng nhanh - GHN API

![image](https://github.com/Eristruong/ecommerce-laravel-project-final/assets/66561370/45a06b09-3f84-4c0a-9f35-c16c98b56aac)
![image](https://github.com/Eristruong/ecommerce-laravel-project-final/assets/66561370/52438362-47ca-4e88-a084-ed05c6dbccdd)
![image](https://github.com/Eristruong/ecommerce-laravel-project-final/assets/66561370/f692b3bd-1864-4483-91a4-36de5002f0bc)
![image](https://github.com/Eristruong/ecommerce-laravel-project-final/assets/66561370/9bb6ae69-2fcf-43a4-8559-d83cfc7c4f1b)

 Trang chi tiết sản phẩm
- Khách hàng có thể xem chi tiết về sản phẩm, xem các sản phẩm liên quan, và xem hoặc trực tiếp bình luận đánh giá về sản phẩm.

![image](https://github.com/Eristruong/ecommerce-laravel-project-final/assets/66561370/3896b1c8-08d5-4bc1-804c-dd922af28b61)
![image](https://github.com/Eristruong/ecommerce-laravel-project-final/assets/66561370/e209eab0-70e7-41da-aa97-45e0dfa88a11)
![image](https://github.com/Eristruong/ecommerce-laravel-project-final/assets/66561370/00727534-d6a8-4287-af04-893f94231e78)







2 Giao diện trang quản trị

 
Trang chủ thống kê
 - Trang chủ bao gồm thống kế các sản phẩm danh mục, Số lượng đơn hàng và số lượng người dùng để người quản trị dễ dàng quản lí, kiểm soát.
   
![image](https://github.com/Eristruong/ecommerce-laravel-project-final/assets/66561370/43952ce8-4029-4535-98f7-2608bb9c077b)

Trang quản lý danh mục
 - Trang quản lý danh mục có chức năng xem chi tiết, sửa thông tin danh mục của sản phẩm, thêm và xóa danh mục.

![image](https://github.com/Eristruong/ecommerce-laravel-project-final/assets/66561370/e43a60c3-0605-487d-bb6b-f81275262959)

Trang quản lý sản phẩm
  - Trang quản lý sản phẩm có chức năng sửa thông tin sản phẩm, xóa sản phẩm và thêm thông tin sản phẩm mới.

![image](https://github.com/Eristruong/ecommerce-laravel-project-final/assets/66561370/c624fe2f-c6c2-453d-83ed-d6330f5efbc4)
![image](https://github.com/Eristruong/ecommerce-laravel-project-final/assets/66561370/fbeae8d5-52d7-4f8b-bba4-9812ea233570)

Trang quản lí đơn hàng
  - Giúp người quản trị có thể quản lí nhiều đơn hàng được đặt từ khách hàng gồm các chức năng xem chi tiết đơn hàng được đặt, xóa đơn hàng, cập nhật trạng thái cho đơn hàng.

![image](https://github.com/Eristruong/ecommerce-laravel-project-final/assets/66561370/d15d5a73-d1d9-4d31-a976-9bddfb2cbf76)
![image](https://github.com/Eristruong/ecommerce-laravel-project-final/assets/66561370/dd75fab6-a37d-474c-a4b4-835fa73eb95a)
![image](https://github.com/Eristruong/ecommerce-laravel-project-final/assets/66561370/0b6cc2cf-3a66-4cf6-bafd-94fa18ea985a)





 
