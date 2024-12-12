@extends('head')

@section('title', 'Protocolo')

@section('content')
<body class="background-padrao">
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="form-container mx-4">
            <div class="text-center">
                <img src="{{ asset('Imagens/logo.png') }}" alt="" style="width: 8rem; height: 7rem;">
            </div>
            <div class="text-center mb-2">
                <h3>Muito obrigado!</h3>
                <p>
                    <h6 style="font-size: 0.9rem;"> <!-- Ajustando o tamanho do texto -->
                        Sua coragem é o primeiro passo para um ambiente acadêmico mais justo e seguro.
                        Contamos com você para construirmos juntos uma universidade melhor.
                    </h6>
                </p>
                <h5>O protocolo da sua denúncia é:</h5>
            </div>
            <!-- Numero do protocolo -->
            <div class="container-wrapper mb-2">
                <div class="container">
                    <div class="input-wrapper">
                        <input id="numberProtocol" value="{{ $details['protocolo'] }}" readonly />
                    </div>
                </div>
            </div>
            <!-- Login -->
            <div class="formulario mb-2">
                <label class="form-label">Login:</label>
                <div class="input-wrapper">
                    <input type="email" class="form-control" id="exampleInputEmail1" value="{{ $details['login'] }}" readonly>
                    <i class="copyLogin fa fa-copy"></i> <!-- Ícone para copiar o login -->
                </div>
            </div>
            <!-- Senha -->
            <div class="formulario mb-3"> <!-- Adicionando mb-3 para espaçamento -->
                <label class="form-label">Senha:</label>
                <div class="container-wrapper">
                    <div class="input-wrapper">
                        <input id="passwordField" type="password" value="{{ $details['password'] }}" readonly />
                        <i class="togglePassword fa-regular fa-eye"></i>
                    </div>
                </div>
            </div>

            <!-- Botão Confirmar -->
            <p>
                <a href="{{ route('denuncias.index') }}" class="btn btn-primary btn-sm">Continuar</a>
            </p>
            <footer>
                <p class="alert-footer fs-7 mt-2">Cuidado, denunciação caluniosa é crime!</p>
            </footer>
        </div>
    </div>
</body>

<script>
    // Script para copiar o login automaticamente
    $('.copyLogin').on('click', function() {
        var $copyText = $('#exampleInputEmail1');
        
        // Copiando o valor diretamente para a área de transferência
        navigator.clipboard.writeText($copyText.val())
        .then(function() {
            alert("Login copiado: " + $copyText.val());
        })
        .catch(function(err) {
            console.error("Falha ao copiar o texto: ", err);
        });
    });

    // Script para alternar visibilidade da senha
    $('.togglePassword').on('click', function() {
        var $passwordField = $('#passwordField');
        var type = $passwordField.attr('type') === 'password' ? 'text' : 'password';
        $passwordField.attr('type', type);

        $(this).toggleClass('fa-eye fa-eye-slash');
    });
</script>
@endsection
