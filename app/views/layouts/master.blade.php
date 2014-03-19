<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>@yield('title', 'HRFuse')</title>
        <meta name="viewport" content="width=device-width">

        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/main.css') }}">

        @yield('styles', '')

        <script src="{{ asset('js/vendor/modernizr-2.6.2-respond-1.1.0.min.js') }}"></script>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>

        <script src="{{ asset('js/vendor/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/main.js') }}"></script>
    </head>
    <body>

        @include('layouts.navbar')

        @yield('content')

        <div class="footer">
            <div class="container-fluid">
                <div class="col-xs-6 text-left">
                    <p>&copy; 2013 - {{ date('Y') }} <a href="{{ url('/') }}" style="font-weight: 700;">CreatorsCast</a>. Part of the <a href="http://freedom.tm/" target="_blank" style="font-weight: 700;">Freedom!</a> family.</p>
                </div>
                <div class="col-xs-6 text-right">
                </div>
            </div>
        </div>

        @yield('scripts', '')

    </body>
</html>