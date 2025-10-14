<?php
require_once __DIR__ . '/../Control/controlPersona.php';
$pageTitle = 'Personas';
include __DIR__ . '/estructura/header.php';

$controlPersona = new controlPersona();
$personas = $controlPersona->listar();
?>

<h1 class="mb-4">Listado de Personas</h1>
<?php if (count($personas) > 0): ?>
  <div class="table-responsive">
    <table class="table table-striped table-hover align-middle">
      <thead>
        <tr>
          <th>DNI</th>
          <th>Apellido</th>
          <th>Nombre</th>
          <th>Fecha Nac.</th>
          <th>Teléfono</th>
          <th>Domicilio</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
      <?php foreach ($personas as $p): ?>
        <tr>
          <td><?php echo htmlspecialchars($p->getNroDni()); ?></td>
          <td><?php echo htmlspecialchars($p->getApellido()); ?></td>
          <td><?php echo htmlspecialchars($p->getNombre()); ?></td>
          <td><?php echo htmlspecialchars($p->getFechaNac()); ?></td>
          <td><?php echo htmlspecialchars($p->getTelefono()); ?></td>
          <td><?php echo htmlspecialchars($p->getDomicilio()); ?></td>
          <td>
            <a class="btn btn-sm btn-primary" href="autosPersona.php?dni=<?php echo urlencode($p->getNroDni()); ?>">Ver autos</a>
          </td>
        </tr>
      <?php endforeach; ?>
      </tbody>
    </table>
  </div>
<?php else: ?>
  <div class="alert alert-info">No hay personas cargadas.</div>
<?php endif; ?>

<?php include __DIR__ . '/estructura/footer.php'; ?>

