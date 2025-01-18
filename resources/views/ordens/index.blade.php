<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Suas OS</title>
</head>
<body>
    <h1>OS</h1>
    <a href="{{ route('ordens.create') }}">Adicionar OS</a>
    <a href="{{ route('ordens.relatorio') }}">Relatorio Mensal de OS</a>
    <a href="{{ route('ordens.relatorio.anual') }}">Relatorio anual de OS</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome Cliente</th>
                <th>Prioridade</th>
                <th>Data</th>
                <th>Nome do Técnico</th>
                <th>status</th> <!-- Adicionei um cabeçalho para as ações -->
            </tr>
        </thead>
        <tbody>
            @foreach ($ordens as $ordem)
                <tr>
                    <td>{{ $ordem->id }}</td>
                    <td>{{ $ordem->nome_cliente }}</td>
                    <td>{{ $ordem->prioridade }}</td>
                    <td>{{ $ordem->data_diagnostico }}</td>
                    <td>{{ $ordem->nome_tecnico }}</td>
                    <td>{{ $ordem->status }}</td>
                    <td>
                        <a href="{{ route('ordens.show', $ordem->id) }}">Visualizar</a>
                        <a href="{{ route('ordens.edit', $ordem->id) }}">Editar</a>
                        <form action="{{ route('ordens.destroy', $ordem->id) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
