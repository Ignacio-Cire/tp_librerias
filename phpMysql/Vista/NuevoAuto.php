<?php
require_once __DIR__ . '/../Control/controlPersona.php';
$pageTitle = 'Nuevo Auto';
include __DIR__ . '/estructura/header.php';

$cp = new controlPersona();
$personas = $cp->listar();
?>

<h1 class="mb-4">Alta de Auto</h1>
<div class="row">
  <div class="col-lg-6">
    <form class="needs-validation" novalidate action="accion/formAccion.php" method="post" id="formNuevoAuto">
      <input type="hidden" name="op" value="nuevoAuto">
      <div class="mb-3">
        <label for="patente" class="form-label">Patente</label>
        <input type="text" class="form-control" id="patente" name="patente" required maxlength="10" pattern="^[A-ZÁÉÍÓÚÑ0-9\s-]{5,10}$" placeholder="Ej: ABC 123 o AB 123 CD">
        <div class="invalid-feedback">Ingresá una patente válida.</div>
      </div>
      <div class="mb-3">
        <label for="marca" class="form-label">Marca</label>
        <input type="text" class="form-control" id="marca" name="marca" required maxlength="50">
        <div class="invalid-feedback">Ingresá la marca.</div>
      </div>
      <div class="mb-3">
        <label for="modelo" class="form-label">Modelo (año)</label>
        <input type="number" class="form-control" id="modelo" name="modelo" required min="1900" max="2100">
        <div class="invalid-feedback">Ingresá un año válido.</div>
      </div>
      <div class="mb-3">
        <label for="dniDuenio" class="form-label">DNI Dueño</label>
        <select class="form-select" id="dniDuenio" name="dniDuenio" required>
          <option value="" selected disabled>Seleccioná una persona</option>
          <?php foreach ($personas as $p): ?>
            <option value="<?php echo htmlspecialchars($p->getNroDni()); ?>"><?php echo htmlspecialchars($p->getNroDni().' - '.$p->getApellido().', '.$p->getNombre()); ?></option>
          <?php endforeach; ?>
        </select>
        <div class="form-text">¿No está el dueño? <a href="NuevaPersona.php">Cargá una persona</a>.</div>
        <div class="invalid-feedback">Seleccioná un dueño.</div>
      </div>
      <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
  </div>
</div>

<script>
(function(){
  'use strict';
  const form = document.getElementById('formNuevoAuto');
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

