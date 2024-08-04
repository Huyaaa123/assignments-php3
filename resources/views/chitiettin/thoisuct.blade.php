<!-- Trang chitiettin.blade.php -->
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

.card-titlee {
font-size: 14px;
font-family: notosans-bold;
margin-bottom: 0;
color: black;
}
.card-title {

color: black;

}

</style>
<title>{{ $tintuc->title }}</title>

    <div class="container">
        <div class="bg-light py-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 mb-0">
                        <a href="/" class="font-weight-bold">Home</a>
                        <span class="mx-2 mb-0">/</span>
                        <a href="" class="font-weight-bold">Thời Sự</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="">
                    <h2 class="card-title text-center font-weight-bold">{{ $tintuc->title }}</h2>
                    <p class="card-text text-right">Ngày đăng: {{ $tintuc->created_at }}</p>
                    <div class="text-center">
                        <img src="{{ $tintuc->image_url }}" width="100%" alt="">
                    </div>
                    <p class="card-text" style="font-family: Arial, sans-serif; font-size: 14px; line-height: 1.5;">{!! nl2br(e($tintuc->content)) !!}</p>
                </div>
                @include('cmt') {{-- comments --}}
            </div>


            <div class="col-md-4">
               <h2> <a href="/" class="font-weight-bold">Cùng thể loại</a></h2>
                @foreach ($tincungdanhmuc as $item)
                <a href="{{ $item->id }}">
                  <div class="card mb-3" style="max-width: 550px;">
                      <div class="row g-0">
                        <div class="col-md-5">
                          <img src="{{ $item->image_url }}" class="card-img-top" alt="...">
                        </div>
                        <div class="col-md-7">
                          <div class="card-body">
                            <h5 class="card-titlee">{{$item->title}}</h5>
                          </div>
                        </div>
                      </div>
                    </div>
                </a>
                @endforeach

            </div>
        </div>
    </div>
@endsection
