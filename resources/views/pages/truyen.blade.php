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
                    <div class="col-lg-4">
                        <div class="anime__details__pic set-bg card-img-top" data-setbg="{{asset('public/uploads/truyen/'.$truyen->hinhanh)}}">
                            <div class="comment"><i class="fa fa-comments"></i> 11</div>
                            <div class="view"><i class="fa fa-eye"></i> 9141</div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="anime__details__text">
                            <div class="anime__details__title">
                                <div class="fb-share-button mb-3" data-href="{{\URL::current();}}" data-layout="button_count" data-size="small">
                                    <a target="_blank" href="{{\URL::current();}}&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">
                                        Chia sẻ
                                    </a>
                                </div>
                                <h3>{{$truyen->tentruyen}}</h3>
                                <span>tác giả: {{$truyen->tacgia}}</span>
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
                                            <li><span>Ngày đăng:</span> {{$truyen->created_at->diffForHumans()}}</li>
                                        </ul>
                                    </div>
                                   
                                </div>
                            </div>
                            <div class="anime__details__btn">
                                {{-- <a href="#" class="follow-btn">
                                    <i class="fa fa-heart-o"></i>
                                        Follow
                                </a> --}}
                             
                                @if($chapter_dau)
                                <button class="btn btn-danger btn-thichtruyen">
                                    <i class="fa-sharp fa-solid fa-heart"></i>
                                    <span>
                                        Like
                                    </span>
                                </button>
                                <a href="{{url('xem-chapter/'.$chapter_dau->slug_chapter)}}" class="btn btn-success">
                                    <span>Đọc Truyện</span> 
                                </a>
                                <a href="{{url('xem-chapter/'.$chapter_moinhat->slug_chapter)}}" class="btn btn-success">
                                    <span>Đọc chương mới nhất</span> 
                                </a>
                                @else
                                <a href="{{url('/')}}" class="btn btn-danger">
                                <span>Đang cập nhật chương ^^~</span> 
                                </a>
                                <button class="btn btn-danger btn-thichtruyen">
                                    <i class="fa-sharp fa-solid fa-heart"></i>
                                    <span>
                                        Like
                                    </span>
                                </button>
                                @endif

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tags mb-4">
                    <p>Từ khóa tìm kiếm...</p>
                    @php
                        $tukhoa = explode(",", $truyen->tukhoa);
                        // hàm phân chia bởi dấu phẩy
                    @endphp
                    <div class="product__item__text">
                        <ul>
                            @foreach($tukhoa as $key => $value)
                            <li>
                                <a href="{{url('tag/'.\Str::slug($value))}}" title="{{$value}}">
                                    #{{$value}}
                                </a>
                            </li>
                            @endforeach
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

                            
                            {{-- <a href="{{url('xem-chapter/'.$value->slug_chapter)}}" class="anime__review__item" style="display: block">
                                <div class="anime__review__item__pic">
                                    <img src="{{asset('public/uploads/truyen/'.$truyen->hinhanh)}}" alt="">
                                </div>
                                <div class="anime__review__item__text">
                                    <h6>{{$value->tieude}}</span></h6>
                                    <p>{{$value->tomtat}}</p>
                                </div>
                            </a> --}}
                            
                            
                            <ul class="list-group list-group-light">
                                @foreach($chapter as $key => $value)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                  <div class="d-flex align-items-center">
                                    <img src="data:image/svg+xml,%3C%3Fxml version='1.0' %3F%3E%3Csvg width='32px' height='32px' viewBox='0 0 32 32' xmlns='http://www.w3.org/2000/svg'%3E%3Ctitle/%3E%3Cpath d='M20.85,18.91C20.8,15,21,8.68,13,2c0,0,1,12-10,16a25.36,25.36,0,0,0,13,4.6S20.89,22.6,20.85,18.91Z' style='fill: %230bf'/%3E%3Cpath d='M1,23v5s12.25,3.69,21,1c7.76-2.39,9-11,9-11C21,23,18,23,1,23Z' style='fill: none;stroke: %23000;stroke-linecap: round;stroke-linejoin: round;stroke-width: 2px'/%3E%3Cpath d='M20.85,18.91C21,15.18,21,8.68,13,2c0,0,1,12-10,16a25.36,25.36,0,0,0,13,4.6' style='fill: none;stroke: %23000;stroke-linecap: round;stroke-linejoin: round;stroke-width: 2px'/%3E%3Cpolyline points='13 2 6 2 9 4.5 6 7 12 7' style='fill: none;stroke: %23000;stroke-linecap: round;stroke-linejoin: round;stroke-width: 2px'/%3E%3C/svg%3E" alt="" style="width: 45px; height: 45px"class="rounded-circle" />
                                    <div class="ms-3">
                                        <p class="fw-bold mb-1">{{$value->tieude}}</p>
                                        <p class="text-muted mb-0" style="overflow: hidden; -webkit-line-clamp: 2; -webkit-box-orient: vertical; display: -webkit-box;">
                                            {{$value->tomtat}}
                                        </p>
                                    </div>
                                  </div>
                                  <a class="btn btn-link btn-rounded btn-sm" href="{{url('xem-chapter/'.$value->slug_chapter)}}" role="button">View</a>
                                </li>
                                @endforeach
                            </ul>
                            @endif
                        </div>
                        <div class="fb-comments" data-href="{{\URL::current();}}" data-width="100%" data-numposts="5"></div>
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
                                <h5>Yêu thích</h5>
                            </div>
                            {{-- lấy biến wishlist --}}
                            <input type="hidden" value="{{$truyen->tentruyen}}" class="wishlist_title">
                            <input type="hidden" value="{{\URL::current()}}" class="wishlist_url">
                            <input type="hidden" value="{{$truyen->id}}" class="wishlist_id">
                            {{-- lấy biến wishlist --}}
                            {{-- <div class="product__sidebar__view__item set-bg" data-setbg="../images/sidebar/tv-1.jpg">
                                <div class="ep">18 / ?</div>
                                <div class="view"><i class="fa fa-eye"></i> 9141</div>
                                <h5><a href="#">Boruto: Naruto next generations</a></h5>
                            </div> --}}
                            <div id="yeuthich">  </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <!-- Anime Section End -->
@endsection