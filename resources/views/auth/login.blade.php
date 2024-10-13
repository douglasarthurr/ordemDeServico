<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quase Lá!</title>
    <link href="https://fonts.googleapis.com/css2?family=Jockey+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('site/app.css') }}">
    
    <!-- Adicione isso no cabeçalho para usar Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">


</head>
<body>
    <div class="container">
        <!-- Esquerda - Quase Lá! -->
        <div class="left-section">
            <div class="logo">
                <img src="{{ asset('images/logoAzul.png') }}" alt="Logo">
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
                <form class="login-form" method="POST" action="{{ route('login') }}">
                    @csrf
                    <!-- Email Address -->
                    <input id="email" type="email" name="email" :value="old('email')" placeholder="E-mail" required autofocus>
                    <!-- Error message for email -->
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />

                    <!-- Password -->
                    <input id="password" type="password" name="password" placeholder="Senha" required autocomplete="current-password">
                    <!-- Error message for password -->
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />

                    <!-- Lembrar Senha -->
                    {{-- <div class="block mt-4">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox" class="rounded" name="remember">
                            <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                        </label>
                    </div> --}}
                                <!-- Link para recuperar senha -->
                    @if (Route::has('password.request'))
                    <a class="link-recover" href="{{ route('password.request') }}">
                        {{ __('Esqueceu a senha??') }}
                    </a>
                    @endif
                </form>
            </div>

            <!-- Botão "Entrar" branco na parte inferior -->
            <a href="#" class="bottom-button" onclick="document.querySelector('.login-form').submit();">ENTRAR</a>
        </div>
    </div>
</body>
</html>
