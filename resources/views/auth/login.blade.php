<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login/style.css">
    <title>Iniciar sesión en Mushare</title>
</head>
<body>
    <div class="container">
        <div class="div-logo">
            <img id="logo-img" src="img/login/mushare.svg" alt="">
        </div>
        <div class="div-form">
            <h2>Inicia sesión en Mushare</h2>
            <div class="login-form">
                <form action="{{ route('login') }}" method="POST" class="register-form">
                    @csrf
                    <label for="email">Email</label>
                    <input type="email" name="email" placeholder="Introduce tu correo electrónico" id="email" class="input-text">
                    @error('email')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                    <label for="password">Contraseña</label>
                    <input type="password" name="password" placeholder="Introduce tu contraseña" id="password" class="input-text">
                    @error('password')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                    <div class="block mt-4">
                        <input type="checkbox" name="remember" id="remember_me" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800">
                        <label for="remember_me" class="inline-flex items-center ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Recuérdame') }}</label>
                    </div>
                    <input type="submit" value="Iniciar sesión" class="input-submit">
                </form>
            </div>
            <div class="login">
                <p id="login-text">¿Aún no tienes cuenta?</p>
                <a id="login-link" href="{{ route('register') }}">Crea la tuya aquí</a>
            </div>
        </div>
    </div>
</body>
</html>
