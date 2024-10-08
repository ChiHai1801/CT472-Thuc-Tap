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
                            <a class="nav-link" href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/blog">News</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/about">About Us</a>
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

    <body>
        <div class="container">
            <div class="col-md-2 d-flex align-items-start">
                <a class="navbar-brand mr-auto" href="/blog">Tin tức</a>
            </div>
            <form action="" method="get">
                <div class="row">
                    <div class="col-md-3">
                        <button type="submit" name="keywords" value="Bệnh"
                            class="btn btn-success active btn-block mb-1"><i class="bi bi-trash"></i> BỆNH</button>
                    </div>
                    <div class="col-md-3">
                        <button type="submit" name="keywords" value="Thuốc"
                            class="btn btn-success active btn-block mb-1"><i class="bi bi-trash"></i> THUỐC</button>
                    </div>
                    <div class="col-md-3">
                        <button type="submit" name="keywords" value="Sức khỏe"
                            class="btn btn-success active btn-block mb-1"><i class="bi bi-trash"></i> SỨC KHỎE</button>
                    </div>
                    <div class="col-md-3">
                        <button type="submit" name="keywords" value="Nghiên cứu"
                            class="btn btn-success active btn-block mb-1"><i class="bi bi-trash"></i> NGHIÊN
                            CỨU</button>
                    </div>
                </div>
            </form>
            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        <div class="xlarge">Tin tức mới nhất</div>
                        <hr>
                        @foreach ($postList as $item)
                            <div class="card mb-3">
                                <a href="/post/{{ $item->id }}">
                                    <img src="images/{{ $item->photo_path }}" alt="Ảnh bài viết">
                                </a>
                                <div class="card-body">
                                    <a href="/post/{{ $item->id }}">
                                        <div class="card-title xlarge">{{ $item->name }}</div>
                                    </a>
                                    <div class="card-text">
                                        {{ $item->ttnoidung }}
                                    </div>
                                    <p class="card-text"><small class="text-muted">Ngày
                                            đăng: {{ $item->created_at }}</small></p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="col-md-3">
                        <div class="xlarge"> Tin tức nổi bật</div>
                        <hr>
                        <ul class="list-group">
                            @foreach ($ttnoibat as $tt)
                                <a href="/post/{{ $tt->id }}">
                                    <li class="list-group-item large">{{ $tt->name }}</li>
                                </a>
                            @endforeach

                        </ul>
                    </div>
                </div>
            </div>
        </div>
        @if (!empty($phantrang))
            <div>
                <a class="page-item"> {!! $phantrang->links() !!}</a>
            </div>
        @endif
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
        <!-- JavaScript của Bootstrap -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    </body>

</html>
