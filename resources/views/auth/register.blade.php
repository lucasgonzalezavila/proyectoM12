<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/register/style.css" />
    <title>Document</title>
  </head>
  <body>
    <div class="container">
      <div class="div-logo">
        <img src="img/register/mushare.svg" alt="Mushare Logo" />
      </div>

      <div class="div-form">
        <h2>Crea tu cuenta en Mushare</h2>
        <div class="login-form">
          <div class="user-type">
            <input type="button" value="ARTISTA" class="btn" id="btn1" />
            <input type="button" value="USUARIO" class="btn" id="btn2" />
          </div>
          <form method="POST" action="{{ route('register') }}" class="register-form">
            @csrf
            <label for="name">Nombre de Usuario</label>
            <input
              type="text"
              name="name"
              id="name"
              placeholder="Se utilizará como nombre de usuario"
              class="input-text"
              :value="old('name')"
              required
              autofocus
              autocomplete="name"
            />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
            
            <label for="email">Email</label>
            <input
              type="email"
              name="email"
              id="email"
              placeholder="Introduce tu correo electrónico"
              class="input-text"
              :value="old('email')"
              required
              autocomplete="username"
            />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
            
            <label for="password">Contraseña</label>
            <input
              type="password"
              name="password"
              id="password"
              placeholder="Introduce tu contraseña"
              class="input-text"
              required
              autocomplete="new-password"
            />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
            
            <label for="password_confirmation">Repite tu contraseña</label>
            <input
              type="password"
              name="password_confirmation"
              id="password_confirmation"
              placeholder="Repite tu contraseña"
              class="input-text"
              required
              autocomplete="new-password"
            />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            
            <input type="submit" value="Crea tu cuenta" class="input-submit"/>
          </form>
        </div>
        <div class="login">
          <p id="login-text">¿Ya tienes cuenta? </p>
          <a id="login-link" href="{{ route('login') }}">Inicia sesión</a>
        </div>
      </div>
    </div>
  </body>
</html>
