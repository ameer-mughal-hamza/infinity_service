<!DOCTYPE HTML>
<html>
<head>
    <title>Infinity Services</title>
    <link rel="stylesheet" href="{{ URL::to('css/readable-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::to('font-awesome-4.3.0/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ URL::to('css/chosen.min.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('css')
</head>
<body>
@yield('content')
</body>
<script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/chosen.jquery.min.js') }}"></script>
@yield('js')
</html>