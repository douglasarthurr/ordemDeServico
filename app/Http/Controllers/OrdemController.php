<?php

namespace App\Http\Controllers;

use App\Models\Ordem;
use App\Models\Relatorio;
use Illuminate\Http\Request;
use Carbon\Carbon;

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
            'valor_cobrado' => 'nullable|numeric',
            'peca_trocada' => 'nullable|string',
            'nome_tecnico' => 'nullable|string',
            'status' => 'required|string',
        ]);

        $ordem = Ordem::create($request->all());

        // transforma a data de string para objeto, e atualiza o realtorio mensal
        $dataDiagnostico = \Carbon\Carbon::parse($ordem->data_diagnostico);
        $this->atualizarRelatorioMensal($dataDiagnostico->month, $dataDiagnostico->year);

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
            'valor_cobrado' => 'nullable|numeric',
            'peca_trocada' => 'nullable|string',
            'nome_tecnico' => 'nullable|string',
            'status' => 'required|string',
        ]);

        $ordem->update($request->all());

         // transforma a data de string para objeto, e atualiza o realtorio mensal
        $dataDiagnostico = \Carbon\Carbon::parse($ordem->data_diagnostico);
        $this->atualizarRelatorioMensal($dataDiagnostico->month, $dataDiagnostico->year);

        return redirect()->route('ordens.index')->with('success', 'Ordem de serviço atualizada');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ordem $ordem)
    {
         // transforma a data de string para objeto, e atualiza o realtorio mensal
        $dataDiagnostico = \Carbon\Carbon::parse($ordem->data_diagnostico);
        
        $mes = $dataDiagnostico->month;
        $ano = $dataDiagnostico->year;

        $ordem->delete();

        // Atualizar relatório mensal
        $this->atualizarRelatorioMensal($mes, $ano);

        return redirect()->route('ordens.index')->with('success', 'Ordem de serviço apagada');
    }

    /**
     * Atualiza o relatório mensal no banco de dados.
     */
    protected function atualizarRelatorioMensal($mes, $ano)
    {
        // Verifica se o mês e o ano são válidos
        if (!checkdate($mes, 1, $ano)) {
            throw new \InvalidArgumentException('Data inválida.');
        }

        // Filtra as ordens de serviço pelo mês e ano
        $ordens = Ordem::whereYear('data_diagnostico', $ano)
                    ->whereMonth('data_diagnostico', $mes)
                    ->get();

        // Prepara os dados do relatório
        $dados = [
            'mes' => $mes,
            'ano' => $ano,
            'total_ordens' => $ordens->count(),
            'total_valor_gasto' => $ordens->sum('valor_gasto'),
            'total_valor_cobrado' => $ordens->sum('valor_cobrado'),
            'total_mao_obra' => $ordens->sum('mao_obra'),
            'total_descontos' => $ordens->sum('desconto'),
            'total_finalizadas' => $ordens->where('status', 'finalizada')->count(),
            'total_em_andamento' => $ordens->where('status', 'em andamento')->count(),
            'total_esperando' => $ordens->where('status', 'esperando')->count(),
        ];

        // Atualiza ou cria o registro do relatório
        Relatorio::updateOrCreate(
            ['mes' => $mes, 'ano' => $ano],
            $dados
        );
    }


    /**
     * Exibe os relatórios.
     */
    public function relatorio(Request $request)
    {
        $mes = $request->input('mes', now()->month);
        $ano = $request->input('ano', now()->year);

        $relatorio = Relatorio::where('mes', $mes)
                            ->where('ano', $ano)
                            ->first();

        if (!$relatorio) {
            // Caso não haja um relatório, criamos um objeto vazio
            $relatorio = new \stdClass();
            $relatorio->total_ordens = 0;
            $relatorio->total_valor_gasto = 0;
            $relatorio->total_valor_cobrado = 0;
            $relatorio->total_mao_obra = 0;
            $relatorio->total_descontos = 0;
            $relatorio->total_finalizadas = 0;
            $relatorio->total_em_andamento = 0;
            $relatorio->total_esperando = 0;
        }

        return view('ordens.relatorio', compact('relatorio', 'mes', 'ano'));
    }
}
