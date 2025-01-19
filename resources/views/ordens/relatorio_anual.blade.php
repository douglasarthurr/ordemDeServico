<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    
    <title>Relatório Anual</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            color: #333;
        }
        .container {
            max-width: 1200px;
            margin: 20px auto;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        h1, h2 {
            text-align: center;
            color: #3498db;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            color: #3498db;
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }
        select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        button {
            background-color: #3498db;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #2874a6;
        }
        .btn-primary {
            background-color: #3498db;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            text-decoration: none;
            display: inline-block;
            text-align: center;
            font-weight: bold;
            transition: background-color 0.3s;
        }
        .btn-primary:hover {
            background-color: #2874a6;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: white;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #3498db;
            color: white;
        }
        .btn-container {
            display: flex;
            justify-content: flex-end;
            margin-top: 20px;
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
    <div class="container">
        <h1>Relatório Anual</h1>
    
        <form action="{{ route('ordens.relatorio.anual') }}" method="GET">
            <div class="form-group">
                <label for="ano">Selecione o Ano:</label>
                <select name="ano" id="ano" class="form-control">
                    @for ($i = now()->year; $i >= 2000; $i--)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Gerar Relatório</button>
        </form>
    
        @if(isset($dados))
        <h2>Relatório do Ano - {{ $ano }}</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Total de Ordens</th>
                    <th>Total Valor Gasto</th>
                    <th>Total Valor Cobrado</th>
                    <th>Total Mão de Obra</th>
                    <th>Total Descontos</th>
                    <th>Total Finalizadas</th>
                    <th>Total em Andamento</th>
                    <th>Total Esperando</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $dados['total_ordens'] }}</td>
                    <td>{{ number_format($dados['total_valor_gasto'], 2, ',', '.') }}</td>
                    <td>{{ number_format($dados['total_valor_cobrado'], 2, ',', '.') }}</td>
                    <td>{{ number_format($dados['total_mao_obra'], 2, ',', '.') }}</td>
                    <td>{{ number_format($dados['total_descontos'], 2, ',', '.') }}</td>
                    <td>{{ $dados['total_finalizadas'] }}</td>
                    <td>{{ $dados['total_em_andamento'] }}</td>
                    <td>{{ $dados['total_esperando'] }}</td>
                </tr>
            </tbody>
        </table>
        @endif
    
        <div class="btn-container">
            <a href="{{ route('ordens.index') }}" class="btn btn-primary">Voltar</a>
        </div>
    </div>
</body>
</html>
