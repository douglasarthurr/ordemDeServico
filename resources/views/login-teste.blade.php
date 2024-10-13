<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quase Lá!</title>
    <link href="https://fonts.googleapis.com/css2?family=Jockey+One&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Jockey One', sans-serif;
        }
        .container {
            display: flex;
            height: 100vh;
        }
        .left-section {
            flex: 1;
            background-color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            position: relative; /* Para o posicionamento da seta */
        }
        .right-section {
            flex: 1;
            background-color: #3399cc;
            position: relative;
            color: white;
        }
        .left-section h1 {
            font-size: 3em;
            color: #3399cc;
        }
        .left-section p {
            font-size: 1.2em;
            color: #3399cc;
        }
        .right-section .login-header {
            font-size: 2em;
            text-align: center;
            position: absolute;
            top: 20px;
            left: 0;
            right: 0;
            margin: 0 auto;
        }
        .login-form-container {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        .login-form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .login-form input {
            width: 250px;
            padding: 10px;
            margin: 10px 0;
            border: none;
            border-radius: 5px;
        }
        .login-form input[type="submit"] {
            background-color: #3399cc;
            color: white;
            font-size: 1.2em;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .login-form input[type="submit"]:hover {
            background-color: #287a99;
        }

        /* Botão "Entrar" na parte inferior */
        .bottom-button {
            position: absolute;
            bottom: 20px; /* Alinha o botão ao final da seção */
            left: 50%;
            transform: translateX(-50%);
            width: 250px;
            padding: 10px;
            background-color: white;
            color: #3399cc;
            text-align: center;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            font-size: 1.2em;
            transition: background-color 0.3s, color 0.3s;
        }
        .bottom-button:hover {
            background-color: #287a99;
            color: white;
        }

        .logo {
            position: absolute;
            top: 20px;
            left: 20px;
        }
        .logo img {
            width: 50px;
        }

        /* Estilos da seta de retorno como botão */
        .back-arrow {
            position: absolute;
            bottom: 20px;
            left: 20px;
            width: 80px;
            cursor: pointer;
        }
        .back-arrow img {
            width: 100%;
        }
        .back-arrow:hover {
            opacity: 0.8; /* Efeito de hover para a imagem */
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Esquerda - Quase Lá! -->
        <div class="left-section">
            <div class="logo">
                <img src="{{ asset('images/logo.png') }}" alt="Logo">
            </div>
            <h1>QUASE LÁ!</h1>
            <p>Faça o login para confirmarmos sua identidade.</p>
            
            <!-- Seta como botão -->
            <a href="#" class="back-arrow">
                <img src="{{ asset('images/seta.png') }}" alt="Voltar">
            </a>
        </div>

        <!-- Direita - Login -->
        <div class="right-section">
            <div class="login-header">Entrar</div> <!-- Cabeçalho "Entrar" fixo no topo -->
            <div class="login-form-container"> <!-- Formulário centralizado -->
                <form class="login-form" action="" method="post">
                    <input type="email" placeholder="E-mail" required>
                    <input type="password" placeholder="Senha" required>
                </form>
            </div>

            <!-- Botão "Entrar" branco na parte inferior -->
            <a href="#" class="bottom-button">ENTRAR</a>
        </div>
    </div>
</body>
</html>