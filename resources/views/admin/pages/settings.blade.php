@extends('admin.layouts.master')

@section('title')
    Администратор | Панель управления
@endsection

@section('content')
    @include('admin._header')
    <div class="container-fluid main-container">
        @include('admin.partials.sidebar')
        <div class="col-md-10 content">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Настройки
                </div>
                <div class="panel-body">
                    Пока никаких настроек нет. Ведётся разработка...
                </div>
            </div>
        </div>
        @include('admin._footer')
    </div>
@endsection