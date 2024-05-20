<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Álbum</title>
    <link rel="stylesheet" href="/css/comun/sap.css">
</head>
<body>
    <div class="container">
        <h1 class="details-title">Detalles del Álbum</h1>
        <br>
        <img src="{{ $album->front }}" alt="Imagen del Álbum" class="details-image">
        <div class="details-info">
            <p><strong>Título:</strong> {{ $album->name }}</p>
            <p><strong>Duración:</strong> {{ $album->duration }}</p>
            <p><strong>Artistas:</strong> {{ $album->artists }}</p>
            <p><strong>Fecha de Lanzamiento:</strong> {{ $album->release_date }}</p>
            <!-- Agrega más detalles según sea necesario -->
        </div>
        
        <!-- Lista de canciones del álbum -->
        <h2>Canciones del Álbum</h2>
        <ul>
            @foreach($songs as $song)
                <li>{{ $song->title }}</li>
            @endforeach
        </ul>
        
        <!-- Botón para "Me gusta" o funcionalidad similar -->
        <form action="{{ route('favorite.album.store') }}" method="POST">
            @csrf
            <input type="hidden" name="album_id" value="{{ $album->id }}">
            <button type="submit" class="like-button">Me gusta</button>
        </form>

        <!-- Enlace de regreso -->
        <a href="{{ route('home') }}" class="back-link">Volver a la página principal</a>
        
        <!-- Mensajes de éxito/error -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-error">
                {{ session('error') }}
            </div>
        @endif
    </div>
</body>
</html>
