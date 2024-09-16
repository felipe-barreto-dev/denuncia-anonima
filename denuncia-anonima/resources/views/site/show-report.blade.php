@extends('head')

@section('title', 'Detalhes denúncia')

@section('content')
<body>
    <div class="cabecalho">
        <div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="rounded border border-danger bg-danger text-white py-2 px-4"> <strong>Sair</strong> </button>
            </form>
        </div>
        <div>
            <h3 class="text-white">Detalhes da denúncia</h3>
        </div>
        <div>
            <img src="../../imagens/logo-branca.png" alt="">
        </div>
    </div>

    <div class="container-conteudo d-flex">


        <!-- formulário -->
        <div class="container-formulario ">
            <form>
                @csrf
                <div class="mb-3">
                    <label class="form-label">Protocolo</label>
                    <input name="titulo" class="form-control" value={{ $denuncia->protocolo }} readonly>
                </div>
                <!-- Título -->
                <div class="mb-3">
                    <label class="form-label">Título da denúncia</label>
                    <input name="titulo" class="form-control" value={{ $denuncia->titulo }} readonly>
                </div>

                <!-- Data -->
                <div class="mb-3">
                    <label class="form-label">Data do ocorrido</label>
                    <input name="data" class="form-control" value={{ $denuncia->data_ocorrido }} readonly>
                </div>

                <!-- Pessoas afetadas (radio buttons para permitir apenas uma seleção) -->
                <div class="mb-3">
                    <p>Pessoas afetadas</p>
                    <div class="d-flex gap-2">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pessoas_afetadas" id="afetados-alunos"
                                value="Alunos" disabled checked>
                            <label class="form-check-label" for="afetados-alunos">Alunos</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pessoas_afetadas"
                                id="afetados-funcionarios" value="Funcionários" disabled>
                            <label class="form-check-label" for="afetados-funcionarios">Funcionários</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pessoas_afetadas" id="afetados-outros"
                                value="Outros" disabled>
                            <label class="form-check-label" for="afetados-outros">Outros</label>
                        </div>
                    </div>
                </div>

                <!-- Tipo de denúncia (checkboxes para permitir múltiplas seleções) -->
                <div class="mb-3">
                    <p>Tipo de denúncia</p>
                    <div class="d-flex gap-2">
                        @foreach ($denuncia->tiposDenuncia as $tipoDenuncia)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="tipoDenuncia-{{ $tipoDenuncia->id }}"
                                    checked disabled>
                                <label class="form-check-label"
                                    for="tipoDenuncia-{{ $tipoDenuncia->id }}">{{ $tipoDenuncia->titulo }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Descrição -->
                <div class="mb-3">
                    <label for="descricao" class="form-label">Descrição:</label>
                    <textarea name="descricao" class="form-control w-100" id="descricao" rows="8" readonly>{{ $denuncia->descricao }}</textarea>
                </div>

               <div class="file-display-container mt-3 mb-4">
    @if ($denuncia->arquivo)
        <div class="file-display">
            <i class="fa-solid fa-cloud-arrow-down pe-2"></i>
            <a href="{{ asset('storage/' . $denuncia->arquivo) }}" target="_blank" class="text-reset text-decoration-none">
                {{ $denuncia->nome_arquivo }}
            </a>
        </div>
    @else
        <p class="no-file">Não há arquivo anexado.</p>
    @endif
</div>


                <!-- Botões -->
                <div class="d-grid gap-2">
                    <a href="{{ route('denuncias.index') }}" class="btn btn-secondary">Voltar</a>
                </div>
            </form>
        </div>

        <!-- andamento da denúncia -->
        <div class="container-andamento">

            <div class="stepper d-flex flex-column mt-5 ml-2">
                <div class="d-flex mb-1 ">
                    <div class="d-flex flex-column pr-4 align-items-center">
                        <div class="rounded-circle py-2 px-3 bg-purple text-white mb-1">1</div>
                        <div class="line h-100"></div>
                    </div>
                    <div class="ms-4">
                        <h6 class="text-dark">Em análise</h6>
                        <p class="lead text-muted pb-3">A denúncia foi recebida e está sendo revisada pelos responsáveis
                            pelo processo de investigação.</p>
                    </div>
                </div>
                <div class="d-flex mb-1">
                    <div class="d-flex flex-column pr-4 align-items-center">
                        <div class="rounded-circle py-2 px-3 bg-purple text-white mb-1">2</div>
                        <div class="line h-100"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="text-dark">Em andamento</h6>
                        <p class="lead text-muted pb-3">A investigação sobre a denúncia está em curso, e estão sendo
                            tomadas medidas para resolver o problema.</p>
                    </div>
                </div>
                <div class="d-flex mb-1">
                    <div class="d-flex flex-column pr-4 align-items-center">
                        <div class="rounded-circle py-2 px-3 bg-secondary text-white mb-1">3</div>
                        <div class="line h-100"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="text-dark">Aguardando mais informações</h6>
                        <p class="lead text-muted pb-3">Mais informações são necessárias para continuar com a
                            investigação da denúncia, verifique seu chat.</p>
                    </div>
                </div>
                <div class="d-flex mb-1">
                    <div class="d-flex flex-column pr-4 align-items-center">
                        <div class="rounded-circle py-2 px-3 bg-secondary text-white mb-1">4</div>
                    </div>
                    <div class="ms-3">
                        <h6 class="text-dark">Resolvida</h6>
                        <p class="lead text-muted pb-3">O problema relatado na denúncia foi identificado e resolvido de
                            forma satisfatória.</p>
                    </div>
                </div>

                @if (is_null($denuncia->data_conclusao) &&
                        (auth()->user()->perfil->nome === 'admin' || auth()->user()->perfil->nome === 'analista'))
                    <div class="d-grid gap-2">
                        <form method="POST" action="{{ route('denuncia.concluir', $denuncia->id) }}">
                            @csrf
                            <button class="btn btn-secondary" type="submit">Concluir Denúncia</button>
                        </form>
                    </div>
                @endif

                @if (is_null($denuncia->id_responsavel) && auth()->user()->perfil->nome === 'admin')
                    <div class="d-grid gap-2 mt-4">
                        <form method="POST" action="{{ route('denuncia.delegar', $denuncia->id) }}">
                            @csrf
                            <div class="mb-3">
                                <label for="responsavel" class="form-label">Selecionar Analista:</label>
                                <select name="id_responsavel" id="responsavel" class="form-select" required>
                                    <option value="">Escolha um analista</option>
                                    @foreach ($analistas as $analista)
                                        <option value="{{ $analista->id }}">{{ $analista->login }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button class="btn btn-primary" type="submit">Atribuir Analista</button>
                        </form>
                    </div>
                @endif

            </div>
        </div>
</body>
@endsection
