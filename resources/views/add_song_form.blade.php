<form action="{{ route('add_song') }}" method="POST">
    @csrf
    <label for="title">Título:</label>
    <input type="text" id="title" name="title" required><br>

    <label for="duration">Duración (en minutos):</label>
    <input type="number" id="duration" name="duration" step="0.01" required><br>

    <label for="front">URL de la portada:</label>
    <input type="url" id="front" name="front" required><br>

    <label for="genre">Género:</label>
    <input type="text" id="genre" name="genre" required><br>

    <label for="release_date">Fecha de lanzamiento:</label>
    <input type="date" id="release_date" name="release_date" required><br>

    <label for="artists">Artistas:</label>
    <input type="text" id="artists" name="artists" required><br>

    <label for="song_route">URL de la canción:</label>
    <input type="url" id="song_route" name="song_route" required><br>

    <button type="submit">Añadir canción</button>
</form>
