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
                @include('user.partials.panel-heading')
                <div class="panel-body">
                    <div class="tab">
                        <button class="tablinks active" onclick="openCity(event, 'inMessages')">Входящие сообщения
                        </button>
                        <button class="tablinks" onclick="openCity(event, 'outMessages')">Исходящие сообщения</button>
                    </div>

                    <div id="inMessages" class="tabcontent">
                        @if (!empty($inMessages))
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>Отправитель</th>
                                    <th>Тема</th>
                                    <th>Дата</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($inMessages as $inMessage)
                                    <tr onclick="location.href='{{ route('getIncomingMessage', [ 'id_mailbox' => $mailbox->id, 'id_message' => $inMessage->id ]) }}'" style="cursor: pointer">
                                        <td>{{ $inMessage->from }}</td>
                                        <td>{{Illuminate\Support\Str::limit($inMessage->subject, 35, $end = '...') }}</td>
                                        <td>
                                            {{ date('d-m-y', $inMessage->udate) }}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @else
                            <h1>Нет входящих сообщений</h1>
                        @endif
                    </div>

                    <div id="outMessages" class="tabcontent" style="display:none">
                        @if (!empty($outMessages))
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>Отправитель</th>
                                    <th>Тема</th>
                                    <th>Дата</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($outMessages as $outMessage)
                                    <tr onclick="location.href='{{ route('getOutgoingMessage', [ 'id_mailbox' => $mailbox->id, 'id_message' => $outMessage->id ]) }}'" style="cursor: pointer">
                                        <td>{{ $outMessage->from }}</td>
                                        <td>{{Illuminate\Support\Str::limit($outMessage->subject, 35, $end = '...') }}</td>
                                        <td>
                                            {{ date('d-m-y', $outMessage->udate) }}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @else
                            <h1>Нет исходящих сообщений</h1>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @include('user._footer')
    </div>
@endsection