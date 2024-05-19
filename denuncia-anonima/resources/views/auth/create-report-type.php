<!-- resources/views/usuarios/create.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criação de tipo de denúncia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1>Criar Tipo de Denúncias</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('criar.tipo.denuncia') }}">
            @csrf
            <div class="mb-3">
                <label for="titulo" class="form-label">Tipo da denúncia</label>
                <input type="text" name="titulo" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="descricao" class="form-label">Descrição</label>
                <input name="descricao" class="form-control" placeholder="Descreva brevemente o significado do tipo" required>
            </div>
            <button type="submit" class="btn btn-primary">Criar tipo de denúncia</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
