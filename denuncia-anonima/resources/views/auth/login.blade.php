@extends('head')

@section('title', '')

@section('content')

<body>
<div class="container-fluid background-login d-flex justify-content-center align-items-center">
    <div class="card custom-card-login p-3">
        <div class="text-center position-relative">
            <div class="logo position-absolute">
                <img src="{{ asset('Imagens/logo.png') }}" width="200" height="200" alt="Logo">
            </div>
        </div>
        <div class="card-body">   
            <p class="text-alignment-login">
                Clique no botão abaixo para registrar sua denúncia de forma anônima:
            </p>
            <div class="text-center">
                <a href="{{ route('fazer-denuncia') }}" class="btn btn-primary btn-block btn-login-anonymous">
                    Denunciar
                </a>
                <br>
                <h6 class="text-alignment-login">OU</h6>
                <p class="text-alignment-login">
                    Insira as credenciais para acompanhar uma denúncia:
                </p>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <input id="login" class="form-control custom-buttons-login" type="login" name="login" 
                           :value="old('login')" required autofocus autocomplete="login" 
                           placeholder="Login">
                    <input id="password" class="form-control custom-buttons-login" type="password" name="password" 
                           required autocomplete="current-password" placeholder="Senha">
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    @if ($errors->any())
                        <div class="alert alert-danger error-message-login">
                            {{ $errors->first() }}
                        </div>
                    @endif
                    <button type="submit" class="btn btn-primary btn-block btn-login">Entrar</button>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
@endsection
