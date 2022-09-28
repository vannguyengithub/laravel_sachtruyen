@extends('layouts.app')

@section('content')

@include('layouts.nav')

<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">Liệt kê truyện</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                              <tr>
                                <th scope="col">stt</th>
                                <th scope="col">Tên truyện</th>
                                <th scope="col">Hình ảnh</th>
                                <th scope="col">Slug truyện</th>
                                <th scope="col">Tóm tắc</th>
                                <th scope="col">Danh mục</th>
                                <th scope="col">Trang Thái</th>
                                <th scope="col">Quản lý</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach($list_truyen as $key => $truyen)  
                                <tr>
                                    <th class="align-middle" scope="row">{{ $key }}</th>
                                    <td class="align-middle">{{ $truyen->tentruyen}}</td>
                                    <td class="align-middle">
                                        <img src="{{asset('public/uploads/truyen/'.$truyen->hinhanh)}}" class="" alt="..." width="200px" height="200px" style="object-fit: cover; border: 1px solid; border-radius: 8px">
                                    </td>
                                    <td class="align-middle">{{ $truyen->slug_truyen}}</td>
                                    <td class="align-middle">
                                        <span class="sort-content" style="overflow: hidden; -webkit-line-clamp: 6; -webkit-box-orient: vertical; display: -webkit-box; width: 190px;">
                                            {{ $truyen->tomtat}}
                                        </span>
                                    </td>
                                    <td class="align-middle">{{$truyen->danhmuctruyen->tendanhmuc}}</td>
                                    <td class="align-middle">
                                        @if ($truyen->kichhoat == 0)
                                            <span class="text-success">Kích hoạt</span>
                                        @else
                                        <span class="text-danger">Không kích hoạt</span>
                                        @endif
                                    </td>
                                    <td class="align-middle">
                                        <div class="d-flex">
                                            <a href="{{ route('truyen.edit', [$truyen->id])}}" class="btn btn-primary mr-2">Edit</a>
                                            <form action="{{ route('truyen.destroy', [$truyen->id])}}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn btn-danger" onclick="return confirm('Bạn có chắc muốn xóa?');">
                                                    delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
