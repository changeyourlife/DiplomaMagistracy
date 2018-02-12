@extends('admin.layouts.master')

@section('title')
    Администратор | Редактировать пользователя
@endsection

@section('content')
    @include('admin._header')
    <div class="container-fluid main-container">
        @include('admin.partials.sidebar')
        <div class="col-md-10 content">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Изменение пользователя
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route('postAdminUserEdit', $user->id) }}">
                        {{ csrf_field() }}
                        {{--<input name="id" type="hidden" class="form-control" id="id" value="{{ $user->id }}">--}}
                        <div class="form-group">
                            <label for="login">Логин</label>
                            <input name="login" type="text" class="form-control" id="login"
                                   placeholder="Введите логин" value="{{ $user->login }}">
                        </div>
                        <div class="form-group">
                            <label for="login">Пароль</label>
                            <input name="password" type="password" class="form-control" id="login"
                                   placeholder="Введите пароль">
                        </div>
                        <button type="submit" class="btn btn-success btn-block">Изменить</button>
                    </form>
                </div>
            </div>
        </div>
        @include('admin._footer')
    </div>
@endsection