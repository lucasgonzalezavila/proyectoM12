<!DOCTYPE html>
<html>
<head>
    <title>Lista de Artistas</title>
</head>
<body>
    <h1>Lista de Artistas</h1>
    <ul>
        @foreach ($artists as $artist)
            <li>{{ $artist }}</li>
        @endforeach
    </ul>
</body>
</html>
