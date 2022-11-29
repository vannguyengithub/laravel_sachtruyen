<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>SÁCH TRUYỆN</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>   

        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/owl.carousel.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/owl.theme.default.min.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

        {{-- css global --}}
        {{-- <link href="{{ asset('css/elegant-icons.css') }}" rel="stylesheet"> --}}
        <link href="{{ asset('css/plyr.css') }}" rel="stylesheet">
        <link href="{{ asset('css/nice-select.css') }}" rel="stylesheet">
        <link href="{{ asset('css/slicknav.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">

        {{-- start meta share facebook --}}
        {{-- <meta property="og:type"               content="website" />
        <meta property="og:title"              content="{{$title}}" />
        <meta property="og:description"        content="{{$meta_desc}}" />
        <meta property="og:image"              content="{{$og_image}}" />
        <meta property="og:url"                content="{{$url_canonical}}" />
        <meta property="og:size_name"          content="sachtruyen" /> --}}
        {{-- start meta share facebook --}}
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
                                <h4 class="text-white">Dosi-in</h4>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="header__nav">
                            <nav class="header__menu mobile-menu">
                                <ul>
                                    {{-- <li class="active"><a href="{{url('/')}}">Trang chủ</a></li> --}}
                                    <li>
                                        <a href="./categories.html">
                                            Danh mục truyện
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
                                        <a href="{{url('/')}}">
                                            Thể loại
                                        </a>
                                        <ul class="dropdown">
                                            @foreach($theloai as $key => $value)
                                            <li>
                                                <a href="{{url('the-loai/'.$value->slug_theloai)}}">{{$value->tentheloai}}</a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    {{-- <li>
                                        <a href="#">Contacts</a>
                                    </li> --}}
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="header__right">
                            <a href="#" class="search-switch">
                                <span class="icon_search">
                                    <svg width="24" height="24" viewBox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M6.41667 11.5833C8.994 11.5833 11.0833 9.494 11.0833 6.91667C11.0833 4.33934 8.994 2.25 6.41667 2.25C3.83934 2.25 1.75 4.33934 1.75 6.91667C1.75 9.494 3.83934 11.5833 6.41667 11.5833Z" stroke="#8F8F8F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M12.25 12.75L9.71252 10.2125" stroke="#8F8F8F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>    
                                </span>
                            </a>
                            <a href="./login.html">
                                <div>
                                    <svg width="26" height="26" viewBox="0 0 14 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_1_15118)">
                                        <path d="M11.7084 13.625V12.375C11.7084 11.712 11.4669 11.0761 11.0371 10.6072C10.6074 10.1384 10.0245 9.875 9.41669 9.875H4.83335C4.22557 9.875 3.64267 10.1384 3.2129 10.6072C2.78313 11.0761 2.54169 11.712 2.54169 12.375V13.625" stroke="#8F8F8F" stroke-width="1.17647" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M7.12498 7.375C8.39063 7.375 9.41665 6.25571 9.41665 4.875C9.41665 3.49429 8.39063 2.375 7.12498 2.375C5.85933 2.375 4.83331 3.49429 4.83331 4.875C4.83331 6.25571 5.85933 7.375 7.12498 7.375Z" stroke="#8F8F8F" stroke-width="1.17647" stroke-linecap="round" stroke-linejoin="round"/>
                                        </g>
                                        <defs>
                                        <clipPath id="clip0_1_15118">
                                        <rect width="13.75" height="15" fill="white" transform="translate(0.25 0.5)"/>
                                        </clipPath>
                                        </defs>
                                    </svg>
                                </div>
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
                            {{-- <a href="./index.html"><img src="images/logo.png" alt=""></a> --}}
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
                        Copyright &copy;
                        <script>document.write(new Date().getFullYear());</script>
                         All rights
                          <i class="fa fa-heart" aria-hidden="true"></i> by 
                          <a href="" target="_blank">nvnblog</a>
                        <!-- Link back to Colorlib can't be removed. Template is licenased under CC BY 3.0. --></p>

                    </div>
                </div>
            </div>
        </footer>
        <!-- Footer Section End -->

        <!-- Search model Begin -->
        <div class="search-model">
            <div class="h-100 d-flex align-items-center justify-content-center">
                <div class="search-close-switch">
                    x
                </div>
                <form autocomplete="off" class="search-model-form" action="{{url('tim-kiem')}}" method="POST">
                    @csrf
                    <input type="search" name="tukhoa" id="keywords" class="mb-3" placeholder="Tìm kiếm.....">
                    <div class="quickSearch" id="search_ajax">
                        
                    </div>
                </form>
            </div>
        </div>
        
        <!-- Search model end -->
        <script src="{{ asset('js/player.js') }}" ></script>
        <script src="{{ asset('js/jquery.nice-select.min.js') }}" ></script>
        <script src="{{ asset('js/jquery.slicknav.js') }}" ></script>
        <script src="{{ asset('js/owl.carousel.js') }}" ></script>
        <script src="{{ asset('js/main.js') }}" ></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
                

        <script type="text/javascript">
            // $("#select-chapter").on('change', function() {
            //     var url = $(this).val();
            //     if(url) {
            //         window.location = url;
            //     }
            //     return false;
            // });

            // current_chapter();
            // function current_chapter() {
            //     var url = window.location.href;
            //     $('#select-chapter').find('li[value="'+url+'"]').classList.add("selected");
            //     $('#select-chapter').find('option[value="'+url+'"]').attr("selected", true);
            // }


            // like truyen
            show_wishlist();
            function show_wishlist() {
                if(localStorage.getItem('wishlist_truyen') != null) {
                    var data = JSON.parse(localStorage.getItem('wishlist_truyen'));
                    data.reverse();
                     for(i=0; i<data.length; i++) {
                        var title = data[i].title;
                        var img = data[i].img;
                        var id = data[i].id;
                        var url = data[i].url;
                        $('#yeuthich').append(`
                            <div class="product__sidebar__comment__item">
                                <div class="product__sidebar__comment__item__pic">
                                    <img src="`+img+`" alt="`+title+`" style="width: 50px; height: 100px; object-fit: cover">
                                </div>
                                <div class="product__sidebar__comment__item__text">
                                    <h5><a href="`+url+`">`+title+`</a></h5>
                                    <span><i class="fa fa-eye"></i> 19.141 Viewes</span>
                                </div>
                            </div>
                        `);
                     }
                }
            }


            $( ".btn-thichtruyen" ).click(function() {
                $('.fa-heart').css('color', '#FF1493');
                const id = $('.wishlist_id').val();
                const title = $('.wishlist_title').val();
                const img = $('.card-img-top').attr('data-setbg');
                const url = $('.wishlist_url').val();
                
                const item = {
                    'id': id ,
                    'title': title,
                    'img': img,
                    'url': url
                }

                if(localStorage.getItem('wishlist_truyen') == null) {
                    localStorage.setItem('wishlist_truyen', '[]');
                }
                var old_data = JSON.parse(localStorage.getItem('wishlist_truyen'));
                var matches = $.grep(old_data, function(obj){
                    return obj.id == id;
                }) 
                if(matches.length) {
                    alert('truyện đã có trong danh sách yêu thích');
                }else {
                    if(old_data.length <= 8){
                        old_data.push(item);
                    }else {
                        alert('Đã đạt tới giới hạn lưu truyện yêu thích');
                    }

                    $('#yeuthich').append(`
                        <div class="product__sidebar__comment__item">
                            <div class="product__sidebar__comment__item__pic">
                                <img src="`+img+`" alt="`+title+`" style="width: 50px; height: 100px; object-fit: cover">
                            </div>
                            <div class="product__sidebar__comment__item__text">
                                <h5><a href="`+url+`">`+title+`</a></h5>
                                <span><i class="fa fa-eye"></i> 19.141 Viewes</span>
                            </div>
                        </div>
                    `);
                    localStorage.setItem('wishlist_truyen', JSON.stringify(old_data));
                    alert('Đã thêm vào wishlist');
                }
                localStorage.setItem('wishlist_truyen', JSON.stringify(old_data));
            });
        </script>

        {{-- start: search ajax --}}
        <script type="text/javascript">
            $('#keywords').keyup(function() {
                var query = $(this).val();
                if(query != ''){
                    var _token = $('input[name="_token"]').val();

                    $.ajax({
                        url: "{{url('/timkiem-ajax')}}",
                        method: "POST",
                        data: {query:query, _token:_token},
                        success: function(data) {
                            $('#search_ajax').fadeIn();
                            $('#search_ajax').html(data);
                            
                        }
                    });
                }else {
                    $('#search_ajax').fadeOut();
                }
            });

            $(document).on('click', '.li_search_ajax', function() {
                $('#keywords').val($(this).text());
                $('#search_ajax').fadeOut();
            })
        </script>
        {{-- end: search ajax --}}
        <div id="fb-root"></div>
        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v15.0" nonce="lcJRhWmv"></script>
     
    </body>
</html>
