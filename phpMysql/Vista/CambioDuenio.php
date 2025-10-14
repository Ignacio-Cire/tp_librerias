<?php
$pageTitle = 'Cambio de Dueño';
include __DIR__ . '/estructura/header.php';
?>

<h1 class="mb-4">Cambio de Dueño</h1>
<div class="row">
  <div class="col-lg-6">
    <form class="needs-validation" novalidate action="accion/formAccion.php" method="post" id="formCambioDuenio">
      <input type="hidden" name="op" value="cambioDuenio">
      <div class="mb-3">
        <label for="patente" class="form-label">Patente</label>
        <input type="text" class="form-control" id="patente" name="patente" required maxlength="10" pattern="^[A-ZÁÉÍÓÚÑ0-9\s-]{5,10}$" placeholder="Ej: ABC 123 o AB 123 CD">
        <div class="invalid-feedback">Ingresá una patente válida.</div>
      </div>
      <div class="mb-3">
        <label for="dniDuenio" class="form-label">DNI nuevo dueño</label>
        <input type="text" class="form-control" id="dniDuenio" name="dniDuenio" required maxlength="10" pattern="^[0-9]{7,10}$" placeholder="Solo números">
        <div class="invalid-feedback">Ingresá un DNI válido (7 a 10 dígitos).</div>
      </div>
      <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
  </div>
</div>

<script>
(function(){
  'use strict';
  const form = document.getElementById('formCambioDuenio');
  form.addEventListener('submit', function (event) {
    if (!form.checkValidity()) {
      event.preventDefault();
      event.stopPropagation();
    }
    form.classList.add('was-validated');
  }, false);
})();
</script>

<?php include __DIR__ . '/estructura/footer.php'; ?>

