@extends('head')

<head>
    <style>
        .hover-effect {
            transition: background-color 0.3s;
        }

        .hover-effect:hover {
            background-color: #f0f0f0;
            cursor: pointer;
        }
    </style>
</head>
@section('title', 'Histórico de Denúncias')

@section('content')

    <body>
        <header class="background-padrao py-3">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <!-- Logo Section -->
                    <div class="col-12 col-md-auto text-center order-1 order-md-2">
                        <img src="/logo2.png" alt="Logo" class="img-fluid" />
                    </div>

                    <!-- Filter Buttons Section -->
                    <div class="col ms-3 order-2 order-md-1">
                        <div class="btn-group d-flex flex-wrap alinhamento-status" role="group">
                            <button type="button" id="todas"
                                class="btn btn-secondary border-0 fs-6 px-2{{ $currentFilter === 'todas' ? ' active' : '' }}"
                                onclick="filterDenuncias('todas')" aria-label="Mostrar todas as denúncias">
                                Todas
                            </button>
                            <button type="button" id="pendentes"
                                class="btn btn-secondary border-0 fs-6 px-2{{ $currentFilter === 'pendentes' ? ' active' : '' }}"
                                onclick="filterDenuncias('pendentes')" aria-label="Mostrar denúncias pendentes">
                                Pendentes
                            </button>
                            <button type="button" id="andamento"
                                class="btn btn-secondary border-0 fs-6 px-2{{ $currentFilter === 'andamento' ? ' active' : '' }}"
                                onclick="filterDenuncias('andamento')" aria-label="Mostrar denúncias em andamento">
                                Em Andamento
                            </button>
                            <button type="button" id="concluidas"
                                class="btn btn-secondary border-0 fs-6 px-2{{ $currentFilter === 'concluidas' ? ' active' : '' }}"
                                onclick="filterDenuncias('concluidas')" aria-label="Mostrar denúncias concluídas">
                                Concluídas
                            </button>
                        </div>
                    </div>

                    <div class="dropdown col me-3 d-flex flex-column align-items-end order-3">
                        <button class="btn btn-admin dropdown-toggle text-capitalize" type="button"
                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->perfil->nome }}
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <div class="d-flex flex-column align-items-end p-2 w-100">
                                <a href="{{ route('fazer-denuncia') }}"
                                    class="btn btn-secondary border-0 p-2 btn-lg mb-2 w-100">
                                    <span class="fs-6">Nova denúncia</span>
                                    <i class="fa-solid fa-bullhorn ms-1"></i>
                                </a>

                                @if(Auth::user()->perfil->nome === 'administrador' || Auth::user()->perfil->nome === 'admin')
                                    <!-- Verifica se o usuário é administrador -->
                                    <a href="{{ route('criar.usuario') }}"
                                        class="btn btn-primary border-0 p-2 btn-lg mb-2 w-100">
                                        <span class="fs-6">Criar usuário</span>
                                        <i class="fa-solid fa-user-plus ms-1"></i>
                                    </a>
                                @endif

                                <button type="button" class="btn btn-danger border-0 btn-lg fs-6 px-4 w-100"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                    aria-label="Sair">
                                    Sair
                                    <i class="fa-solid fa-right-from-bracket ms-1"></i>
                                </button>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>


                    {{-- <!-- Action Buttons Section -->
                    <div class="col me-3 d-flex flex-column align-items-end order-3">
                        <a href="{{ route('fazer-denuncia') }}" class="btn btn-secondary border-0 p-2 btn-lg mb-2">
                            <span class="fs-6">Nova denúncia</span>
                            <i class="fa-solid fa-bullhorn ms-1"></i>
                        </a>
                        <button type="button" class="btn btn-danger border-0 btn-lg fs-6 px-4"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                            aria-label="Sair">
                            Sair
                            <i class="fa-solid fa-right-from-bracket ms-1"></i>
                        </button>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div> --}}
                </div>
            </div>
        </header>

        <main class="background-padrao">
            <div class="container-fluid border-radius-index h-screen">
                <div class="row">
                    <div class="col-md-9 mx-auto">
                        <div class="list-container" style="height: 80vh; overflow-y: auto;">
                            <ul class="list-group mt-3">
                                @foreach ($userReports as $report)
                                    @php
                                        $status = '';
                                        if (is_null($report->id_responsavel)) {
                                            $status = 'pendente';
                                        } elseif (
                                            is_null($report->data_conclusao) &&
                                            !is_null($report->id_responsavel)
                                        ) {
                                            $status = 'andamento';
                                        } elseif (!is_null($report->data_conclusao)) {
                                            $status = 'concluida';
                                        }
                                    @endphp
                                    <a href="{{ route('denuncia.show', $report->id) }}" class="text-decoration-none">
                                        <li
                                            class="list-group-item d-flex flex-column flex-md-row justify-content-between align-items-center denuncia hover-effect">
                                            <div class="mb-2 mb-md-0">
                                                <h4 class="text-reset">{{ $report->titulo }}</h4>
                                                <p>{{ $report->descricao }}</p>
                                                <span class="data">Data da denúncia:
                                                    {{ $report->data_ocorrido->format('d/m/Y') }}</span>
                                            </div>
                                            <span
                                                class="badge {{ $status === 'pendente' ? 'bg-warning' : ($status === 'andamento' ? 'bg-primary' : 'bg-success') }} text-light">
                                                {{ ucfirst($status) }}
                                            </span>
                                        </li>
                                    </a>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </body>

    <script>
        function filterDenuncias(filter) {
            window.location.href = "{{ route('denuncias.index') }}?filter=" + filter;
        }

        document.addEventListener("DOMContentLoaded", function() {
            const params = new URLSearchParams(window.location.search);
            const currentFilter = params.get("filter");

            const buttons = ["todas", "pendentes", "andamento", "concluidas"];

            buttons.forEach(id => {
                const button = document.getElementById(id);
                if (button) {
                    button.classList.remove("active", "btn-primary");
                    button.classList.add(
                        "btn-secondary"); // Garantir que os outros botões sejam 'btn-secondary'
                }
            });

            if (buttons.includes(currentFilter)) {
                const activeButton = document.getElementById(currentFilter);
                if (activeButton) {
                    activeButton.classList.add("active", "btn-primary");
                    activeButton.classList.remove("btn-secondary"); // Remover 'btn-secondary' do botão ativo
                }
            } else {
                const activeButton = document.getElementById('todas');
                if (activeButton) {
                    activeButton.classList.add("active", "btn-primary");
                    activeButton.classList.remove("btn-secondary"); // Remover 'btn-secondary' do botão ativo
                }
            }
        });
    </script>
@endsection
