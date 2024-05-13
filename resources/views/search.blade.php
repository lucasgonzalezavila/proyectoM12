<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
</head>
<body>
    <h1>Detalles del Usuario</h1>

    @if(isset($user))
        <h2>Nombre: {{ $user->name }}</h2>

        <h2>Canciones del Usuario</h2>
        <ul>
            @foreach ($songs as $song)
                <li>{{ $song->title }}</li>
            @endforeach
        </ul>

        <h2>Álbumes del Usuario</h2>
        <ul>
            @foreach ($albums as $album)
                <img src="{{$album->front}}" alt="">
                <li>{{ $album->artists }}</li>
            @endforeach
        </ul>

        <h2>Listas de Reproducción del Usuario</h2>
            <ul>
            @foreach ($playlists as $playlist)
                <li>
                    <img src="{{ $playlist->front }}" alt="{{ $playlist->front }}">
                    <p>{{ $playlist->title }}</p>
                </li>
            @endforeach
        </ul>

    @else
        <p>No se encontraron resultados para la búsqueda.</p>
    @endif
</body>
</html>
