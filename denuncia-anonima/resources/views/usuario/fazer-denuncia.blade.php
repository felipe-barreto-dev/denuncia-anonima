<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fazer denúncia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <style>
        .cabecalho {
            justify-content: space-between;
            position: relative;
            display: flex;
            align-items: center;
            /* Centraliza verticalmente */
            padding: 20px;
            background-color: #17A2B8;
            height: 15vh;
            height: 15vh;
        }

        .cabecalho img {
            width: 80px;
            width: 80px;
        }

        .container-conteudo {
            width: 100%;
            display: flex;
            flex-direction: row;

        }

        .container-informacoes {
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

        <div class="">

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="rounded border border-danger bg-danger text-white" > <strong>Log out</strong> </button>
                <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                          this.closest('form').submit();">
                    {{ __('Log Out') }}
                </x-dropdown-link>
            </form>
        </div>

        <div>
            <h3 class="text-white">Nova denúncia</h3>
        </div>
        <div>
            <img src="../../imagens/logo-branca.png" alt="">
            <img src="../../imagens/logo-branca.png" alt="">
        </div>
    </div>

    <div class="container-conteudo d-flex">

        <!-- formulário -->
        <div class="container-formulario ">
            <form method="POST" action="{{ route('fazer-denuncia') }}">
                @csrf
                <!-- Título -->
                <div class="mb-3">
                    <label class="form-label">Título da denúncia</label>
                    <input name="titulo" class="form-control" placeholder="Digite o título aqui">
                </div>

        <!-- formulário -->
        <div class="container-formulario ">
            <form method="POST" action="{{ route('fazer-denuncia') }}">
                @csrf
                <!-- Título -->
                <div class="mb-3">
                    <label class="form-label">Título da denúncia</label>
                    <input name="titulo" class="form-control" placeholder="Digite o título aqui">
                </div>

                <!-- Data -->
                <div class="mb-3">
                    <label class="form-label">Data</label>
                    <input name="data" class="form-control" placeholder="01/01/2000">
                </div>

                <!-- afetados  -->
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <p>Pessoas afetadas</p>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="afetados-alunos">
                                    <label class="form-check-label" for="checkbox1">Alunos</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="afetados-funcionarios">
                                    <label class="form-check-label" for="checkbox2">Funcionários</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="afetados-outros">
                                    <label class="form-check-label" for="checkbox3">Outros</label>
                                </div>
                            </div>
                        </div>
                    </div>

                <!-- Tipo de denúncia (checkboxes para permitir múltiplas seleções) -->
                <div class="mb-3">
                    <p>Tipo de denúncia</p>
                    @foreach ($tiposDenuncia as $tipoDenuncia)
                        <div class="form-check">
                            <input value="{{ $tipoDenuncia->id }}" class="form-check-input" type="checkbox"
                                name="tipos_denuncia[]">
                            <label class="form-check-label">{{ $tipoDenuncia->titulo }}</label>
                        </div>
                    @endforeach
                </div>

                <!-- Descrição -->
                <div class="mb-3">
                    <label for="descricao" class="form-label">Descrição:</label>
                    <textarea name="descricao" class="form-control w-100" id="descricao" rows="8"
                        placeholder="Digite a descrição aqui"></textarea>
                </div>

                <!-- Botões -->
                <div class="d-flex justify-content-end gap-2">
                    <button class="btn btn-secondary" type="button">Voltar</button>
                    <button class="btn btn-primary" type="submit">Denunciar</button>
                </div>
            </form>

        </div>

        <div class="container-informacoes">
        <div class="container-informacoes">

            <div class="stepper d-flex flex-column mt-5 ml-2">
                <div class="d-flex mb-1 ">
                    <div class="d-flex flex-column pr-4 align-items-center">
                        <div class="rounded-circle py-2 px-3 bg-purple text-white mb-1">1</div>
                        <div class="line h-100"></div>
                    </div>
                    <div class="ms-4">
                        <h6 class="text-dark">Preencher denúncia</h6>
                        <p class="lead text-muted pb-3"> Forneça detalhes da situação que deseja denunciar</p>
                    </div>
                </div>
                <div class="d-flex mb-1">
                    <div class="d-flex flex-column pr-4 align-items-center">
                        <div class="rounded-circle py-2 px-3 bg-purple text-white mb-1">2</div>
                        <div class="line h-100"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="text-dark">Envio da denúncia</h6>
                        <p class="lead text-muted pb-3">Clique em denunciar para submeter a sua denúncia, revise antes de
                            enviar</p>
                    </div>
                </div>
                <div class="d-flex mb-1">
                    <div class="d-flex flex-column pr-4 align-items-center">
                        <div class="rounded-circle py-2 px-3 bg-secondary text-white mb-1">3</div>
                        <div class="line h-100"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="text-dark">Protocolo e credenciais</h6>
                        <p class="lead text-muted pb-3">Após o envio, será gerado um protocolo e suas credenciais
                            para que você possa logar e consultar suas denúncias de forma segura!</p>
                    </div>
                </div>
                <div class="d-flex mb-1">
                    <div class="d-flex flex-column pr-4 align-items-center">
                        <div class="rounded-circle py-2 px-3 bg-secondary text-white mb-1">4</div>
                        <div class="line h-100"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="text-dark">Análise inicial</h6>
                        <p class="lead text-muted pb-3">O administrador revisa sua denúncia para entender a gravidade da
                            situação e
                            delegar um analista responsável pelo seu atendimento.</p>
                    </div>
                </div>
                <div class="d-flex mb-1">
                    <div class="d-flex flex-column pr-4 align-items-center">
                        <div class="rounded-circle py-2 px-3 bg-secondary text-white mb-1">5</div>
                        <div class="line h-100"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="text-dark">Investigação</h6>
                        <p class="lead text-muted pb-3">Uma equipe conduz uma investigação minuciosa, coletando evidências
                            adicionais,
                            fique atento as atualizações de status.</p>
                    </div>
                </div>
                <div class="d-flex mb-1">
                    <div class="d-flex flex-column pr-4 align-items-center">
                        <div class="rounded-circle py-2 px-3 bg-secondary text-white mb-1">6</div>
                        <div class="line h-100 d-none"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="text-dark">Resolução e encerramento</h6>
                        <p class="lead text-muted pb-3">Você será informado sobre as medidas tomadas em resposta à
                            denúncia.</p>
                    </div>
                </div>

            </div>

            <!-- Accordion -->
            <div class="dropdown">
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <strong>O que acontece depois que faço uma denúncia?</strong>
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                Após denunciar sua denúncia será designada ao devido responsável, que dará seguimento ao processo de análise e solução.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                <strong>Posso acompanhar o progresso da investigação da minha denúncia?</strong>
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">

                            <div class="accordion-body">
                                Através do protocolo e login e login gerados após a denúncia, é possível acompanhar o andamento de sua denúncia.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                <strong>há algum risco de minha identidade ser descoberta durante o processo?</strong>
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                Não, a privacidade do usuário é protegida
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="imagem-bem-estar">
                <br>
                <img width="100%" src="../../imagens/bem-estar.png" alt="">

            </div>
        </div>

    </div>



    </div>
</body>

</html>