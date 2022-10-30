@extends('../layout')
@section('content')
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="{{url('/')}}"><i class="fa fa-home"></i> Trang chủ</a>
                        <a href="{{url('danh-muc/'.$truyen_breadcrumb->danhmuctruyen->slug_danhmuc)}}"><i class="fa fa-home"></i> {{$truyen_breadcrumb->danhmuctruyen->tendanhmuc}} </a>
                        <a href="{{url('the-loai/'.$truyen_breadcrumb->theloai->slug_theloai)}}"><i class="fa fa-home"></i> {{$truyen_breadcrumb->theloai->tentheloai}} </a>
                        <span>{{$truyen_breadcrumb->tentruyen}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->
    <div class="container mt-5">
        <div class="row">
        </div>
    </div>
    
    <div class="container mt-5">
        <div>
            <div class="section-title">
                <h5>TÊN TRUYỆN: {{$chapter->truyen->tentruyen}}</h5>
                <br>
                <h6 class="text-white">{{$chapter->tieude}}</h6>
            </div>
            {{-- <div class="text-white">
                
            </div> --}}
            <div class="text-white">
                {!! $chapter->noidung!!}
            </div>
            <div class="d-flex justify-content-center mt-2" style="gap: 12px">
                <a class="btn btn-primary" href="{{url('xem-chapter/'.$previous_chapter)}}"> <--Tập trước</a>
                
                <a class="btn btn-primary {{$chapter->id==$max_id->id ? 'disabled' : ''}} " href="{{url('xem-chapter/'.$next_chapter)}}">Tập sau--> </a>
            </div>
        </div>
    </div>
    <!-- Anime Section Begin -->
    <section class="anime-details spad">
        <div class="container">
            <div class="row">
                
                <div class="col-lg-12">
                  
                    <div class="anime__details__episodes">
                        <div class="section-title">
                            <h5>List Name</h5>
                        </div>
                        <a href="#">Ep 01</a>
                        <a href="#">Ep 02</a>
                        <a href="#">Ep 03</a>
                        <a href="#">Ep 04</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <div class="anime__details__review">
                        <div class="section-title">
                            <h5>Reviews</h5>
                        </div>
                        <div class="anime__review__item">
                            <div class="anime__review__item__pic">
                                <img src="img/anime/review-1.jpg" alt="">
                            </div>
                            <div class="anime__review__item__text">
                                <h6>Chris Curry - <span>1 Hour ago</span></h6>
                                <p>whachikan Just noticed that someone categorized this as belonging to the genre
                                "demons" LOL</p>
                            </div>
                        </div>
                        <div class="anime__review__item">
                            <div class="anime__review__item__pic">
                                <img src="img/anime/review-2.jpg" alt="">
                            </div>
                            <div class="anime__review__item__text">
                                <h6>Lewis Mann - <span>5 Hour ago</span></h6>
                                <p>Finally it came out ages ago</p>
                            </div>
                        </div>
                        <div class="anime__review__item">
                            <div class="anime__review__item__pic">
                                <img src="img/anime/review-3.jpg" alt="">
                            </div>
                            <div class="anime__review__item__text">
                                <h6>Louis Tyler - <span>20 Hour ago</span></h6>
                                <p>Where is the episode 15 ? Slow update! Tch</p>
                            </div>
                        </div>
                        <div class="anime__review__item">
                            <div class="anime__review__item__pic">
                                <img src="img/anime/review-4.jpg" alt="">
                            </div>
                            <div class="anime__review__item__text">
                                <h6>Chris Curry - <span>1 Hour ago</span></h6>
                                <p>whachikan Just noticed that someone categorized this as belonging to the genre
                                "demons" LOL</p>
                            </div>
                        </div>
                        <div class="anime__review__item">
                            <div class="anime__review__item__pic">
                                <img src="img/anime/review-5.jpg" alt="">
                            </div>
                            <div class="anime__review__item__text">
                                <h6>Lewis Mann - <span>5 Hour ago</span></h6>
                                <p>Finally it came out ages ago</p>
                            </div>
                        </div>
                        <div class="anime__review__item">
                            <div class="anime__review__item__pic">
                                <img src="img/anime/review-6.jpg" alt="">
                            </div>
                            <div class="anime__review__item__text">
                                <h6>Louis Tyler - <span>20 Hour ago</span></h6>
                                <p>Where is the episode 15 ? Slow update! Tch</p>
                            </div>
                        </div>
                    </div>
                    <div class="anime__details__form">
                        <div class="section-title">
                            <h5>Your Comment</h5>
                        </div>
                        <form action="#">
                            <textarea placeholder="Your Comment"></textarea>
                            <button type="submit"><i class="fa fa-location-arrow"></i> Review</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Anime Section End -->
  
@endsection