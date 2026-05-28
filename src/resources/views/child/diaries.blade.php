<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>きろく</title>
</head>
<body>
    <h1>きろく</h1>

    @foreach($diaries as $diary)
    {{ $diary->diary_date }}
    {{$diary->body }}
    @endforeach
</body>
</html>