<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Playlist</h1>
    <img src="{{ $playlist->front }}" alt="Imagen de la Canción" class="song-image">
    <div class="song-details">
        <p><strong>Título:</strong> {{ $playlist->name }}</p>
        <p><strong>Duración:</strong> {{ $playlist->duration }}</p>
    </div>
</body>
</html>