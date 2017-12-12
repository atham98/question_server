@extends('admin.panel')

@section('tool')
    <form action="{{route('createTheme')}}" method="post" id="form_create">

        {{csrf_field()}}
        <div class="form-group">
            <label for="theme">Новая тема</label>
            <input title="Тема" class="form-control" type="text" name="theme">
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