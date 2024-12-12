@extends('head')

@section('title', 'Protocolo')

@section('content')
<body class="bg-fundo-confirmation">
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="form-container mx-4">
            <div class="text-center">
                <img src="{{ asset('Imagens/logo.png') }}" alt="" style="width: 8rem; height: 7rem;">
            </div>
            <div class="text-center mb-2">
                <h4>Muito obrigado!</h4>
            <h6>O protocolo da sua denúncia é:</h6>
            </div>
            <!-- Numero do protocolo -->
            <div class="container-wrapper mb-2">
                <div class="container">
                    <div class="input-wrapper">
                        <input id="numberProtocol" value="{{ $details['protocolo'] }}" readonly />
                        <i class="copyNumberProtocol fa fa-copy"></i>
                    </div>
                </div>
            </div>
            <!-- Login -->
            <div class="formulario mb-2">
                <label class="form-label">Login:</label>
                <input type="email" class="form-control" id="exampleInputEmail1" value="{{ $details['login'] }}" readonly>
            </div>
            <!-- Senha -->
             <div class="formulario">
                <label class="form-label">Senha:</label>
                <div class="container-wrapper">
                    <div class="input-wrapper">
                        <input id="passwordField" type="password" value="{{ $details['password'] }}" readonly />
                        <i class="togglePassword fa-regular fa-eye"></i>
                    </div>
                </div>
            </div>

            <p class="alert-footer fs-7 mt-2">
                Sua coragem é o primeiro passo para um ambiente acadêmico mais justo e seguro.
                Contamos com você para construirmos juntos uma universidade melhor.
            </p>

            <a href="{{ route('denuncias.index') }}" class="btn btn-primary btn-sm">Continuar</a>

            <footer>
                <p class="alert-footer fs-7 mt-2">Cuidado, denunciação caluniosa é crime!</p>
            </footer>
        </div>
    </div>
</body>

<script>
     $('.copyNumberProtocol').on('click', function() {
        var $copyText = $('#numberProtocol');
        $copyText.select();
        $copyText[0].setSelectionRange(0, 99999); // For mobile devices

        navigator.clipboard.writeText($copyText.val())
        .then(function() {
            alert("Copied the text: " + $copyText.val());
        })
        .catch(function(err) {
            console.error("Failed to copy text: ", err);
        });
    });

    $('.togglePassword').on('click', function() {
        var $passwordField = $('#passwordField');
        var type = $passwordField.attr('type') === 'password' ? 'text' : 'password';
        $passwordField.attr('type', type);
        
        $(this).toggleClass('fa-eye fa-eye-slash');
    });
</script>
@endsection