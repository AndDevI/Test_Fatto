const deleteModal = document.getElementById('delete_modal');
const deleteForm = document.getElementById('deleteTaskForm');

function openDeleteModal(actionUrl) {
    deleteForm.action = actionUrl; 

    deleteModal.classList.remove('hidden');
    setTimeout(() => {
        deleteModal.classList.remove('opacity-0');
    }, 10);
}

function closeDeleteModal() {
    deleteModal.classList.add('opacity-0');
    
    setTimeout(() => {
        deleteModal.classList.add('hidden');
    }, 300); 
}
