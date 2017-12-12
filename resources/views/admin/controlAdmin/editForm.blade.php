@extends('admin.panel')

@section('tool')
        <div class="container">
            <div class="row">

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="/admin/change/question/{{$category_id}}/{{$id}}">
                        <div class="panel-heading"><h3>Редактировать данные вопроса</h3></div>
                        {{ csrf_field() }}

                            <div class="form-group">
                                <label for="author" class="col-md-4 control-label">Автор</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="author" value="{{ old('author') }}" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="question" class="col-md-4 control-label">Вопрос</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="question" value="{{ old('question') }}" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="answer" class="col-md-4 control-label">Ответ</label>

                                <div class="col-md-6">
                                    <textarea class="form-control" name="answer" required></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Изменить
                                    </button>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="has-error">
                                    <ul>
                                    @foreach($errors as $error)
                                      <li>{{$error}}</li>
                                    @endforeach
                                    </ul>
                                </div>
                            </div>

                        </form>
                    </div>
            </div>
        </div>
@endsection
