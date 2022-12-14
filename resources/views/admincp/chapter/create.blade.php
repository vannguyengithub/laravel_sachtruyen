@extends('layouts.app')

@section('content')

@include('layouts.nav')

<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">Thêm chapter</div>
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
                    
                    <form method="POST" action="{{ route('chapter.store')}}">
                        @csrf   
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên chapter</label>
                            <input type="text" class="form-control" value="{{old('tieude')}}" name="tieude" onkeyup="ChangeToSlug()" id="slug" aria-describedby="emailHelp" placeholder="tiêu đề">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Slug chapter</label>
                            <input type="text" class="form-control" value="{{old('slug_chapter')}}" name="slug_chapter" id="convert_slug" aria-describedby="emailHelp" placeholder="Slug">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tóm tắt chapter</label>
                            <input type="text" class="form-control" value="{{old('tomtat')}}" name="tomtat" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="tóm tắt chapter">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nội dung chapter</label>
                            <textarea class="form-control"  name="noidung" id="noidung_chapter" cols="30" rows="5"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Thuộc truyện</label>
                            <select class="form-control" name="truyen_id" id="exampleFormControlSelect1">
                                @foreach($truyen as $key => $value)
                                <option value="{{$value->id}}">{{$value->tentruyen}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Trạng thái </label>
                            <select class="form-control" name="kichhoat" id="exampleFormControlSelect1">
                              <option value="0">Kích hoạt</option>
                              <option value="1">Không kích hoạt</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Thêm danh mục</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
