<?php

namespace App\Http\Controllers;

use App\Models\Tarefa;
use Illuminate\Http\Request;

class TarefaController extends Controller
{
    public function index() {
        $tarefas = Tarefa::orderBy('ordem')->get();
        return view('layouts.index', compact('tarefas'));
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

        return redirect()->route('tarefas.index')->with('success', 'Tarefa criada com sucesso!');
    }

    public function update(Request $request, $id) {
        $request->validate([
            'nome' => 'required|unique:tarefas,nome,' . $id . '|max:255',
            'custo' => 'required|numeric',
            'data_limite' => 'required|date',
        ]);

        $tarefa = Tarefa::findOrFail($id);
        
        $tarefa->update([
            'nome' => $request->nome,
            'custo' => $request->custo,
            'data_limite' => $request->data_limite,
        ]);

        return redirect()->route('tarefas.index')->with('success', 'Tarefa atualizada com sucesso!');
    }


    public function destroy($id) {
        $tarefa = Tarefa::findOrFail($id);
        $tarefa->delete();

        return redirect()->route('tarefas.index')->with('success', 'Tarefa excluída com sucesso!');
    }
}
