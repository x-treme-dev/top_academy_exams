<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Музыкальные треки</title>
</head>
<body>
    <h1>Список музыкальных треков</h1>

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <a href="{{ route('tracks.create') }}">Добавить трек</a>

    @if($tracks->count() > 0)
        @foreach ($tracks as $track)
            <div>
                <strong>{{ $track->title }}</strong> - {{ $track->artist }}
                <audio controls>
                    <source src="{{ asset($track->file_path) }}" type="audio/mpeg">
                    Ваш браузер не поддерживает аудио.
                </audio>
            </div>
        @endforeach
    @else
        <p>Нет доступных треков.</p>

    @endif
</body>
</html>