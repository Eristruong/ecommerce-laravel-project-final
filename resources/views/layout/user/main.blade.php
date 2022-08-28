<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('public/frontend/stylecss.css') }}">
    <link rel="stylesheet" href="{{ asset("public/frontend/bootstrap-4.0.0-dist/css/bootstrap.css") }}">
      <link rel="stylesheet" href="{{ asset("public/frontend/bootstrap-4.0.0-dist/spinner.css") }}">
    <link rel="stylesheet" href="{{ asset("public/frontend/fontawesome-free-5.13.1-web/fontawesome-free-5.13.1-web/css/all.css") }}">

    <script src="{{ asset("public/frontend/bootstrap-4.0.0-dist/jq/jquery-3.5.1.min.js") }}"></script>
    <script src="{{ asset("public/frontend/bootstrap-4.0.0-dist/jq/jquery-3.5.1.js") }}"></script>
    <script src="{{ asset("public/frontend/bootstrap-4.0.0-dist/jq/sweetalert.min.js") }}"></script>
    <script src="{{ asset("public/frontend/bootstrap-4.0.0-dist/js/bootstrap.js") }}"></script>
    <script src="{{ asset("public/frontend/bootstrap-4.0.0-dist/js/popper.min.js") }}"></script>
    <script src="{{ asset("public/frontend/bootstrap-4.0.0-dist/js/bootstrap.min.js") }}" ></script>
    <script src="{{ asset("public/frontend/fontawesome-free-5.13.1-web/fontawesome-free-5.13.1-web/js/all.js") }}"></script>
    <!-- JavaScript -->
<script src="{{ asset('public/frontend/alertifyjs/alertify.js') }}"></script>
<script src="{{ asset('public/frontend/zoom/zoom.js') }}"></script>
<script src="{{ asset('public/frontend/swiper/js/swiper.min.js') }}"></script>



<!-- CSS -->
<link rel="stylesheet" href="{{ asset('public/frontend/alertifyjs/css/alertify.min.css') }}">
<!-- Default theme -->
<link rel="stylesheet" href="{{ asset('public/frontend/alertifyjs/css/themes/default.min.css') }}">
<!-- Semantic UI theme -->
<link rel="stylesheet" href="{{ asset('public/frontend/alertifyjs/css/themes/semantic.min.css') }}">
<!-- Bootstrap theme -->
<link rel="stylesheet" href="{{ asset('public/frontend/alertifyjs/css/themes/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('public/frontend/swiper/css/swiper.min.css') }}">
<link rel="stylesheet" href="{{ asset('public/frontend/swiper/css/style.css') }}">

    
    <title>Website cung cấp linh kiện máy tính</title>
    <style>
      .well{
        min-height: 20px;
                padding: 19px;
                margin-bottom: 20px;
                background-color: #f5f5f5;
                border: 1px solid #e3e3e3;
                border-radius: 4px;
                -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .05);
      }
    </style>
</head>
<body>
    <!-- menu -->
  <div class="header fixed-top ">
   @include('layout.user.header')     
 </div> <!--header-->
<div>
   @yield('content')
</div> <!--content-->
<div>
     {{-- @yield: display content of section --}}
    @include('layout.user.footer')
     {{-- or use code blow: @section('content') @show --}}
</div> <!-- footer -->


     <!-- notofication  -->
     <notifition id="notifi">
        <div class="notifi">
          <a href="tel:0834474225">
            <i class="fal fa-phone-alt"></i>
            <div class="nitofication_label"></div>
          </a>
        </div>
      </notifition>
    
      <!-- scrollTop -->
      <scrollTop>
        <div class="scroll">
          <i class="fas fa-angle-double-up"></i>
        </div>
      </scrollTop>
      <!-- javascrip của phần card product -->
     

      <script>
        $(document).ready(function(){
          $('[data-toggle="tooltip"]').tooltip();
        });
 

      
            $(document).ready(function(){
      $(".btn-dark").click(function(){
        $(".collapse").collapse('toggle');
      });
     
    });
            /* Scroll */
      $(window).scroll(function() {
        var scrll = $('html,body').scrollTop();
        if(scrll>300) {
          $('.nav_menu').addClass('navbar-sticker');
        }
        else {
          $('.nav_menu').removeClass('navbar-sticker');
        }
        if(scrll>300) {
          $('.scroll').addClass('hien');
        }
        else {
          $('.scroll').removeClass('hien');
        }
      })
      $('.scroll').on('click', function(){
        $('html,body').animate({scrollTop:0},500);
      })
      /* Scroll End */

              /* zoom xem anh san pham */
    $(".xzoom, .xzoom-gallery").xzoom({
      zoomWidth: 400,
      tint: "#333",
      Xoffset: 15,
    });

  /* zoom xem anh san pham end */

          </script>
</body>
</html>