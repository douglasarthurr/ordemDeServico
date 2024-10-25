<?php

namespace App\Http\Controllers;

use App\Models\CriarOs;
use Illuminate\Http\Request;

class CriarOsController extends Controller
{
    /**
     * Exibe o formulário.
     */
    public function index()
    {
        // Contar quantas Ordens de Serviço estão no banco de dados
        $totalOs = CriarOs::count();

        // Passar a contagem para a view
        return view('criar-os', compact('totalOs'));
    }

    /**
     * Armazena um novo diagnóstico no banco de dados.
     */
    public function store(Request $request)
    {
        // Validação dos dados recebidos (faz com que esses dados sejam obrigatorios)
        $request->validate([
            'nomeCliente' => 'required|string|max:255',
            'data' => 'required|date',
            'prioridade' => 'required|string',
            // Valide outros campos conforme necessário
        ]);

        // Criar novo diagnóstico e salvar no banco de dados
        CriarOs::create([
            'nome_cliente' => $request->input('nomeCliente'),
            'data' => $request->input('data'),
            'tipo_produto' => $request->input('tipoProduto'),
            'telefone_cliente' => $request->input('telefoneCliente'),
            'prioridade' => $request->input('prioridade'),
            'problemas' => $request->input('problemas'),
            'pecas' => $request->input('pecas'),
            'finalizado' => $request->has('finalizado'),
            'nao_tem_conserto' => $request->has('naoTemConserto'),
            'cliente_aceitou' => $request->has('clienteAceitou'),
            'cliente_recusou' => $request->has('clienteRecusou'),
            'valor_gasto' => $request->input('valorGasto'),
            'mao_de_obra' => $request->input('maoDeObra'),
            'pecas_trocadas' => $request->input('pecasTrocadas'),
            'problemas_solucionados' => $request->input('problemasSolucionados'),
            'nome_tecnico' => $request->input('nomeTecnico'),
        ]);

        // Redirecionar com mensagem de sucesso
        return redirect()->back()->with('success', 'Ordem de Serviço criada com sucesso!');
    }

    /**
     * Exibe um diagnóstico específico.
     */
    public function show(string $id)
    {
        $criarosv = CriarOs::findOrFail($id);
        return view('criarosv.show', compact('criarosv')); // Retorna a view com o diagnóstico específico
    }

    /**
     * Mostra o formulário para editar um diagnóstico específico.
     */
    public function edit(string $id)
    {
        $criarosv = CriarOs::findOrFail($id);
        return view('criarosv.edit', compact('criarosv')); // Retorna a view de edição
    }

    /**
     * Atualiza um diagnóstico específico.
     */
    public function update(Request $request, string $id)
    {
        // Validação dos dados recebidos
        $request->validate([
            'nomeCliente' => 'required|string|max:255',
            'data' => 'required|date',
            'prioridade' => 'required|string',
            // Valide outros campos conforme necessário
        ]);

        // Atualizar diagnóstico existente
        $criarosv = CriarOs::findOrFail($id);
        $criarosv->update([
            'nome_cliente' => $request->input('nomeCliente'),
            'data' => $request->input('data'),
            'tipo_produto' => $request->input('tipoProduto'),
            'telefone_cliente' => $request->input('telefoneCliente'),
            'prioridade' => $request->input('prioridade'),
            'problemas' => $request->input('problemas'),
            'pecas' => $request->input('pecas'),
            'finalizado' => $request->has('finalizado'),
            'nao_tem_conserto' => $request->has('naoTemConserto'),
            'cliente_aceitou' => $request->has('clienteAceitou'),
            'cliente_recusou' => $request->has('clienteRecusou'),
            'valor_gasto' => $request->input('valorGasto'),
            'mao_de_obra' => $request->input('maoDeObra'),
            'pecas_trocadas' => $request->input('pecasTrocadas'),
            'problemas_solucionados' => $request->input('problemasSolucionados'),
            'nome_tecnico' => $request->input('nomeTecnico'),
        ]);

        // Redirecionar com mensagem de sucesso
        return redirect()->back()->with('success', 'Diagnóstico atualizado com sucesso!');
    }

    /**
     * Remove um diagnóstico específico.
     */
    public function destroy(string $id)
    {
        $criarosv = CriarOs::findOrFail($id);
        $criarosv->delete();

        // Redirecionar com mensagem de exclusão
        return redirect()->back()->with('success', 'Diagnóstico excluído com sucesso!');
    }

}

