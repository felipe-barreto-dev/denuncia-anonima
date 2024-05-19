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
        <h1>Criar Tipo de Denúncias </h1>

        <form method="POST">
            <div class="mb-3">
                <label for="login" class="form-label">Tipo da denúncia</label>
                <input type="text" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Descrição</label>
                <input name="descricao" class="form-control"  placeholder="Descreva brevemente o significado do tipo" required>
            </div>
            <button type="submit" class="btn btn-primary">Criar tipo de denúncia</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
