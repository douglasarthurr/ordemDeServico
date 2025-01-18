<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link href="https://fonts.googleapis.com/css2?family=Jockey+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('site/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <div class="container">
        <!-- Seção Esquerda -->
        <div class="left-section">
            <div class="logo">
                <img src="{{ asset('images/logoAzul.png') }}" alt="Logo">
            </div>
            <h1>Que bom que se interessou!</h1>
            <p>Faça seu cadastro para começar a organizar suas ordens de serviços da melhor </p>
            
            <a href="/" class="back-arrow">
                <img src="{{ asset('images/seta.png') }}" alt="Voltar">
            </a>
        </div>

        <!-- Seção Direita -->
        <div class="right-section">
            <div class="login-header">Cadastro</div>
            <div class="login-form-container">
                <form class="login-form" method="POST" action="{{ route('register') }}">
                    @csrf
                    
                    <!-- Nome -->
                    <input id="name" type="text" name="name" :value="old('name')" placeholder="Nome" required autofocus>
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />

                    <!-- Email -->
                    <input id="email" type="email" name="email" :value="old('email')" placeholder="E-mail" required>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />

                    <!-- Senha -->
                    <input id="password" type="password" name="password" placeholder="Senha" required>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />

                    <!-- Confirmar Senha -->
                    <input id="password_confirmation" type="password" name="password_confirmation" placeholder="Confirme a Senha" required>
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </form>
            </div>

            <!-- Botão de Cadastro -->
            <a href="#" class="bottom-button" onclick="document.querySelector('.login-form').submit();">CADASTRAR</a>
        </div>
    </div>
</body>
</html>