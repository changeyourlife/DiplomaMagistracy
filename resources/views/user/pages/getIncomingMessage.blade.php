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
                    <a href="{{ route('getSendMail', $mailbox->id) }}">Написать письмо</a>
                </div>
                <div class="panel-body">
                    Сообщение вам от {{ $message->from }}
                    <br>
                    <label for="message">Текст сообщения</label>
                    <div id="message">
                        @if (!is_null($bodyMessage))
                            {!! $bodyMessage !!}
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @include('user._footer')
    </div>
@endsection