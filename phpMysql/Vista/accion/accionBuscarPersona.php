<?php
require_once __DIR__ . '/../../Control/controlPersona.php';

$pageTitle = 'Editar Persona';
include __DIR__ . '/../estructura/header.php';

$controlPersona = new controlPersona();
$formData = $controlPersona->getFormData($_GET);
$dni = $formData['dni'] ?? '';

if ($dni === '') {
  echo '<div class="alert alert-warning">No se recibió el DNI.</div>';
  echo '<a class="btn btn-secondary" href="../BuscarPersona.html">Volver</a>';
  include __DIR__ . '/../estructura/footer.php';
  exit;
}

$persona = $controlPersona->buscar($dni);

if (!$persona) {
  echo '<div class="alert alert-danger">No se encontró una persona con el DNI ingresado.</div>';
  echo '<a class="btn btn-secondary" href="../BuscarPersona.php">Volver</a>';
  include __DIR__ . '/../estructura/footer.php';
  exit;
}
?>

<h1 class="mb-4">Editar Persona</h1>
<div class="row">
  <div class="col-lg-6">
    <form class="needs-validation" novalidate action="formAccion.php" method="post" id="formEditarPersona">
      <input type="hidden" name="op" value="actualizarPersona">
      <div class="mb-3">
        <label class="form-label">DNI</label>
        <input type="text" class="form-control" name="dni" value="<?php echo htmlspecialchars($persona->getNroDni()); ?>" readonly>
      </div>
      <div class="mb-3">
        <label for="apellido" class="form-label">Apellido</label>
        <input type="text" class="form-control" id="apellido" name="apellido" required maxlength="50" value="<?php echo htmlspecialchars($persona->getApellido()); ?>">
        <div class="invalid-feedback">Ingresá el apellido.</div>
      </div>
      <div class="mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre" required maxlength="50" value="<?php echo htmlspecialchars($persona->getNombre()); ?>">
        <div class="invalid-feedback">Ingresá el nombre.</div>
      </div>
      <div class="mb-3">
        <label for="fechaNac" class="form-label">Fecha de Nacimiento</label>
        <input type="date" class="form-control" id="fechaNac" name="fechaNac" required value="<?php echo htmlspecialchars($persona->getFechaNac()); ?>">
        <div class="invalid-feedback">Seleccioná una fecha válida.</div>
      </div>
      <div class="mb-3">
        <label for="telefono" class="form-label">Teléfono</label>
        <input type="text" class="form-control" id="telefono" name="telefono" required maxlength="20" value="<?php echo htmlspecialchars($persona->getTelefono()); ?>">
        <div class="invalid-feedback">Ingresá un teléfono.</div>
      </div>
      <div class="mb-3">
        <label for="domicilio" class="form-label">Domicilio</label>
        <input type="text" class="form-control" id="domicilio" name="domicilio" required maxlength="200" value="<?php echo htmlspecialchars($persona->getDomicilio()); ?>">
        <div class="invalid-feedback">Ingresá un domicilio.</div>
      </div>
      <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
  </div>
</div>

<script>
(function(){
  'use strict';
  const form = document.getElementById('formEditarPersona');
  form.addEventListener('submit', function (event) {
    if (!form.checkValidity()) {
      event.preventDefault();
      event.stopPropagation();
    }
    form.classList.add('was-validated');
  }, false);
})();
</script>

<?php include __DIR__ . '/../estructura/footer.php'; ?>

