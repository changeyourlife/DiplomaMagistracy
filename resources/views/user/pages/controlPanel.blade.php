@extends('user.layouts.master')

@section('title')
    Пользователь | Панель управления
@endsection

@section('content')
    @include('user._header')
    <div class="container-fluid main-container">
        @include('user.partials.sidebar')
        <div class="col-md-10 content">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Информация
                </div>
                <div class="panel-body">
                    Данная панель пользователя позволяет добавлять свои электронные почтовые ящики и работать с ними через почтовый клиент.
                </div>
            </div>
        </div>
        @include('user._footer')
    </div>
@endsection