<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>タスク管理</title>
</head>
<body>
    <h1>タスク管理</h1>

    @foreach($children as $child)
       <h2>{{ $child->name }}</h2>

       {{--タスク一覧--}}
       
       @foreach($child->tasks as $task)
            <p>
                {{ $task->title}}/{{ $task->points}}ポイント
                <form method="POST" action="{{ route('admin.tasks.destroy', $task->id)}}">
                    @csrf
                    @method('DELETE')
                    <button type="submit">削除</button>
                </form>
            </p>
        @endforeach

        {{--タスク追加フォーム--}}
        <form method="POST" action="{{ route('admin.tasks.store')}}">
            @csrf
            <input type="hidden" name="child_id" value="{{ $child->id }}">
            <input type="text" name="title" placeholder="タスク名">
            <input type="number" name="points" placeholder="ポイント">
            <button type="submit">追加</button>
        </form>

    @endforeach
</body>
</html>