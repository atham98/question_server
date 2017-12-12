@extends('admin.panel')

@section('tool')
    <form action="/admin/reply/answer/{{$category_id}}/{{$id}}" method="post" id="form_create">

        {{csrf_field()}}
        <div class="form-group">
            <label for="answer">Ответить на вопрос</label>
            <input title="ответ" class="form-control" type="text" name="answer">
        </div>
        <div class="form-group">
            <div class="col-md-4">
                <input  type="radio" class="form-control" name="status" value="2">
                <label for="answer">Скрыть</label>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-5">
                <input  type="radio" class="form-control" name="status" value="1">
                <label for="answer">Опубликовать</label>
            </div>
        </div>
        <div class="form-group">
            <button class="btn btn-primary" type="submit">Ответить</button>
        </div>
    </form>
@stop