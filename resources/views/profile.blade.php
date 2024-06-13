<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/profile/profile.css" />
    <title>Profile</title>
</head>
<body>
    <header class="header">
        <img src="/img/profile/icons8-usuario-masculino-en-círculo-96.png" alt="Imagen de perfil" class="imagen-perfil" />
        <div class="info-usuario">
            <h1 class="userInfo">{{ $user->name }}</h1>
            <p class="userDescription">Descripcion usuario</p>
        </div>
        <a href="/settings"><img src="/img/profile/icons8-ajustes-50 2.png" alt="Engranaje de ajustes" class="settings" /></a>
    </header>
    <div class="content">
        @if ($user->role === 'user')
            <!-- Contenido para artistas -->
            <div class="songs-content">
                <h1 class="title">Canciones Favoritas</h1>
                @foreach ($songs as $song)
                    <div class="song">
                        <div class="thumbnail"><img src="{{ asset('storage/fronts/' . $song->front) }}" alt="{{ $song->title }}" /></div>
                        <div class="info">
                            <p>{{ $song->title }}</p>
                            <p>{{ $song->artist }}</p>
                        </div>
                        <p class="duration">{{ $song->duration }}</p>
                        <div class="sprite sprite-1"></div>
                        <img src="/img/profile/icons8-reproducir-en-círculo-50.png" onclick="" alt="">
                    </div>
                @endforeach
            </div>
            <div class="albums-content">
                <h1 class="title">Albums Favoritos</h1>
                <div class="albums-list">
                    @foreach ($albums as $album)
                        <div class="album">
                            <img src="{{ asset('storage/fronts/' . $album->front) }}" alt="{{ $album->name }}" />
                            <div class="album-info">
                                <p>{{ $album->name }}</p>
                                <p>{{ $album->artists }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="albums-content">
                <h1 class="title">Playlist Favoritas</h1>
                <div class="albums-list">
                    @foreach ($playlists as $playlist)
                        <div class="album">
                            <img src="{{ asset('storage/fronts/' . $playlist->front) }}" alt="{{ $playlist->name }}" />
                            <div class="album-info">
                                <p>{{ $playlist->name }}</p>
                                <p>{{ $playlist->artists }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            
            </div>
        @else
            <!-- Contenido para artistas -->
            <div class="songs-content">
                <h1 class="title">Singles</h1>
                @foreach ($songs as $song)
                    <div class="song">
                        <div class="thumbnail"><img src="{{ asset('storage/fronts/' . $song->front) }}" alt="{{ $song->title }}" /></div>
                        <a href="/cancion/{{$song->id}}" style="text-decoration: none;color:white">
                            <div class="info">
                                <p>{{ $song->title }}</p>
                                <p>{{ $song->artist }}</p>
                            </div>
                        </a>
                        <p class="duration">{{ $song->duration }}</p>
                        <div class="sprite sprite-1"></div>
                    </div>
                @endforeach
            </div>
            <div class="albums-content">
                <h1 class="title">Albums</h1>
                <div class="albums-list">
                    @foreach ($albums as $album)
                        <div class="album">
                            <img src="{{ asset('storage/fronts/' . $album->front) }}" alt="{{ $album->name }}" />
                            <a href="/album/{{$album->id}}" style="text-decoration: none;color:white">
                                <div class="album-info">
                                    <p>{{ $album->name }}</p>
                                    <p>{{ $album->artists }}</p>
                                </div>
                            </a>
                            
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="albums-content">
                <h1 class="title">Playlist</h1>
                <div class="albums-list">
                    @foreach ($playlists as $playlist)
                    <a href="/playlist/{{$playlist->id}}" class="link">
                        <div class="album">
                            <img src="{{ asset('storage/fronts/' . $playlist->front) }}" alt="{{ $playlist->name }}" />
                            <div class="album-info">
                                <p>{{ $playlist->name }}</p>
                                <p>{{ $playlist->artists }}</p>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
        @endif
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
