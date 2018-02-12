@extends('admin.layouts.master')

@section('title')
    Администратор | Список пользователей
@endsection

@section('content')
    @include('admin._header')
    <div class="container-fluid main-container">
        @include('admin.partials.sidebar')
        <div class="col-md-10 content">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Список пользователей
                </div>
                <div class="panel-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Логин</th>
                            <th>Добавлен</th>
                            <th>Изменён</th>
                            <th>Изменить</th>
                            <th>Удалить</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->login }}</td>
                                <td>{{ $user->created_at ? $user->created_at : 'нет данных' }}</td>
                                <td>{{ $user->updated_at ? $user->updated_at : 'нет данных' }}</td>
                                <td><a class="btn btn-warning" href="{{ route('getAdminUserEdit', $user->id) }}">&</a></td>
                                <td><a class="btn btn-danger" href="{{ route('getAdminUserDelete', $user->id) }}">!</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @include('admin._footer')
    </div>
@endsection