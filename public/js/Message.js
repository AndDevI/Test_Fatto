 document.addEventListener('DOMContentLoaded', function() {
    const successMessage = document.getElementById('successMessage');
    if (successMessage) {
        successMessage.classList.remove('opacity-0');
        successMessage.classList.add('opacity-100');
        setTimeout(() => {
            successMessage.classList.remove('opacity-100');
            successMessage.classList.add('opacity-0');
        }, 5000); 
    }

    const errorMessages = document.querySelectorAll('#errorMessage');
    errorMessages.forEach((msg) => {
        msg.classList.remove('opacity-0');
        msg.classList.add('opacity-100');
        setTimeout(() => {
            msg.classList.remove('opacity-100');
            msg.classList.add('opacity-0');
        }, 5000); 
    });
 });