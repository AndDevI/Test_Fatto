@extends('app')

@section('content')
<div class="container mx-auto py-8 bg-white">
    <h1 class="text-3xl font-bold mb-6 text-center">Lista de Tarefas</h1>

    @if(session('success'))
        <div id="successMessage" class="fixed top-4 left-1/2 transform -translate-x-1/2 p-4 mb-4 text-green-700 bg-green-100 rounded shadow-lg transition-opacity duration-500 opacity-0">
            {{ session('success') }}
        </div>
    @endif

    <div class="fixed bottom-16 right-16">
        <button 
            onclick="openModal()" 
            class="bg-blue-500 text-white font-bold text-xl px-6 py-3 rounded-full hover:bg-blue-600 shadow-lg focus:ring-2 focus:ring-blue-300 transition-transform transform hover:scale-105">
            +
        </button>
    </div>

    <div id="modal" class="opacity-0 transition-opacity duration-300 hidden">
        @include('components.create')
    </div>

    <div id="edit_modal" class="opacity-0 transition-opacity duration-300 hidden">
        @include('components.edit')
    </div>

    <table id="sortable" class="min-w-full border-separate border-spacing-y-3 bg-gray-200 rounded-xl text-center shadow-2xl p-5">
        <thead class="bg-slate-800/70 text-white rounded-lg">
            <tr>
                <th class="w-1/3 py-3 px-4 border-b border-gray-300">Nome da Tarefa</th>
                <th class="w-1/4 py-3 px-4 border-b border-gray-300">Custo (R$)</th>
                <th class="w-1/4 py-3 px-4 border-b border-gray-300">Data Limite</th>
                <th class="w-1/4 py-3 px-4 border-b border-gray-300">Ações</th>
            </tr>
        </thead>
        <tbody id="tarefa_lista">
            @foreach ($tarefas as $tarefa)
                <tr data-id="{{ $tarefa->id }}" class="tarefa bg-gray-100 hover:bg-slate-100 transition-all duration-300 {{ $tarefa->custo >= 1000 ? 'text-yellow-500' : 'text-black' }} text-lg rounded-lg shadow-sm hover:shadow-lg">
                    <td class="px-6 py-4 border-b border-gray-200">{{ $tarefa->nome }}</td>
                    <td class="px-6 py-4 border-b border-gray-200">R$ {{ number_format($tarefa->custo, 2, ',', '.') }}</td>
                    <td class="px-6 py-4 border-b border-gray-200">{{ \Carbon\Carbon::parse($tarefa->data_limite)->format('d/m/Y') }}</td>
                    <td class="px-6 py-4 flex justify-center items-center space-x-3 border-b border-gray-200">
                        <button 
                            href="javascript:void(0);" 
                            onclick="openEditModal({{ $tarefa->id }}, '{{ $tarefa->nome }}', {{ $tarefa->custo }}, '{{ $tarefa->data_limite }}')"
                            class="text-blue-500 h-8 w-8 hover:text-blue-700 transition-colors">
                            <x-sui-pen />
                        </button>
                        <form action="{{ route('tarefas.destroy', $tarefa->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button 
                                type="submit" 
                                class="text-red-500 h-8 w-8 hover:text-red-700 transition-colors" 
                                onclick="return confirm('Tem certeza que deseja excluir esta tarefa?');">
                                <x-ik-bin />
                            </button>
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
