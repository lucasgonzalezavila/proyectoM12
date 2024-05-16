<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Canciones Favoritas</title>
</head>
<body>
    <h1>{{ $user->name }}</h1>
    @if ($user->role === 'user')
        <h1>Canciones Favoritas</h1>    
        <ul>
            @foreach ($songs as $song)
                <li>
                    <p><strong>Nombre:</strong> {{ $song->title }}</p>
                </li>
            @endforeach
        </ul>
        <h1>Albums Favoritos</h1>    
        <ul>
            @foreach ($albums as $album)
                <li>
                    <p><strong>Nombre:</strong> {{ $album->artists }}</p>
                </li>
            @endforeach
        </ul>
        <h1>Playlist Favoritas</h1>    
        <ul>
            @foreach ($playlists as $playlist)
                <li>
                    <p><strong>Nombre:</strong> {{ $playlist->name }}</p>
                </li>
            @endforeach
        </ul>
    @else
        <h1>Singles</h1>    
        <ul>
            @foreach ($songs as $song)
                <li>
                    <p><strong>Nombre:</strong> {{ $song->title }}</p>
                    <p><strong>Duración:</strong> {{ $song->duration }}</p>
                    <p><strong>Género:</strong> {{ $song->genre }}</p>
                    <p><strong>Fecha de Lanzamiento:</strong> {{ $song->release_date }}</p>
                </li>
            @endforeach
        </ul>
        <h1>Albums</h1>    
        <ul>
            @foreach ($albums as $album)
                <li>
                    <p><strong>Nombre:</strong> {{ $album->name }}</p>
                </li>
            @endforeach
        </ul>
        <h1>Playlist</h1>    
        <ul>
            @foreach ($playlists as $playlist)
                <li>
                    <p><strong>Nombre:</strong> {{ $playlist->name }}</p>
                </li>
            @endforeach
        </ul>
    @endif
</body>
</html>
