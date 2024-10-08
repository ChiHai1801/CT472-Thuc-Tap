<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <meta name="copyright" content="MACode ID, https://macodeid.com/">

  <title>One Health - Medical Center HTML5 Template</title>

  <link rel="stylesheet" href="../assets/css/maicons.css">

  <link rel="stylesheet" href="../assets/css/bootstrap.css">

  <link rel="stylesheet" href="../assets/vendor/owl-carousel/css/owl.carousel.css">

  <link rel="stylesheet" href="../assets/vendor/animate/animate.css">

  <link rel="stylesheet" href="../assets/css/theme.css">
</head>
<body>

  <!-- Back to top button -->
  <div class="back-to-top"></div>

  <header>

    <nav class="navbar navbar-expand-lg navbar-light shadow-sm">
      <div class="container">
        <a class="navbar-brand" href="/"><span class="text-primary">Phòng khám</span>-Tư nhân</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupport" aria-controls="navbarSupport" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupport">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="/">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/blog">News</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/about">About Us</a>
            </li>

            @if(Route::has('login'))

            @auth

            <x-app-layout>
            </x-app-layout>
            @else
            <li class="nav-item">
              <a class="btn btn-primary ml-lg-3" href="{{route('login')}}">Đăng nhập</a>
            </li>
            <li class="nav-item">
              <a class="btn btn-primary ml-lg-3" href="{{route('register')}}">Đăng ký</a>
            </li>
            @endauth
            @endif
          </ul>
        </div> <!-- .navbar-collapse -->
      </div> <!-- .container -->
    </nav>
  </header>

  <div class="page-hero bg-image overlay-dark" style="background-image: url(../assets/img/bg_image_1.jpg);">
    <div class="hero-section">
      <div class="container text-center wow zoomIn">
        <span class="subhead">Hỗ trợ và chăm sóc sức khỏe cho bạn</span>
        <h1 class="display-4">MỘT CUỘC SỐNG KHỎE MẠNH</h1>
      </div>
    </div>
  </div>
  <div class="page-section">
    <div class="container">
      <h1 class="text-center wow fadeInUp">ĐĂNG KÝ KHÁM</h1>
      <h4 class="text-center wow fadeInUp">vui lòng điền thông tin vào form bên dưới để đăng ký khám bệnh theo yêu cầu</h4>
      <form class="main-form text-center" action="/chuyendoi" method="get">
        @csrf
        <button type="submit" class="btn btn-primary mt-3 wow zoomIn  active">Xác nhân bệnh nhân</button>
      </form>
      @if ($errors->any())
      <div class="alert alert-primary text-center mt-3">Cần điền đầy đủ thông tin. Vui lòng kiểm tra lại thông tin và đăng ký lại</div>
      @endif
      <form class="main-form" action="/home" method="POST">
        <div class="row mt-3 ">
          <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
          <label for="birthday">Đặt lịch khám:</label>
            <input type="date" name="lichkham" class="form-control" placeholder="Ngày khám">
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
            <select name="departement" id="departement" class="custom-select">
              <option value="general">Sáng</option>
              <option value="cardiology">Chiều</option>
            </select>
            
          </div>
          
          <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
            <textarea name="message" id="message" class="form-control" rows="6" placeholder="Các triệu chứng đang mắc phải..."></textarea>
            @error('message')
            <span style="color: red">{{ $message }}</span>
          @enderror
          </div>
        
        </div>

        <button onclick="return confirm('Bạn có chắc chắn muốn đăng ký. Bạn nên kiểm tra lại thông tin trước khi đồng ý ?')" class="btn btn-primary mt-3 wow zoomIn">Đăng ký khám</button>
        @csrf
      </form>
    </div>
  </div> <!-- .page-section -->

  <div class="page-section banner-home bg-image" style="background-image: url(../assets/img/banner-pattern.svg);">
    <div class="container py-5 py-lg-0">
      <div class="row align-items-center">
        <div class="col-lg-4 wow zoomIn">
          <div class="img-banner d-none d-lg-block">
            <img src="../assets/img/mobile_app.png" alt="">
          </div>
        </div>
        <div class="col-lg-8 wow fadeInRight">
          <h1 class="font-weight-normal mb-3">Get easy access of all features using One Health Application</h1>
          <a href="#"><img src="../assets/img/google_play.svg" alt=""></a>
          <a href="#" class="ml-2"><img src="../assets/img/app_store.svg" alt=""></a>
        </div>
      </div>
    </div>
  </div> <!-- .banner-home -->

  <footer class="page-footer">
    <div class="container">
        <div class="row px-md-3">
            <div class="col-sm-6 col-lg-3 py-3">
                <h5>PHÒNG KHÁM TƯ NHÂN</h5>
            </div>
            <div class="col-sm-6 col-lg-3 py-3">
                <h5>THÔNG TIN</h5>
            </div>
            <div class="col-sm-6 col-lg-3 py-3">
                <h5>ĐỐI TÁC</h5>
            </div>
            <div class="col-sm-6 col-lg-3 py-3">
                <h5>LIÊN HỆ</h5>
                <p class="footer-link mt-2">123 Cần Thơ, Việt Nam</p>
                <a href="#" class="footer-link">+84 111 222 3334</a>
                <a href="#" class="footer-link">pktn@gmail.com</a>

                <h5 class="mt-3">Mạng xã hội</h5>
                <div class="footer-sosmed mt-3">
                    <a href="#" target="_blank"><span class="mai-logo-facebook-f"></span></a>
                    <a href="#" target="_blank"><span class="mai-logo-twitter"></span></a>
                    <a href="#" target="_blank"><span class="mai-logo-google-plus-g"></span></a>
                    <a href="#" target="_blank"><span class="mai-logo-instagram"></span></a>
                    <a href="#" target="_blank"><span class="mai-logo-linkedin"></span></a>
                </div>
            </div>
        </div>
        <hr>
    </div>
</footer>

<script src="../assets/js/jquery-3.5.1.min.js"></script>

<script src="../assets/js/bootstrap.bundle.min.js"></script>

<script src="../assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>

<script src="../assets/vendor/wow/wow.min.js"></script>

<script src="../assets/js/theme.js"></script>
  
</body>
</html>