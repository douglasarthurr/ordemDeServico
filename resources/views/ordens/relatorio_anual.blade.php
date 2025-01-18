<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>relatorio anual</title>
</head>
<body>
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
    
        <a href="{{ route('ordens.index') }}" class="btn btn-primary">Voltar</a>
    </div>
</body>
</html>