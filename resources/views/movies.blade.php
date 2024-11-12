<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Practice</title>
</head>
<body>
    @foreach ($movies as $movie)
    <ul>
        <li>タイトル: {{ $movie->title }}</li>
        <li>画像: <img src="{{ $movie->image_url }}" alt=""></li>
    </ul>
    @endforeach
</body>
</html>