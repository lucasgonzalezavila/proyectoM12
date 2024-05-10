<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Canciones y Álbumes Favoritos</title>
</head>
<body>
    <h1>{{ $user->name }} - Canciones y Álbumes Favoritos</h1>
    @if ($user->role === "user")
        <h2>Canciones Favoritas</h2>
        <ul>
            @if ($songs)
                @foreach ($songs as $song)
                    <li>
                        <p><strong>Nombre:</strong> {{ $song["title"] }}</p>
                    </li>
                @endforeach
            @else
                <p>No hay canciones favoritas.</p>
            @endif
        </ul>
        
        <h2>Álbumes Favoritos</h2>
        <ul>
            @if ($albums)
                @foreach ($albums as $album)
                    <li>{{ $album->title }}</li>
                @endforeach
            @else
                <p>No hay álbumes favoritos.</p>
            @endif
        </ul>

        <h2>Listas de Reproducción Favoritas</h2>
        <ul>
            @foreach ($user->favoritePlaylist as $playlist)
                <li>{{ $playlist->name }}</li>
            @endforeach
        </ul>
    @endif
</body>
</html>
