@extends('admin.panel')

@section('tool')
    <div><h2>Все вопросы без ответов</h2></div>
    <div>
        <table class="table">
            <tr>
                <th>Вопрос</th>
                <th>Ответить</th>
                <th>Удалить</th>
            </tr>
            @foreach($questions as $row)
                <tr>
                    <td>{{$row['question']}}</td>
                    <td><a href="/admin/reply/answer/answer/{{$row['id']}}">Ответить</a></td>
                    <td><a href="/admin/delete/question/answer/{{$row['id']}}">Удалить</a></td>
                </tr>
            @endforeach
        </table>
    </div>
@stop