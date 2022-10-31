@extends('../layout')

@section('content')
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="{{url('/')}}"><i class="fa fa-home"></i> Trang chủ</a>
                        <a href="{{url('danh-muc/'.$truyen->danhmuctruyen->slug_danhmuc)}}"><i class="fa fa-home"></i> {{$truyen->danhmuctruyen->tendanhmuc}} </a>
                        <span>{{$truyen->tentruyen}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Anime Section Begin -->
    <section class="anime-details spad">
        <div class="container">
            <div class="anime__details__content">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="anime__details__pic set-bg" data-setbg="{{asset('public/uploads/truyen/'.$truyen->hinhanh)}}">
                            <div class="comment"><i class="fa fa-comments"></i> 11</div>
                            <div class="view"><i class="fa fa-eye"></i> 9141</div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="anime__details__text">
                            <div class="anime__details__title">
                                <h3>{{$truyen->tentruyen}}</h3>
                                <span>{{$truyen->tacgia}}</span>
                            </div>
                            <div class="anime__details__rating">
                                <div class="rating">
                                    <a href="#"><i class="fa fa-star"></i></a>
                                    <a href="#"><i class="fa fa-star"></i></a>
                                    <a href="#"><i class="fa fa-star"></i></a>
                                    <a href="#"><i class="fa fa-star"></i></a>
                                    <a href="#"><i class="fa fa-star-half-o"></i></a>
                                </div>
                                <span>1.029 Votes</span>
                            </div>
                            <p>
                                {{$truyen->tomtat}}
                            </p>
                            <div class="anime__details__widget">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <ul>
                                            <li><span>Type:</span> {{$truyen->theloai->tentheloai}}</li>
                                            <li><span>Danh mục:</span> {{$truyen->danhmuctruyen->tendanhmuc}}</li>
                                            <li><span>Date aired:</span> Oct 02, 2019 to ?</li>
                                            <li><span>Status:</span> Airing</li>
                                            <li><span>Genre:</span> Action, Adventure, Fantasy, Magic</li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <ul>
                                            <li><span>Scores:</span> 7.31 / 1,515</li>
                                            <li><span>Rating:</span> 8.5 / 161 times</li>
                                            <li><span>Duration:</span> 24 min/ep</li>
                                            <li><span>Quality:</span> HD</li>
                                            <li><span>Views:</span> 131,541</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="anime__details__btn">
                                <a href="#" class="follow-btn">
                                    <i class="fa fa-heart-o"></i>
                                        Follow
                                    </a>
                             
                                @if($chapter_dau)
                                <a href="{{url('xem-chapter/'.$chapter_dau->slug_chapter)}}" class="watch-btn">
                                    <span>Đọc Online</span> 
                                    <i class="fa fa-angle-right"></i>
                                </a>
                                @else
                                <a href="{{url('/')}}" class="watch-btn">
                                    <span>Hiện tại chưa có chương</span> 
                                    <i class="fa fa-angle-right"></i>
                                </a>
                                @endif

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tags mb-4">
                    <p>Từ khóa tìm kiếm...</p>
                    <div class="product__item__text">
                        <ul>
                            <li>#Active</li>
                            <li>#Movie</li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 col-md-8">
                        <div class="anime__details__review">
                            <div class="section-title">
                                <h5>Chapter</h5>
                            </div>
                            @php 
                                $count = count($chapter);
                            @endphp
                            @if($count == 0)
                                <h6 class="anime__review__item__text text-white">Chapter đang cập nhật...</h6>
                            @else 

                            @foreach($chapter as $key => $value)
                            <a href="{{url('xem-chapter/'.$value->slug_chapter)}}" class="anime__review__item" style="display: block">
                                <div class="anime__review__item__pic">
                                    <img src="{{asset('public/uploads/truyen/'.$truyen->hinhanh)}}" alt="">
                                </div>
                                <div class="anime__review__item__text">
                                    <h6>{{$value->tieude}}</span></h6>
                                    <p>{{$value->tomtat}}</p>
                                </div>
                            </a>
                            @endforeach
                            @endif

                        </div>
                        {{--  --}}
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-8">
                                <div class="section-title">
                                    <h4>Cùng danh mục</h4>
                                </div>
                            </div>
                           
                        </div>
                        <div class="row">
                            @foreach($cungdanhmuc as $key => $value)
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="product__item">
                                    <div class="product__item__pic set-bg" data-setbg="{{asset('public/uploads/truyen/'.$value->hinhanh)}}">
                                        <div class="ep">18 / 18</div>
                                        <div class="comment"><i class="fa fa-comments"></i> 11</div>
                                        <div class="view"><i class="fa fa-eye"></i> 9141</div>
                                    </div>
                                    <div class="product__item__text">
                                        <ul>
                                            <li>Active</li>
                                            <li>Movie</li>
                                        </ul>
                                        <h5><a href="{{url('xem-truyen/'.$value->slug_truyen)}}">{{$value->tentruyen}}</a></h5>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="anime__details__sidebar">
                            <div class="section-title">
                                <h5>Có thể bạn thích</h5>
                            </div>
                            <div class="product__sidebar__view__item set-bg" data-setbg="../images/sidebar/tv-1.jpg">
                                <div class="ep">18 / ?</div>
                                <div class="view"><i class="fa fa-eye"></i> 9141</div>
                                <h5><a href="#">Boruto: Naruto next generations</a></h5>
                            </div>
                            <div class="product__sidebar__view__item set-bg" data-setbg="../images/sidebar/tv-2.jpg">
                                <div class="ep">18 / ?</div>
                                <div class="view"><i class="fa fa-eye"></i> 9141</div>
                                <h5><a href="#">The Seven Deadly Sins: Wrath of the Gods</a></h5>
                            </div>
                            <div class="product__sidebar__view__item set-bg" data-setbg="../images/sidebar/tv-3.jpg">
                                <div class="ep">18 / ?</div>
                                <div class="view"><i class="fa fa-eye"></i> 9141</div>
                                <h5><a href="#">Sword art online alicization war of underworld</a></h5>
                            </div>
                            <div class="product__sidebar__view__item set-bg" data-setbg="../images/sidebar/tv-4.jpg">
                                <div class="ep">18 / ?</div>
                                <div class="view"><i class="fa fa-eye"></i> 9141</div>
                                <h5><a href="#">Fate/stay night: Heaven's Feel I. presage flower</a></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <!-- Anime Section End -->
@endsection