<div class="fixed inset-0 flex items-center justify-center bg-gray-500 bg-opacity-50">
    <div class="bg-white p-6 rounded shadow-lg w-full max-w-md">
        <h2 class="text-lg font-semibold mb-4">Criar Nova Tarefa</h2>
        
        <form id="createTaskForm" action="{{ route('tarefas.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium">Nome da Tarefa</label>
                <input type="text" name="name" id="name" class="w-full border rounded px-3 py-2 mt-1" required>
            </div>
            <div class="mb-4">
                <label for="cost" class="block text-sm font-medium">Custo (R$)</label>
                <input type="number" name="cost" id="cost" class="w-full border rounded px-3 py-2 mt-1" required>
            </div>
            <div class="mb-4">
                <label for="deadline" class="block text-sm font-medium">Data Limite</label>
                <input type="date" name="deadline" id="deadline" class="w-full border rounded px-3 py-2 mt-1" required>
            </div>
            
            <div class="flex justify-end">
                <button type="button" onclick="closeModal()" class="mr-2 px-4 py-2 bg-gray-500 text-white rounded">Cancelar</button>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Salvar</button>
            </div>
        </form>
    </div>
</div>
