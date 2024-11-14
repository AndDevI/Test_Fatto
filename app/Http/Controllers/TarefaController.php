<?php

namespace App\Http\Controllers;

use App\Models\Tarefa;
use Illuminate\Http\Request;

class TarefaController extends Controller
{
    public function index() {
        $tarefas = Tarefa::orderBy('ordem')->get();
        return view('tarefas.index', compact('tarefas'));
    }

    public function store(Request $request) {
        $request->validate([
            'nome' => 'required|unique:tarefas|max:255',
            'custo' => 'required|numeric',
            'data_limite' => 'required|date',
        ]);

        $tarefa = Tarefa::create([
            'nome' => $request->nome,
            'custo' => $request->custo,
            'data_limite' => $request->data_limite,
            'ordem' => Tarefa::max('ordem') + 1,
        ]);

        return redirect()->route('tarefas.index');
    }

    public function update(Request $request, Tarefa $tarefa) {
        $request->validate([
            'nome' => 'required|unique:tarefas,nome,' . $tarefa->id . '|max:255',
            'custo' => 'required|numeric',
            'data_limite' => 'required|date',
        ]);
        
        $tarefa->update([
            'nome' => $request->nome,
            'custo' => $request->custo,
            'data_limite' => $request->data_limite,
        ]);
    }

    public function destroy(Tarefa $tarefa) {
        $tarefa->delete();
        return redirect()->route('tarefas.index');
    }
}
