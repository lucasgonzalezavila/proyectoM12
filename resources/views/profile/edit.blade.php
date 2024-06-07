<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings</title>
    <link rel="stylesheet" href="css/settings/settings.css">
</head>

<body>
    <div class="content">
        <section class="settings">
            <div class="user">
                <img src="img/profile/icons8-usuario-masculino-en-círculo-96.png" alt="Imagen de perfil" class="imagen-perfil" />
                <div class="info-usuario">
                    <h1 class="userInfo">{{$user->name}}</h1>
                </div>
                <div class="user-description">
                    <p class="userDescription">{{$user->name}}</p>
                </div>
                <a href="/profile"><button id="profile">Perfil</button></a>
            </div>

            <div class="info">
                <h1 class="title">Detalles personales</h1>
                <div class="user-info">
                    <p id="username">{{$user->name}}</p><br>
                    <p id="email">{{$user->email}}</p><br>
                    <p id="role">{{$user->role}}</p>
                </div>
                <div class="buttons">
                    @include('layouts.logout')
                </div>
            </div>
        </section>
    </div>

    <div class="configuracion">
        <section class="configuracioninfo">
            @include('profile.partials.update-profile-information-form')
        </section>
    
        <section class="configuracioninfo">
            @include('profile.partials.update-password-form')
        </section>
    
        <section class="configuracioninfo">
            @include('profile.partials.delete-user-form')
        </section>
    </div>
    
</body>

</html>
