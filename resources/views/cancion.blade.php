<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detalles de la Canción</title>
    <!-- Agrega enlaces a tus estilos CSS aquí -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }
        .song-details {
            margin-bottom: 20px;
        }
        .song-details p {
            margin: 5px 0;
        }
        .song-image {
            max-width: 100%;
            height: auto;
            margin-bottom: 20px;
        }
        .like-button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Detalles de la Canción</h1>
        <img src="{{ $cancion->front }}" alt="Imagen de la Canción" class="song-image">
        <div class="song-details">
            <p><strong>Título:</strong> {{ $cancion->title }}</p>
            <p><strong>Compositores:</strong> {{ $cancion->composers }}</p>
            <p><strong>Valoración:</strong> {{ $cancion->valoration }}</p>
            <p><strong>Duración:</strong> {{ $cancion->duration }}</p>
            <p><strong>Idioma:</strong> {{ $cancion->language }}</p>
            <p><strong>Género:</strong> {{ $cancion->genre }}</p>
            <p><strong>Fecha de lanzamiento:</strong> {{ $cancion->release_date }}</p>
        </div>
        <!-- Agrega más detalles de la canción según sea necesario -->

        <!-- Botón para dar "Me gusta" a la canción -->
        <form action="{{ route('favorite.songs.store') }}" method="POST">
            @csrf
            <input type="hidden" name="song_id" value="{{ $cancion->id }}">
            <button type="submit" class="like-button">Me gusta</button>
        </form>
    </div>
</body>
</html>
