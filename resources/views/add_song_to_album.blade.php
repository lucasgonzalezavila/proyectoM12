<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Song to Album</title>
    <link rel="stylesheet" href="/css/comun/style.css">
</head>
<body>
    <div class="container">
        <div class="title"><h1>Add Song to Album</h1></div>

        

        <div class="form">
            <form action="{{ route('albums.addSong') }}" method="POST">
                @csrf
                
                <label for="album_name">Album Name:</label>
                <input type="text" id="album_name" name="album_name" required class="input-text"><br>

                <label for="song_title">Song Title:</label>
                <input type="text" id="song_title" name="song_title" required class="input-text"><br>

                <div class="button">
                    <button type="submit"><h1>Add Song to Album</h1></button>
                </div>
                @if(session('success'))
            <p style="color: white">{{ session('success') }}</p>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li style="color: white">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
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
