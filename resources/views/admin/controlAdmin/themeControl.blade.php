@extends('admin.panel')

@section('tool')
    <div><h2>Управление вопросам и ответами</h2></div>
    <div>
        <table cellpadding="5" border="1" id="themeControl">
            <tr>
                <th>Список вопрос</th>
                <th>Статус вопросов</th>
                <th>Дата создания</th>
                <th>Изменить статус</th>
                <th>Ответ на вопрос</th>
                <th>Редактировать</th>
                <th>Переместить в другую тему</th>
                <th>Удалить</th>
            </tr>
            @foreach($total as $question)
            <tr>
                <td>{{$question['question']}}</td>
                <td class="green">
                    @if($question['boolean'] === 0)<p class="yellow">{{'Ожидает ответ...'}}</p>

                    @elseif($question['boolean'] === 1)<p class="green">{{'Публиковано'}}</p>

                    @elseif($question['boolean'] === 2)<p class="red">{{'Скрыто'}}</p>@endif
                </td>
                <td>{{$question['created_at']}}</td>
                <td>
                    @if($question['boolean'] === 2)
                        <a href="/admin/publish/question/{{$question['category_id']}}/{{$question['id']}}">
                            Опубликовать
                        </a>
                    @elseif($question['boolean'] === 0)
                        <i class="yellow">
                            Без ответа
                        </i>
                    @elseif($question['boolean'] === 1)
                        <a href="/admin/hide/question/{{$question['category_id']}}/{{$question['id']}}">
                            Скрыть
                        </a>
                    @endif
                </td>
                <td>
                    @if($question['boolean'] === 0)<a href="/admin/reply/answer/{{$question['category_id']}}/{{$question['id']}}">Ответить</a>

                    @elseif($question['boolean'] === 1 || $question['boolean'] === 2 )<i class="green">Есть</i>@endif
                </td>
                <td>
                    @if($question['boolean'] !== 0)
                    <a href="/admin/change/question/{{$question['category_id']}}/{{$question['id']}}">Редактировать</a>
                    @else
                        <i>Нельзя</i>
                    @endif
                </td>
                <td>
                    <form class="form-group" action="/admin/move/question/{{$question['id']}}" method="post">
                        {{csrf_field()}}
                        <select name="theme_id">
                            <option disabled selected>Выберите Тему</option>
                            @foreach($themes as $row)
                                <option value="{{$row['id']}}">{{$row['name']}}</option>
                            @endforeach
                        </select>
                        <input type="submit" value="Переместить">
                    </form>
                </td>
                <td><a href="/admin/delete/question/{{$question['category_id']}}/{{$question['id']}}">Удалить</a></td>
            </tr>
            @endforeach
        </table>
    </div>
@stop