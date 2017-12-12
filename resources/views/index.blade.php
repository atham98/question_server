@extends('layouts.layout')

@section('content')
        <div class="container">
            <h3>Сервис вопросов и ответов</h3><p>Задавайте свой уникальный и интересный вопрос!</p>
        </div>
    <div id="main">
        <div id="table">
                <table class="table">
                    <tr>
                        <th>Вопрос</th>
                        <th>Автор</th>
                        <th>Время добавления</th>
                    </tr>
                    @foreach($questions as $question)
                        <tr>
                            <td><a href="/answers/{{$question['id']}}" >{{$var = substr($question['question'],0,70) }}...</a> </td>
                            <td>{{$question['author']}}</td>
                            <td>{{$question['created_at']}}</td>
                        </tr>
                    @endforeach
                    @if(empty($var))
                        <tr>
                            <td><i>Пусто</i></td>
                            <td><i>Пусто</i></td>
                            <td><i>Пусто</i></td>
                        </tr>
                    @endif
                </table>
        </div>
        <div id="category">
            <ul>
                <h3>Темы</h3>
                <li><a href="/">Все категории</a></li>
            @foreach($categories as $category)
                    <li><a href="/category/{{$category['id']}}">{{$category['name']}}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
@stop
