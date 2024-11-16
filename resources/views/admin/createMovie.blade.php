<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Practice</title>
</head>
<body>
    <form action="{{ route('movies.store') }}" method="POST">
        @csrf
        <label for="title">タイトル</label>
        <input type="text" name="title" id="title" value="{{old('title')}}" />
        <label for="image_url">画像</label>
        <input type="url" name="image_url" id="image_url" value="{{old('image_url')}}" />
        <label for="published_year">公開年</label>
        <input type="number" name="published_year" id="published_year" value="{{old('published_year')}}" />
        <label for="is_showing">上映状況</label>
        <!-- 隠しフィールドとチェックボックスの組み合わせは冗長である -->
        <input type="hidden" name="is_showing" value="0" />
        <input type="checkbox" name="is_showing" id="is_showing" value="1" {{ old('is_showing') ? 'checked' : '' }}/>
        <label for="description">概要</label>
        <textarea name="description" id="description">{{old('description')}}</textarea>
        <button type="submit">登録</button>
    </form>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</body>
</html>