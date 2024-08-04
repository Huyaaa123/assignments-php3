@extends('layouts.master')
@section('content')
    <style>
    </style>
    <title>Vietnamnet - Trang Thông Tin Điện Tử Tổng Hợp</title>

    <div class="container">
        <div class="font-weight-bold text-center bold-text" style="color: black;">THỜI SỰ</div>

        <div class="row">
            @foreach ($tintuc as $item)
                <div class="col-3">
                    <a href="thoi-su/chi-tiet/{{ $item->id }}">
                        <div class="card h-100">
                            <img src="{{ $item->image_url }}" height="150px" class="" alt="...">
                            <div class="card-body">
                                <p class="card-text text-center" style="color: black; font-weight: bold;">{{ $item->title }}</p>
                                {{-- <p class="card-text text-center bold">{{ $item->TenTacGia }}</p> --}}
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>

        <div class="d-flex justify-content-center mt-4">
            {{ $tintuc->links('pagination::bootstrap-4') }}
        </div>
    </div>
@endsection
