<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>きょう</title>
</head>
<body>
    <h1>{{ $child->name }}</h1>

    <h2>タスク</h2>
    @foreach($tasks as $task)
        <p>
            {{ $task->title}}
            @if($completedTaskIds->contains($task->id))
                ✅
            @else
                <form method="POST" action="{{ route('child.tasks.complete')}}">
                    @csrf
                    <input type="hidden" name="task_id" value="{{ $task->id}}">
                    <button type="submit">☐</button>
                </form>
            @endif
        </p>
    @endforeach

    <h2>日記</h2>
    @if($diary)
        <p>今日の日記はもう書いたよ</p>
    @else
        <p>まだ書いていません</p>
        <form method="POST" action="{{ route('child.diaries.store')}}">
         @csrf
         <textarea name="body"></textarea>
         <button type="submit">☐</button>
        </form>
    @endif
</body>
</html>