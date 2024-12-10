<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Добавить трек</title>
</head>
<body>
    <h1>Добавить музыкальный трек</h1>

    <form action="{{ route('tracks.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="title">Название:</label>
        <input type="text" name="title" id="title" required>

        <label for="artist">Исполнитель:</label>
        <input type="text" name="artist" id="artist" required>

        <label for="file">Файл:</label>
        <input type="file" name="file" id="file" accept=".mp3" required>

        <button type="submit">Добавить</button>
    </form>

    <a href="{{ route('tracks.index') }}">Назад к списку треков</a>
</body>
</html>
