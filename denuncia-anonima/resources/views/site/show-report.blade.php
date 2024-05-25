<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes denúncia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>

    <style>
        .cabecalho {
            justify-content: space-between;
            position: relative;
            display: flex;
            align-items: center;
            padding: 20px;
            background-color: #17A2B8;
            height: 10vh;
        }

        .cabecalho img {
            width: 80px;
        }

        .container-conteudo {
            width: 100%;
            display: flex;
            flex-direction: row;
        }

        .container-andamento {
            width: 50%;
            padding: 15px;
        }

        .container-formulario {
            width: 50%;
            padding: 15px;
        }

        .imagem-bem-estar img {
            border-radius: 20px;
        }

        .bg-purple {
            background-color: #738DED;
            display: flex;

        }

        .btn-chat {
            width: 200px;
            height: 200px;
            border-radius: 50%;
            border: 1.5px solid black;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: grey;
        }

        .d-btn {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .stepper {
            .line {
                width: 2px;
                background-color: lightgrey !important;
            }

            .lead {
                font-size: 1.1rem;
            }

        }
    </style>
</head>

<body>
    <div class="cabecalho">
        <div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="rounded border border-danger bg-danger text-white"> <strong>Log out</strong> </button>
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
            <form method="POST" action="{{ route('fazer-denuncia') }}">
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
                        @foreach($denuncia->tiposDenuncia as $tipoDenuncia)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="tipoDenuncia-{{ $tipoDenuncia->id }}" checked disabled>
                                <label class="form-check-label" for="tipoDenuncia-{{ $tipoDenuncia->id }}">{{ $tipoDenuncia->titulo }}
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Descrição -->
                <div class="mb-3">
                    <label for="descricao" class="form-label">Descrição:</label>
                    <textarea name="descricao" class="form-control w-100" id="descricao" rows="8" readonly>{{ $denuncia->descricao }}</textarea>
                </div>

                <!-- Botões -->
                <div class="d-grid gap-2">
                    <button class="btn btn-secondary" type="button">Voltar</button>
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
                        <div class="line h-100"></div>
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

</html>
