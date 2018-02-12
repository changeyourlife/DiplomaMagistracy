@extends('user.layouts.master')

@section('title')
    Администратор | Добавить пользователя
@endsection

@section('content')
    @include('user._header')
    <div class="container-fluid main-container">
        @include('user.partials.sidebar')
        <div class="col-md-10 content">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Добавление почтового ящика
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route('postUserAddMailbox') }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="host">Хост</label>
                            <input name="host" type="text" class="form-control" id="host"
                                   placeholder="Введите хост">
                        </div>
                        <div class="form-group">
                            <label for="port">Порт</label>
                            <input name="port" type="text" class="form-control" id="port"
                                   placeholder="Введите порт">
                        </div>
                        <div class="form-group">
                            <label for="encryption">Способ шифрования (ssl, tls)</label>
                            <input name="encryption" type="text" class="form-control" id="encryption"
                                   placeholder="Введите способ шифрования">
                        </div>
                        <div class="form-group">
                            <label for="username">Логин</label>
                            <input name="username" type="text" class="form-control" id="username"
                                   placeholder="Введите логин">
                        </div>
                        <div class="form-group">
                            <label for="password">Пароль</label>
                            <input name="password" type="password" class="form-control" id="password"
                                   placeholder="Введите пароль">
                        </div>
                        <button type="submit" class="btn btn-success btn-block">Добавить почтовый ящик</button>
                    </form>
                </div>
            </div>
        </div>
        @include('user._footer')
    </div>
@endsection