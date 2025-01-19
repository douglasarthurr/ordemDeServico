<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ordens de Serviço</title>
    <link href="https://fonts.googleapis.com/css2?family=Jockey+One&display=swap" rel="stylesheet">
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Jockey One', sans-serif;
            background-color: #f5f5f5;
        }

        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
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
            color: #3498db;
        }

        .title span.green {
            color: #2ecc71;
        }

        .os-card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            max-width: 400px;
            margin: 20px auto;
            padding: 20px;
        }

        .os-item {
            padding: 10px;
            margin: 5px 0;
            border-radius: 5px;
            color: white;
            text-align: left;
            cursor: pointer;
            transition: opacity 0.2s;
        }

        .os-item:hover {
            opacity: 0.9;
        }

        .os-item.blue {
            background-color: #3498db;
        }

        .os-item.green {
            background-color: #2ecc71;
        }

        .os-item.orange {
            background-color: #e67e22;
        }

        .os-item.red {
            background-color: #e74c3c;
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

        .no-orders {
            text-align: center;
            color: #3498db;
            margin: 50px 0;
        }

        .editar{
            text-decoration: none;
            color: white;
        }

        .excluir{
            background-color: transparent;
            border: none;
            color: white;
            padding-inline: 160px; 
            padding-top: 20px; 
            background-color: #e74c3c;
            border-radius: 5px;
            
            
        }

        .excluir:hover{
            background-color: #e15444;
        }
        
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    @include('layouts.navigation')
    

    <div class="content">
        <div class="title">
            <span>Suas </span>
            <span class="green">ORDENS DE SERVIÇOS</span>
            <span> aqui!</span>
        </div>

        @if($ordens->isEmpty())
            <div class="no-orders">
                <i class="fas fa-search" style="font-size: 100px;"></i>
                <p>Não há ordens disponíveis</p>
            </div>
        @else
        <div class="container">

        
            @foreach($ordens as $ordem)
                <div class="os-card" >
                    <div class="os-item blue">
                        Código: {{ $ordem->id }}
                    </div>
                    <div class="os-item blue">
                        Nome: {{ $ordem->nome_cliente }}
                    </div>
                    <div class="os-item blue">
                        Data: {{ date('d/m/Y', strtotime($ordem->data_diagnostico)) }}
                    </div>
                    <div class="os-item blue">
                        R$ {{ number_format($ordem->valor_cobrado, 2, ',', '.') }}
                    </div>
                    <div class="os-item blue">
                        {{ $ordem->tipo_produto }}
                    </div>
                    <div class="os-item orange">
                        {{ ucfirst($ordem->status) }}
                    </div>
                    <div class="os-item blue" onclick="window.location.href='{{ route('ordens.edit', $ordem->id) }}'">
                        <a class="editar" >Editar</a>
                    </div>
                    <div class="os-item green" onclick="window.location.href='{{ route('ordens.show', $ordem->id) }}'">
                        <a  href="{{ route('ordens.show', $ordem->id) }}">Visualizar</a>
                    </div>
                    
                    <form action="{{ route('ordens.destroy', $ordem->id) }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button class="excluir" type="submit">Excluir</button>
                    </form>
                    
                    
                </div>
            @endforeach
        
        </div>
        @endif

        <a href="{{ route('ordens.create') }}" class="add-button">
            <i class="fas fa-plus"></i>
        </a>
    </div>
</body>
</html>
