<!DOCTYPE html>
<html>
<head>
    <title>Añadir Canción</title>
    <link rel="stylesheet" href="css/add_song/style.css">
</head>
<body>
    <div class="container">
        <div class="div-logo">
            <img id="logo-img" src="img/login/mushare.svg" alt="">
        </div>
        <div class="div-form">
            <h2>Añadir Canción</h2>
            <div class="add-song-form">
                <form action="{{ route('add_song') }}" method="POST" enctype="multipart/form-data" class="register-form">
                    @csrf
                    <label for="title">Título:</label>
                    <input type="text" id="title" name="title" required class="input-text"><br>

                    <label for="duration">Duración (en minutos):</label>
                    <input type="number" id="duration" name="duration" step="0.01" required class="input-text"><br>

                    <label for="front">Portada:</label>
                    <input type="file" id="front" name="front" accept="image/*" required class="input-text"><br>

                    <label for="genre">Género:</label>
                    <input type="text" id="genre" name="genre" required class="input-text"><br>

                    <label for="release_date">Fecha de lanzamiento:</label>
                    <input type="date" id="release_date" name="release_date" required class="input-text"><br>

                    <label for="artists">Artistas:</label>
                    <input type="text" id="artists" name="artists" required class="input-text"><br>

                    <label for="song_route">Canción:</label>
                    <input type="file" id="song_route" name="song_route" accept="audio/*" required class="input-text"><br>
                    <button type="submit" class="input-submit">Añadir canción</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
