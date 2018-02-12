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
<form class="form-login" method="POST" action="{{ route('postAdminLogin') }}">
    {{ csrf_field() }}
    <section id="loginform" class="outer-wrapper">
        <div class="inner-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4 col-sm-offset-4">
                        <h1>Вход для Администратора</h1>
                        <div class="form-group">
                            <label for="exampleInputLogin1">Логин</label>
                            <input name="login" type="text" class="form-control" id="exampleInputLogin1"
                                   placeholder="Введите логин">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Пароль</label>
                            <input name="password" type="password" class="form-control" id="exampleInputPassword1"
                                   placeholder="Введите пароль">
                        </div>

                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember"> Запомнить
                            </label>
                        </div>
                        <button type="submit" class="btn btn-success btn-block">Войти</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</form>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
