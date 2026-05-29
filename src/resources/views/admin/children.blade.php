<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>子ども管理</title>
</head>
<body>
    <h1>子ども管理</h1>

    {{-- 子ども一覧 --}}
    @foreach($children as $child)
        <p>
            {{ $child->name }}
            <form method="POST" action="{{ route('admin.children.destroy', $child->id) }}">
                @csrf
                @method('DELETE')
                <button type="submit">削除</button>
            </form>
        </p>
    @endforeach

    {{-- 子ども追加フォーム --}}
    <form method="POST" action="{{ route('admin.children.store') }}">
        @csrf
        <input type="text" name="name" placeholder="子どもの名前">
        <button type="submit">追加</button>
    </form>

</body>
</html>