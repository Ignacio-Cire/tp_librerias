<?php
$pageTitle = 'Nueva Persona';
include __DIR__ . '/estructura/header.php';
?>

<h1 class="mb-4">Alta de Persona</h1>
<div class="row">
  <div class="col-lg-6">
    <form class="needs-validation" novalidate action="accion/formAccion.php" method="post" id="formNuevaPersona">
      <input type="hidden" name="op" value="nuevaPersona">
      <div class="mb-3">
        <label for="dni" class="form-label">DNI</label>
        <input type="text" class="form-control" id="dni" name="dni" required maxlength="10" pattern="^[0-9]{7,10}$" placeholder="Solo números">
        <div class="invalid-feedback">Ingresá un DNI válido (7 a 10 dígitos).</div>
      </div>
      <div class="mb-3">
        <label for="apellido" class="form-label">Apellido</label>
        <input type="text" class="form-control" id="apellido" name="apellido" required maxlength="50">
        <div class="invalid-feedback">Ingresá el apellido.</div>
      </div>
      <div class="mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre" required maxlength="50">
        <div class="invalid-feedback">Ingresá el nombre.</div>
      </div>
      <div class="mb-3">
        <label for="fechaNac" class="form-label">Fecha de Nacimiento</label>
        <input type="date" class="form-control" id="fechaNac" name="fechaNac" required>
        <div class="invalid-feedback">Seleccioná una fecha válida.</div>
      </div>
      <div class="mb-3">
        <label for="telefono" class="form-label">Teléfono</label>
        <input type="text" class="form-control" id="telefono" name="telefono" required maxlength="20">
        <div class="invalid-feedback">Ingresá un teléfono.</div>
      </div>
      <div class="mb-3">
        <label for="domicilio" class="form-label">Domicilio</label>
        <input type="text" class="form-control" id="domicilio" name="domicilio" required maxlength="200">
        <div class="invalid-feedback">Ingresá un domicilio.</div>
      </div>
      <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
  </div>
</div>

<script>
(function(){
  'use strict';
  const form = document.getElementById('formNuevaPersona');
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

