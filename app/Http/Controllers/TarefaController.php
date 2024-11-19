<?php

namespace App\Http\Controllers;

use App\Http\Requests\TarefaRequest;
use App\Models\Tarefa;
use Illuminate\Http\Request;

class TarefaController extends Controller
{
    public function index() {
        $tarefas = Tarefa::orderBy('ordem')->get();
        return view('layouts.index', compact('tarefas'));
    }

    public function store(TarefaRequest $request) {
        $tarefa = Tarefa::create([
            'nome' => $request->nome,
            'custo' => $request->custo,
            'data_limite' => $request->data_limite,
            'ordem' => Tarefa::max('ordem') + 1,
        ]);

        return redirect()->route('tarefas.index')->with('success', 'Tarefa criada com sucesso!');
    }


    public function update(TarefaRequest $request, $id) {
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
