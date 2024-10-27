<?php

namespace App\Http\Controllers;

use App\Models\Ordem;
use Illuminate\Http\Request;

class OrdemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ordens = Ordem::all();
        return view('ordens.index', compact('ordens'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ordens.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'nome_cliente' => 'required|string|max:255',
            'data_diagnostico' => 'required|date',
            'tipo_produto' => 'required|string',
            'telefone' => 'required|string|max:15',
            'prioridade' => 'required|string',
            'problemas' => 'nullable|string',
            'teste_pecas' => 'nullable|string',
            'valor_gasto' => 'nullable|numeric',
            'mao_obra' => 'nullable|numeric',
            'desconto' => 'nullable|numeric',
            'valor_cobrado' => 'nullable|string', 
            'peca_trocada' => 'nullable|string',
            'nome_tecnico' => 'nullable|string',
            'status' => 'required|string',
            // Adicione outras validações conforme necessário
        ]);
    
        
        Ordem::create($request->all());
    
        return redirect()->route('ordens.index')->with('success', 'Diagnóstico salvo com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $ordem = Ordem::findOrFail($id);
        return view('ordens.show', compact('ordem'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $ordem = Ordem::findOrFail($id);
        return view('ordens.edit', compact('ordem'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ordem $ordem)
    {
        $request->validate([
            'nome_cliente' => 'required|string|max:255',
            'data_diagnostico' => 'required|date',
            'tipo_produto' => 'required|string',
            'telefone' => 'required|string|max:15',
            'prioridade' => 'required|string',
            'problemas' => 'nullable|string',
            'teste_pecas' => 'nullable|string',
            'valor_gasto' => 'nullable|numeric',
            'mao_obra' => 'nullable|numeric',
            'desconto' => 'nullable|numeric',
            'valor_cobrado' => 'nullable|string', 
            'peca_trocada' => 'nullable|string',
            'nome_tecnico' => 'nullable|string',
            'status' => 'required|string',
            // Adicione outras validações conforme necessário
        ]);
    

        $ordem->update($request->all());

        return redirect()->route('ordens.index')->with('success', 'Ordem de serviço atualizada');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ordem $ordem)
    {
        $ordem->delete();
        
        return redirect()->route('ordens.index')->with('success', 'Ordem de serviço apagada');
    }
}
