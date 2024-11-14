@extends('app') 

@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-2xl font-bold mb-6">Lista de Tarefas</h1>

    <div class="mb-4">
        <a href="{{ route('tarefas.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            Incluir Nova Tarefa
        </a>
    </div>

    <table class="min-w-full bg-white">
        <thead class="bg-gray-800 text-white">
            <tr>
                <th class="w-1/3 py-2">Nome da Tarefa</th>
                <th class="w-1/4 py-2">Custo (R$)</th>
                <th class="w-1/4 py-2">Data Limite</th>
                <th class="w-1/4 py-2">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tarefas as $tarefa)
                <tr class="{{ $tarefa->custo >= 1000 ? 'bg-yellow-200' : '' }}">
                    <td class="border px-4 py-2">{{ $tarefa->nome }}</td>
                    <td class="border px-4 py-2">R$ {{ number_format($tarefa->custo, 2, ',', '.') }}</td>
                    <td class="border px-4 py-2">{{ $tarefa->data_limite }}</td>
                    <td class="border px-4 py-2">
                        <a href="{{ route('tarefas.edit', $tarefa->id) }}" class="text-blue-500 hover:underline">Editar</a>
                        <form action="{{ route('tarefas.destroy', $tarefa->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline" onclick="return confirm('Tem certeza que deseja excluir esta tarefa?');">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
