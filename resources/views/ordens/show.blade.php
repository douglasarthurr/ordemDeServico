<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Detalhes da Ordem</h1>
    <ul>
        <li>ID: {{  $ordem->id  }}</li>
        <li>Nome do cliente: {{  $ordem->nome_cliente  }}</li>
        <li>Nome do técnico: {{  $ordem->nome_tecnico  }}</li>
        <li>Possíveis problemas: {{  $ordem->problemas  }}</li>
        <li>Peças para teste: {{  $ordem->teste_pecas  }}</li>
        <li>Data: {{  $ordem->data_diagnostico}}</li>
        <a href="{{ route('ordens.index') }}">Voltar</a>
        
    </ul>
</body>
</html>