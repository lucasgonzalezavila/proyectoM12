<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/login/style.css" />
    <title>Document</title>
  </head>
  <body>
    <div class="container">
      <div class="div-logo">
        <img id="logo-img"
          src="img/login/mushare.svg"
          alt=""
        />
      </div>
      <div class="div-form">
        <h2>Inicia sesión en Mushare</h2>
        <div class="login-form">
          <form action="" method="post" class="register-form">
            <label for="email">Email</label>
            <input
              type="email"
              name="email"
              placeholder="Introduce tu correo electrónico"
              id="email"
              class="input-text"
            />
            <label for="password">Contraseña</label>
            <input
              type="password"
              name="password"
              placeholder="Introduce tu contraseña"
              id="password"
              class="input-text"
            />
            <input type="submit" value="Crea tu cuenta" class="input-submit"/>
          </form>
        </div>
        <div class="login">
          <p id="login-text">Aún no tienes cuenta?</p>
          <a id="login-link" href="login.html">Crea la tuya aquí</a>
        </div>
      </div>
    </div>
  </body>
</html>
