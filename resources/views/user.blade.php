<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>User:</h1>
    <div class="bg-white rounded-lg shadow-md p-6">
        <h2 class="text-xl font-semibold mb-2">{{ $user->name }}</h2>
        <h2 class="text-xl font-semibold mb-2">{{ $user->email }}</h2>
        <!-- Evita mostrar la contraseña del usuario -->
    </div>
</body>
</html>
