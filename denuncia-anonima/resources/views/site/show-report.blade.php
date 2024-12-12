@extends('head')


<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        /* Estilos para o botão flutuante */
        .chat-button {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 1000;
        }

        /* Estilos para o painel de chat */
        #chat {
            position: fixed;
            top: 0;
            right: -33vw;
            /* Inicialmente fora da tela */
            height: 100%;
            width: 33vw;
            background-color: #fff;
            box-shadow: -2px 0 5px rgba(0, 0, 0, 0.5);
            transition: right 0.3s ease;
            /* Animação de slide */
            z-index: 1000;
            padding: 20px;
            display: flex;
            flex-direction: column;
            overflow-y: auto;
            /* Permite rolagem se necessário */
        }

        /* Estilos para o título do chat */
        .chat-title {
            margin-bottom: 15px;
            font-weight: bold;
            color: #007bff;
            align-self: center;
            /* Cor do título */
        }

        /* Estilos para mensagens */
        #messagesContainer {
            flex-grow: 1;
            margin-bottom: 10px;
            overflow-y: auto;
            /* Permite rolagem de mensagens */
        }

        .message {
            max-width: 80%;
            padding: 10px;
            border-radius: 5px;
            margin: 5px 0;
            position: relative;
            word-wrap: break-word;
        }

        .message-timestamp {
            display: block;
            font-size: 0.8rem;
            /* Tamanho da fonte menor */
            color: #6c757d;
            /* Cor cinza para a data */
            margin-top: 5px;
            /* Espaçamento acima */
            text-align: right;
            /* Alinha a data à direita */
        }

        .message.sender {
            background-color: #007bff;
            /* Azul para o remetente */
            color: white;
            margin-left: auto;
            margin-right: 10px;
            /* Alinha à direita */

            .message-timestamp {
                color: white;
            }
        }

        .message.receiver {
            background-color: #e9ecef;
            /* Cinza para o receptor */
            color: black;
            margin-right: auto;
            margin-left: 10px;
            /* Alinha à esquerda */
        }

        .message.sender::after,
        .message.receiver::before {
            content: '';
            position: absolute;
            width: 0;
            height: 0;
        }

        .message.sender::after {
            border-left: 10px solid #007bff;
            /* Cor do triângulo */
            border-top: 10px solid transparent;
            border-bottom: 10px solid transparent;
            right: -10px;
            /* Posição da ponta */
            top: 15px;
            /* Alinha verticalmente */
        }

        .message.receiver::before {
            border-right: 10px solid #e9ecef;
            /* Cor do triângulo */
            border-top: 10px solid transparent;
            border-bottom: 10px solid transparent;
            left: -10px;
            /* Posição da ponta */
            top: 15px;
            /* Alinha verticalmente */
        }

        #chat.active {
            right: 0;
            /* Mostra o chat quando ativo */
        }

        /* Estilos para o botão de fechar */
        .close-button {
            background: none;
            border: none;
            font-size: 30px;
            cursor: pointer;
            color: #dc3545;
            margin-bottom: 15px;
            transition: transform 0.2s;
            align-self: flex-start;
        }
    </style>
</head>

@section('title', 'Detalhes denúncia')

@section('content')

    <body>
        <header class="background-padrao">
            <div class="container-fluid">
                <div class="row py-2">
                    <div class="col-md-3 logo-center order-1 order-md-3 col-12">
                        <img src="/logo2.png" width="146px" height="96px" alt="Logo" />
                    </div>
                    <div class="col-md-6 font-size-titles text-white margin-top-title-create order-2 order-md-2 col-12">
                        Detalhes da denúncia
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
                    <form>
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Protocolo</label>
                            <input name="titulo" class="form-control" value={{ $denuncia->protocolo }} readonly>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Título da denúncia</label>
                            <input name="titulo" class="form-control" value={{ $denuncia->titulo }} readonly>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Data do ocorrido</label>
                            <input name="data_ocorrido" class="form-control"
                                value="{{ \Carbon\Carbon::parse($denuncia->data_ocorrido)->format('d/m/Y') }}" readonly>
                        </div>

                        <div class="mb-3">
                            <p>Pessoas afetadas</p>
                            <div class="d-flex gap-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="pessoas_afetadas"
                                        id="afetados-alunos" value="Alunos" disabled checked>
                                    <label class="form-check-label" for="afetados-alunos">Alunos</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="pessoas_afetadas"
                                        id="afetados-funcionarios" value="Funcionários" disabled>
                                    <label class="form-check-label" for="afetados-funcionarios">Funcionários</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="pessoas_afetadas"
                                        id="afetados-outros" value="Outros" disabled>
                                    <label class="form-check-label" for="afetados-outros">Outros</label>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <p>Tipo de denúncia</p>
                            <div class="d-flex gap-2">
                                @foreach ($denuncia->tiposDenuncia as $tipoDenuncia)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox"
                                            id="tipoDenuncia-{{ $tipoDenuncia->id }}" checked disabled>
                                        <label class="form-check-label"
                                            for="tipoDenuncia-{{ $tipoDenuncia->id }}">{{ $tipoDenuncia->titulo }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="descricao" class="form-label">Descrição:</label>
                            <textarea name="descricao" class="form-control w-100" id="descricao" rows="8" readonly>{{ $denuncia->descricao }}</textarea>
                        </div>

                        <div class="file-display-container mt-3 mb-4">
                            @if ($denuncia->anexos->count() > 0)
                                @foreach ($denuncia->anexos as $anexo)
                                    <div class="file-display mb-3">
                                        <i class="fa-solid fa-cloud-arrow-down pe-2"></i>
                                        <a href="{{ asset('storage/' . $anexo->caminho_arquivo) }}" target="_blank"
                                            class="text-reset text-decoration-none">
                                            {{ $anexo->nome_arquivo }}
                                        </a>
                                    </div>
                                @endforeach
                            @else
                                <p class="no-file">Não há arquivo anexado.</p>
                            @endif
                        </div>

                        <div class="d-grid gap-2">
                            <a href="{{ route('denuncias.index') }}" class="btn btn-secondary">Voltar</a>
                        </div>
                    </form>
                </div>

                <div class="container-andamento">
                    <div class="stepper d-flex flex-column mt-5 ml-2">
                        <div class="d-flex mb-1">
                            <div class="d-flex flex-column pr-4 align-items-center">
                                <div class="rounded-circle py-2 px-3 bg-purple text-white mb-1">1</div>
                                <div class="line h-100"></div>
                            </div>
                            <div class="ms-4">
                                <h6 class="text-dark">Em análise</h6>
                                <p class="lead text-muted pb-3">A denúncia foi recebida e está sendo revisada pelos
                                    responsáveis pelo processo de investigação.</p>
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
                                <p class="lead text-muted pb-3">O problema relatado na denúncia foi identificado e
                                    resolvido de forma satisfatória.</p>
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
            </div>

            <div id="chat-button" class="chat-button">
                <button class="btn btn-primary" id="toggleChatButton">
                    <i class="fa-solid fa-comments"></i> Chat
                </button>
            </div>

            <div id="chat">
                <button class="close-button" id="closeChatButton">&times;</button>
                <h4 class="chat-title">Protocolo: {{ $denuncia->protocolo }}</h4> <!-- Título com o protocolo -->
                <input type="hidden" id="denunciaId" value="{{ $denuncia->id }}">
                <div id="messagesContainer">
                </div>
                <div class="d-flex align-items-center p-3 bg-light rounded shadow-sm">
                    <input id="messageInput" type="text" placeholder="Digite sua mensagem..."
                        class="form-control me-2" aria-label="Mensagem" />
                    <button type="button" class="btn btn-primary" id="sendButton">
                        Enviar
                    </button>
                </div>
            </div>

    </body>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const currentUserId = {{ Auth::id() }};
            const sendButton = document.getElementById('sendButton');
            const messageInput = document.getElementById('messageInput');
            const messagesContainer = document.getElementById('messagesContainer');
            const denunciaId = document.getElementById('denunciaId').value;
            const chatPanel = document.getElementById('chat');
            const toggleChatButton = document.getElementById('toggleChatButton');
            const closeChatButton = document.getElementById('closeChatButton');

            // Armazena as IDs das mensagens já exibidas
            const displayedMessageIds = new Set();

            // Função para enviar mensagem
            sendButton.addEventListener('click', function() {
                const mensagem = messageInput.value;

                if (mensagem.trim() !== '') {
                    fetch('/chat/send', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                    .getAttribute('content')
                            },
                            body: JSON.stringify({
                                mensagem: mensagem,
                                denuncia_id: denunciaId
                            })
                        })
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Erro ao enviar a mensagem.');
                            }
                            return response.json();
                        })
                        .then(data => {
                            messageInput.value = '';
                            fetchMessages(); // Atualiza as mensagens após enviar
                        })
                        .catch(error => {
                            console.error(error);
                            alert('Erro ao enviar mensagem.');
                        });
                }
            });

            // Função para buscar mensagens com short polling
            function fetchMessages() {
                fetch(`/chat/fetch/${denunciaId}`)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Erro ao buscar mensagens.');
                        }
                        return response.json();
                    })
                    .then(data => {
                        const messages = data.messages;

                        messages.forEach(msg => {
                            // Verifica se a mensagem já foi exibida
                            if (!displayedMessageIds.has(msg.id)) {
                                displayedMessageIds.add(msg
                                .id); // Adiciona a ID da mensagem ao conjunto

                                // Cria o elemento da mensagem
                                const messageElement = document.createElement('div');
                                messageElement.classList.add('message', msg.user.id === currentUserId ?
                                    'sender' : 'receiver');
                                messageElement.textContent = `${msg.mensagem}`;

                                // Formata a data
                                const originalDate = new Date(msg.data_envio);
                                const formattedDate = originalDate.toLocaleString('pt-BR', {
                                    day: '2-digit',
                                    month: '2-digit',
                                    year: 'numeric',
                                    hour: '2-digit',
                                    minute: '2-digit'
                                });

                                // Cria o elemento de data
                                const dateElement = document.createElement('span');
                                dateElement.classList.add('message-timestamp');
                                dateElement.textContent = formattedDate;

                                // Adiciona a data e a mensagem ao contêiner
                                messageElement.appendChild(dateElement);
                                messagesContainer.appendChild(messageElement);
                            }
                        });
                    })
                    .catch(error => {
                        console.error(error);
                    });
            }

            // Chama a função de busca a cada 5 segundos
            setInterval(fetchMessages, 5000);

            // Toggle do chat
            toggleChatButton.addEventListener('click', () => {
                chatPanel.classList.toggle('active');
            });

            // Fechar o chat
            closeChatButton.addEventListener('click', () => {
                chatPanel.classList.remove('active');
            });

            // Iniciar o short polling
            fetchMessages(); // Chama uma vez ao carregar
        });
    </script>

@endsection
