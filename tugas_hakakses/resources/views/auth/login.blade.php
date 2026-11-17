<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="container container-kecil">
        <h2>Login</h2>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required>
                @error('email') <span class="error">* {{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
                @error('password') <span class="error">* {{ $message }}</span> @enderror
            </div>

            <div class="button-container">
                <button type="submit" class="btn-tambah">Login</button>
            </div>
        </form>
    </div>
</body>
</html>
