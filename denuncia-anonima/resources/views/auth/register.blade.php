<!-- resources/views/usuarios/create.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Usuário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Criar Usuário</h1>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('criar.usuario') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="login" class="form-label">Login:</label>
                <input type="text" id="login" name="login" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Senha:</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="perfil" class="form-label">Perfil:</label>
                <select id="perfil" name="perfil" class="form-select" required>
                    <option value="">Selecione um perfil</option>
                    @foreach($perfis as $perfil)
                        <option value="{{ $perfil->id }}">{{ $perfil->nome }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Criar Usuário</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
