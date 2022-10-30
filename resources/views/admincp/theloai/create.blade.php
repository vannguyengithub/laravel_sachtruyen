@extends('layouts.app')

@section('content')

@include('layouts.nav')

<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">Thêm thể loại</div>
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
                    
                    <form method="POST" action="{{ route('theloai.store')}}">
                        @csrf   
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên thể loại</label>
                            <input type="text" class="form-control" value="{{old('tentheloai')}}" name="tentheloai" onkeyup="ChangeToSlug()" id="slug" aria-describedby="emailHelp" placeholder="tên thể loại">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Slug chapter</label>
                            <input type="text" class="form-control" value="{{old('slug_theloai')}}" name="slug_theloai" id="convert_slug" aria-describedby="emailHelp" placeholder="tên thể loại">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tóm tắt thể loại</label>
                            <input type="text" class="form-control" value="{{old('mota')}}" name="mota" id="" aria-describedby="emailHelp" placeholder="mô tả thể loại">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Trạng thái </label>
                            <select class="form-control" name="kichhoat" id="exampleFormControlSelect1">
                              <option value="0">Kích hoạt</option>
                              <option value="1">Không kích hoạt</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-pirmary">Thêm danh mục</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
