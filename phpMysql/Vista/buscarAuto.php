<?php
$pageTitle = 'Buscar Auto';
include __DIR__ . '/estructura/header.php';
?>

<h1 class="mb-4">Buscar Auto por Patente</h1>
<div class="row">
  <div class="col-md-6 col-lg-5">
    <form class="needs-validation" novalidate action="accion/formAccion.php" method="get" id="formBuscarAuto">
      <input type="hidden" name="op" value="buscarAuto">
      <div class="mb-3">
        <label for="patente" class="form-label">Patente</label>
        <input type="text" class="form-control" id="patente" name="patente" required maxlength="10" pattern="^[A-ZÁÉÍÓÚÑ0-9\s-]{5,10}$" placeholder="Ej: ABC 123 o AB 123 CD">
        <div class="form-text">Ingresá la patente (5 a 10 caracteres, mayúsculas y números).</div>
        <div class="invalid-feedback">Ingresá una patente válida.</div>
      </div>
      <button type="submit" class="btn btn-primary">Buscar</button>
    </form>
  </div>
</div>

<script>
(function(){
  'use strict';
  const form = document.getElementById('formBuscarAuto');
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

