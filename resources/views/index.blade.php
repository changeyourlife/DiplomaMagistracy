<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ URL::asset('css/app.css')}}" rel="stylesheet">
    <title>Laravel</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <style>
        html, body {
            height: 100%;
        }

        .outer-wrapper {
            display: table;
            width: 100%;
            height: 100%;
        }

        .inner-wrapper {
            display: table-cell;
            vertical-align: middle;
            padding: 15px;
        }

        .login-btn {
            position: fixed;
            top: 15px;
            right: 15px;
        }
    </style>
</head>
<body>
    <section id="loginform" class="outer-wrapper">
        <div class="inner-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4 col-sm-offset-4">
                        <h2 class="text-center">Добро пожаловать в корпоративный почтовый клиент</h2>
                            {{--<button type="submit" class="btn btn-success btn-block">Страница входа</button>--}}
                        <a href="{{ route('login') }}" class="btn btn-success">Страница входа</a>
                        <a href="{{ route('about') }}" class="btn btn-default">Что это?</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
