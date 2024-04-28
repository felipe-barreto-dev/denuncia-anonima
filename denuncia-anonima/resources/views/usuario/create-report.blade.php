<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criação de Denúncia</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        .top-header {
            width: 100vw;
            height: 15vh;
            background-color: #17A2B8;
            display: flex;
            justify-content: space-between;          
        }
        .logo img {
            max-width: 140px;
        }
        .main-form {
            display: flex;
            flex-direction: row;
        }
        .form-detais {
            width: 60vw;
            background-color:whitesmoke;  
            padding: 20px;
        }
        .form-progress {
            width: 50vw;
            background-color: whitesmoke; 
            padding: 20px; 
        }
        .form-group{
            margin: 30px;
        }
        .form-field{
            font-weight: bold;
            color: #000000;
            margin: 5px;
        }
       .input-field{
            border-radius: 12px;
            width: 400px;
            height: 42px;
            border: 1px solid grey;
       }
       .input-atachments{
        padding: 0px 5px 0px 1px;
        border: 1px solid grey;
        width: 600px;
        border-radius: 8px;
       }

        .form-control {
            width: 720px;
            height: 200px;
            border: 1px solid grey;
        }
         .checkbox-options {
            display: flex;
        }

        .checkbox-options .form-check {
            margin-right: 20px;
        }
        .tags {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            margin: 15px 15px 25px 15px;
            width: 700px;
            justify-content: center;            
        }
        .tag {
            padding: 5px 10px;
            background-color: #007bff;
            color: white;
            border-radius: 5px;
            cursor: pointer;
        }
        .tag.selected {
            background-color: #0056b3;
        }
        .stepper {
            .line {
                width: 2px;
                background-color: lightgrey !important;
            }
        }    
        /* Ajustando o tamanho do input do tipo de denúncia */
        #tipo_denuncia_input {
            width: 40vw; /* Ajustando o tamanho para ocupar a largura do container com um pouco de espaço extra */
            padding: 8px; /* Adicionando um pouco de espaço interno */
            margin-bottom: 10px; /* Adicionando um espaço inferior */
            border-radius: 25px;
        }
        /* Definindo o input do tipo de denúncia como apenas leitura */
        #tipo_denuncia_input {
            background-color: #f8f9fa; /* Adicionando uma cor de fundo para indicar que é apenas leitura */
            cursor: not-allowed; /* Mudando o cursor para indicar que não pode ser editado */
        }
              /* Media query para tornar o layout responsivo */
              @media (max-width: 840px) {
            .main-form {
                flex-direction: column;
            }

            .form-detais {
                width: 100%;
            }
            .form-progress {
                display: none; /* Oculta a div esquerda em telas menores */
            }
        }
        .form-progress h5{
            margin-left: 40px;
            margin-bottom: 0px;
            color: #333333;
        }
        .form-progress h6{
            margin-left: 20px;
            color: #333333;
        }
        .form-progress p{
            margin-left: 30px;
            color: #888888;
            font-size: 18px;
        }    
    </style>
</head>
<body>
    <header>
        <div class="top-header">
            <h2 class="Tittle" style="color: whitesmoke; padding:40px;">Detalhes da Denúncia</h2>
            <div class="logo"> 
                <img src="{{ asset('Imagens/logo.png') }}"></div>
        </div> 
    </header>

    <div class="main-form">
        <div class="form-detais">
            <h5>Formulário de Denúncia</h5>
            <div class="form-group row">
                <label class="form-field">Protocolo</label>
                <input type="text" class="input-field">
            </div>
            <div class="form-group row">
                <label class="form-field">Título da Denúncia</label>
                <input type="text" class="input-field">
            </div>
            <div class="form-group row">
                <label class="form-field">Data</label>
                <input type="date" class="input-field">
            </div>
            <div class="form-group row">
                <label class="form-field">Pessoas Afetadas</label>
                <div class="checkbox-options">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="students">
                        <label class="form-check-label" for="inlineCheckbox1">Estudantes</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="employees">
                        <label class="form-check-label" for="inlineCheckbox2">Funcionários</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="others">
                        <label class="form-check-label" for="inlineCheckbox3">Outros</label>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label class="form-field">Tipo de Denúncia</label>
                <input class="input-field" type="text" id="tipo_denuncia_input" placeholder="Selecione o tipo de denúncia abaixo" readonly>
                <div class="tags" id="tags">
            <!-- Tags serão adicionadas aqui -->    
                </div>
                    <div>
                        <label for="descricao" class="form-field">Descrição:</label>
                        <textarea name="descricao" class="form-control" id="descricao" rows="8" placeholder="Digite a descrição aqui"></textarea>
                    </div>
            <div class="mb-3">
                <label for="anexos" class="form-field">Anexos:</label>
                <div>
                    <input type="file" class="input-atachments" id="anexos" multiple>
                    <span class="input-group-text"><i class="bi bi-upload"></i></span>
                </div>
            </div>
            <div>
                <button class="btn btn-secondary" type="button">Voltar</button>
                <button class="btn btn-primary" type="submit">Denunciar</button>
            </div> 
                 
            </div>          
        </div>       
        <div class="form-progress">
            <h5>Progresso da Denúncia</h5>
                <div class="stepper d-flex flex-column mt-5 ml-2">
                <div class="d-flex mb-1">
                    <div class="d-flex flex-column pr-4 align-items-center">
                        <div class="rounded-circle py-2 px-3 bg-primary text-white mb-1">1</div>
                        <div class="line h-100"></div>
                    </div>
                    <div class="ml-4">
                        <h6>Preencher denúncia</h6>
                        <p>Forneça detalhes da situação que deseja denunciar</p>
                    </div>
                </div>
                <div class="d-flex mb-1">
                    <div class="d-flex flex-column pr-4 align-items-center">
                        <div class="rounded-circle py-2 px-3 bg-primary text-white mb-1">2</div>
                        <div class="line h-100"></div>
                    </div>
                    <div>
                        <h6>Envio da denúncia</h6>
                        <p>Clique em denunciar para submeter a sua denúncia, revise antes de
                            enviar</p>
                    </div>
                </div>
                <div class="d-flex mb-1">
                    <div class="d-flex flex-column pr-4 align-items-center">
                        <div class="rounded-circle py-2 px-3 bg-primary text-white mb-1">3</div>
                        <div class="line h-100"></div>
                    </div>
                    <div>
                        <h6>Protocolo e credenciais</h6>
                        <p>Após o envio, será gerado um protocolo e suas credenciais
                            para que você possa logar e consultar suas denúncias de forma segura!</p>
                    </div>
                </div>
                <div class="d-flex mb-1">
                    <div class="d-flex flex-column pr-4 align-items-center">
                        <div class="rounded-circle py-2 px-3 bg-primary text-white mb-1">4</div>
                        <div class="line h-100"></div>
                    </div>
                    <div>
                        <h6>Análise inicial</h6>
                        <p>O administrador revisa sua denúncia para entender a gravidade da
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
                        <h6>Investigação</h6>
                        <p>Uma equipe conduz uma investigação minuciosa, coletando evidências
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
                        <h6>Resolução e encerramento</h6>
                        <p>Você será informado sobre as medidas tomadas em resposta à
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
    </div>

    <script>
        // Tipos de denúncias pré-definidos
        const tiposDenuncia = ["Assédio Moral", "Assédio Sexual", "Bullying", "Discriminação Religiosa", "Furto", "Homofobia",
        "Injúria Racial", "Transfobia", "Atentando ao pudor", "Outros"];

        // Elemento de input
        const tipoDenunciaInput = document.getElementById('tipo_denuncia_input');

        // Elemento para adicionar as tags
        const tagsContainer = document.getElementById('tags');

        // Função para adicionar uma tag
        function addTag(tagName) {
            const tag = document.createElement('div');
            tag.classList.add('tag');
            tag.textContent = tagName;
            tag.addEventListener('click', () => {
                tag.classList.toggle('selected');
                updateInputValue();
            });
            tagsContainer.appendChild(tag);
        }

        // Adicionando as tags pré-definidas
        tiposDenuncia.forEach(addTag);

        // Função para atualizar o valor do input
        function updateInputValue() {
            const selectedTags = document.querySelectorAll('.tag.selected');
            tipoDenunciaInput.value = Array.from(selectedTags).map(tag => tag.textContent).join(', ');
        }
    </script>
</body>
</html>
