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

<style>
    .xlarge {
        font-size: x-large;
        font-weight: bold
    }

    .large {
        font-size: large;
        font-weight: bold
    }
</style>


<body>

    <!-- Back to top button -->
    <div class="back-to-top"></div>

    <header>

        <nav class="navbar navbar-expand-lg navbar-light shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="/"><span class="text-primary">Phòng khám</span>-Tư nhân</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupport"
                    aria-controls="navbarSupport" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupport">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="index.html">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/blog">News</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about.html">About Us</a>
                        </li>

                        @if (Route::has('login'))
                            @auth

                                <x-app-layout>
                                </x-app-layout>
                            @else
                                <li class="nav-item">
                                    <a class="btn btn-primary ml-lg-3" href="{{ route('login') }}">Đăng nhập</a>
                                </li>

                                <li class="nav-item">
                                    <a class="btn btn-primary ml-lg-3" href="{{ route('register') }}">Đăng ký</a>
                                </li>

                            @endauth
                        @endif
                    </ul>
                </div> <!-- .navbar-collapse -->
            </div> <!-- .container -->
        </nav>
    </header>

    <div class="container">
        <div class="row">
            <div class="col">
                <br>
                <div class="card-title xlarge">{{ $post->name }}</div>
                <div class="card mb-3">
                    <img src="{{ asset('images/' . $post->photo_path) }}" alt="Ảnh bài viết">
                    <p class="card-text ml-auto"><small class="text-muted">Ngày đăng:{{ $post->created_at }}</small></p>
                    <div class="card-body">
                        <div class="card-text">
                            {{ $post->noidung }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
