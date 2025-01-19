<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diagnóstico</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('site/appCriarOs.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    @include('layouts.navigation')

    <div class="container">
        <h5 class="text-center">Diagnóstico Primário</h5>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('ordens.update', $ordem) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="form-group mb-3">
                        <label for="nome_cliente">Nome do Cliente</label>
                        <input type="text" class="form-control" id="nome_cliente" name="nome_cliente" value="{{ $ordem->nome_cliente }}" required>
                    </div>
                    
                    <div class="form-group mb-3">
                        <label for="data_diagnostico">Data</label>
                        <input type="date" class="form-control" id="data_diagnostico" name="data_diagnostico" value="{{ $ordem->data_diagnostico }}" required>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col">
                            <label for="tipo_produto">Tipo do Produto</label>
                            <select class="form-control" id="tipo_produto" name="tipo_produto" required>
                                <option value="">Selecione o Produto</option>
                                <option value="notebook" {{ $ordem->tipo_produto == 'notebook' ? 'selected' : '' }}>Notebook</option>
                                <option value="computador" {{ $ordem->tipo_produto == 'computador' ? 'selected' : '' }}>Computador</option>
                                <option value="celular" {{ $ordem->tipo_produto == 'celular' ? 'selected' : '' }}>Celular</option>
                                <option value="eletronicos" {{ $ordem->tipo_produto == 'eletronicos' ? 'selected' : '' }}>Eletrônicos Gerais</option>
                            </select>
                        </div>
                        
                        <div class="col">
                            <label for="telefone">Telefone do Cliente</label>
                            <input type="text" class="form-control" id="telefone" name="telefone" value="{{ $ordem->telefone }}" required>
                        </div>
                        
                        <div class="col">
                            <label for="prioridade">Prioridade</label>
                            <select class="form-control" id="prioridade" name="prioridade" required>
                                <option value="baixa" {{ $ordem->prioridade == 'baixa' ? 'selected' : '' }}>Baixa</option>
                                <option value="media" {{ $ordem->prioridade == 'media' ? 'selected' : '' }}>Média</option>
                                <option value="alta" {{ $ordem->prioridade == 'alta' ? 'selected' : '' }}>Alta</option>
                            </select>
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="status">Status</label>
                            <select class="form-control" id="status" name="status" required>
                                <option value="finalizado" {{ $ordem->status == 'finalizado' ? 'selected' : '' }}>Finalizado</option>
                                <option value="em andamento" {{ $ordem->status == 'em_andamento' ? 'selected' : '' }}>Em andamento</option>
                                <option value="esperando" {{ $ordem->status == 'esperando' ? 'selected' : '' }}>Esperando</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="problemas">Possíveis Problemas</label>
                        <textarea class="form-control" id="problemas" name="problemas" rows="3">{{ $ordem->problemas }}</textarea>
                    </div>

                    <div class="form-group mb-3">
                        <label for="teste_pecas">Peças a serem testadas</label>
                        <textarea class="form-control" id="teste_pecas" name="teste_pecas" rows="3">{{ $ordem->teste_pecas }}</textarea>
                    </div>

                    <h5 class="text-center">Diagnóstico Final</h5>
                    
                    <div id="formularioAdicional">
                        <div class="row mb-3">
                            <div class="col">
                                <label for="valor_gasto">Valor Gasto</label>
                                <input type="text" class="form-control" id="valor_gasto" name="valor_gasto" value="{{ $ordem->valor_gasto }}" placeholder="Valor Gasto">
                            </div>
                            <div class="col">
                                <label for="mao_obra">Mão de Obra</label>
                                <input type="text" class="form-control" id="mao_obra" name="mao_obra" value="{{ $ordem->mao_obra }}" placeholder="Mão de Obra">
                            </div>
                            <div class="col">
                                <label for="desconto">Desconto</label>
                                <input type="text" class="form-control" id="desconto" name="desconto" value="{{ $ordem->desconto }}" placeholder="Desconto">
                            </div>
                            <div class="form-group mb-3">
                                <label for="valor_cobrado">Valor Cobrado</label>
                                <input type="text" class="form-control" id="valor_cobrado" name="valor_cobrado" value="{{ $ordem->valor_cobrado }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="nome_tecnico">Nome do Técnico</label>
                                <input type="text" class="form-control" id="nome_tecnico" name="nome_tecnico" value="{{ $ordem->nome_tecnico }}" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <label for="peca_trocada">Peça(s) Trocada(s)</label>
                                <input type="text" class="form-control" id="peca_trocada" name="peca_trocada" value="{{ $ordem->peca_trocada }}" placeholder="Peças Trocadas">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-lg btn-success">Salvar Diagnóstico</button>
                    </div>
                </form>
            </div>
        </div>
        
        <a href="#" class="back-arrow">
            <img src="{{ asset('images/seta.png') }}" alt="Voltar">
        </a>
    </div>
    
    <!-- Scripts -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    
    <script>
        $(document).ready(function() {
            // Aplicando máscara para o telefone
            $('#telefone').mask('(000) 0 0000-0000');
    
            // Aplicando máscara de moeda com o prefixo "R$"
            $('#valor_gasto, #mao_obra, #desconto, #valor_cobrado').mask('R$ #.##0,00', {reverse: true});
    
            // Remover máscara antes de enviar o formulário
            $('form').on('submit', function() {
                // Remove a máscara do telefone
                $('#telefone').val($('#telefone').val().replace(/\D/g, ''));
    
                // Formatar os campos de valor para o formato correto (100.00)
                $('#valor_gasto, #mao_obra, #desconto, #valor_cobrado').each(function() {
                    let valor = $(this).val().replace(/[^\d,]/g, ''); // Remove "R$" e outros caracteres não numéricos
                    valor = valor.replace('.', '').replace(',', '.'); // Ajusta o separador decimal
                    $(this).val(valor); // Define o valor ajustado
                });
            });
        });
    </script>
</body>
</html>
