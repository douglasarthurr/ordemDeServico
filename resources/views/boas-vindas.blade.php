<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bem Vindo</title>
    <link href="https://fonts.googleapis.com/css2?family=Jockey+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('site/app.css') }}">
</head>

<body>
    <div class="container">
        <div class="left-section">
            <div class="logo">
                <img src="{{ asset('images/logoAzul.png') }}" alt="Logo">
            </div>
            <h1>BEM VINDO!</h1>
            <p class="description">Faça e organize suas <span class="highlight">ordens de serviços</span> com melhor eficiência e confiabilidade.</p>
        </div>
        <div class="right-section">
            <div class="login-header">Conecte-se</div>
            <div class="buttons">
                <a href="{{ route('login') }}">Login</a>
                <a href="{{ route('register') }}">Cadastro</a>
            </div>
        </div>
    </div>
</body>
</html>