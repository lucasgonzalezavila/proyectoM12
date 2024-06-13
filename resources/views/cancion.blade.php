<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="/css/album/style.css" />
</head>
<body>
    <div class="container">
        <div class="album-info">
            <div class="album-img">
                <img src="{{ asset('storage/fronts/' . $cancion->front) }}" alt="" />
            </div>
            <div class="album-data">
                <div class="details">
                    <p>TITULO:</p>
                    <p>{{ $cancion->title }}</p>
                </div>
                <div class="details">
                    <p>ARTISTAS:</p>
                    <p>{{ $cancion->artists }}</p>
                </div>
                <div class="details">
                    <p>GENERO:</p>
                    <p>GENERO</p>
                </div>
                <div class="details">
                    <p>FECHA DE CREACIÓN:</p>
                    <p>{{ $cancion->release_date }}</p>
                </div>
            </div>
        </div>
        <div class="track2">
            <p>Imagen</p>
            <p class="name">nombre</p>
            <p class="duration">duracion</p>
        </div>
        <div class="album-tracks">
            <div class="track song" data-song-src="{{ asset('storage/songs/' . $cancion->song_route) }}">
                <img src="{{ asset('storage/fronts/' . $cancion->front) }}" alt="" />
                <p class="name">{{ $cancion->title }}</p>
                <p class="duration">{{ $cancion->duration }}</p>
                <p class="artist">{{ $song->artists }}</p>
                <div class="sprite sprite-1" onclick="toggleSprite"></div>
            </div>
        </div>
        <div class="music-player-container" style="display: none">
            <div class="title-music-container">
                <a href="/cancion/{{$cancion->id}}" style="text-decoration: none; color: white">
                    <h4 class="song-title"></h4>
                </a>
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

<script>
document.addEventListener('DOMContentLoaded', function() {
    console.log('Script loaded!');

    var songs = document.querySelectorAll('.song');

    songs.forEach(function(song) {
        console.log('Click event attached!');
        song.addEventListener('click', function(e) {
            e.preventDefault();


            var songTitle = song.querySelector('.name').textContent;
            var songDuration = song.querySelector('.duration').textContent;
            var songArtist = song.querySelector('.artist').textContent;
            var songSrc = song.getAttribute('data-song-src');

            console.log('Song Title: ', songTitle);
            console.log('Song Duration: ', songDuration);
            console.log('Song Source: ', songSrc);


            if (!songSrc || songSrc === "null") {
                console.error('No se pudo encontrar la URL del archivo de audio.');
                return; 
            }


            document.querySelector('.song-title').textContent = songTitle;
            document.querySelector('.song-author').textContent = songArtist; 
            document.querySelector('audio').setAttribute('src', songSrc);


            document.querySelector('.music-player-container').style.display = 'flex';
            document.querySelector('.music-player-container').scrollIntoView({ behavior: 'smooth' });


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


const calculateTime = (secs) => {
    const min = Math.floor(secs / 60),
        sec = Math.floor(secs % 60),
        returnedsec = sec < 10 ? `0${sec}` : `${sec}`;
    return `${min}:${returnedsec}`;
}


const showDuration = () => {
    Duration.innerHTML = calculateTime(audio.duration);
}


if (audio.readyState > 0) {
    showDuration();
    runningTime.innerHTML = calculateTime(audio.currentTime);
} else {
    audio.addEventListener('loadedmetadata', () => {
        showDuration();
    });
}


audio.ontimeupdate = function() {
    runningTime.innerHTML = calculateTime(audio.currentTime);
    setProgress();
}


function setProgress() {
    let percentage = (audio.currentTime / audio.duration) * 100;
    document.querySelector('.progress').style.width = percentage + '%';
}


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


let sprites = document.querySelectorAll(".sprite");
sprites.forEach(element => {
    element.addEventListener("click", function() {
        if (element.classList.contains("sprite-1")) {
            element.classList.remove("sprite-1");
            element.classList.add("sprite-2");
        } else {
            element.classList.remove("sprite-2");
            element.classList.add("sprite-1");
        }
    });
});
</script>
</html>

