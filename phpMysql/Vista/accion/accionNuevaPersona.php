<?php
require_once __DIR__ . '/../../Control/controlPersona.php';

$pageTitle = 'Alta de Persona - Resultado';
include __DIR__ . '/../estructura/header.php';

$controlPersona = new controlPersona();
$formData = $controlPersona->getFormData($_POST);
$dni = $formData['dni'] ?? '';
$apellido = $formData['apellido'] ?? '';
$nombre = $formData['nombre'] ?? '';
$fechaNac = $formData['fechaNac'] ?? '';
$telefono = $formData['telefono'] ?? '';
$domicilio = $formData['domicilio'] ?? '';


if ($dni === '' || $apellido === '' || $nombre === '' || $fechaNac === '' || $telefono === '' || $domicilio === '') {
  echo '<div class="alert alert-warning">Faltan datos obligatorios.</div>';
  echo '<a class="btn btn-secondary" href="../NuevaPersona.php">Volver</a>';
  include __DIR__ . '/../estructura/footer.php';
  exit;
}

$nueva = $controlPersona->crear($dni, $apellido, $nombre, $fechaNac, $telefono, $domicilio);

if ($nueva) {
  echo '<div class="alert alert-success">La persona se cargó correctamente.</div>';
  echo '<a class="btn btn-primary" href="../listaPersonas.php">Ver listado</a> ';
  echo '<a class="btn btn-secondary" href="../NuevaPersona.php">Cargar otra</a>';
} else {
  echo '<div class="alert alert-danger">No se pudo cargar la persona. Verificá los datos o si el DNI ya existe.</div>';
  echo '<a class="btn btn-secondary" href="../NuevaPersona.php">Volver</a>';
}

include __DIR__ . '/../estructura/footer.php';

