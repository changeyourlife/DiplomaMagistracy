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
                    Тут будет вся информация по почтовому ящику <bold>{{ isset($mailbox->username) ? $mailbox->username : '' }}</bold>
                </div>
                <div class="panel-body">
                    Тут будет вся информация по почтовому ящику <bold>{{ isset($mailbox->username) ? $mailbox->username : '' }}</bold>. Пока-что страница в разработке.
                </div>
            </div>
        </div>
        @include('user._footer')
    </div>
@endsection