<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmação de Denúncia</title>
</head>
<body>
    <h1>Confirmação de Denúncia</h1>
    <p>Sua denúncia foi registrada com sucesso.</p>
    <p>Por favor, faça login com as seguintes credenciais:</p>
    <p><strong>Login:</strong> {{ $details['login'] }}</p>
    <p><strong>Senha:</strong> {{ $details['password'] }}</p>
    <p><strong>Protocolo:</strong> {{ $details['protocolo'] }}</p>
</body>
</html>