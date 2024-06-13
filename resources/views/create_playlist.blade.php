<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Playlist</title>
    <link rel="stylesheet" href="/css/add_song/style.css">
</head>
<body>
    <div class="container">
        <div class="title"><h1>Create a New Playlist</h1></div>
        @if(session('success'))
            <p>{{ session('success') }}</p>
        @endif
        <div class="form">
            <form action="{{ route('playlists.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                @if ($errors->any())
                    <div class="alert alert-danger " >
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li style="color: white">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <label for="name">Playlist Name:</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required class="input-text"><br>

                <label for="front">Cover Image:</label>
                <input type="file" id="front" name="front" accept="image/*" required class="input-text"><br>
                
                <div class="button">
                    <button type="submit"><h1>Create Playlist</h1></button>
                </div>
            </form>
            <a href="/playlists/add-song" style="text-decoration: none;color:white">Añadir canciones a la playlist</a>
        </div>
    </div>
    <footer>
        <div class="footer">
            <a href="/"><img src="/img/home.png" alt="home" /></a>
            @auth
                @if(auth()->user()->role === 'artista')
                    <a href="{{ route('select_add_form') }}"><img src="/img/add.png" alt="añadir" /></a>
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
