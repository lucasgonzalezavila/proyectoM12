<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista de artistas</title>
    <link rel="stylesheet" href="css/album/style.css">
</head>
<body>
      <div class="album-tracks">
        @foreach ($artists as $artist)
        <div class="track">
          <img src="/img/home/Icono mushare.png" alt="" />
          <a class="artist" href="/search/{{$artist}}">{{$artist}}</a>
          <div class="sprite sprite-1" onclick="toggleSprite"></div>
        </div>
        @endforeach
      </div>
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
</body>
</html>