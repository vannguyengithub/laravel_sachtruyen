<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>SÁCH TRUYỆN</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/owl.carousel.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/owl.theme.default.min.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

        {{-- css global --}}
        <link href="{{ asset('css/elegant-icons.css') }}" rel="stylesheet">
        <link href="{{ asset('css/plyr.css') }}" rel="stylesheet">
        <link href="{{ asset('css/nice-select.css') }}" rel="stylesheet">
        <link href="{{ asset('css/slicknav.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    </head>
    <body>

        <!-- Page Preloder -->
        <div id="preloder">
            <div class="loader"></div>
        </div>
        <!-- Header Section Begin -->
        <header class="header">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2">
                        <div class="header__logo">
                            <a href="{{url('/')}}">
                                <img src="https://manga.thoaiky.com/_next/image?url=%2F_next%2Fstatic%2Fmedia%2Flogo.2d73736c.png&w=256&q=75" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="header__nav">
                            <nav class="header__menu mobile-menu">
                                <ul>
                                    <li class="active"><a href="{{url('/')}}">Trang chủ</a></li>
                                    <li>
                                        <a href="./categories.html">Danh mục truyện
                                            {{-- <span>
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M6.34317 7.75732L4.92896 9.17154L12 16.2426L19.0711 9.17157L17.6569 7.75735L12 13.4142L6.34317 7.75732Z" fill="currentColor" />
                                                </svg>
                                            </span> --}}
                                        </a>
                                        <ul class="dropdown">
                                            @foreach($danhmuc as $key => $cate)
                                            <li>
                                                <a href="{{url('danh-muc/'.$cate->slug_danhmuc)}}">{{$cate->tendanhmuc}}</a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="./categories.html">Thể loại
                                            {{-- <span>
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M6.34317 7.75732L4.92896 9.17154L12 16.2426L19.0711 9.17157L17.6569 7.75735L12 13.4142L6.34317 7.75732Z" fill="currentColor" />
                                                </svg>
                                            </span> --}}
                                        </a>
                                        <ul class="dropdown">
                                            <li>
                                                <a href="./categories.html">Hoạt hình</a>
                                            </li>
                                            <li>
                                                <a href="./anime-details.html">Anime Details</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#">Contacts</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="header__right">
                            <a href="#" class="search-switch">
                                <span class="icon_search"></span>
                            </a>
                            <a href="./login.html">
                                <span class="icon_profile"></span>
                            </a>
                        </div>
                    </div>
                </div>
                <div id="mobile-menu-wrap"></div>
            </div>
        </header>
        <!-- Header End -->

        <!-- Hero Section Begin -->
        @yield('slide')
        <!-- Hero Section End -->

        <!-- Product Section Begin -->
        @yield('content')
        <!-- Product Section End -->

        <!-- Footer Section Begin -->
        <footer class="footer">
            <div class="page-up">
                <a href="#" id="scrollToTopButton"><span class="arrow_carrot-up"></span></a>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="footer__logo">
                            <a href="./index.html"><img src="images/logo.png" alt=""></a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="footer__nav">
                            <ul>
                                <li class="active"><a href="./index.html">Homepage</a></li>
                                <li><a href="./categories.html">Categories</a></li>
                                <li><a href="./blog.html">Our Blog</a></li>
                                <li><a href="#">Contacts</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>

                    </div>
                </div>
            </div>
        </footer>
        <!-- Footer Section End -->

        <!-- Search model Begin -->
        <div class="search-model">
            <div class="h-100 d-flex align-items-center justify-content-center">
                <div class="search-close-switch"><i class="icon_close"></i></div>
                <form class="search-model-form">
                    <input type="text" id="search-input" placeholder="Search here.....">
                </form>
            </div>
        </div>
        <!-- Search model end -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>   
        <script src="{{ asset('js/player.js') }}" ></script>
        <script src="{{ asset('js/jquery.nice-select.min.js') }}" ></script>
        <script src="{{ asset('js/jquery.slicknav.js') }}" ></script>
        <script src="{{ asset('js/owl.carousel.js') }}" ></script>
        <script src="{{ asset('js/main.js') }}" ></script>
    </body>
</html>
