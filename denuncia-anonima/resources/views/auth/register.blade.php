@extends('head')

@section('title', 'Criar Usuário')

@section('content')

    <body class="background-padrao">
        <div class="container my-5">
            <!-- Botão Voltar -->
            <div class="mb-4">
                <a href="{{ route('denuncias.index') }}" class="btn btn-outline-secondary align-items-center">
                    <i class="fa-solid fa-arrow-left me-2"></i> Voltar
                </a>
            </div>

            <div class="row">
                <!-- Formulário de Criação -->
                <div class="col-lg-5">
                    <div class="card shadow-sm p-4 border-0 rounded">
                        <h2 class="mb-4 text-center">Criar usuário</h2>
                        @if ($errors->any() || session('success'))
                            <div class="alert {{ $errors->any() ? 'alert-danger' : 'alert-success' }} rounded">
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
                                <input type="text" id="login" name="login" class="form-control"
                                    placeholder="Digite o login" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Senha:</label>
                                <input type="password" id="password" name="password" class="form-control"
                                    placeholder="Digite a senha" required>
                            </div>
                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Confirmar senha:</label>
                                <input type="password" id="password_confirmation" name="password_confirmation"
                                    class="form-control" placeholder="Confirme a senha" required>
                            </div>
                            <div class="mb-4">
                                <label for="perfil" class="form-label">Perfil:</label>
                                <select id="perfil" name="perfil" class="form-select" required>
                                    <option value="">Selecione um perfil</option>
                                    @foreach ($perfis as $perfil)
                                        <option value="{{ $perfil->id }}">{{ $perfil->nome }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">
                                <i class="fa-solid fa-user-plus me-2"></i>Criar usuário
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Lista de Usuários -->
                <div class="col-lg-7 mt-4 mt-lg-0">
                    <div class="card shadow-sm p-4 border-0 rounded">
                        <h2 class="text-center mb-4">Usuários cadastrados</h2>
                        <div class="table-responsive" style="max-height: 400px;">
                            <table class="table table-hover align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th>Login</th>
                                        <th>Perfil</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($usuarios as $usuario)
                                        <tr>
                                            <td>{{ $usuario->login }}</td>
                                            <td>{{ $usuario->perfil->nome }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
@endsection
