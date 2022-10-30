<section class="hero">
    <div class="container">
        <div class="hero__slider owl-carousel">
            @foreach($slide_truyen as $key => $value) 
            <div class="hero__items set-bg" data-setbg="images/hero/hero-1.jpg">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="hero__text">
                            <div class="label">{{$value->tacgia}}</div>
                            <h2>{{$value->tentruyen}}</h2>
                            <p>{{$value->tomtat}}</p>
                            <a href="#">
                                <span>Đọc ngay</span>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>