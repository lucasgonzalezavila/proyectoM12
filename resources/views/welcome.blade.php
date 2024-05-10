<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="globals.css" />
    <link rel="stylesheet" href="/css/home/styleguide.css" />
    <link rel="stylesheet" href="/css/home/style.css" />
  </head>
  <body>
    <div class="main-MVP">
      <div class="div">
        <div class="overlap">
          <div class="slider-for-you">
            <div class="top">
              <div class="section-title">Top 10 España</div>
              <div class="topnav-icon-button">
                <div class="icon"><img class="icon-arrow-left" src="/img/home/icono flecha derecha.png" /></div>
              </div>
              <div class="icon-wrapper">
                <div class="img-wrapper"><img class="img" src="/img/home/icono flecha izquierda.png" /></div>
              </div>
            </div>
            <div class="container">
              <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach($canciones as $cancion)
                <a href="/cancion/{{ $cancion->id }}">
                <div class="bg-white rounded-lg shadow-md p-6 flex flex-col">
                <div class="mb-4">
                <img src="{{ $cancion->image }}" alt="" class="object-cover h-40 w-full rounded-lg mb-2">
                </div>
                <div class="flex flex-col justify-between">
                <div>
                <h2 class="text-xl font-semibold mb-2">{{ $cancion->title }}</h2>
                <p>{{ $cancion->composers }}</p>
                </div>
                <div class="flex justify-between items-center">
                <p>{{ $cancion->valoration }}</p>
                <p>{{ $cancion->duration }}</p>
                </div>
                <button class="btn">Play</button>
                </div>
                </div>
                </a>
                @endforeach
                </div>
            </div>
          </div>
          <div class="rectangle"></div>
          <a href="/"><img class="casa" src="/img/home/icono home.png" /></a>
          <img class="line" src="img/line-7.svg" />
          <a href="/add"><img class="aadir" src="/img/home/icono add.png" /></a>
          <a href="/group"><img class="grupo" src="/img/home/icono grupo.png" /></a>
          
        </div>
        <div class="overlap-2">
          <div class="group">
            <div class="div-2">
              <div class="frame">
                <div class="div-2">
                  <div class="group-wrapper">
                    <div class="div-2">
                      <div class="frame-2">
                        <div class="group-2"></div>
                        <a href="/"><img class="group-3" src="/img/home/Icono mushare.png" /></a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div>
            <input class="topnav-bar-input" id="searchInput" placeholder="Search"></input>
            <ul id="searchResults"></ul> 
          </div>
          <a href="/profile"><img class="usuario" src="/img/home/icono perfil.png" /></a>
          <a href="/dashboard"><img class="recordatorios" src="/img/home/icono notificacion.png" /></a>
          <img class="line-2" src="/img/home/line-6.svg" />
        </div>
        <div class="overlap-3">
          <div class="ellipse"></div>
          <img class="flecha" src="/img/home/icono flecha desplegable.png" />
        </div>
        <div class="overlap-4">
          <div class="rectangle-2"></div>
          <div class="slider-for-you-2">
            <div class="top">
              <div class="section-title-2">Música que te gusta</div>
              <div class="topnav-icon-button">
                <div class="icon"><img class="icon-arrow-left" src="/img/home/icono flecha derecha.png" /></div>
              </div>
              <div class="icon-wrapper">
                <div class="img-wrapper"><img class="img" src="/img/home/icono flecha izquierda.png" /></div>
              </div>
            </div>
            <div class="container">
              <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach($canciones as $cancion)
                <a href="/cancion/{{ $cancion->id }}">
                <div class="bg-white rounded-lg shadow-md p-6 flex flex-col">
                <div class="mb-4">
                <img src="{{ $cancion->front }}" alt="" class="object-cover h-40 w-full rounded-lg mb-2">
                </div>
                <div class="flex flex-col justify-between">
                <div>
                <h2 class="text-xl font-semibold mb-2">{{ $cancion->title }}</h2>
                <p>{{ $cancion->composers }}</p>
                </div>
                <div class="flex justify-between items-center">
                <p>{{ $cancion->valoration }}</p>
                <p>{{ $cancion->duration }}</p>
                </div>
                <button class="btn">Play</button>
                </div>
                </div>
                </a>
                @endforeach
                </div>
          </div>
        </div>
      </div>
    </div>
    <script src="/js/home/home.js"></script>
  </body>
</html>
