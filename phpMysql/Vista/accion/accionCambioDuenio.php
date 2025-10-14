<?php
require_once __DIR__ . '/../../Control/controlAuto.php';
require_once __DIR__ . '/../../Control/controlPersona.php';

$pageTitle = 'Cambio de Dueño - Resultado';
include __DIR__ . '/../estructura/header.php';

$controlAuto = new controlAuto();
$formData = $controlAuto->getFormData($_POST);
$patente = $formData['patente'] ?? '';
$dni = $formData['dniDuenio'] ?? '';

if ($patente === '' || $dni === '') {
  echo '<div class="alert alert-warning">Faltan datos obligatorios.</div>';
  echo '<a class="btn btn-secondary" href="../CambioDuenio.php">Volver</a>';
  include __DIR__ . '/../estructura/footer.php';
  exit;
}

$controlPersona = new controlPersona();
$persona = $controlPersona->buscar($dni);
if (!$persona) {
  echo '<div class="alert alert-danger">El DNI ingresado no existe. Debés cargar la persona primero.</div>';
  echo '<a class="btn btn-primary" href="../NuevaPersona.php">Cargar persona</a> ';
  echo '<a class="btn btn-secondary" href="../CambioDuenio.php">Volver</a>';
  include __DIR__ . '/../estructura/footer.php';
  exit;
}

$auto = $controlAuto->buscar($patente);

if (!$auto) {
  echo '<div class="alert alert-danger">No existe un auto con la patente ingresada.</div>';
  echo '<a class="btn btn-secondary" href="../CambioDuenio.php">Volver</a>';
  include __DIR__ . '/../estructura/footer.php';
  exit;
}

// Actualizar dueño conservando datos actuales del auto
$actualizado = $controlAuto->modificarDuenio($auto->getPatente(), $dni);

if ($actualizado) {
  echo '<div class="alert alert-success">Se actualizó el dueño del auto correctamente.</div>';
  echo '<a class="btn btn-primary" href="../VerAutos.php">Ver autos</a> ';
  echo '<a class="btn btn-secondary" href="../CambioDuenio.php">Hacer otro cambio</a>';
} else {
  echo '<div class="alert alert-danger">No se pudo actualizar el dueño. Intentalo nuevamente.</div>';
  echo '<a class="btn btn-secondary" href="../CambioDuenio.php">Volver</a>';
}

include __DIR__ . '/../estructura/footer.php';

