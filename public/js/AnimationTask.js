document.addEventListener('DOMContentLoaded', () => {
    const novaTarefa = document.querySelector('.animate-highlight');
    if (novaTarefa) {
        setTimeout(() => {
            novaTarefa.classList.remove('animate-highlight');
        }, 2000); 
    }
});