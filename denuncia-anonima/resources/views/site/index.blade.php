<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Histórico de Denúncias</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .top-header {
            background-color: #0d98d4;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .top-header h2 {
            margin: 30px;
            color: #fff;
        }

        .right-header {
            display: flex;
            flex-direction: column;
            justify-content: space-evenly;
            align-items: end;
            margin-right: 80px;
        }

        .btn-group-sm {
            font-weight: lighter;
            margin-left: 80px;
        }

        .btn-lg {
            padding: 10px 20px;
            font-size: 16px;
        }

        .btn-sm {
            padding: 5px 10px;
            font-size: 14px;
        }
    </style>
</head>

<body>

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

</body>

</html>
