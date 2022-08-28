<html>
    <head>
        <meta http-equiv="content-type" content="text/html;
charset=utf-8" />
        <title>
            Đăng ký
        </title>
        <link href="{{ asset('public/frontend/dangky/dangky.css') }}" rel="stylesheet"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
    
    <div class="mainwap">
        <div class="form-box">
            
            <div class="nut-box">
                <div id="btn"></div>
                <button type="button" class="style-nut" onclick="login()" >
                    Đăng Nhập
                </button>
               
                
                <button type="button" class="style-nut" onclick="registry()" >
                    Đăng Ký
               </button>
                
               
                
                

            </div>
            <div class="flex-center">
                <span class="mx-12">
                    Nhập thông tin tài khoản</span>
                   
                </div>
            <hr>
            <!---
            <div class="lienket">
            <img src="fb.png" width="30px">
       
     
        </div> 
    -->
    
         <form id="registry" class="box" method="POST" action="{{ route('register') }}">
             @csrf
             <div class="form-control">
             <input type="text"  class="input-field" placeholder="Nhập tên hiển thị" name="name" id="name">
             <small>Vui lòng nhập vào thông tin này</small>
            </div>
            <div class="form-control">
             <input type="email" class="input-field" placeholder="Nhập Email hoặc số điện thoại" name="email" id="email">
             <small>Vui lòng nhập vào thông tin này</small>
            </div>
            <div class="form-control">
             <input type="password" class="input-field" placeholder="Nhập mật khẩu" name="password" id="password">
             <small>Vui lòng nhập vào thông tin này</small>
            </div>
            <div class="form-control">
             <input type="password" class="input-field" placeholder="Nhập lại mật khẩu" name="password_confirmation" id="password-confirm">
             <small>Vui lòng nhập vào thông tin này</small>
             </div>
             <input type="checkbox" class="chechbox"> <span>Tôi đồng ý với các điều khoản sử dụng</span>
        
               <button type="submit">
                                   Đăng ký
                                </button>

         </form>
         <form id="login" class="box" method="POST" action="{{ route('login') }}">
            <input id="email" type="text" name="email" class="input-field" placeholder="Nhập Email hoặc số điện thoại" required autocomplete="email">
            <br>
            <input id="password" type="password" name="password" class="input-field" placeholder="Nhập mật khẩu"
            required autocomplete="current-password">
            <input type="checkbox" class="chechbox">

            <button type="submit">
                                   Đăng Nhập
                                </button>
        </form>
        
        </div>
        
    </div>
    <script>
        var x = document.getElementById("login");
        var y = document.getElementById("registry");
        var z = document.getElementById("btn");

        function registry(){
          x.style.left = "-400px";
          y.style.left = "50px";
          z.style.left = "110px";
        }
        function login(){
          x.style.left = "50px";
          y.style.left = "450px";
          z.style.left = "0";
         
        }
        
    </script>
    <script src="{{ asset('public/frontend/dangky/dangky.js') }}"></script>

    </body>
</html>
