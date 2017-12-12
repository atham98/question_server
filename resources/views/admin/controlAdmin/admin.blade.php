@extends('admin.panel')

@section('tool')
    <div><h2>Настройки Администраторов</h2></div>
    <p>Любой администратор может создавать, удалить и изменить пароль администраторов</p>
    <span class="show"><a href="{{route('createUser')}}">Создать нового администратора</a></span>
    <div>
        <table class="table">
            <tr>
                <th>Администраторы</th>
                <th>Изменить пароль</th>
                <th>Удалить из базы данных</th>
            </tr>
        @foreach($users as $user)
            <tr>
                <td>{{$user['name']}}</td>
                <td><a href="change/password/{{$user['name']}}/{{$user['id']}}">Изменить</a></td>
                <td><a href="delete/user/{{$user['id']}}">Удалить</a></td>
            </tr>
        @endforeach
        </table>
    </div>
@stop