<!DOCTYPE html>
<html lang = "ja">
<head>
    <meta charset = "UTF-8">
    <title>だれがつかうの？</title>
</head>
<body>
    <h1>だれがつかうの？</h1>

    @foreach($children as $child)
        <form method = "POST" action ="{{ route('children.select.store') }}">
            @csrf
            <input type = "hidden" name = "child_id" value = "{{ $child->id }}">
            <button type = "submit">{{ $child->name}}</button>
        </form>
    @endforeach
</body>
</html>        