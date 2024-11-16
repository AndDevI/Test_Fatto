@extends('app') 

@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-2xl font-bold mb-6">Lista de Tarefas</h1>

    @if(session('success'))
        <div id="successMessage" class="fixed top-4 left-1/2 transform -translate-x-1/2 p-4 mb-4 text-green-700 bg-green-100 rounded shadow-lg transition-opacity duration-500 opacity-0">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-4">
        <button onclick="openModal()" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            Incluir Nova Tarefa
        </button>
    </div>

    <div id="modal" class="opacity-0 transition-opacity duration-300 hidden">
        @include('components.create')
    </div>

    <div id="edit_modal" class="opacity-0 transition-opacity duration-300 hidden">
        @include('components.edit')
    </div>

    <table id="sortable" class="min-w-full bg-white">
        <thead class="bg-gray-800 text-white">
            <tr>
                <th class="w-1/3 py-2">Nome da Tarefa</th>
                <th class="w-1/4 py-2">Custo (R$)</th>
                <th class="w-1/4 py-2">Data Limite</th>
                <th class="w-1/4 py-2">Ações</th>
            </tr>
        </thead>
        <tbody id="tarefa_lista">
            @foreach ($tarefas as $tarefa)
                <tr data-id="{{ $tarefa->id }}" class="tarefa {{ $tarefa->custo >= 1000 ? 'bg-yellow-200' : '' }}">
                    <td class="border px-4 py-2">{{ $tarefa->nome }}</td>
                    <td class="border px-4 py-2">R$ {{ number_format($tarefa->custo, 2, ',', '.') }}</td>
                    <td class="border px-4 py-2">{{ \Carbon\Carbon::parse($tarefa->data_limite)->format('d/m/Y') }}</td>
                    <td class="border px-4 py-2">
                        <a 
                            href="javascript:void(0);" 
                            onclick="openEditModal({{ $tarefa->id }}, '{{ $tarefa->nome }}', {{ $tarefa->custo }}, '{{ $tarefa->data_limite }}')"
                            class="text-blue-500 hover:underline">
                            Editar
                        </a>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.14.0/Sortable.min.js"></script>
<script>
    const tabela = document.getElementById('sortable'); 

    new Sortable(tabela.querySelector('tbody'), {
        animation: 150, 
        handle: 'tr', 
        ghostClass: 'sortable-ghost', 
        onEnd: function (evt) {
            const orderedIds = [];
            tabela.querySelectorAll('tbody tr.tarefa').forEach((linha) => {
                orderedIds.push(linha.dataset.id);
            });

            fetch('{{ route('tarefas.reorder') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
                body: JSON.stringify({ order: orderedIds }),
            })
            .then((response) => response.json())
        },
    });
</script>
@endsection
