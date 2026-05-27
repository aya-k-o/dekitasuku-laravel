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
                ☐
            @endif
        </p>
    @endforeach

    <h2>日記</h2>
    @if($diary)
        <p>今日の日記はもう書いたよ</p>
    @else
        <p>まだ書いていません</p>
    @endif
</body>
</html>