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
                    <img class="headerImg" src="/img/home/Icono mushare.png" alt="" />
                </div>
            </a>
            <div class="searchBar">
                <input id="inputSearch" type="text" placeholder="Buscar" />
            </div>
            <a href="/profile">
                <div class="profile">
                    <img class="headerImg" src="/img/home/icono perfil.png" alt="" />
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
        <div class="album song" data-song-src="{{ asset('storage/songs/' . $cancion->song_route) }}">
            <img class="album-img" src="{{ asset('storage/fronts/' . $cancion->front) }}" alt="{{ $cancion->title }}" />
            <div class="album-info">
                <p>{{ $cancion->title }}</p>
                <p>{{ $cancion->artists }}</p>
            </div>
        </div>
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
                            <img class="album-img" src="{{ asset('storage/fronts/' . $album->front) }}" alt="{{ $album->name }}" />
                            <div class="album-info">
                                <p>{{ $album->name }}</p>
                                <p>{{ $album->artists }}</p>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
        <div class="albums-content2">
            <h1 class="title">Playlist</h1>
            <div class="arrows"></div>
            <div class="albums-list">
                @foreach ($playlists as $playlist)
                    <a href="/playlist/{{ $playlist->id }}">
                        <div class="album">
                            <img class="album-img" src="{{ asset('storage/fronts/' . $playlist->front) }}" alt="{{ $playlist->name }}" />
                            <div class="album-info">
                                <p>{{ $playlist->name }}</p>
                                <p>{{ $playlist->artists }}</p>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
        <div class="music-player-container" style="display: none">
            <div class="title-music-container">
                <a href="/cancion/{{$cancion->id}} " style="text-decoration: none; color: white"><h4 class="song-title"></h4></a>
                <span class="song-author"></span>
            </div>
            <div class="controls-music-container">
                <div class="progress-song-container">
                    <div class="progress-bar">
                        <span class="progress"></span>
                    </div>
                </div>
                <div class="time-container">
                    <span class="time-left" id="RunningTime"></span>
                    <span class="time-left" id="Duration"></span>
                </div>
            </div>
            <audio controls preload="metadata" src=""></audio>
            <div class="main-song-controls">
                <img src="/img/home/Backward.svg" alt="" class="icon" id="less10">
                <img src="/img/home/Play.svg" alt="" class="icon" id="PlayPause">
                <img src="/img/home/Forward.svg" alt="" class="icon" id="more10">
            </div>
        </div>
    </main>
    <footer>
        <div class="footer">
            <a href="/"><img src="img/home/icono home.png" alt="home" /></a>
            @auth
                @if(auth()->user()->role === 'artista')
                    <a href="{{ route('select_add_form') }}"><img src="img/home/icono add.png" alt="añadir" /></a>
                @elseif (auth()->user()->role === 'user')
                    <a href="{{ route('playlists.create') }}"><img src="img/home/icono add.png" alt="añadir" /></a>
                @endif    
                @else
                <a href="{{ route('login') }}"><img src="img/home/icono add.png" alt="añadir" /></a>
            @endauth
            <a href="/artistas"><img src="img/home/icono grupo.png" alt="perfil" /></a>
        </div>
    </footer>

    <script>
document.addEventListener('DOMContentLoaded', function() {
    console.log('Script loaded!');

    var songs = document.querySelectorAll('.song');
    console.log(songs);

    songs.forEach(function(song) {
        console.log('Click event attached!');
        song.addEventListener('click', function(e) {
            e.preventDefault();

            // Obtén los detalles de la canción
            var songTitle = song.querySelector('.album-info p:first-child').textContent;
            var songArtist = song.querySelector('.album-info p:last-child').textContent;
            var songSrc = song.getAttribute('data-song-src');

            console.log('Song Title: ', songTitle);
            console.log('Song Artist: ', songArtist);
            console.log('Song Source: ', songSrc);

             // Verificar si songSrc es válido
             if (!songSrc || songSrc === "null") {
                console.error('No se pudo encontrar la URL del archivo de audio.');
                return; // Salir si no hay una URL válida
            }

            // Actualiza el reproductor de música
            document.querySelector('.song-title').textContent = songTitle;
            document.querySelector('.song-author').textContent = songArtist;
            document.querySelector('audio').setAttribute('src', songSrc);

            // Muestra el reproductor de música
            document.querySelector('.music-player-container').style.display = 'flex';
            document.querySelector('.music-player-container').scrollIntoView({ behavior: 'smooth' });

            // Comienza a reproducir la canción
            var audioElement = document.querySelector('audio');
            const PlayPause = document.getElementById('PlayPause');
            audioElement.play();
            PlayPause.src = '/img/home/pause.svg';
        });
    });
});

const audio = document.querySelector('audio'),
    Duration = document.getElementById('Duration'),
    runningTime = document.getElementById('RunningTime');

// Función para calcular el tiempo en formato mm:ss
const calculateTime = (secs) => {
    const min = Math.floor(secs / 60),
        sec = Math.floor(secs % 60),
        returnedsec = sec < 10 ? `0${sec}` : `${sec}`; // Corregido aquí
    return `${min}:${returnedsec}`;
}

// Función para mostrar la duración total de la canción
const showDuration = () => {
    Duration.innerHTML = calculateTime(audio.duration);
}

// Verificar si el audio está listo para mostrar la duración
if (audio.readyState > 0) {
    showDuration();
    runningTime.innerHTML = calculateTime(audio.currentTime);
} else {
    audio.addEventListener('loadedmetadata', () => {
        showDuration();
    });
}

// Actualiza el tiempo de ejecución y la barra de progreso
audio.ontimeupdate = function() {
    runningTime.innerHTML = calculateTime(audio.currentTime);
    setProgress();
}

// Función para ajustar la barra de progreso
function setProgress() {
    let percentage = (audio.currentTime / audio.duration) * 100;
    document.querySelector('.progress').style.width = percentage + '%';
}

// Controles de reproducción del audio
const PlayPause = document.getElementById('PlayPause'),
    more10 = document.getElementById('more10'),
    less10 = document.getElementById('less10');

PlayPause.addEventListener('click', () => {
    if (audio.paused) {
        PlayPause.src = '/img/home/pause.svg';
        audio.play();
    } else {
        PlayPause.src = '/img/home/Play.svg';
        audio.pause();
    }
});

more10.addEventListener('click', () => {
    audio.currentTime += 10;
});

less10.addEventListener('click', () => {
    audio.currentTime -= 10;
});
document.addEventListener('DOMContentLoaded', function() {
    // Obtener referencia al input de búsqueda
    var searchInput = document.getElementById('inputSearch');
  
    // Función para realizar la búsqueda
    function performSearch() {
        // Obtener el valor del input de búsqueda
        var searchTerm = searchInput.value.trim();
  
        // Verificar si el término de búsqueda no está vacío
        if (searchTerm !== '') {
            // Redirigir a la página de búsqueda con el término de búsqueda
            window.location.href = "/search/" + searchTerm;
        }
    }
  
    // Agregar evento de escucha al presionar "Enter" en el input de búsqueda
    searchInput.addEventListener('keypress', function(event) {
        // Verificar si la tecla presionada es "Enter" (código 13)
        if (event.key === 'Enter') {
            performSearch();
        }
    });
  });

</script>
</body>