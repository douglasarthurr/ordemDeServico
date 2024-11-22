<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Relatório Mensal</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        h1 {
            text-align: center;
        }
        form {
            margin-bottom: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
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
</body>
</html>