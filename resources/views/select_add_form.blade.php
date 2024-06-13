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
        <div class="title"><h1>DECIDE LO QUE QUIERES CREAR!</h1></div>
        <div class="form">
            <form action="{{ route('SelectAddView') }}" method="POST" enctype="multipart/form-data">
                @csrf

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                <label for="title">Elige lo que quieres crear:</label>
                    <select name="add_view" id="add_view">
                    <option value="Playlist">Create Playlist</option>
                    <option value="Song" selected>Create Song</option>
                    <option value="Album">Create Album</option>
                    </select>
                    <button type="submit"><h1>ADELANTE!</h1></button>
                </div>
            </form>
        </div>
    </div>
    <footer>
        <div class="footer">
            <a href="/"><img src="img/home/icono home.png" alt="home" /></a>
            @auth
                @if(auth()->user()->role === 'artista')
                    <a href="{{ route('select_add_form') }}"><img src="/img/home/icono add.png" alt="añadir" /></a>
                @elseif (auth()->user()->role === 'user')
                    <a href="{{ route('playlists.create') }}"><img src="/img/home/icono add.png" alt="añadir" /></a>
                @endif    
                @else
                <a href="{{ route('login') }}"><img src="/img/home/icono add.png" alt="añadir" /></a>
            @endauth
            <a href="/artistas"><img src="img/home/icono grupo.png" alt="perfil" /></a>
        </div>
    </footer>
</body>
</html>