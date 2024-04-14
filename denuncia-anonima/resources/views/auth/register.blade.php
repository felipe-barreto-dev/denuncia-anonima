<!-- resources/views/usuarios/create.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Usuário</title>
</head>
<body>
    <h1>Criar Usuário</h1>
    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif
    <form action="{{ route('criar.usuario') }}" method="POST">
        @csrf
        <div>
            <label for="login">Login:</label>
            <input type="text" id="login" name="login">
        </div>
        <div>
            <label for="password">Senha:</label>
            <input type="password" id="password" name="password">
        </div>
        <button type="submit">Criar Usuário</button>
    </form>
</body>
</html>
