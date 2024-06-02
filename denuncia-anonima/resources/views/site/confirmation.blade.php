@extends('head')

@section('title', 'Protocolo')

@section('content')

    <div id="container-confirmation" class="container-style">
        <div class="form-container">
            <div>
                <img src="{{ asset('Imagens/conclusao.png') }}" alt="" class="logo">
            </div>
            <div class="info-header">
                <h2 style="padding-top: 70px">Muito Obrigado!</h2>
                <h5>O protocolo da sua denúncia é:</h5>
            </div>
            <!--Numero do protocolo-->
            <div class="container-wrapper">
                <div class="container">
                    <div class="input-wrapper">
                        <input value={{ $details['protocolo'] }} readonly />
                        <i class="fa fa-copy"></i>
                    </div>
                </div>
            </div>
            <!--Login-->
            <div style="margin-top: 20px;" class="formulario mb-3">
                <label class="form-label">Login:</label>
                <input type="email" class="form-control" id="exampleInputEmail1" value={{ $details['login'] }} readonly>
            </div>
            <!--Senha-->
            <div class="formulario mb-3">
                <label class="form-label">Senha:</label>
                <div class="container-wrapper">
                    <div class="input-wrapper">
                        <input type="password" value={{ $details['password'] }} readonly />
                        <i class="fa-regular fa-eye"></i>
                    </div>
                </div>
            </div>

            <p class="alert-footer">Sua coragem é o primeiro passo para um ambiente acadêmico mais justo e seguro.
                Contamos com você para construirmos juntos uma universidade melhor.</p>

            <a href="{{ route('denuncias.index') }}" class="btn btn-primary">Voltar</a>

            <footer>
                <p class="alert-footer">Cuidado, denunciação caluniosa é crime!</p>
            </footer>
        </div>
    </div>
@endsection

@section('additional_scripts_confirmation')
    <script>
        //Script do botao copiar
        document.addEventListener("DOMContentLoaded", function() {
            const copyIcon = document.querySelector('.fa-copy');
            const inputField = document.querySelector('input');

            copyIcon.addEventListener('click', function() {
                // Seleciona o conteúdo do input
                inputField.select();
                // Copia o conteúdo para a área de transferência
                document.execCommand("copy");
                // Deseleciona o texto
                window.getSelection().removeAllRanges();
                // Exibe uma mensagem informando que o conteúdo foi copiado
                alert("Conteúdo copiado para a área de transferência!");
            });
        });
        //Script do botao voltar
        document.addEventListener("DOMContentLoaded", function() {
            const eyeIcon = document.querySelector('.fa-eye');
            const passwordInput = document.querySelector('input[type="password"]');

            eyeIcon.addEventListener('click', function() {
                // Alterna a visibilidade da senha entre texto e senha
                if (passwordInput.type === "password") {
                    passwordInput.type = "text";
                } else {
                    passwordInput.type = "password";
                }
            });
        });
    </script>
@endsection
