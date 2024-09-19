@extends('head')

@section('title', 'Criar Usuário')

@section('content')
<body class="bg-fundo-confirmation">
    <div class="container-fluid d-flex align-items-center justify-content-center">
        <div class="row w-100">
            <div class="col-md-6 d-flex align-items-center justify-content-center">
                <div class="container mt-5">
                    <h1>Criar Usuário</h1>
                    @if ($errors->any() || session('success'))
                        <div class="alert {{ $errors->any() ? 'alert-danger' : 'alert-success' }}">
                            @if ($errors->any())
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            @else
                                {{ session('success') }}
                            @endif
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
                            <label for="password_confirmation" class="form-label">Confirmar Senha:</label>
                            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
                        </div>
                        <div class="mb-5">
                            <label for="perfil" class="form-label">Perfil:</label>
                            <select id="perfil" name="perfil" class="form-select" required>
                                <option value="">Selecione um perfil</option>
                                @foreach($perfis as $perfil)
                                    <option value="{{ $perfil->id }}">{{ $perfil->nome }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-secondary border-0">Criar Usuário</button>
                    </form>
                </div>
            </div>
            <div class="col-md-6 d-flex align-items-center justify-content-center mt-5">
                <img src="Imagens/criar-usuario.png" alt="Logo" class="img-fluid" style="max-width: 60%;">
            </div>
        </div>
    </div>
</body>
@endsection
