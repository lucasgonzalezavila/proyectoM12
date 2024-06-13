<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Album</title>
    <link rel="stylesheet" href="/css/comun/style.css">
</head>
<body>
    <div class="container">
        <div class="title"><h1>Create a New Album</h1></div>
        

        @if(auth()->check() && auth()->user()->role === 'artista')
            <div class="form">
                <form action="{{ route('albums.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if(session('success'))
                    <p>{{ session('success') }}</p>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                    @foreach($errors->all() as $error)
                        <li style="color: white">{{ $error }}</li>
                    @endforeach
                            </ul>
                            <br>
                    </div>
        @endif
                    <label for="name">Album Name:</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" required class="input-text"><br>

                    <label for="duration">Duration:</label>
                    <input type="number" id="duration" name="duration" value="{{ old('duration') }}" required class="input-text"><br>

                    <label for="front">Front:</label>
                    <input type="file" id="front" name="front" accept="image/*" required class="input-text"><br>

                    <label for="release_date">Release Date:</label>
                    <input type="date" id="release_date" name="release_date" value="{{ old('release_date') }}" required class="input-text"><br>

                    <label for="artists">Artists:</label>
                    <input type="text" id="artists" name="artists" value="{{ old('artists') }}" required class="input-text"><br>

                    <div class="button">
                        <button type="submit"><h1>Create Album</h1></button>
                    </div>
                    
                </form>
                
                <a href="/albums/add-song" style="text-decoration: none;color:white">Añadir canciones a una album</a>
            </div>
        @else
            <p>Solo artistas pueden crear Albums.</p>
        @endif
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
