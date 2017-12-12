@extends('layouts.layout')

@section('content')

    <div class="container">
        <div id="answer">
        @foreach($answer as $item)
                <b>Вопрос : </b>
                <p>{{$item['question']}}</p>
                <hr>
                <b>Ответ:</b>
                <p>{{$item['answer']}}</p>
                <hr>
                <b>Aвтор : {{$item['author']}}</b> - <em>{{$item['created_at']}}</em>
            @endforeach
        </div>
    </div>

@stop