<!-- resources/views/create_playlist.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Create Playlist</title>
    <!-- Incluye CSS y JS necesarios aquí -->
</head>
<body>
    <h1>Create a New Playlist</h1>
    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif
    <form action="{{ route('playlists.store') }}" method="POST">
        @csrf
        <label for="name">Playlist Name:</label>
        <input type="text" id="name" name="name" required>
        <button type="submit">Create Playlist</button>
    </form>
</body>
</html>
