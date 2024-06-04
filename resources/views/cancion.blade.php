<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detalles de la Canción</title>
    <link rel="stylesheet" href="/css/comun/sap.css">
</head>
<body>
    <div class="container">
        <h1>Detalles de la Canción</h1>

        <img src="{{ asset('storage/fronts/' . $cancion->front) }}" alt="Imagen de la Canción" class="item-image">
        <div class="item-details">
            <p><strong>Título:</strong> {{ $cancion->title }}</p>
            <p><strong>Duración:</strong> {{ $cancion->duration }}</p>
            <p><strong>Género:</strong> {{ $cancion->genre }}</p>
            <p><strong>Fecha de lanzamiento:</strong> {{ $cancion->release_date }}</p>
        </div>
        <!-- Botón para dar "Me gusta" a la canción -->
        <form action="{{ route('favorite.songs.store') }}" method="POST">
            @csrf
            <input type="hidden" name="song_id" value="{{ $cancion->id }}">
            <button type="submit" class="like-button">Me gusta</button>
        </form>
        <br>
        <a href="{{ route('home') }}" class="back-link">Volver a la página principal</a>
        
        @if(session('error'))
            <div class="alert alert-error">
                {{ session('error') }}
            </div>
        @endif
        <!-- Mostrar mensajes de éxito o error -->
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    </div>
</body>
</html>