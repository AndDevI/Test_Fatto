<div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
    <div class="bg-white p-6 rounded-lg shadow-lg w-96">
        <div class="flex items-center justify-between mb-4">
            <h2 class="text-xl font-bold">Editar Tarefa</h2>
            <button type="button" onclick="closeEditModal()" class="text-red-500"><x-tabler-x /></button>
        </div>
        
        <form id="edit-form" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="edit-nome" class="block text-sm font-medium text-gray-700">Nome da Tarefa</label>
                <input type="text" id="edit-nome" name="nome" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
            </div>

            <div class="mb-4">
                <label for="edit-custo" class="block text-sm font-medium text-gray-700">Custo (R$)</label>
                <input type="number" id="edit-custo" name="custo" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
            </div>

            <div class="mb-4">
                <label for="edit-data-limite" class="block text-sm font-medium text-gray-700">Data Limite</label>
                <input type="date" id="edit-data-limite" name="data_limite" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Salvar</button>
            </div>
        </form>
    </div>
</div>
