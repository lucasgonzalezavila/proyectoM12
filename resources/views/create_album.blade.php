<!DOCTYPE html>
<html>
<head>
    <title>Create Album</title>
    <!-- Incluir CSS y JS necesarios aquí -->
</head>
<body>
    <h1>Create a New Album</h1>
    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif
    @if(auth()->user()->hasRole('artista'))
        <form action="{{ route('albums.store') }}" method="POST">
            @csrf
            <div>
                <label for="name">Album Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div>
                <label for="duration">Duration:</label>
                <input type="number" id="duration" name="duration" required>
            </div>
            <div>
                <label for="front">Front:</label>
                <input type="text" id="front" name="front" required>
            </div>
            <div>
                <label for="release_date">Release Date:</label>
                <input type="date" id="release_date" name="release_date" required>
            </div>
            <div>
                <label for="artists">Artists:</label>
                <input type="text" id="artists" name="artists" required>
            </div>
            <!-- Agregar más campos según sea necesario -->
            <button type="submit">Create Album</button>
        </form>
    @else
        <p>Only artists can create albums.</p>
    @endif
</body>
</html>
