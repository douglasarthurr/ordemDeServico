<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">

    <title>ORDEM</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f6f7;
            color: #333;
        }
        .content {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #3498db;
            margin-bottom: 20px;
        }
        ul {
            list-style: none;
            padding: 0;
        }
        li {
            margin-bottom: 10px;
            padding: 10px;
            background-color: #eaf2f8;
            border: 1px solid #d6eaf8;
            border-radius: 5px;
        }
        .back {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            color: white;
            background-color: #3498db;
            padding: 10px 20px;
            border-radius: 5px;
            text-align: center;
        }
        .back:hover {
            background-color: #2874a6;
        }
    </style>
</head>
<body>
    @include('layouts.navigation')
    <div class="content">
        <h1>Detalhes da Ordem</h1>
        <ul>
            <li><strong>ID:</strong> {{ $ordem->id }}</li>
            <li><strong>Nome do cliente:</strong> {{ $ordem->nome_cliente }}</li>
            <li><strong>Nome do técnico:</strong> {{ $ordem->nome_tecnico }}</li>
            <li><strong>Possíveis problemas:</strong> {{ $ordem->problemas }}</li>
            <li><strong>Peças para teste:</strong> {{ $ordem->teste_pecas }}</li>
            <li><strong>Status:</strong> {{ $ordem->status }}</li>
            <li><strong>Valor Gasto:</strong> {{ $ordem->valor_gasto }}</li>
            <li><strong>Valor Cobrado:</strong> {{ $ordem->valor_cobrado }}</li>
            <li><strong>Data:</strong> {{ $ordem->data_diagnostico }}</li>
        </ul>
        <a class="back" href="{{ route('ordens.index') }}">Voltar</a>
    </div>
</body>
</html>
