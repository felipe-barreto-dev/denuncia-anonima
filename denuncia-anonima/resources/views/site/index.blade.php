@extends('head')

@section('title', 'Histórico de Denúncias')

@section('content')
<body>
    <header class="background-padrao">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-auto text-center pt-2 order-1 order-md-2">
                    <img src="/logo2.png" alt="Logo" />
                </div>
                <div class="col ms-3 order-2 order-md-1">
                    <div class="btn-group d-flex flex-wrap alinhamento-status" role="group">
                        <button type="button" class="btn border-0 btn-secondary fs-6 px-1{{ $currentFilter === 'todas' ? ' active' : '' }}"
                                onclick="filterDenuncias('todas')">Todas</button>
                        <button type="button" class="btn border-0 btn-secondary fs-6 px-1{{ $currentFilter === 'pendentes' ? ' active' : '' }}"
                                onclick="filterDenuncias('pendentes')">Pendentes</button>
                        <button type="button" class="btn border-0 btn-secondary fs-6 px-1{{ $currentFilter === 'andamento' ? ' active' : '' }}"
                                onclick="filterDenuncias('andamento')">Em Andamento</button>
                        <button type="button" class="btn border-0 btn-secondary fs-6 px-1{{ $currentFilter === 'concluidas' ? ' active' : '' }}"
                                onclick="filterDenuncias('concluidas')">Concluídas</button>
                    </div>
                </div>

                <div class="col me-3 d-flex flex-column align-items-end mt-4 order-3 order-md-3">
                    <a href="{{ route('fazer-denuncia') }}" class="btn btn-secondary border-0 p-2 btn-lg mb-2">
                        <span class="fs-6"> Nova Denúncia</span>
                        <i class="fa-solid fa-bullhorn"></i>
                    </a>
                    <button type="button" class="btn border-0 btn-danger btn-lg fs-6 px-4"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Sair
                        <i class="fa-solid fa-right-from-bracket"></i>
                    </button>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </header>

    <main class="background-padrao">
        <div class="container-fluid border-radius-index">
            <div class="row">
                <div class="col-md-9 mx-auto">
                    <ul class="list-group mt-3">
                        @foreach ($userReports as $report)
                            @php
                                $status = '';
                                if (is_null($report->id_responsavel)) {
                                    $status = 'pendente';
                                } elseif (is_null($report->data_conclusao) && !is_null($report->id_responsavel)) {
                                    $status = 'andamento';
                                } elseif (!is_null($report->data_conclusao)) {
                                    $status = 'concluida';
                                }
                            @endphp
                            <li class="list-group-item d-flex flex-column flex-md-row justify-content-between align-items-center denuncia">
                                <div class="mb-2 mb-md-0">
                                    <h4>
                                        <a href="{{ route('denuncia.show', $report->id) }}"
                                           class="text-decoration-none text-reset">
                                            {{ $report->titulo }}
                                        </a>
                                    </h4>
                                    <p>{{ $report->descricao }}</p>
                                    <span class="data">Data da denúncia: {{ $report->created_at->format('d/m/Y') }}</span>
                                </div>
                                <span class="badge {{ $status === 'pendente' ? 'bg-warning' : ($status === 'andamento' ? 'bg-primary' : 'bg-success') }} text-light">
                                    {{ ucfirst($status) }}
                                </span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </main>
</body>

<script>
    function filterDenuncias(filter) {
        window.location.href = "{{ route('denuncias.index') }}?filter=" + filter;
    }
</script>
@endsection
