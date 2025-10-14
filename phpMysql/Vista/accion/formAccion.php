<?php
// Enrutador central de acciones de formularios
// Espera un parámetro 'op' que indica la operación a ejecutar.

// Acepta tanto POST como GET, pero prioriza POST
$op = isset($_POST['op']) ? trim($_POST['op']) : (isset($_GET['op']) ? trim($_GET['op']) : '');

switch ($op) {
  case 'buscarAuto':
    require __DIR__ . '/accionBuscarAuto.php';
    break;
  case 'nuevaPersona':
    require __DIR__ . '/accionNuevaPersona.php';
    break;
  case 'nuevoAuto':
    require __DIR__ . '/accionNuevoAuto.php';
    break;
  case 'cambioDuenio':
    require __DIR__ . '/accionCambioDuenio.php';
    break;
  case 'buscarPersona':
    require __DIR__ . '/accionBuscarPersona.php';
    break;
  case 'actualizarPersona':
    require __DIR__ . '/ActualizarDatosPersona.php';
    break;
  default:
    $pageTitle = 'Acción no válida';
    include __DIR__ . '/../estructura/header.php';
    echo '<div class="alert alert-danger">Acción no válida o no especificada.</div>';
    echo '<a class="btn btn-secondary" href="../VerAutos.php">Ir al inicio</a>';
    include __DIR__ . '/../estructura/footer.php';
    exit;
}