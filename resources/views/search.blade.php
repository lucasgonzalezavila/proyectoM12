<!-- resources/views/search.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
</head>
<body>
    <h1>Search Results</h1>

    @if(isset($user))
        <h1>{{ $user->name }}</h1>
        <!-- Mostrar más detalles del usuario según sea necesario -->
    @else
        <p>No se encontraron resultados para la búsqueda.</p>
    @endif

</body>
</html>
