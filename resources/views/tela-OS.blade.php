<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ordens de Serviço</title>
    <link href="https://fonts.googleapis.com/css2?family=Jockey+One&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Jockey One', sans-serif;
        }

        .header {
            background-color: #3498db;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            color: white;
            font-size: 24px;
        }

        .user-icon {
            color: white;
            font-size: 24px;
        }

        .content {
            padding: 20px;
            text-align: center;
        }

        .title {
            margin: 20px 0;
        }

        .title span {
            color: #3498db;
            border-bottom: 2px solid #3498db;
        }

        .title span.green {
            color: #2ecc71;
        }

        .no-orders {
            margin: 50px 0;
            text-align: center;
        }

        .search-icon {
            color: #3498db;
            font-size: 100px;
        }

        .no-orders-text {
            color: #3498db;
            font-size: 24px;
            margin-top: 20px;
        }

        .add-button {
            position: fixed;
            bottom: 30px;
            right: 30px;
            background-color: #2ecc71;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            font-size: 30px;
            text-decoration: none;
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
        }

        .add-text {
            position: fixed;
            bottom: 45px;
            right: 100px;
            color: #e74c3c;
            font-size: 16px;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <!-- Header com logo e ícone de usuário -->
    <div class="header">
        <div class="logo">OS</div>
        <div class="user-icon">
            <i class="fas fa-user"></i>
        </div>
    </div>

    <!-- Conteúdo principal -->
    <div class="content">
        <div class="title">
            <span>Suas </span>
            <span class="green">ORDENS DE SERVIÇOS</span>
            <span> aqui!</span>
        </div>

        <!-- Área de "Não há ordens disponíveis" -->
        <div class="no-orders">
            <div class="search-icon">
                <i class="fas fa-search"></i>
            </div>
            <div class="no-orders-text">
                Não há ordens disponíveis
            </div>
        </div>

        <!-- Botão de adicionar -->
        <div class="add-text">Adicione novas aqui!</div>
        <a href="{{ route('ordens.create') }}" class="add-button">
            <i class="fas fa-plus"></i>
        </a>
    </div>
</body>
</html>