<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Protocolo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        * {
            font-family: "Inter", sans-serif;
        }
        #container{
            background: #3e98ff; /*suubsituir a cor por uma plano de fundo*/
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .logo {
            position: absolute;
            top: -8%;
            left: 50%;
            transform: translateX(-50%);
            z-index: 1; /* Certifica-se de que a imagem esteja acima do formulário */
            width: 160px; /* Define a largura da imagem */
            height: auto;
        }

    /*Cabeçalho da pagina*/
        .info-header {
            width: 100vw;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
    /*Design dos inputs com informaçoes do protocolo/ dados do usuario*/
        .container-wrapper{
           display: flex;
           align-items: center;
           justify-content: center; 
        }
        .input-wrapper{
            padding: 4px 10px;
            display: flex;
            align-items: center;
            background-color: rgb(230, 230, 230);
            border-radius: 6px;
        }   
        .input-wrapper i{
            color: #000000;
            cursor: pointer;
        }        
        .input-wrapper input{
            background-color: transparent;
            border-radius: none;
            border: none;
            font-size: 20px; 
            width: 200px;
        }
    /*Container central do formulario*/
        .form-container {
            position: relative;
            max-width: 480px;
            background: rgba(255, 255, 255, 0.8); /*0.8 = 80% de transparencia*/
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
            border-radius: 25px;
        }
        .form-container p {
            text-align: center;
        }
        .form-container button {
            border-radius: 10px;
        }
        .form-label{
            color: black;            
        }
    /*Alerta do rodapé*/
        .alert-footer{
            width: 30vw;
            margin-top: 20px;
            font-size: 12px;
            text-align: justify;
        }
    </style>
</head>

<body> 

    <div id="container">
        <form class="form-container">
            <div>
                <img src="denuncia-anonima\public\Imagens\logo.png" alt="" class="logo">
            </div>
            <div class="info-header" >
                <h2 style="padding-top: 70px">Muito Obrigado!</h2>
                <h5>O protocolo da sua denúncia é:</h5>
            </div>
        <!--Numero do protocolo--> 
            <div class="container-wrapper">
                <div class="container">
                    <div class="input-wrapper">
                        <input value="Subst p/ Num Protocolo" readonly/>
                        <i class="fa fa-copy"></i>    
                    </div>
                </div>
            </div>
        <!--Login-->
            <div style="margin-top: 20px;" class="formulario mb-3">
                <label class="form-label">Login:</label>
                <input type="email" class="form-control" id="exampleInputEmail1" value="Subst p/ Login Aleatorio" readonly>
            </div>
        <!--Senha-->
            <div class="formulario mb-3">
                <label class="form-label">Senha:</label>
                    <div class="container-wrapper">
                        <div class="input-wrapper">
                            <input type="password" value="Subst p/ Senha Temp" readonly/>
                            <i class="fa-regular fa-eye"></i>                           
                        </div>                       
                    </div>
            </div>

            <p class="alert-footer">Sua coragem é o primeiro passo para um ambiente acadêmico mais justo e seguro. 
                Contamos com você para construirmos juntos uma universidade melhor.</p>

            <button class="btn btn-primary">Voltar</button>

            <footer>
                <p class="alert-footer">Cuidado, denunciação caluniosa é crime!</p>
            </footer>
        </form>
    </div>
</body>

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
</html>