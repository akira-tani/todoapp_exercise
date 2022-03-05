<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>COACHTECH</title>
  <link rel="stylesheet" href="{{ asset('css/reset.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
</head>
<body>
  <div class="container">
    <div class="card">
      <p class="title">Todo List</p>
      @if (count($errors) > 0)
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
      </ul>
      @endif
      <div class="todo">
        <form action="todo/create" method="post" class="todo_create">
          @csrf
          <input type="text" class="input-add" name="content">
          <input type="submit" class="button-add" value="追加"> 
        </form>
        <table>
          <tr>
            <th>作成日</th>
            <th>タスク名</th>
            <th>更新</th>
            <th>削除</th>
          </tr>
          @foreach ($items as $item)
          <tr>
            <td>{{$item->created_at}}</td>
            <form action="todo/update?id={{$item->id}}" method="post" class="todo_update">
              @csrf
              <td>
                <input type="text" class="input-update" value="{{$item->content}}" name="content">
              </td>
              <td>
                <input type="submit" class="button-update" value="更新">
            </form>
            <td>
              <form action="todo/delete?id={{$item->id}}" method="post" class="todo_delete">
                @csrf
                <input type="submit" class="button-delete" value="削除">
              </form>
            </td>
          </tr>
          @endforeach
        </table>
      </div>
    </div>
  </div>
</body>
</html>