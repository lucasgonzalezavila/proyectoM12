<!-- resources/views/add_song_to_playlist.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Add Song to Playlist</title>
    <!-- Incluye CSS y JS necesarios aquí -->
</head>
<body>
    <h1>Add Song to Playlist</h1>
    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif
    @if($errors->any())
        <div>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('playlists.addSong') }}" method="POST">
        @csrf
        <label for="playlist_name">Playlist Name:</label>
        <input type="text" id="playlist_name" name="playlist_name" required>
        
        <label for="song_title">Song Title:</label>
        <input type="text" id="song_title" name="song_title" required>
        
        <button type="submit">Add Song to Playlist</button>
    </form>
</body>
</html>
