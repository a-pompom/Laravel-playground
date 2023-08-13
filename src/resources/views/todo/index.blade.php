<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>Todo List</title>
</head>
<body>
<h1>Todoリスト</h1>
<form action="{{route('task.create')}}" method="post">
    @csrf
    <label>
        <input name="name" type="text" placeholder="やること">
    </label>
    <input type="submit" value="作成">
</form>

<hr/>

@foreach($tasks as $task)
    <div>
        <span>{{$task->name}}</span>
        <form action="{{route('task.update', $task->id)}}" method="post" style="display: inline-block;">
            @csrf
            <label>
                <input name="name" type="text" placeholder="やること">
            </label>
            <input type="submit" value="更新">
        </form>
        <form action="{{route('task.delete', $task->id)}}" method="post" style="display: inline-block;">
            @csrf
            <input type="submit" value="削除">
        </form>
    </div>
@endforeach
</body>
</html>
