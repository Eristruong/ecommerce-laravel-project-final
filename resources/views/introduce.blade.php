@extends('layout.user.main')
@section('content')
<!-- kết thúc menu -->
  <!-- tạo khoảng cách giữa thanh navbar với nội dung -->
  <div class="container-fluid " style="height:120px"></div>
  <!-- end -->
 <!-- giới thiệu -->
  <div class="container" >
    <div class="alert ">
       <h4>Tổng hợp và giới thiệu các loại <a href="{{ route('home') }}" class="alert-link">linh kiện</a> máy tính để bàn</h4> 
       Máy tính để bàn (PC) được cấu thành bởi rất nhiều các linh kiện. Đây sẽ là bài viết giải thích những linh kiện quan trọng đó.
      </div>
      <div class="row mt-2 card-deck">
             <div class="col-md-4 card-deck">
                <div class="card p-3" style="width:300px">
                    <a href="main.html" class="card-link font-weight-bold">Bo mạch chủ (Mainboard)</a>
                    <img class="card-img-top" src="public/frontend/image/gt/gt1.jpg" alt="Card image">
                    <div class="mb-2">
                      <h6 class="card-title">Trong một bộ PC, bo mạch chủ là linh kiện nền tảng quyết định tốc độ và sự ổn định của toàn hệ thống. Nó còn hoạt động như một bộ khung xương giúp kết nối tất cả linh kiện khác. Thông số của từng bo mạch sẽ giúp chúng ta biết cách chọn những linh kiện phù hợp. Ví dụ, bạn không thể sử dụng bộ vi xử lý có chân cắm (socket) không cùng loại và tốc độ cao hơn khả năng bo mạch có thể tiếp nhận. Những bo mạch hiện nay thường được tích hợp sẵn các thiết bị xử lý ảnh, âm thanh, mạng…</h6>
                      

                    </div>
                  </div>
             </div>
             <div class="col-md-4 card-deck">
                <div class="card  p-3" style="width:300px">
                    <a href="cpu.html" class="card-link font-weight-bold">Bộ vi xử lý (CPU)</a>
                    <img class="card-img-top" src="public/frontend/image/gt/gt2.jpg" alt="Card image">
                    <div class="mb-2">
                      <h6 class="card-title">Bộ vi xử lý là đầu não có nhiệm vụ xử lý dữ liệu của các chương trình, sức mạnh của PC được đánh giá qua bộ vi xử lý này. Vi xử lý bắt buộc phải tương thích với bo mạch và được nhà sản xuất bo mạch hỗ trợ. Các CPU tới từ Intel hay AMD có nhiều dòng sản phẩm vi xử lý để đánh tới các đối tượng người dùng khác nhau. Chẳng hạn như dòng cấp thấp cho người dùng thông thường (Intel Core i3 - AMD Ryzen 3) hay dòng trung cấp (Intel Core i5 - AMD Ryzen 5) hoặc dòng cao cấp (Intel Core i7 - AMD Ryzen 7) dành cho những đối tượng có nhu cầu cao.</h6>
                      
    
                    </div>
                  </div>
             </div>
             <div class="col-md-4 card-deck">
                <div class="card card-deck p-3" style="width:300px">
                    <a href="ram.html" class="card-link font-weight-bold">Ram máy tính</a>
                    <img class="card-img-top" src="public/frontend/image/gt/gt3.jpg" alt="Card image">
                    <div class="mb-2">
                      <h6 class="card-title">Ram máy tính là nơi lưu trữ dữ liệu tạm thời để chờ xử lý. Ram tối thiểu được trang bị trên hầu hết các thiết bị hiện nay là 4GB. Tuy nhiên Phong Vũ khuyến cáo bạn nên có từ 8GB RAM trở lên để có thể sử dụng PC thoải mái linh hoạt. Ram cũng phải đúng chủng loại để có thể tương thích và kết nối với bo mạch.</h6>
                      
    
                    </div>
                  </div>
             </div>
           
      </div>
      <div class="row card-deck">
        <div class="col-md-4 card-deck">
           <div class="card p-3" style="width:300px">
               <a href="card.html" class="card-link font-weight-bold">Card đồ họa</a>
               <img class="card-img-top" src="public/frontend/image/gt/gt4.jpg" alt="Card image">
               <div class="mb-2">
                 <h6 class="card-title">Thiết bị xử lý đồ họa có hai loại: Loại rời (VGA card) gắn vào khe cắm PCI EX trên bo mạch chủ và loại được tích hợp sẵn trên bo mạch (VGA onboard). Hiện nay VGA onboard được tích hợp sẵn trên các CPU của Intel nhằm tận dụng bộ nhớ hệ thống, loại VGA này thích hợp cho những đối tượng có nhu cầu làm việc văn phòng và truy cập internet thông thường… Nếu sử dụng cho mục đích làm đồ họa hay những chương trình đòi hỏi khả năng xử lý hình ảnh cao, thì bạn cần trang bị cho mình một card màn hình rời. Ngoài ra, VGA rời cũng phải có kích cỡ và đầu cắm tương thích với bo mạch.</h6>
                 

               </div>
             </div>
        </div>
        <div class="col-md-4 card-deck">
           <div class="card  p-3" style="width:300px">
               <a href="ocung.html" class="card-link font-weight-bold">Ổ cứng (HDD hoặc SSD)</a>
               <img class="card-img-top" src="public/frontend/image/gt/gt5.jpg" alt="Card image">
               <div class="mb-2">
                 <h6 class="card-title">Ổ cứng là bộ nhớ chứa các chương trình và dữ liệu cá nhân của chúng ta. Hiện nay trung bình PC sẽ có dung lượng ổ cứng là 500GB đến 1TB hoặc hơn. Thông thường, chỉ riêng việc thiết lập hệ điều hành và phân vùng hệ thống, cài một vài chương trình ứng dụng là đã tiêu tốn từ 50gb đến 100gb. Nên suy ra, HDD có dung lượng càng cao sẽ càng hữu ích cho mục đích lưu trữ của bạn. Thêm nữa, hiện nay trên thị trường còn có các loại ổ ssd với tốc độ đọc ghi được đẩy nhanh đáng kể.</h6>
                 

               </div>
             </div>
        </div>
        <div class="col-md-4 card-deck">
           <div class="card card-deck p-3" style="width:300px">
               <a href="" class="card-link font-weight-bold">Nguồn máy tính PSU</a>
               <img class="card-img-top" src="public/frontend/image/gt/gt6.jpg" alt="Card image">
               <div class="mb-2">
                 <h6 class="card-title">Bộ nguồn (PSU) là một linh kiện phần cứng quan trọng, cung cấp điện năng hoạt động cho toàn bộ PC. Một bộ nguồn tiêu chuẩn còn có thể quyết định được sự ổn định của hệ thống, cũng như tuổi thọ của các thiết bị phần cứng khác.

                    Nếu nguồn không cung cấp đủ công suất điện cho hệ thống, bạn sẽ phải "thưởng thức" vô số các lỗi từ trên trời rơi xuống! Nhẹ thì máy chạy ì ạch, các game yêu thích bị đứng hình liên tục… Nặng một chút thì máy đang chạy, tự nhiên khởi động lại hoặc khởi động không được,... trường hợp xấu nhất là cả hệ thống ”đi toi”, kéo theo nhiều thiết bị “yêu quí” khác phải đi “nằm viện”. Chính vì vậy, việc lựa chọn một bộ nguồn thích hợp với hệ thống là điều bạn cần xem xét và tính toán kỹ khi chọn mua máy tính.
                    
                    Tham khảo thêm các linh kiện máy tính khác: Case máy tính, tản nhiệt để build PC.</h6>
                 

               </div>
             </div>
        </div>
      
    </div>
  </div>
@endsection