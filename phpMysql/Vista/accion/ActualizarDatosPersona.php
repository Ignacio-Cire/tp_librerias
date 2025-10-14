<?php
require_once __DIR__ . '/../../Control/controlPersona.php';

$pageTitle = 'Actualizar Persona - Resultado';
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
  echo '<a class="btn btn-secondary" href="../BuscarPersona.html">Volver</a>';
  include __DIR__ . '/../estructura/footer.php';
  exit;
}

$actualizada = $controlPersona->modificar($dni, $apellido, $nombre, $fechaNac, $telefono, $domicilio);

if ($actualizada) {
  echo '<div class="alert alert-success">Los datos de la persona fueron actualizados.</div>';
  echo '<a class="btn btn-primary" href="../listaPersonas.php">Ver listado</a> ';
  echo '<a class="btn btn-secondary" href="../BuscarPersona.php">Buscar otra</a>';
} else {
  echo '<div class="alert alert-danger">No se pudo actualizar la persona.</div>';
  echo '<a class="btn btn-secondary" href="../BuscarPersona.php">Volver</a>';
}

include __DIR__ . '/../estructura/footer.php';

