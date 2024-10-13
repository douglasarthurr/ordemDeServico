<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diagnóstico</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('site/appCriarOs.css') }}">
</head>
<body>
    <nav class="navbar navbar-custom" style="background-color:rgba(65, 157, 206, 100);">
        <div class="container-fluid">
            <!-- Logo no lado esquerdo -->
            <a class="bacck-arrow" href="#">
                <img src="{{ asset('images/logoBranca.png') }}" alt="Logopooo" style="width: 30px; height: auto;">
            </a>
            
            <!-- Espaço flexível para empurrar o ícone para o lado direito -->
            <div class="d-flex flex-grow-1 justify-content-end">
                <!-- Ícone de usuário no lado direito -->
                <div class="bacck-arrow">
                    <i class="bi bi-person-fill" style="font-size: 30px; color: white;"></i>
                </div>
            </div>
        </div>
    </nav>
    
    

    <div class="container">
        <div class="mb-3" style="max-width: 600px; margin: 0 auto; padding: 5px;">
            Código: {{ $totalOs }}
        </div>
        <h5 class="text-center">Diagnóstico Primário </h5>
        <div class="card">

            <div class="card-body">
                <form action="{{ route('CriarOs.store') }}" method="POST">
                    @csrf <!-- Token de segurança Laravel -->
                    
                    <div class="form-group mb-3">
                        <label for="nomeCliente">Nome do Cliente</label>
                        <input type="text" class="form-control" id="nomeCliente" name="nomeCliente" value="{{ old('nomeCliente') }}" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="data">Data</label>
                        <input type="date" class="form-control" id="data" name="data" value="{{ old('data') }}" required>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="tipoProduto">Tipo do Produto</label>
                            <select class="form-control" id="tipoProduto" name="tipoProduto" required>
                                <option value="">Selecione o Produto</option>
                                <option value="produto1" {{ old('tipoProduto') == 'produto1' ? 'selected' : '' }}>Produto 1</option>
                                <option value="produto2" {{ old('tipoProduto') == 'produto2' ? 'selected' : '' }}>Produto 2</option>
                                <option value="produto3" {{ old('tipoProduto') == 'produto3' ? 'selected' : '' }}>Produto 3</option>
                                <option value="produto4" {{ old('tipoProduto') == 'produto4' ? 'selected' : '' }}>Produto 4</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="telefoneCliente">Telefone do Cliente</label>
                            <input type="text" class="form-control" id="telefoneCliente" name="telefoneCliente" value="{{ old('telefoneCliente') }}" required>
                        </div>
                        <div class="col">
                            <label for="prioridade">Prioridade</label>
                            <select class="form-control" id="prioridade" name="prioridade" required>
                                <option value="baixa" {{ old('prioridade') == 'baixa' ? 'selected' : '' }}>Baixa</option>
                                <option value="media" {{ old('prioridade') == 'media' ? 'selected' : '' }}>Média</option>
                                <option value="alta" {{ old('prioridade') == 'alta' ? 'selected' : '' }}>Alta</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="problemas">Possíveis Problemas</label>
                        <textarea class="form-control" id="problemas" name="problemas" rows="3">{{ old('problemas') }}</textarea>
                    </div>
                    <div class="form-group mb-3">
                        <label for="pecas">Peças a serem testadas</label>
                        <textarea class="form-control" id="pecas" name="pecas" rows="3">{{ old('pecas') }}</textarea>
                    </div>

                    <h5 class="text-center">Diagnóstico Final</h5>

                    <div class="checkbox-group">
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" id="finalizado" name="finalizado" {{ old('finalizado') ? 'checked' : '' }}>
                            <label class="form-check-label" for="finalizado">Finalizado</label>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" id="naoTemConserto" name="naoTemConserto" {{ old('naoTemConserto') ? 'checked' : '' }}>
                            <label class="form-check-label" for="naoTemConserto">Não tem conserto</label>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" id="clienteAceitou" name="clienteAceitou" {{ old('clienteAceitou') ? 'checked' : '' }}>
                            <label class="form-check-label" for="clienteAceitou">Cliente Aceitou</label>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" id="clienteRecusou" name="clienteRecusou" {{ old('clienteRecusou') ? 'checked' : '' }}>
                            <label class="form-check-label" for="clienteRecusou">Cliente Recusou</label>
                        </div>
                    </div>

                    <div id="formularioAdicional">
                        <div class="row mb-3">
                            <div class="col">
                                <label for="valorGasto">Valor Gasto</label>
                                <input type="text" class="form-control" id="valorGasto" name="valorGasto" value="{{ old('valorGasto') }}" placeholder="Valor Gasto">
                            </div>
                            <div class="col">
                                <label for="maoDeObra">Mão de Obra</label>
                                <input type="text" class="form-control" id="maoDeObra" name="maoDeObra" value="{{ old('maoDeObra') }}" placeholder="Mão de Obra">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <label for="pecasTrocadas">Peça(s) Trocada(s)</label>
                                <input type="text" class="form-control" id="pecasTrocadas" name="pecasTrocadas" value="{{ old('pecasTrocadas') }}" placeholder="Peças Trocadas">
                            </div>
                            <div class="col">
                                <label for="garantia">Garantia</label>
                                <input type="text" class="form-control" id="garantia" name="garantia" value="{{ old('garantia') }}" placeholder="Garantia">
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

    <script>
        document.getElementById('clienteRecusou').addEventListener('change', function() {
            var formularioAdicional = document.getElementById('formularioAdicional');
            if (this.checked) {
                formularioAdicional.style.display = 'none';
            } else {
                formularioAdicional.style.display = 'block';
            }
        });
    </script>
    <script>
        document.getElementById('naoTemConserto').addEventListener('change', function() {
            var formularioAdicional = document.getElementById('formularioAdicional');
            if (this.checked) {
                formularioAdicional.style.display = 'none';
            } else {
                formularioAdicional.style.display = 'block';
            }
        });
    </script>

    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>
</html>
