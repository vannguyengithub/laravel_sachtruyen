@extends('../layout')
{{-- indexcontroller nó đi đến đây và extent của layout và section content lấy yeld(content) --}}

@section('slide')
    {{-- @include('pages.slide') --}}
@endsection

@section('content')
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="mb-4">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        @foreach ($danhmuc as $key => $tabsdanhmuc)
                        <li class="nav-item">
                            <a class="nav-link " id="home-tab" data-toggle="tab" href="#{{$tabsdanhmuc->slug_danhmuc}}" role="tab" aria-controls="home" aria-selected="true">
                                {{$tabsdanhmuc->tendanhmuc}}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                    <div class="tab-content mt-2" id="myTabContent">
                        @foreach ($danhmuc as $key => $tab_hienthi_danhmuc)
                        <div class="tab-pane fade text-light show " id="{{$tab_hienthi_danhmuc->slug_danhmuc}}" role="tabpanel" aria-labelledby="home-tab">
                            <h4 class="text-light">
                                {{$tab_hienthi_danhmuc->tendanhmuc}}
                            </h4>
                            <div id="tab_danhmuctruyen">

                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <div class="recent__product">
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-8">
                                <div class="section-title">
                                    <h4>HIỂN THỊ ĐƯỢC THÊM GẦN ĐÂY</h4>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <div class="btn__all">
                                    <a href="#" class="primary-btn">Xem thêm <span class="arrow_right"></span></a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            @foreach($truyen as $key => $value)
                            <div class="col-lg-4 col-md-4 col-sm-6">
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
                </div>
                <div class="col-lg-4 col-md-6 col-sm-8">
                    <div class="product__sidebar">
                        <div class="product__sidebar__comment">
                            <div class="section-title">
                                <h5>New Hot</h5>
                            </div>
                            @foreach($truyennoibac as $key => $value)
                            <div class="product__sidebar__comment__item">
                                <div class="product__sidebar__comment__item__pic">
                                    <img src="{{asset('public/uploads/truyen/'.$value->hinhanh)}}" alt="" style="width: 150px; height: 150px; object-fit: cover;">
                                </div>
                                <div class="product__sidebar__comment__item__text">
                                    <h5>
                                        <a href="{{url('xem-truyen/'.$value->slug_truyen)}}">{{$value->tentruyen}}</a>
                                    </h5>
                                    <span><i class="fa fa-eye"></i> 19.141 Viewes</span>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection