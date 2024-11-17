const modal = document.getElementById('modal');

function openModal() {
    modal.classList.remove('hidden');
    setTimeout(() => {
        modal.classList.remove('opacity-0'); 
    }, 10); 
}

function closeModal() {
    modal.classList.add('opacity-0'); 
    setTimeout(() => {
        modal.classList.add('hidden'); 
    }, 300); 
}