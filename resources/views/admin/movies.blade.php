<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Practice</title>
</head>
<body>
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
            <td><img src="{{ $movie->image_url }}" alt=""></td>
            <td>{{ $movie->published_year }}</td>
            <td>{{ $movie->is_showing ? '上映中' : '上映予定' }}</td>
            <td>{{ $movie->description }}</td>
            <td>{{ $movie->created_at }}</td>
            <td>{{ $movie->updated_at }}</td>
        </tr>
        @endforeach
</body>
</html>