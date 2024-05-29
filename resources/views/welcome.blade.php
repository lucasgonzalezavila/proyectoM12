<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/home/style.css" />
    <title>Document</title>
</head>

<body>
    <header>
        <div class="header">
            <a href="/">
                <div class="icon">
                    <img class="headerImg" src="/img/home/mushare-high-resolution-logo-white-transparent.svg"
                        alt="" />
                </div>
            </a>
            <div class="searchBar">
                <input id="inputSearch" type="text" placeholder="Buscar" />
            </div>
            <a href="/profile">
                <div class="profile">
                    <img class="headerImg" src="/img/home/icons8-usuario-masculino-en-círculo-60.png" alt="" />
                </div>
            </a>
            <a href="/dashboard">
                <div class="notifications">
                    <img class="headerImg" src="/img/home/icons8-recordatorios-de-citas-48.png" alt="" />
                </div>
            </a>
        </div>
    </header>
    <main>
        <div class="albums-content">
            <div class="title">
                <h1 class="title-text">Canciones</h1>
            </div>
            <div class="arrows"></div>
            <div class="albums-list">
                @foreach ($canciones as $cancion)
                    <a href="/cancion/{{ $cancion->id }}">
                        <div class="album">
                            <img class="album-img" src="{{ $cancion->image }}" alt="{{$cancion->title}}" />
                            <!-- <button></button> -->
                            <div class="album-info">
                                <p>
                                    <{{ $cancion->title }} /p>
                                        <p>{{ $cancion->composers }}</p>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
        <div class="albums-content2">
            <h1 class="title">Álbums</h1>
            <div class="arrows"></div>
            <div class="albums-list">
                @foreach ($albumes as $album)
                    <a href="/album/{{ $album->id }}">
                        <div class="album">
                            <img class="album-img" src="{{ $album->front }}" alt="The Weeknd artista" />
                            <div class="album-info">
                                <p>{{ $album->name }}</p>
                                <p>{{ $album->artists }}</p>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </main>
    <footer>
        <div class="footer">
            <a href="/home"><img src="/img/home/icons8-casa-48.png" alt="home" /></a>
            <a href="/add_song"><img src="/img/home/icons8-añadir-60.png" alt="añadir" /></a>
            <a href="/artistas"><img src="/img/home/icons8-grupo-50.png" alt="perfil" /></a>
        </div>
    </footer>
</body>

</html>