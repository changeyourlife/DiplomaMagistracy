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
                    @include('user.partials.panel-heading')
                </div>
                <div class="panel-body">
                    <form>
                        {{ csrf_field() }}
                        <input name="sender" type="hidden" id="sender">
                        <div class="form-group">
                            <label for="reciever">Получатель</label>
                            <input name="reciever" type="text" class="form-control" id="reciever"
                                   placeholder="Введите адрес получателя">
                        </div>
                        <div class="form-group">
                            <label for="subject">Тема</label>
                            <input name="subject" type="text" class="form-control" id="subject"
                                   placeholder="Введите тему">
                        </div>
                        <div class="form-group">
                            <label for="message">Сообщение</label>
                            <textarea name="message" type="" class="form-control" id="message"
                                      placeholder="Введите сообщение"></textarea>
                        </div>
                        <button type="submit" class="btn btn-success btn-block">Отправить</button>
                    </form>
                </div>
            </div>
        </div>
        @include('user._footer')
    </div>
@endsection