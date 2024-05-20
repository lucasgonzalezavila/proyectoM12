<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Album</h1>
    <img src="{{ $album->front }}" alt="Imagen de la Canción" class="song-image">
    <div class="song-details">
        <p><strong>Título:</strong> {{ $album->name }}</p>
        <p><strong>Duración:</strong> {{ $album->duration }}</p>
        <p><strong>Artistas:</strong> {{ $album->artists }}</p>
        <p><strong>Fecha de lanzamiento:</strong> {{ $album->release_date }}</p>
    </div>
</body>
</html>