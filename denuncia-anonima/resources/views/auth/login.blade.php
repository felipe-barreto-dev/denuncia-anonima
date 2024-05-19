<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login usuário</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <style>
        body {
            background-color: #85b3e2;
        }

        .card {
            margin-top: 5vw;
            max-width: 400px;
            min-width: 400px;
            margin-left: auto;
            margin-right: auto;
            border: none;
            border-radius: 15px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
            padding-bottom: 20px;
           
        }

        .form-control {
            margin-top: 10px;
            margin-bottom: 15px;
            width: 200px;
            margin-left: auto;
            margin-right: auto;
        }

        .btn-login {
            width: 100px;
            margin: 0 auto;
            border-radius: 15px;
        }

        .btn-login-anon {
            width: 120px;
            margin: 0 auto;
            border-radius: 15px;
        }

        .logo div {
            display: flex;
            flex-direction: column;
            text-align: center;
       
        }

        .form-control {
            margin-top: 10px;
            margin-bottom: 15px;
            width: 200px;
            margin-left: auto;
            margin-right: auto;
        }

        .btn-login {
            width: 100px;
            margin: 0 auto;
            border-radius: 15px;
        }

        .btn-login-anon {
            width: 120px;
            margin: 0 auto;
            border-radius: 15px;
        }

        .logo div {
            display: flex;
            flex-direction: column;
            text-align: center;
        }

        .logo {
            display: flex;
            flex-direction: column;
            text-align: center;
        }

        .logo img {
            max-width: 40%;
            margin-right: auto;
            margin-left: auto;
        }

        .error-message {
            font-size: 14px;
            /* Defina o tamanho da fonte */
            max-width: 200px;
            padding: 5px 10px;
            /* Defina o preenchimento (padding) interno */
            margin-bottom: 10px;
            /* Defina a margem inferior */
            margin-left: auto;
            margin-right: auto;
        }
    </style>
</head>

<body>
    <div class="container ">
        <div class="row ">
            <div class="col-sm-12 col-md-6 offset-md-3 ">
                <div class="card">
                    <div class=" logo">
                        <img src="{{ asset('Imagens/logo.png') }}">
                    </div>
                    <p style= "text-align: center; margin:20px;">Clique no botão abaixo para registrar sua denúncia de
                        forma anônima:</p>
                    <div style= "text-align: center;">
                        <a href="{{ route('fazer-denuncia') }}"
                            class="btn btn-primary btn-block btn-login-anon">Denunciar</a>
                        <br>
                        <h6 style="text-align: center;">―――――――― OU ――――――――</h6>
                        <p style = "text-align: center; margin:20px;">Insira as credencias para acompanhar uma denúncia:
                        </p>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <input id="login" class="form-control" type="login" name="login"
                                :value="old('login')" required autofocus autocomplete="login" id="inputEmail"
                                placeholder="Login">
                            <input id="password" class="form-control" type="password" name="password" required
                                autocomplete="current-password" placeholder="Senha">
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            @if ($errors->any())
                                <div class="alert alert-danger error-message">
                                    {{ $errors->first() }}
                                </div>
                            @endif
                            <button type="submit" class="btn btn-primary btn-block btn-login">Entrar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
