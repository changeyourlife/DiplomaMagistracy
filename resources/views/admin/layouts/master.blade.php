<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ URL::asset('css/app.css')}}" rel="stylesheet">
    <title>@yield('title')</title>
    @include('admin.partials.style')
</head>
<body>

@yield('content')

<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>

