<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>きょうのようす</title>
</head>
<body>
    <h1>きょうのようす</h1>

    @foreach($children as $child)
        <h2>{{ $child->name }}</h2>

        <h3>今日の日記</h3>
        @php
            $diary = $child->diaries()->whereDate('diary_date', today())->first();
        @endphp
        @if($diary)
            <p>{{ $diary->body }}</p>
        @else
            <p>まだ書いていません</p>
        @endif

    @endforeach
</body>
</html>