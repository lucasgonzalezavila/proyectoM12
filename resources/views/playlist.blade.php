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
          <img
            src="{{ asset('storage/fronts/' . $playlist->front) }}"
            alt=""
          />
        </div>
        <div class="album-data">
          <div class="details">
            <p>TITULO:</p>
            <p>{{ $playlist->name }}</p>
          </div>
          <div class="details">
            <p>ARTISTAS:</p>
            <p>{{ $playlist->artists }}</p>
          </div>
          <div class="details">
            <p>GENERO:</p>
            <p>GENERO</p>
          </div>
          <div class="details">
            <p>FECHA DE CREACIÓN:</p>
            <p>{{ $playlist->release_date }}</p>
          </div>
        </div>
      </div>
      <div class="track2">
        <p>Imagen</p>
        <p class="name">nombre</p>
        <p class="duration">duracion</p>
      </div>
      <div class="album-tracks"> 
        @foreach ($songs  as $song )
        <div class="track">
          <img src="{{ asset('storage/fronts/' . $song->front) }}" alt="" />
          <p class="name">{{ $song->title }}</p>
          <p class="duration">{{ $song->duration }}</p>
          <div class="sprite sprite-1" onclick="toggleSprite"></div>
        </div>
        @endforeach
        
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

  <script>
    let Sprite = document.querySelectorAll(".sprite");
        Sprite.forEach(element =>
            element.addEventListener("click", function (e) {
                if (element.classList.contains("sprite-1")) {
                    element.classList.remove("sprite-1");
                    element.classList.add("sprite-2");
                }
                else {
                    element.classList.remove("sprite-2");
                    element.classList.add("sprite-1");
                }
            })
        );
  </script>
</html>
