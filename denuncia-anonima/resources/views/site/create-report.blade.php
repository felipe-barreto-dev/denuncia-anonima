@extends('head')

@section('title', 'Fazer denúncia')

@section('content')
<body>
<header class="background-padrao">
    <div class="container-fluid">
        <div class="row py-2">
            <div class="col-md-3 logo-center order-1 order-md-3 col-12">
                <img src="/logo2.png" width="146px" height="96px" alt="Logo" />
            </div>
            <div class="col-md-6 font-size-titles text-white margin-top-title-create order-2 order-md-2 col-12">
                Nova denúncia
            </div>
            <div class="col-md-3 margin-top-button-back-create order-3 order-md-1 col-12">
                <a href="{{ route('denuncias.index') }}" class="btn btn-secondary btn-lg py-2 px-4 ms-3">
                    <i class="fa-solid fa-arrow-left"></i>
                </a>
            </div>
        </div>
    </div>
</header>

<main>
    <div class="container-conteudo d-flex">
        <div class="container-formulario">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" id="denunciaForm" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Título da denúncia</label>
                    <input name="titulo" class="form-control" placeholder="Digite o título aqui">
                    <div class="error-message" id="error-titulo">Campo obrigatório</div>
                </div>

                <div class="mb-3 position-relative">
                <label class="form-label">Data do ocorrido</label>
                <div class="input-group">
                    <input name="data_ocorrido" type="date" class="form-control" id="datetimepicker" max="">
                </div>
                <div class="error-message" id="error-data">Campo obrigatório</div>
            </div>

                <div class="mb-3">
                    <p>Pessoas afetadas</p>
                    <div class="d-flex gap-2">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pessoas_afetadas" id="afetados-alunos" value="Alunos">
                            <label class="form-check-label" for="afetados-alunos">Alunos</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pessoas_afetadas" id="afetados-funcionarios" value="Funcionários">
                            <label class="form-check-label" for="afetados-funcionarios">Funcionários</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pessoas_afetadas" id="afetados-outros" value="Outros">
                            <label class="form-check-label" for="afetados-outros">Outros</label>
                        </div>
                    </div>
                    <div class="error-message" id="error-pessoas-afetadas">Campo obrigatório</div>
                </div>

                <div class="mb-3">
                    <p>Tipo de denúncia</p>
                    <div class="d-flex flex-wrap gap-2">
                        @foreach ($tiposDenuncia as $tipoDenuncia)
                            <div class="d-flex align-items-center py-2 px-4 bg-secondary rounded-2">
                                <input class="rounded-2" value="{{ $tipoDenuncia->id }}" type="checkbox" name="tipos_denuncia[]">
                                <label class="form-check-label ms-2">{{ $tipoDenuncia->titulo }}</label>
                            </div>
                        @endforeach
                    </div>
                    <div class="error-message" id="error-tipos-denuncia">Campo obrigatório</div>
                </div>

                <div class="mb-3">
                    <label for="descricao" class="form-label">Descrição:</label>
                    <textarea name="descricao" class="form-control w-100" id="descricao" rows="8" placeholder="Digite a descrição aqui"></textarea>
                    <div class="error-message" id="error-descricao">Campo obrigatório</div>
                </div>
                
                <label for="anexo" class="form-label">Anexe fotos ou vídeos</label>
                <div id="upload-container" class="d-flex justify-content-center align-items-center border rounded w-100 cursor-pointer">
                    <i class="fa-solid fa-cloud-arrow-up fs-3 p-3"></i>
                </div>
                
                <input type="file" name="arquivos[]" id="arquivos" multiple>
                @if ($errors->has('arquivos'))
                    <div class="text-danger">
                        {{ $errors->first('arquivos') }}
                    </div>
                @endif
        
                <div id="file-name-container"></div>
                
                <div class="d-grid gap-2 margin-28px">
                    <a href="{{ route('denuncias.index') }}" class="btn btn-secondary">Voltar</a>
                    <button type="button" class="btn btn-primary" onclick="showModal()">Denunciar</button>
                </div>

                <!-- Modal de Denúncia -->
                <div class="modal fade" id="modalDenuncia" tabindex="-1" aria-labelledby="modalDenunciaLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalDenunciaLabel">Confirmação da Denúncia</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p class="alert-footer fs-7 mt-2" style="font-weight: bold; font-size: 1.0rem;">
                                    <span style="font-size: 1.5rem; margin-right: 8px;">⚠️</span>Atenção, denunciação caluniosa é crime!
                                </p>
                             Deseja confirmar sua denúncia?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                <!-- Botão Confirmar -->
                                <button class="btn btn-primary" type="submit" form="denunciaForm">Confirmar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="container-informacoes">
            <div class="stepper d-flex flex-column mt-5 ml-2">
                <div class="d-flex mb-1">
                    <div class="d-flex flex-column pr-4 align-items-center">
                        <div class="rounded-circle py-2 px-3 bg-purple text-white mb-1">1</div>
                        <div class="line h-100"></div>
                    </div>
                    <div class="ms-4">
                        <h6 class="text-dark">Preencher denúncia</h6>
                        <p class="lead text-muted pb-3">Forneça detalhes da situação que deseja denunciar</p>
                    </div>
                </div>
                <div class="d-flex mb-1">
                    <div class="d-flex flex-column pr-4 align-items-center">
                        <div class="rounded-circle py-2 px-3 bg-purple text-white mb-1">2</div>
                        <div class="line h-100"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="text-dark">Envio da denúncia</h6>
                        <p class="lead text-muted pb-3">Clique em denunciar para submeter a sua denúncia, revise antes de enviar</p>
                    </div>
                </div>
                <div class="d-flex mb-1">
                    <div class="d-flex flex-column pr-4 align-items-center">
                        <div class="rounded-circle py-2 px-3 bg-secondary text-white mb-1">3</div>
                        <div class="line h-100"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="text-dark">Protocolo e credenciais</h6>
                        <p class="lead text-muted pb-3">Após o envio, será gerado um protocolo e suas credenciais para que você possa logar e consultar suas denúncias de forma segura!</p>
                    </div>
                </div>
                <div class="d-flex mb-1">
                    <div class="d-flex flex-column pr-4 align-items-center">
                        <div class="rounded-circle py-2 px-3 bg-secondary text-white mb-1">4</div>
                        <div class="line h-100"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="text-dark">Análise inicial</h6>
                        <p class="lead text-muted pb-3">O administrador revisa sua denúncia para entender a gravidade da situação e delegar um analista responsável pelo seu atendimento.</p>
                    </div>
                </div>
                <div class="d-flex mb-1">
                    <div class="d-flex flex-column pr-4 align-items-center">
                        <div class="rounded-circle py-2 px-3 bg-secondary text-white mb-1">5</div>
                        <div class="line h-100"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="text-dark">Investigação</h6>
                        <p class="lead text-muted pb-3">Uma equipe conduz uma investigação minuciosa, coletando evidências adicionais, fique atento às atualizações de status.</p>
                    </div>
                </div>
                <div class="d-flex mb-1">
                    <div class="d-flex flex-column pr-4 align-items-center">
                        <div class="rounded-circle py-2 px-3 bg-secondary text-white mb-1">6</div>
                        <div class="line h-100 d-none"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="text-dark">Resolução e encerramento</h6>
                        <p class="lead text-muted pb-3">Você será informado sobre as medidas tomadas em resposta à denúncia.</p>
                </div>
            </div>
        </div>

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
                            Após denunciar, sua denúncia será designada ao devido responsável, que dará seguimento ao processo de análise e solução.
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
                            Através do protocolo e login gerados após a denúncia, é possível acompanhar o andamento de sua denúncia.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            <strong>Há algum risco de minha identidade ser descoberta durante o processo?</strong>
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            Não, a privacidade do usuário é protegida.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
</body>

<script>
$(document).ready(function() {
    let filesList = []; // Array para armazenar os arquivos

    // Atualiza a exibição dos arquivos e o input
    function updateFileDisplay() {
        $('#file-name-container').empty();

        filesList.forEach((file, index) => {
            const fileClass = `file_${index}`;
            $('#file-name-container').append(`
                <div class="file-name ${fileClass} file-style d-flex justify-content-between align-items-center mt-3">
                    <div class="file-name-content">${file.name}</div>
                    <i class="fa-solid fa-trash trash-icon-color me-2 cursor-pointer" data-file-index="${index}"></i>
                </div>
            `);
        });

        // Remover arquivos da lista ao clicar no ícone de exclusão
        $('.trash-icon-color').off('click').on('click', function () {
            const fileIndex = $(this).data('file-index');
            filesList.splice(fileIndex, 1); // Remove o arquivo da lista
            updateFileDisplay(); // Atualiza a exibição
        });
    }

    // Quando novos arquivos são adicionados
    $('#arquivos').on('change', function (e) {
        const newFiles = Array.from(e.target.files);
        filesList = [...filesList, ...newFiles]; // Adiciona os novos arquivos à lista
        updateFileDisplay();

        // Reseta o input para permitir novas seleções de arquivos
        $('#arquivos').val('');
    });

    // Clique no container para abrir o input de upload
    $('#upload-container').on('click', function () {
        $('#arquivos').click();
    });

   $('#denunciaForm').on('submit', function (e) {
        e.preventDefault(); // Previne o envio tradicional do formulário

        const formData = new FormData(this); // Cria um FormData baseado no formulário

        // Adiciona os arquivos do filesList ao FormData
        filesList.forEach(file => {
            formData.append('arquivos[]', file);
        });

        // Envia via AJAX
        $.ajax({
            url: $(this).attr('action'), // Rota definida no formulário
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                if (response.redirect) {
                    window.location.href = response.redirect; // Redireciona o usuário
                } else {
                    alert(response.message || 'Denúncia enviada com sucesso!');
                }
            },
            error: function (xhr) {
                const errors = xhr.responseJSON.errors || {};
                const message = xhr.responseJSON.message || 'Erro ao enviar a denúncia.';
                console.log("string", xhr.responseJSON);
                alert(message);
            }
        });
    });

});

    // Definir a data máxima como o dia atual
$(document).ready(function() {
    const today = new Date().toISOString().split('T')[0];
    $('#datetimepicker').attr('max', today);
    document.querySelector('input[name="data_ocorrido"]').addEventListener('click', function() {
    this.showPicker();
});
});

function validateForm() {
    let valid = true;

    document.querySelectorAll('.error-message').forEach(function(el) {
        el.style.display = 'none';
    });

    const titulo = document.querySelector('input[name="titulo"]').value.trim();
    if (titulo === '') {
        document.getElementById('error-titulo').style.display = 'block';
        valid = false;
    }

    const data = document.querySelector('input[name="data_ocorrido"]').value.trim();
    if (data === '') {
        document.getElementById('error-data').style.display = 'block';
        valid = false;
    }

    const pessoasAfetadas = document.querySelector('input[name="pessoas_afetadas"]:checked');
    if (!pessoasAfetadas) {
        document.getElementById('error-pessoas-afetadas').style.display = 'block';
        valid = false;
    }

    const tiposDenuncia = document.querySelectorAll('input[name="tipos_denuncia[]"]:checked');
    if (tiposDenuncia.length === 0) {
        document.getElementById('error-tipos-denuncia').style.display = 'block';
        valid = false;
    }

    const descricao = document.querySelector('textarea[name="descricao"]').value.trim();
    if (descricao === '') {
        document.getElementById('error-descricao').style.display = 'block';
        valid = false;
    }

    return valid;
}

function showModal() {
    if (validateForm()) {
        var myModal = new bootstrap.Modal(document.getElementById('modalDenuncia'), {
            keyboard: false
        });
        myModal.show();
    }
}
</script>

@endsection
