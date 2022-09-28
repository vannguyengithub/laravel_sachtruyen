@extends('layouts.app')

@section('content')

@include('layouts.nav')

<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">Liệt kê danh mục truyện</div>

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
                                <th scope="col">Tên danh mục</th>
                                <th scope="col">Slug danh mục</th>
                                <th scope="col">Mô tả</th>
                                <th scope="col">Trang Thái</th>
                                <th scope="col">Quản lý</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach($danhmuctruyen as $key => $danhmuc)  
                                <tr>
                                    <th class="align-middle" scope="row">{{ $key }}</th>
                                    <td class="align-middle">{{ $danhmuc->tendanhmuc}}</td>
                                    <td class="align-middle">{{ $danhmuc->slug_danhmuc}}</td>
                                    <td class="align-middle">
                                        <span class="sort-content" style="overflow: hidden; -webkit-line-clamp: 6; -webkit-box-orient: vertical; display: -webkit-box; width: 190px;">
                                            {{ $danhmuc->mota}}
                                        </span>
                                    </td>
                                    <td class="align-middle">
                                        @if ($danhmuc->kichhoat == 0)
                                            <span class="text-success">Kích hoạt</span>
                                        @else
                                        <span class="text-danger">Không kích hoạt</span>
                                        @endif
                                    </td>
                                    <td class="align-middle">
                                        <div class="d-flex">
                                            <a href="{{ route('danhmuc.edit', [$danhmuc->id])}}" class="btn btn-primary mr-2">Edit</a>
                                            <form action="{{ route('danhmuc.destroy', [$danhmuc->id])}}" method="POST">
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
