<!DOCTYPE html>
<html>
<head>
    <title>Añadir Canción</title>
</head>
<body>
    <h1>Añadir Canción</h1>
    @if(session('success'))
        <div>
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('add_song') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="title">Título:</label>
        <input type="text" id="title" name="title" required><br>

        <label for="duration">Duración (en minutos):</label>
        <input type="number" id="duration" name="duration" step="0.01" required><br>

        <label for="front">Portada:</label>
        <input type="file" id="front" name="front" accept="image/*" required><br>

        <label for="genre">Género:</label>
        <input type="text" id="genre" name="genre" required><br>

        <label for="release_date">Fecha de lanzamiento:</label>
        <input type="date" id="release_date" name="release_date" required><br>

        <label for="artists">Artistas:</label>
        <input type="text" id="artists" name="artists" required><br>

        <label for="song_route">Canción:</label>
        <input type="file" id="song_route" name="song_route" accept="audio/*" required><br>

        <button type="submit">Añadir canción</button>
    </form>
</body>
</html>
