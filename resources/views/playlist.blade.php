<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles de la Playlist</title>
    <link rel="stylesheet" href="/css/comun/sap.css">
</head>
<body>
    <div class="container">
        <h1 class="details-title">Detalles de la Playlist</h1>
        <img src="{{ asset('storage/fronts/' . $playlist->front) }}" alt="Imagen de la Canción" class="details-image">
            <div class="details-info">
            <p><strong>Título:</strong> {{ $playlist->name }}</p>
            <p><strong>Duración:</strong> {{ $playlist->duration }}</p>
            <p><strong>Artistas:</strong> {{ $playlist->artists }}</p>
            <p><strong>Fecha de Lanzamiento:</strong> {{ $playlist->release_date }}</p>
            <!-- Lista de canciones -->
            <p><strong>Canciones:</strong></p>
            <ul>
                @foreach ($songs as $song)
                    <li>{{ $song->title }}</li>
                @endforeach
            </ul>
        </div>
        <!-- Botón para "Me gusta" o funcionalidad similar -->
        <form action="{{ route('favorite.playlist.store') }}" method="POST">
            @csrf
            <input type="hidden" name="playlist_id" value="{{ $playlist->id }}">
            <button type="submit" class="like-button">Me gusta</button>
        </form>
        <!-- Enlace de regreso -->
        <a href="{{ route('home') }}" class="back-link">Volver a la página principal</a>

        <!-- Mensaje de confirmación -->
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
    </div>
</body>
</html>
