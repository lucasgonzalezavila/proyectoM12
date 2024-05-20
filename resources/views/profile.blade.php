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
            <!-- Contenido para usuarios -->
            <div class="songs-content">
                <h1 class="title">Canciones Favoritas</h1>
                @foreach ($songs as $song)
                    <div class="song">
                        <div class="thumbnail"><img src="{{ $song->front }}" alt="{{ $song->title }}" /></div>
                        <div class="info">
                            <p>{{ $song->title }}</p>
                            <p>{{ $song->artist }}</p>
                        </div>
                        <p class="duration">{{ $song->duration }}</p>
                        <div class="sprite sprite-1"></div>
                        <a href="" class="play" onclick=""><img src="/img/profile/Group 1.svg" onclick="" alt=""></a>
                    </div>
                @endforeach
            </div>
            <div class="albums-content">
                <h1 class="title">Albums Favoritos</h1>
                <div class="albums-list">
                    @foreach ($albums as $album)
                        <div class="album">
                            <img src="{{ $album->front }}" alt="{{ $album->name }}" />
                            <div class="album-info">
                                <p>{{ $album->name }}</p>
                                <p>{{ $album->artist }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="playlist-content">
                <h1 class="title">Playlist Favoritas</h1>
                <div class="playlists-list">
                    @foreach ($playlists as $playlist)
                        <div class="album">
                            <img src="{{ $playlist->front }}" alt="{{ $playlist->name }}" />
                            <div class="playlist-info">
                                <p>{{ $playlist->name }}</p>
                                <p>{{ $playlist->artist }}</p>
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
                        <div class="thumbnail"><img src="{{ $song->front }}" alt="{{ $song->title }}" /></div>
                        <div class="info">
                            <p>{{ $song->title }}</p>
                            <p>{{ $song->artist }}</p>
                        </div>
                        <p class="duration">{{ $song->duration }}</p>
                        <div class="sprite sprite-1"></div>
                        <button class="play"><a href="/img/profile/icons8-male-user-32.png"></a></button>
                    </div>
                @endforeach
            </div>
            <div class="albums-content">
                <h1 class="title">Albums</h1>
                <div class="albums-list">
                    @foreach ($albums as $album)
                        <div class="album">
                            <img src="{{ $album->front }}" alt="{{ $album->name }}" />
                            <div class="album-info">
                                <p>{{ $album->name }}</p>
                                <p>{{ $album->artists }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="playlist-content">
                <h1 class="title">Playlist</h1>
                <div class="playlists-list">
                    @foreach ($playlists as $playlist)
                        <div class="album">
                            <img src="{{ $playlist->front }}" alt="{{ $playlist->name }}" />
                            <div class="playlist-info">
                                <p>{{ $playlist->name }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            
        @endif
    </div>
    <footer>
        <div class="footer">
            <a href="/"><img src="/img/profile/icono home.png" alt="home" /></a>
            <a href="/add_song"><img src="/img/profile/icono add.png" alt="añadir" /></a>
            <a href="/artistas"><img src="/img/profile/icono grupo.png" alt="perfil" /></a>
        </div>
    </footer>
</body>
</html>
