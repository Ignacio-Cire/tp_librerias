



(function(){
  const form = document.getElementById('formNuevaPersona');
  form.addEventListener('submit', function (event) {
    let esValido = true;
    
    // 1. Validación normal de Bootstrap
    if (!form.checkValidity()) {
      esValido = false;
    }
    
    // 2. Validación reCAPTCHA
    if (!grecaptcha.getResponse()) {
      esValido = false;
      // Mostrar error
      document.getElementById('recaptcha-error').style.display = 'block';
    } else {
      document.getElementById('recaptcha-error').style.display = 'none';
    }
    
    if (!esValido) {
      event.preventDefault();
      event.stopPropagation();
    }
    
    form.classList.add('was-validated');
  }, false);
})();