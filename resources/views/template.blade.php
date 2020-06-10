<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Siswa</title>
    <link href="{{ asset('bootstrap_4_4_1/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container">
    @include('navbar')
    @yield('main')
    </div>
    @yield('footer')
<script src="{{ asset('js/jquery_2_2_1.min.js') }}"></script>
<script src="{{ asset('bootsrap_4_4_1/js/bootsrap.min.js')}}"></script>
</body>
</html>