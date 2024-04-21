<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Usuário</title>
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
            height: 10vh;
        }

        .cabecalho img {
            width: 70px;
        }

        .container-conteudo {
            padding: 20px;
            gap: 40px;
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
            <h3 class="text-white">Nova denúncia</h3>
        </div>
        <div>
            <img src="logo-branca.png" alt="">
        </div>
    </div>

    <div class="container-conteudo d-flex">
        <div class="row">
            <!-- formulário -->
            <div class="container-formulario ">
                <form method="POST" action="{{ route('fazer-denuncia') }}">
                    @csrf
                    <!-- Título -->
                    <div class="mb-3">
                        <label class="form-label">Título da denúncia</label>
                        <input name="titulo" class="form-control" placeholder="Digite o título aqui">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Data</label>
                        <input class="form-control" placeholder="01/01/2000">
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

                        <!-- tipo denúncia -->
                        <div class="row">
                            <div class="col">
                                <br>
                                <p>Tipo de denúncia</p>
                            </div>
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <div class="rounded bg-light p-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="tipo-assedio-moral">
                                            <label class="form-check-label" for="checkbox1">Assédio Moral</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="rounded bg-light p-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="tipo-assedio-sexual">
                                            <label class="form-check-label" for="checkbox2">Assédio sexual</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="rounded bg-light p-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="tipo-furto">
                                            <label class="form-check-label" for="checkbox3">Furto</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <div class="rounded bg-light p-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="tipo-homofobia">
                                            <label class="form-check-label" for="checkbox1">Homofobia</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="rounded bg-light p-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="tipo-transfobia">
                                            <label class="form-check-label" for="checkbox2">Transfobia</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="rounded bg-light p-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="tipo-bullying">
                                            <label class="form-check-label" for="checkbox3">Bullying</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <div class="rounded bg-light p-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="tipo-religiosa">
                                            <label class="form-check-label" for="checkbox1">Discriminação
                                                religiosa</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="rounded bg-light p-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="tipo-atentado-pudor">
                                            <label class="form-check-label" for="checkbox2">Atentado ao pudor</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="rounded bg-light p-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="tipo-outros">
                                            <label class="form-check-label" for="checkbox3">Outros</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <label for="descricao" class="form-label">Descrição:</label>
                            <textarea name="descricao" class="form-control w-100" id="descricao" rows="8" placeholder="Digite a descrição aqui"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="anexos" class="form-label">Anexos:</label>
                            <div class="input-group">
                                <input type="file" class="form-control" id="anexos" multiple>
                                <span class="input-group-text"><i class="bi bi-upload"></i></span>
                            </div>
                        </div>
                        <div class="d-grid gap-2">
                            <button class="btn btn-secondary" type="button">Voltar</button>
                            <button class="btn btn-primary" type="submit">Denunciar</button>
                        </div>
                </form>
            </div>
        </div>

    </div>

    <!-- informações  -->
    <div class="container-informacoes">

        <div class="stepper d-flex flex-column mt-5 ml-2">
            <div class="d-flex mb-1">
                <div class="d-flex flex-column pr-4 align-items-center">
                    <div class="rounded-circle py-2 px-3 bg-primary text-white mb-1">1</div>
                    <div class="line h-100"></div>
                </div>
                <div class="ml-4">
                    <h6 class="text-dark">Preencher denúncia</h6>
                    <p class="lead text-muted pb-3">Forneça detalhes da situação que deseja denunciar</p>
                </div>
            </div>
            <div class="d-flex mb-1">
                <div class="d-flex flex-column pr-4 align-items-center">
                    <div class="rounded-circle py-2 px-3 bg-primary text-white mb-1">2</div>
                    <div class="line h-100"></div>
                </div>
                <div>
                    <h6 class="text-dark">Envio da denúncia</h6>
                    <p class="lead text-muted pb-3">Clique em denunciar para submeter a sua denúncia, revise antes de
                        enviar</p>
                </div>
            </div>
            <div class="d-flex mb-1">
                <div class="d-flex flex-column pr-4 align-items-center">
                    <div class="rounded-circle py-2 px-3 bg-primary text-white mb-1">3</div>
                    <div class="line h-100"></div>
                </div>
                <div>
                    <h6 class="text-dark">Protocolo e credenciais</h6>
                    <p class="lead text-muted pb-3">Após o envio, será gerado um protocolo e suas credenciais
                        para que você possa logar e consultar suas denúncias de forma segura!</p>
                </div>
            </div>
            <div class="d-flex mb-1">
                <div class="d-flex flex-column pr-4 align-items-center">
                    <div class="rounded-circle py-2 px-3 bg-primary text-white mb-1">4</div>
                    <div class="line h-100"></div>
                </div>
                <div>
                    <h6 class="text-dark">Análise inicial</h6>
                    <p class="lead text-muted pb-3">O administrador revisa sua denúncia para entender a gravidade da
                        situação e
                        delegar um analista responsável pelo seu atendimento.</p>
                </div>
            </div>
            <div class="d-flex mb-1">
                <div class="d-flex flex-column pr-4 align-items-center">
                    <div class="rounded-circle py-2 px-3 bg-primary text-white mb-1">5</div>
                    <div class="line h-100"></div>
                </div>
                <div>
                    <h6 class="text-dark">Investigação</h6>
                    <p class="lead text-muted pb-3">Uma equipe conduz uma investigação minuciosa, coletando evidências
                        adicionais,
                        fique atento as atualizações de status.</p>
                </div>
            </div>
            <div class="d-flex mb-1">
                <div class="d-flex flex-column pr-4 align-items-center">
                    <div class="rounded-circle py-2 px-3 bg-primary text-white mb-1">6</div>
                    <div class="line h-100 d-none"></div>
                </div>
                <div>
                    <h6 class="text-dark">Resolução e encerramento</h6>
                    <p class="lead text-muted pb-3">Você será informado sobre as medidas tomadas em resposta à
                        denúncia.</p>
                </div>
            </div>

        </div>

        <!-- dropdown NÃO FUNCIONAA -->
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Botão dropdown
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="#">Alguma ação</a>
                <a class="dropdown-item" href="#">Outra ação</a>
                <a class="dropdown-item" href="#">Alguma coisa aqui</a>
            </div>
            <br><br><br><br>
        </div>

        <img src="bem-estar.png" alt="">
    </div>
    </div>
</body>

</html>
