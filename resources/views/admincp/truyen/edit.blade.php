@extends('layouts.app')

@section('content')

@include('layouts.nav')

<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">Cập nhật truyện</div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>  
                    @endif
                    
                    <form method="POST" action="{{ route('truyen.update',[$truyen->id])}}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf   
                        <div class="form-group">
                            <label for="exampleFormControlSelect2">Danh mục truyện </label>
                            <select class="form-control" name="danhmuc_id" id="exampleFormControlSelect2">
                                @foreach($danhmuc as $key => $muc)  
                                    <option {{$muc->id==$truyen->danhmuc_id ? 'selected' : ''}} value="{{$muc->id}}">{{$muc->tendanhmuc}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên truyện</label>
                            <input type="text" class="form-control" value="{{$truyen->tentruyen}}" name="tentruyen" onkeyup="ChangeToSlug()" id="slug" aria-describedby="emailHelp" placeholder="Tên truyện">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Slug tên truyện</label>
                            <input type="text" class="form-control" value="{{$truyen->slug_truyen}}" name="slug_truyen" id="convert_slug" aria-describedby="emailHelp" placeholder="Slug tên truyện">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tác giả</label>
                            <input type="text" class="form-control" value="{{$truyen->tacgia}}" name="tacgia" aria-describedby="emailHelp" placeholder="tác giả">
                        </div
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tóm tắc truyện</label>
                            <textarea class="form-control" name="tomtat" id="exampleFormControlTextarea1" rows="3">{{$truyen->tomtat}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Hình ảnh</label>
                            <input type="file" class="form-control-file"  name="hinhanh">
                            <img src="{{asset('public/uploads/truyen/'.$truyen->hinhanh)}}" class="mt-3" alt="..." width="200px" height="200px" style="object-fit: cover; border: 1px solid; border-radius: 8px">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Trạng thái </label>
                            <select class="form-control" name="kichhoat" id="exampleFormControlSelect1">
                                @if ($truyen->kichhoat == 0)
                                    <option selected value="0">Kích hoạt</option>
                                    <option value="1">Không kích hoạt</option>
                                @else
                                    <option value="0">Kích hoạt</option>
                                    <option selected value="1">Không kích hoạt</option>
                                @endif
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Cập nhật truyện</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
