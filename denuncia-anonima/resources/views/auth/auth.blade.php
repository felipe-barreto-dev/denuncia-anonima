<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autenticado</title>
</head>
<body>
    <h1>Você está autenticado!</h1>
    <p>Seus dados:</p>
    <ul>
        <li><strong>Nome de usuário:</strong> {{ $usuario->login }}</li>
        <!-- Adicione mais campos conforme necessário -->
    </ul>
    <a href="/fazer-denuncia">FAZER DENUNCIA</a>
    <form method="POST" action="{{ route('logout') }}">
      @csrf

      <x-dropdown-link :href="route('logout')"
              onclick="event.preventDefault();
                          this.closest('form').submit();">
          {{ __('Log Out') }}
      </x-dropdown-link>
  </form>
</body>
</html>
