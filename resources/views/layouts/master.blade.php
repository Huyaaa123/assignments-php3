<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
	<link rel="shortcut icon" type="image/x-icon" href="https://static.vnncdn.net/v1/logo/logoVietnamNet.svg">


    @include('layouts.patials.head')
</head>

<body>

    <div class="site-wrap">
        <header class="site-navbar" role="banner">
            @include('layouts.patials.header-top')
            @include('layouts.patials.header-nav')
        </header>

        @yield('content')

        <footer class="site-footer border-top">
            @include('layouts.patials.footer')
        </footer>
    </div>

            @include('layouts.patials.js')

</body>

</html>
