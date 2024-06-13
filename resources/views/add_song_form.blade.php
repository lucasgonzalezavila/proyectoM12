<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/css/add_song/style.css">
</head>
<body>
    <div class="container">
        <div class="title"><h1>ACABA DE DETALLAR LA SUBIDA DE TU CANCIÓN</h1></div>
        <div class="form">
            <form action="{{ route('add_song') }}" method="POST" enctype="multipart/form-data">
                @csrf

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li style="color: white">{{ $error }}</li>
                                @endforeach
                            </ul>
                            <br>
                        </div>
                    @endif
                
                <label for="title">Título:</label>
                    <input type="text" id="title" name="title" value="{{ old('title') }}" required class="input-text"><br>

                    <label for="duration">Duración (en minutos):</label>
                    <input type="number" id="duration" name="duration" step="0.01" value="{{ old('duration') }}" required class="input-text"><br>

                    <label for="front">Portada:</label>
                    <input type="file" id="front" name="front" accept="image/*" required class="input-text" ><br>

                    <label for="genre">Género:</label>
                    <input type="text" id="genre" name="genre" value="{{ old('genre') }}" required class="input-text"><br>

                    <label for="release_date">Fecha de lanzamiento:</label>
                    <input type="date" id="release_date" name="release_date" value="{{ old('release_date') }}" required class="input-text"><br>

                    <label for="artists">Artistas:</label>
                    <input type="text" id="artists" name="artists" value="{{ old('artists') }}" required class="input-text"><br>

                    <label for="song_route">Canción:</label>
                    <input type="file" id="song_route" name="song_route" accept="audio/*" required class="input-text"><br>
                <div class="button">
                    <button type="submit"><h1>Añadir canción</h1></button>
                </div>
            </form>
        </div>
    </div>
    <footer>
        <div class="footer">
            <a href="/"><img src="/img/home/icono home.png" alt="home" /></a>
            @auth
                @if(auth()->user()->role === 'artista')
                    <a href="{{ route('select_add_form') }}"><img src="/img/home/icono add.png" alt="añadir" /></a>
                @elseif (auth()->user()->role === 'user')
                    <a href="{{ route('playlists.create') }}"><img src="/img/home/icono add.png" alt="añadir" /></a>
                @endif    
                @else
                <a href="{{ route('login') }}"><img src="/img/home/icono add.png" alt="añadir" /></a>
            @endauth
            <a href="/artistas"><img src="/img/home/icono grupo.png" alt="perfil" /></a>
        </div>
    </footer>
</body>
</html>