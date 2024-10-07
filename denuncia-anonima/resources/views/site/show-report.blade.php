@extends('head')

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
                        Detalhes da Denúncia
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
                            @if ($denuncia->arquivo)
                                <div class="file-display">
                                    <i class="fa-solid fa-cloud-arrow-down pe-2"></i>
                                    <a href="{{ asset('storage/' . $denuncia->arquivo) }}" target="_blank"
                                        class="text-reset text-decoration-none">
                                        {{ $denuncia->nome_arquivo }}
                                    </a>
                                </div>
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


                <div id="chat-button" class="chat-button">
                    <button class="btn btn-primary">
                        <i class="fa-solid fa-comments"></i> Chat
                    </button>
                </div>

                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">Chat</div>

                                <div class="card-body">
                                    <div id="chat-messages"
                                        style="height: 300px; overflow-y: auto; border: 1px solid #ccc; padding: 10px;">
                                        <!-- Mensagens serão exibidas aqui -->
                                        @foreach ($messages as $message)
                                            <p>{{ $message->user->name }}: {{ $message->mensagem }}</p>
                                        @endforeach
                                    </div>

                                    <div class="mt-3">
                                        <input type="text" id="chat-input" class="form-control"
                                            placeholder="Digite sua mensagem">
                                        <button id="send-message" class="btn btn-primary mt-2">Enviar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    </body>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/laravel-echo/1.11.1/echo.iife.js"></script>
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            console.log('content loaded')
            const sendMessageButton = document.getElementById('send-message');
            const chatMessages = document.getElementById('chat-messages');
            const chatInput = document.getElementById('chat-input');
            const denunciaId = {{ $denuncia->id }}; // ID da denúncia
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            console.log("csrfToken", csrfToken);
            // Enviar a mensagem via AJAX
            sendMessageButton.addEventListener('click', function() {
                console.log(denunciaId)
                const message = chatInput.value.trim();
                if (message !== '') {
                    fetch('/chat/send', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': csrfToken,
                            },
                            body: JSON.stringify({
                                mensagem: message,
                                id_denuncia: denunciaId
                            }),
                        })
                        .then(response => {
                            console.log('Status Code:', response
                                .status); // Verifique o código de status da resposta
                            if (!response.ok) {
                                throw new Error(`HTTP error! Status: ${response.status}`);
                            }
                            return response.json();
                        })
                        .then(data => {
                            if (data.success) {
                                chatInput.value = '';
                                console.log('Mensagem enviada com sucesso:', data);
                            }
                        })
                        .catch(error => {
                            console.error('Erro ao enviar mensagem:', error);
                        });
                }
            });

            // Escutar novas mensagens via WebSocket com Laravel Echo
            // window.Echo = new Echo({
            //     broadcaster: 'pusher',
            //     key: '{{ env('MIX_PUSHER_APP_KEY') }}',
            //     cluster: '{{ env('MIX_PUSHER_APP_CLUSTER') }}',
            //     forceTLS: true,
            //     encrypted: true,
            //     authEndpoint: '/broadcasting/auth', // Endereço padrão para autenticação de canais privados
            //     auth: {
            //         headers: {
            //             'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
            //                 'content')
            //         }
            //     }
            // });


            console.log("denunciaId", denunciaId);
            console.log("MIX_PUSHER_APP_KEY", '{{ env('MIX_PUSHER_APP_KEY') }}');
            console.log("MIX_PUSHER_APP_CLUSTER", '{{ env('MIX_PUSHER_APP_CLUSTER') }}');

            window.Echo = new Echo({
                broadcaster: 'pusher',
                key: '{{ env('MIX_PUSHER_APP_KEY') }}', // Use a variável de ambiente correta
                cluster: '{{ env('MIX_PUSHER_APP_CLUSTER') }}',
                forceTLS: true,
                authEndpoint: '/broadcasting/auth', // O endpoint correto para autenticação
                auth: {
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                            'content')
                    }
                }
            });


            // Inscreva-se no canal privado
            window.Echo.private(`chat.${denunciaId}`)
                .listen('MessageSent', (e) => {
                    console.log('Evento MessageSent recebido:', e);
                    const messageElement = document.createElement('p');
                    messageElement.textContent = `${e.message.user.name}: ${e.message.mensagem}`;
                    chatMessages.appendChild(messageElement);

                    // Scroll para a última mensagem
                    chatMessages.scrollTop = chatMessages.scrollHeight;
                })
                .error((error) => {
                    console.error('Erro ao se inscrever no canal:', error);
                });


            // const pusher = new Pusher('83be7c45c7f8e32c2528', {
            //     cluster: 'sa1',
            //     forceTLS: true,
            // });

            // // Inscreva-se no canal privado
            // const channel = pusher.subscribe(`chat.${denunciaId}`);
            // channel.bind('MessageSent', function(data) {
            //     console.log('Evento MessageSent recebido:', data);
            //     const messageElement = document.createElement('p');
            //     messageElement.textContent = `${data.message.user.name}: ${data.message.mensagem}`;
            //     document.getElementById('chatMessages').appendChild(messageElement);

            //     // Scroll para a última mensagem
            //     const chatMessages = document.getElementById('chatMessages');
            //     chatMessages.scrollTop = chatMessages.scrollHeight;
            // });


        });
    </script>
@endsection
