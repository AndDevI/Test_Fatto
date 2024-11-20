document.addEventListener('DOMContentLoaded', () => {
    const novaTarefa = document.querySelector('.animate-highlight');
    if (novaTarefa) {
        novaTarefa.scrollIntoView({
            behavior: 'smooth', 
            block: 'center',    
        });
        
        setTimeout(() => {
            novaTarefa.classList.remove('animate-highlight');
        }, 2000); 
    }
});