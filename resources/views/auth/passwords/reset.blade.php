@extends('layouts.app')

@section('content')
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Vietnamnet | Login and Register </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="../../loginnn/https://static.vnncdn.net/v1/logo/logoVietnamNet.svg">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="../../loginnn/css/bootstrap.min.css">
        <!-- Fontawesome CSS -->
        <link rel="stylesheet" href="../../loginnn/css/fontawesome-all.min.css">
        <!-- Flaticon CSS -->
        <link rel="stylesheet" href="../../loginnn/font/flaticon.css">
        <!-- Google Web Fonts -->
        <link href="../../loginnn/https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&amp;display=swap"
            rel="stylesheet">
        <!-- Custom CSS -->
        <link rel="stylesheet" href="../../loginnn/style.css">
    </head>
<style>
    .error {
    color: red;

}
</style>
<body>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
    <div id="preloader" class="preloader">
        <div class='inner'>
            <div class='line1'></div>
            <div class='line2'></div>
            <div class='line3'></div>
        </div>
    </div>
    <section class="fxt-template-animation fxt-template-layout9" data-bg-image="../../loginnn/img/figure/bg9-l.jpg">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-3 col-12">
                    <div class="fxt-header">
                        <a href="/" class="fxt-logo"><img
                                src="https://static.vnncdn.net/v1/logo/logoVietnamNet.svg" width="1000px"
                                alt="Logo"></a>
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="fxt-content">
                        <h2 class="text-center">Đặt lại mật khẩu</h2>
                        <div class="fxt-form">
                            <form method="POST" action="{{ route('password.update') }}">
                                @csrf
                                <input type="hidden" name="token" value="{{ $token }}">
                                <div class="form-group">
                                    <div class="fxt-transformY-50 fxt-transition-delay-1">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}"
                                         autocomplete="email" autofocus>
                                    </div>
                                    @error('email')
                                    <div class="error">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <div class="fxt-transformY-50 fxt-transition-delay-2">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                                        name="password" autocomplete="new-password" placeholder="Mật khẩu">
                                        <i toggle="#password" class="fa fa-fw fa-eye toggle-password field-icon"></i>
                                    </div>
                                    @error('password')
                                    <div class="error">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <div class="fxt-transformY-50 fxt-transition-delay-2">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Nhập lại mật khẩu" autocomplete="new-password">
                                    <i toggle="#password-confirm" class="fa fa-fw fa-eye toggle-password field-icon"></i>
                                    </div>

                                </div>

                                <div class="form-group">
                                    <div class="fxt-transformY-50 fxt-transition-delay-4">
                                        <button type="submit" class="fxt-btn-fill">Đồng ý</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- jquery-->
    <script src="../../loginnn/js/jquery.min.js"></script>
    <!-- Bootstrap js -->
    <script src="../../loginnn/js/bootstrap.min.js"></script>
    <!-- Imagesloaded js -->
    <script src="../../loginnn/js/imagesloaded.pkgd.min.js"></script>
    <!-- Validator js -->
    <script src="../../loginnn/js/validator.min.js"></script>
    <!-- Custom Js -->
    <script src="../../loginnn/js/main.js"></script>

</body>


<!-- Mirrored from affixtheme.com/html/xmee/demo/register-9.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 15 Jul 2024 15:02:38 GMT -->

</html>
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
