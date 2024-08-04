@extends('layouts.master')
@section('content')
    <style>
        .bold-text {
            font-family: notosans-bold;
            font-size: 24px;
        }
        .divider {
        border-right: 1px solid #ccc;
        height: 100%;
        margin-right: -1px;
        padding-right: 15px;
    }
    .card {
    border: 1px solid #ccc;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    overflow: hidden;
  }

  .card-img-top {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border: 4px solid #fff;
    border-radius: 4px;
  }

  .card-body {
    padding: 1rem;
  }

  .card-title {
    font-size: 14px;
    font-family: notosans-bold;
    margin-bottom: 0;
    color: black;

  }

    </style>

    <title>Vietnamnet - Trang Thông Tin Điện Tử Tổng Hợp</title>

    <div class="site-section site-blocks-2">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-4 mb-4 mb-lg-0" data-aos="fade" data-aos-delay="">
                    <a class="block-2-item" href="#">
                        <figure class="image">
                            <img src="/client/images/women.jpg" alt="" class="img-fluid">
                        </figure>
                        <div class="text">
                            <span class="text-uppercase">Khám phá</span>
                            <h3>Lịch vạn niên</h3>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4 mb-5 mb-lg-0" data-aos="fade" data-aos-delay="100">
                    <a class="block-2-item" href="#">
                        <figure class="image">
                            <img src="/client/images/children.jpg" alt="" class="img-fluid">
                        </figure>
                        <div class="text">
                            <span class="text-uppercase">Khám phá</span>
                            <h3>Thời tiết </h3>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4 mb-5 mb-lg-0" data-aos="fade" data-aos-delay="200">
                    <a class="block-2-item" href="#">
                        <figure class="image">
                            <img src="/client/images/men.jpg" alt="" class="img-fluid">
                        </figure>
                        <div class="text">
                            <span class="text-uppercase">Khám phá</span>
                            <h3>Mẹo hay</h3>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-4">
                <div class="divider mb-4">
                    <div class="">
                        <span class="font-weight-bold text-uppercase">CHÍNH TRỊ</span>
                    </div>
                    @foreach ($category6_articles as $item)
                    <a href="{{ url('chinh-tri/chi-tiet/' . $item->id) }}">
                        <div class="card mb-3" style="max-width: 550px;">
                            <div class="row g-0">
                                <div class="col-md-5">
                                    <img src="{{ $item->image_url }}" class="card-img-top" alt="{{ $item->title }}">
                                </div>
                                <div class="col-md-7">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $item->title }}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    @endforeach
                    <div class="d-flex justify-content-center mt-4">
                        {{ $category6_articles->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="divider mb-4">
                    <div class="">
                        <span class="font-weight-bold text-uppercase">THỂ THAO</span>
                    </div>
                    @foreach ($category7_articles as $item)
                    <a href="{{ url('chinh-tri/chi-tiet/' . $item->id) }}">
                        <div class="card mb-3" style="max-width: 550px;">
                            <div class="row g-0">
                                <div class="col-md-5">
                                    <img src="{{ $item->image_url }}" class="card-img-top" alt="{{ $item->title }}">
                                </div>
                                <div class="col-md-7">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $item->title }}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    @endforeach
                    <div class="d-flex justify-content-center mt-4">
                        {{ $category7_articles->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="divider mb-4">
                    <div class="">
                        <span class="font-weight-bold text-uppercase">THỜI SỰ</span>
                    </div>
                    @foreach ($category8_articles as $item)
                    <a href="{{ url('chinh-tri/chi-tiet/' . $item->id) }}">
                        <div class="card mb-3" style="max-width: 550px;">
                            <div class="row g-0">
                                <div class="col-md-5">
                                    <img src="{{ $item->image_url }}" class="card-img-top" alt="{{ $item->title }}">
                                </div>
                                <div class="col-md-7">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $item->title }}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    @endforeach
                    <div class="d-flex justify-content-center mt-4">
                        {{ $category8_articles->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>

        </div>
    </div>
    <div class="site-section block-3 site-blocks-2 bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7 site-section-heading text-center pt-4">
                    <span class="font-weight-bold text-uppercase bold-text">TIN MỚI</span>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    @foreach ($data as $item)
                        <div class="col-3">
                            <a href="chinh-tri/chi-tiet/{{ $item->id }}">
                                <div class="card h-100">
                                    <img src="{{ $item->image_url }}" class="" height="150px" alt="...">
                                    <div class="card-body">
                                        <p class="card-text text-center " style="color: black; font-weight: bold;">{{ $item->title }}</p>
                                        {{-- <p class="card-text text-center bold">{{ $item->TenTacGia }}</p> --}}
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>

                <div class="d-flex justify-content-center mt-4">
                    {{ $data->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>


@endsection
