<!-- search.blade.php -->
@extends('layouts.master')

@section('content')
    <style>
        .highlight {
            background-color: rgb(99, 175, 113);
            color: rgb(248, 238, 238);
        }

        h1 {
            font-family: Arial, sans-serif;
            font-size: 24px;
            font-weight: bold;
            color: #333;
            text-align: center;
            padding: 10px;
            background-color: #f3f3f3;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
    </style>
    <h1>Kết quả tìm kiếm cho : "{{ $searchTerm }}"</h1>
    @if (count($tinTucs) > 0)
        <div class="row">

            @foreach ($tinTucs as $item)
                <div class="col-md-6">
                    <a href="chinh-tri/chi-tiet/{{ $item->id }}">
                        <div class="card mb-3" style="max-width: 550px;">
                            <div class="row g-0">
                                <div class="col-md-5">
                                    <img src="{{ $item->image_url }}" class="card-img-top" alt="...">
                                </div>
                                <div class="col-md-7">
                                    <div class="card-body">
                                        <h5 style="color: black; font-weight: bold;" class="card-title">
                                            {!! preg_replace('/(' . preg_quote($searchTerm, '/') . ')/i', '<span class="highlight">$1</span>', $item->title) !!}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach

        </div>
    @else
        <p class="text-center" style="color: rgb(146, 92, 92); font-weight: bold;">Không có thông tin trùng khớp với kết quả tìm kiếm "{{ $searchTerm }}".</p>
    @endif
@endsection
