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
        <div class="right-header">
            <a href="{{ route('fazer-denuncia') }}" class="btn btn-primary btn-lg">Nova Denúncia</a>
            <button type="button" class="btn btn-secondary btn-sm" style="margin-top: 10px"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Sair
            </button>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </header>

    <main>
        <div class="container">
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
                            <h3><a href="{{ route('denuncia.show', $report->id) }}">{{ $report->titulo }}</a></h3>
                            <p>{{ $report->descricao }}</p>
                            <span class="data">Data da denúncia: {{ $report->created_at->format('d/m/Y') }}</span>
                        </div>
                        <span
                            class="badge {{ $status === 'pendente' ? 'bg-warning' : ($status === 'andamento' ? 'bg-primary' : 'bg-success') }} text-light">
                            {{ ucfirst($status) }}
                        </span>
                    </li>
                @endforeach
            </ul>
        </div>
    </main>

    <script>
        function filterDenuncias(filter) {
            window.location.href = "{{ route('denuncias.index') }}?filter=" + filter;
        }
    </script>
@endsection
