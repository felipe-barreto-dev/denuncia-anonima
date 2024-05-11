@extends('head')

@section('title', 'Histórico de Denúncias')

@section('content')

    <header class="top-header">
        <div>
            <h2>Histórico de Denúncias</h2>
            <div class="btn-group btn-group-sm" role="group">
                <button type="button" class="btn btn-secondary" onclick="filterDenuncias('todas')">Todas</button>
                <button type="button" class="btn btn-secondary"
                    onclick="filterDenuncias('pendentes')">Pendentes</button>
                <button type="button" class="btn btn-secondary"
                    onclick="filterDenuncias('concluidas')">Concluídas</button>
            </div>
        </div>
        <div class="right-header">
            <a href="{{ route('fazer-denuncia') }}" class="btn btn-primary btn-lg">Nova Denúncia</a>
            <button type="button" class="btn btn-secondary btn-sm" style="margin-top: 10px"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Logout
            </button>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </header>

    <main>
        <div class="container">
            <ul class="list-group mt-3">
                <!-- Exemplo de registro -->
                @foreach ($userReports as $report)
                    <li class="list-group-item d-flex justify-content-between align-items-center denuncia">
                        <div>
                            <h3>{{ $report->titulo }}</h3>
                            <p>{{ $report->descricao }}</p>
                            <span class="data">Data da denúncia:</span>
                        </div>
                        <span class="badge bg-warning text-dark">Pendente</span>
                    </li>
                @endforeach
                <!-- Fim do exemplo -->
            </ul>
        </div>

    </main>
@endsection
