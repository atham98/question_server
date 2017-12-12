@extends('admin.panel')

@section('tool')
    <div><h2>Список тем</h2></div>
    <p>Выбирите тем что бы редактировать вопросов и ответов</p>
    <span><a href="{{route('createTheme')}}">Создать новую тему</a></span>
    <div>
        <table cellpadding="5" border="1" >
       <tr>
           <th>Темы</th>
           <th>Редактировать тему</th>
           <th>Количества вопросов</th>
           <th>Удалить тему</th>
       </tr>
   @foreach($total as $row)
       <tr>
           <td>{{$row['name']}}</td>
           <td align="center"><a class="green" href="/admin/theme/{{$row['id']}}">Редактировать</a></td>
           <td align="center"><b>{{$row->questions_count}}</b></td>
           <td align="center"><a class="red" href="/admin/delete/theme/{{$row['id']}}">Удалить</a></td>
       </tr>
   @endforeach
   </table>
</div>
@stop