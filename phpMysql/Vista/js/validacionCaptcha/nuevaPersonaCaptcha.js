form.addEventListener('submit', function(event) {
    // 1. Verificar reCAPTCHA
    if (!grecaptcha.getResponse()) {
        event.preventDefault();
        
        // Mostrar error en el formulario, no alert
        const recaptchaContainer = document.querySelector('.g-recaptcha');
        recaptchaContainer.insertAdjacentHTML('afterend', 
            '<div class="alert alert-danger mt-2">❌ Completá el "No soy un robot"</div>'
        );
        return false;
    }
    
   
});