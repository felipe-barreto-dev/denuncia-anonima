<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Login usuário</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />


        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <style>
        body {
            background-color: #85b3e2;
        }

        .card {
            margin-top: 100px;
            max-width: 400px;
            margin-left: auto;
            margin-right: auto;
            border: none;
            border-radius: 10px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
        }

        .logo {
            text-align: center;
            background-color:white;
            
        }

        .logo img {
            max-width: 100%;
            height: auto;
        }

    </style>
    </head>
    <body >
        <div class="container ">
            <div class="row ">
                <div class="col-sm-12 col-md-6 offset-md-3 ">
                    <div class="card">
                        <div class=" logo">
                            <img src="logo.png"  >
                    </div>
                        <div style="text-align: center;" class="card-body">
                            <p>Se você já tem um login, por favor, insira suas <br>
                            credenciais abaixo. Caso contrário, você pode <br> fazer uma denûncia
                            anônima clicando no botão "Denunciar anonimamente"</p>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <input id="login" class="form-control" type="login" name="login" :value="old('login')" required autofocus autocomplete="login" id="inputEmail" placeholder="Login">
                                <input id="password" class="form-control"
                                    type="password"
                                    name="password"
                                    required autocomplete="current-password">
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                <button type="submit" class="btn btn-primary btn-block">Entrar</button>
                                <br>
                                <p style="text-align: center;" >Ou</p>
                                <br>
                                <button type="submit" class="btn btn-primary btn-block">Denunciar anonimamente</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
