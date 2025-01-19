<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">

    <title>Relatório Mensal</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f9f9f9;
            color: #333;
        }
        h1 {
            text-align: center;
            color: #3498db;
        }
        form {
            margin-bottom: 20px;
            text-align: center;
        }
        label {
            color: #3498db;
            font-weight: bold;
        }
        select, input {
            padding: 5px;
            border: 1px solid #ddd;
            border-radius: 4px;
            margin-left: 5px;
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
        .rollback-btn {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #3498db;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 50%;
            cursor: pointer;
            font-size: 18px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            transition: background-color 0.3s;
        }
        .rollback-btn:hover {
            background-color: #2874a6;
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
    <h1>Relatório de Ordens</h1>
    
    <form action="{{ url('/ordens/relatorio') }}" method="GET">
        <label for="mes">Mês:</label>
        <select name="mes" id="mes" required>
            @for ($i = 1; $i <= 12; $i++)
                <option value="{{ $i }}" {{ (isset($mes) && $mes == $i) ? 'selected' : '' }}>
                    {{ $i }}
                </option>
            @endfor
        </select>

        <label for="ano">Ano:</label>
        <input type="number" name="ano" id="ano" value="{{ $ano ?? date('Y') }}" required>

        <button type="submit">Gerar Relatório</button>
    </form>

    @if (isset($relatorio))
        <table class="table">
            <thead>
                <tr>
                    <th>Total de Ordens</th>
                    <th>Total Valor Gasto</th>
                    <th>Total Valor Cobrado</th>
                    <th>Total Mão de Obra</th>
                    <th>Total Descontos</th>
                    <th>Finalizadas</th>
                    <th>Em Andamento</th>
                    <th>Esperando</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $relatorio->total_ordens ?? 0 }}</td>
                    <td>{{ number_format($relatorio->total_valor_gasto ?? 0, 2, ',', '.') }}</td>
                    <td>{{ number_format($relatorio->total_valor_cobrado ?? 0, 2, ',', '.') }}</td>
                    <td>{{ number_format($relatorio->total_mao_obra ?? 0, 2, ',', '.') }}</td>
                    <td>{{ number_format($relatorio->total_descontos ?? 0, 2, ',', '.') }}</td>
                    <td>{{ $relatorio->total_finalizadas ?? 0 }}</td>
                    <td>{{ $relatorio->total_em_andamento ?? 0 }}</td>
                    <td>{{ $relatorio->total_esperando ?? 0 }}</td>
                </tr>
            </tbody>
        </table>
    @endif

    <button class="rollback-btn" onclick="window.history.back()">&#x21A9;</button>
</body>
</html>
