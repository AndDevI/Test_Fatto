<?php

namespace App\Http\Controllers;

use App\Http\Requests\TarefaRequest;
use App\Http\Requests\UpdateTarefaRequest;
use App\Models\Tarefa;

class TarefaController extends Controller
{
    public function index() {
        $tarefas = Tarefa::orderBy('ordem')->get();
        return view('layouts.index', compact('tarefas'));
    }

    public function store(TarefaRequest $request) {
        $tarefaExistente = Tarefa::where('nome', $request->nome)->first();

        if ($tarefaExistente) {
            return redirect()->route('tarefas.index');
        }

        $tarefa = Tarefa::create([
            'nome' => $request->nome,
            'custo' => $request->custo,
            'data_limite' => $request->data_limite,
            'ordem' => Tarefa::max('ordem') + 1, 
        ]);

        return redirect()->route('tarefas.index')->with('success', 'Tarefa criada com sucesso!');
    }



    public function update(UpdateTarefaRequest $request, $id) {
        $tarefa = Tarefa::findOrFail($id);

        if (Tarefa::where('nome', $request->nome)->where('id', '!=', $id)->exists()) {
            return redirect()->route('tarefas.index');
        }

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

    public function reorder(TarefaRequest $request) {
        $order = $request->input('order');

        foreach ($order as $index => $id) {
            $tarefa = Tarefa::find($id);
            $tarefa->ordem = $index + 1;
            $tarefa->save();
        }

        return response()->json(['success' => true]);
    }

}
