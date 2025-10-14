<?php
require_once __DIR__ . '/../Control/controlPersona.php';
require_once __DIR__ . '/../Control/controlAuto.php';

$dni = isset($_GET['dni']) ? trim($_GET['dni']) : '';
$pageTitle = 'Autos de la Persona';
include __DIR__ . '/estructura/header.php';

if ($dni === '') {
  echo '<div class="alert alert-warning">Falta el DNI.</div>';
  echo '<a class="btn btn-secondary" href="listaPersonas.php">Volver</a>';
  include __DIR__ . '/estructura/footer.php';
  exit;
}

$cp = new controlPersona();
$persona = $cp->buscar($dni);

if (!$persona) {
  echo '<div class="alert alert-danger">No se encontró la persona solicitada.</div>';
  echo '<a class="btn btn-secondary" href="listaPersonas.php">Volver</a>';
  include __DIR__ . '/estructura/footer.php';
  exit;
}

$ca = new controlAuto();
$autos = $ca->listar("DniDuenio='" . addslashes($dni) . "'");
?>

<h1 class="mb-4">Autos de <?php echo htmlspecialchars($persona->getNombre().' '.$persona->getApellido()); ?></h1>

<div class="card mb-4">
  <div class="card-body">
    <div class="row g-3">
      <div class="col-md-3"><strong>DNI:</strong> <?php echo htmlspecialchars($persona->getNroDni()); ?></div>
      <div class="col-md-3"><strong>Fecha Nac.:</strong> <?php echo htmlspecialchars($persona->getFechaNac()); ?></div>
      <div class="col-md-3"><strong>Teléfono:</strong> <?php echo htmlspecialchars($persona->getTelefono()); ?></div>
      <div class="col-md-3"><strong>Domicilio:</strong> <?php echo htmlspecialchars($persona->getDomicilio()); ?></div>
    </div>
  </div>
  </div>

<h2 class="h4 mb-3">Listado de autos</h2>
<?php if (count($autos) > 0): ?>
  <div class="table-responsive">
    <table class="table table-striped table-hover align-middle">
      <thead>
        <tr>
          <th>Patente</th>
          <th>Marca</th>
          <th>Modelo</th>
        </tr>
      </thead>
      <tbody>
      <?php foreach ($autos as $a): ?>
        <tr>
          <td><?php echo htmlspecialchars($a->getPatente()); ?></td>
          <td><?php echo htmlspecialchars($a->getMarca()); ?></td>
          <td><?php echo htmlspecialchars($a->getModelo()); ?></td>
        </tr>
      <?php endforeach; ?>
      </tbody>
    </table>
  </div>
<?php else: ?>
  <div class="alert alert-info">La persona no tiene autos registrados.</div>
<?php endif; ?>

<a class="btn btn-secondary" href="listaPersonas.php">Volver</a>

<?php include __DIR__ . '/estructura/footer.php'; ?>

