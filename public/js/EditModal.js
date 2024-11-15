function openEditModal(id, nome, custo, dataLimite) {
    document.getElementById('edit-nome').value = nome;
    document.getElementById('edit-custo').value = custo;
    document.getElementById('edit-data-limite').value = dataLimite;

    document.getElementById('edit-form').action = `/tarefas/${id}`;
        
    const modal = document.getElementById('edit_modal');
    modal.classList.remove('hidden');
    setTimeout(() => {
        modal.classList.remove('opacity-0'); 
    }, 10); 
}

function closeEditModal() {
    const modal = document.getElementById('edit_modal');
    modal.classList.add('opacity-0'); 
    setTimeout(() => {
        modal.classList.add('hidden'); 
    }, 300); 
}