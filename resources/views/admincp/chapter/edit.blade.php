@extends('layouts.app')

@section('content')

@include('layouts.nav')

<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">Cập nhật chapter</div>
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
                    
                    <form method="POST" action="{{ route('chapter.update',[$chapter->id])}}">
                        @method('PUT')
                        @csrf   
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên chapter</label>
                            <input type="text" class="form-control" value="{{$chapter->tieude}}" name="tieude" onkeyup="ChangeToSlug()" id="slug" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Slug chapter</label>
                            <input type="text" class="form-control" value="{{$chapter->slug_chapter}}" name="slug_chapter" id="convert_slug" aria-describedby="emailHelp" placeholder="Slug">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tóm tắt chapter</label>
                            <input type="text" class="form-control" value="{{$chapter->tomtat}}" name="tomtat" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="tóm tắt chapter">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nội dung chapter</label>
                            <textarea class="form-control" name="noidung" id="" cols="30" rows="5">
                                {{$chapter->noidung}}
                            </textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Thuộc truyện</label>
                            <select class="form-control" name="truyen_id" id="exampleFormControlSelect1">
                                @foreach($truyen as $key => $value)
                                <option {{$chapter->truyen_id == $value->id ? 'selected' : ''}} value="{{$value->id}}">{{$value->tentruyen}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Trạng thái </label>
                            <select class="form-control" name="kichhoat" id="exampleFormControlSelect1">
                                @if ($chapter->kichhoat == 0)
                                    <option selected value="0">Kích hoạt</option>
                                    <option value="1">Không kích hoạt</option>
                                @else
                                    <option value="0">Kích hoạt</option>
                                    <option selected value="1">Không kích hoạt</option>
                                @endif
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Cập nhật chapter</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
