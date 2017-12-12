@extends('layouts.layout')

@section('content')
    <form action="/created" method="post" id="form_create">

        {{csrf_field()}}
        <div><h3>Задавайте вопросы мы с радостью ответим!</h3></div>
        <div class="form-group">
            <select name="category_id">
                <option disabled selected>Выберите категорию</option>
            @foreach($category as $row)
                <option value="{{$row['id']}}">{{$row['name']}}</option>
            @endforeach
            </select>
        </div>


        <div class="form-group">
            <label for="author">Имя:</label>
            <input class="form-control" type="text" name="author" size="30" >
        </div>
        <div class="form-group">
            <label for="email">Электронная почта:</label>
            <input class="form-control" type="text" name="email" size="50">
        </div>
        <div class="form-group">
            <label for="question">Вопрос:</label>
            <input class="form-control" type="text" name="question">
        </div>
        <div class="form-group">
            <button class="btn btn-primary" type="submit">Создать</button>
        </div>
        @if(!empty($errors->all()))
        <div class="form-group">
            <div class="alert alert-danger">
                <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
                </ul>
            </div>
        </div>
        @endif
    </form>
@stop