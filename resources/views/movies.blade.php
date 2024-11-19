<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Practice</title>
</head>
<body>
    <div style="display: block;">
        <div style="display: flex;">
            <form action="{{ route('movies') }}" method="GET">
                @csrf
                <input type="text" id="keyword" name="keyword" value="{{ $keyword }}" placeholder="検索ワードを入力">
                <input type="radio" id="is_showing_all" name="is_showing" value="" {{ is_null($is_showing) ? 'checked' : '' }}/>
                <label for="is_showing_all">すべて</label>
                <input type="radio" id="is_showing_1" name="is_showing" value="1" {{ $is_showing === '1' ? 'checked' : '' }}/>
                <label for="is_showing_1">上映中</label>
                <input type="radio" id="is_showing_0" name="is_showing" value="0" {{ $is_showing === '0' ? 'checked' : '' }}/>
                <label for="is_showing_0">上映予定</label>
                <button type="submit">検索</button>
            </form>
        </div>
        <table>
            <tr>
                <th>ID</th>
                <th>タイトル</th>
                <th>画像</th>
                <th>公開年</th>
                <th>上映状況</th>
                <th>概要</th>
                <th>登録日時</th>
                <th>更新日時</th>
            </tr>
            @foreach ($movies as $movie)
            <tr>
                <td>{{ $movie->id }}</td>
                <td>{{ $movie->title }}</td>
                <td><img src="{{ $movie->image_url }}" alt="" style="max-width: 128px; max-height: 96px;"></td>
                <td>{{ $movie->published_year }}</td>
                <td>{{ $movie->is_showing ? '上映中' : '上映予定' }}</td>
                <td>{{ $movie->description }}</td>
                <td>{{ $movie->created_at }}</td>
                <td>{{ $movie->updated_at }}</td>
            </tr>
            @endforeach
        </table>
        <div style="display: flex;">
            {{ $movies->links() }}
        </div>
    </div>
</body>
</html>