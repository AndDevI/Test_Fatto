<div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 backdrop-blur-lg">
    <div class="bg-white p-8 rounded-xl shadow-xl w-full max-w-md">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-2xl font-semibold text-gray-800">Editar Tarefa</h2>
            <button type="button" onclick="closeEditModal()" class="text-red-500 hover:text-red-700 transition-colors">
                <x-tabler-x />
            </button>
        </div>

        <form id="edit-form" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-6">
                <label for="edit-nome" class="block text-sm font-medium text-gray-700">Nome da Tarefa</label>
                <input type="text" id="edit-nome" name="nome" class="w-full border-2 border-gray-300 rounded-lg px-4 py-2 mt-2 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all" required>
            </div>

            <div class="mb-6">
                <label for="edit-custo" class="block text-sm font-medium text-gray-700">Custo (R$)</label>
                <input type="number" id="edit-custo" name="custo" class="w-full border-2 border-gray-300 rounded-lg px-4 py-2 mt-2 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all" required>
            </div>

            <div class="mb-6">
                <label for="edit-data-limite" class="block text-sm font-medium text-gray-700">Data Limite</label>
                <input type="date" id="edit-data-limite" name="data_limite" class="w-full border-2 border-gray-300 rounded-lg px-4 py-2 mt-2 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all" required>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="px-6 py-3 bg-green-600 text-white rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 transition-all">Salvar</button>
            </div>
        </form>
    </div>
</div>
