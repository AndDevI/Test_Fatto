<div class="fixed inset-0 flex items-center justify-center bg-gray-500 bg-opacity-50 backdrop-blur-lg">
    <div class="bg-white p-6 rounded-xl shadow-xl w-full max-w-sm">
        <div class="flex items-center justify-between mb-4">
            <h2 class="text-xl font-semibold text-gray-800">Confirmar Exclusão</h2>
            <button onclick="closeDeleteModal()"  class="text-red-500 hover:text-red-700 transition-colors">
                <x-tabler-x />
            </button>
        </div>
        <p class="text-gray-600 mb-6">Tem certeza que deseja excluir esta tarefa?</p>
        <div class="flex justify-end space-x-3">
            <form id="deleteTaskForm" method="POST" class="inline-block">
                @csrf
                @method('DELETE')
                <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">
                    Excluir
                </button>
            </form>
        </div>
    </div>
</div>
