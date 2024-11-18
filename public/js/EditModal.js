const editModal = document.getElementById('edit_modal');

function openEditModal(id, nome, custo, dataLimite) {
    document.getElementById('edit-nome').value = nome;
    document.getElementById('edit-custo').value = custo;
    document.getElementById('edit-data-limite').value = dataLimite;

    document.getElementById('edit-form').action = `/tarefas/${id}`;
           
    editModal.classList.remove('hidden');
    setTimeout(() => {
        editModal.classList.remove('opacity-0'); 
    }, 10); 
}

function closeEditModal() {
    editModal.classList.add('opacity-0'); 
    setTimeout(() => {
        editModal.classList.add('hidden'); 
    }, 300); 
}