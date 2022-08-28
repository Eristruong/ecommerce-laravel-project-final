<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Trang quản trị </title>
  
  <link rel="stylesheet" href="{{ asset('public/summernote/summernote-bs4.min.css') }}">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('public/backend/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- IonIcons -->
  <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('public/backend/dist/css/adminlte.min.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <script src="{{ asset('public/backend/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('public/backend/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE -->
<script src="{{ asset('public/backend/dist/js/adminlte.js') }}"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="{{ asset('public/backend/plugins/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('public/backend/dist/js/demo.js') }}"></script>
<script src="{{ asset('public/backend/dist/js/pages/dashboard3.js') }}"></script>
<script src="{{ asset('public/summernote/summernote-bs4.min.js') }}"></script>
<script src="{{ asset('public/backend/dist/js/sweetalert.min.js') }}"></script>



</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to to the body tag
to get the desired effect
|---------------------------------------------------------|
|LAYOUT OPTIONS | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|	
-->
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <div>
      @include('layout.admin.header')
  </div>
  <!-- /.navbar -->
  <!-- left -->
  <div>
     @include('layout.admin.left')
  </div>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- index admin  -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Admin Page</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Trang quản trị</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.index -->
    <!-- thong ke -->
    <div class="row">
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
          <span class="info-box-icon bg-info elevation-1"><i class="fas fa-copy"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Số lượng danh mục</span>
            <span class="info-box-number">{{ App\Category::count() }}</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-laptop"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Số lượng sản phẩm</span>
            <span class="info-box-number">{{ App\Product::count() }}</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->

      <!-- fix for small devices only -->
      <div class="clearfix hidden-md-up"></div>

      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Số lượng đơn hàng</span>
            <span class="info-box-number">{{ App\Bill::count() }}</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Số lượng User</span>
            <span class="info-box-number">{{ App\Users::count() }}</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- content -->
    <div class="content">
     @yield('content')
    </div>  
    <!-- /.content -->
   

    
    
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here --> 
   
  </aside>
  <!-- /.control-sidebar -->


</div>
<!-- ./wrapper -->
  <!-- Main Footer -->
 <div>
     @include('layout.admin.footer')
 </div>
<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->

</body>
</html>
