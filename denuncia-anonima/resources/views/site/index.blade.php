@extends('head')

@section('title', 'Histórico de Denúncias')

@section('content')

<header class="top-header">
    <div>
        <h2>Histórico de Denúncias</h2>
        <div class="btn-group btn-group-sm" role="group">
            <button type="button" class="btn btn-secondary {{ $currentFilter === 'todas' ? 'active' : '' }}"
                onclick="filterDenuncias('todas')">Todas</button>
            <button type="button" class="btn btn-secondary {{ $currentFilter === 'pendentes' ? 'active' : '' }}"
                onclick="filterDenuncias('pendentes')">Pendentes</button>
            <button type="button" class="btn btn-secondary {{ $currentFilter === 'andamento' ? 'active' : '' }}"
                onclick="filterDenuncias('andamento')">Em Andamento</button>
            <button type="button" class="btn btn-secondary {{ $currentFilter === 'concluidas' ? 'active' : '' }}"
                onclick="filterDenuncias('concluidas')">Concluídas</button>
        </div>
    </div>
    
    <div>
        <img src="/logo2.png" alt="Logo" />
    </div>
</header>

<main>
    <div class="container position-relative">
        <div class="row">
            <div class="col-md-9 offset-md-1">
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
                        <li class="list-group-item d-flex justify-content-between align-items-center denuncia">
                            <div>
                                <h4>
                                    <a href="{{ route('denuncia.show', $report->id) }}" class="text-decoration-none text-reset">
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
           
            <div class="col-md-1 ms-5 mt-4" style="position: absolute; right: 0;">
                <div class="d-flex justify-content-center align-items-center">
                    <a href="{{ route('fazer-denuncia') }}" class="btn btn-primary btn-lg">
                        <i class="fa-solid fa-plus"></i>
                    </a>
                    <button type="button" class="btn btn-secondary btn-lg ms-3" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fa-solid fa-right-from-bracket"></i>
                    </button>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    function filterDenuncias(filter) {
        window.location.href = "{{ route('denuncias.index') }}?filter=" + filter;
    }
</script>

@endsection
