<div class="text-black fixed inset-0 flex items-center justify-center bg-gray-500 bg-opacity-50 backdrop-blur-lg">
    <div class="bg-white p-4 sm:p-8 rounded-xl shadow-xl w-full max-w-xs sm:max-w-md">
        <div class="flex items-center justify-between mb-4 sm:mb-6">
            <h2 class="text-lg sm:text-2xl font-semibold text-gray-800">Criar Nova Tarefa</h2>
            <button type="button" onclick="closeModal()" class="text-red-500 hover:text-red-700 transition-colors">
                <x-tabler-x />
            </button>
        </div>

        <form id="createTaskForm" action="{{ route('tarefas.store') }}" method="POST">
            @csrf
            <div class="mb-4 sm:mb-6">
                <label for="nome" class="block text-sm font-medium text-gray-700">Nome da Tarefa</label>
                <input type="text" name="nome" id="nome" class="w-full border-2 border-gray-300 rounded-lg px-3 sm:px-4 py-2 mt-2 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all" required>
            </div>
            <div class="mb-4 sm:mb-6">
                <label for="custo" class="block text-sm font-medium text-gray-700">Custo (R$)</label>
                <input min="0.01" step="0.01" type="number" name="custo" id="custo" class="w-full border-2 border-gray-300 rounded-lg px-3 sm:px-4 py-2 mt-2 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all" required>
            </div>
            <div class="mb-4 sm:mb-6">
                <label for="data_limite" class="block text-sm font-medium text-gray-700">Data Limite</label>
                <input type="date" name="data_limite" id="data_limite" class="w-full border-2 border-gray-300 rounded-lg px-3 sm:px-4 py-2 mt-2 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all" required>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="px-4 sm:px-6 py-2 sm:py-3 bg-green-600 text-white rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 transition-all text-sm sm:text-base">Salvar</button>
            </div>
        </form>
    </div>
</div>
