<!DOCTYPE html>
<html>
<head>
    <title>Add Song to Album</title>
    <!-- Incluye CSS y JS necesarios aquí -->
</head>
<body>
    <h1>Add Song to Album</h1>
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
    <form action="{{ route('albums.addSong') }}" method="POST">
        @csrf
        <label for="album_name">Album Name:</label>
        <input type="text" id="album_name" name="album_name" required>
        
        <label for="song_title">Song Title:</label>
        <input type="text" id="song_title" name="song_title" required>
        
        <button type="submit">Add Song to Album</button>
    </form>
</body>
</html>
