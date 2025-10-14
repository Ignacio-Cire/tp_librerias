<?php
require_once __DIR__ . '/../../Control/controlAuto.php';
require_once __DIR__ . '/../../Control/controlPersona.php';

$pageTitle = 'Resultado de Búsqueda';
include __DIR__ . '/../estructura/header.php';

$controlAuto = new controlAuto();
$formData = $controlAuto->getFormData($_GET);
$patente = $formData['patente'];

if ($patente === '') {
    echo '<div class="alert alert-warning">No se recibió la patente.</div>';
    include __DIR__ . '/../estructura/footer.php';
    exit;
}

$auto = $controlAuto->buscar($patente);

if ($auto) {
    $controlPersona = new controlPersona();
    $duenio = $controlPersona->buscar($auto->getDniDuenio());
    ?>
    <h1 class="mb-4">Resultado</h1>
    <div class="table-responsive">
      <table class="table table-bordered align-middle">
        <thead class="table-light">
          <tr>
            <th>Patente</th>
            <th>Marca</th>
            <th>Modelo</th>
            <th>DNI Dueño</th>
            <th>Dueño</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><?php echo htmlspecialchars($auto->getPatente()); ?></td>
            <td><?php echo htmlspecialchars($auto->getMarca()); ?></td>
            <td><?php echo htmlspecialchars($auto->getModelo()); ?></td>
            <td><?php echo htmlspecialchars($auto->getDniDuenio()); ?></td>
            <td><?php echo $duenio ? htmlspecialchars($duenio->getNombre().' '.$duenio->getApellido()) : 'No encontrado'; ?></td>
          </tr>
        </tbody>
      </table>
    </div>
    <a class="btn btn-secondary" href="../buscarAuto.php">Volver</a>
    <?php
} else {
    ?>
    <div class="alert alert-danger">No se encontró ningún auto con la patente ingresada.</div>
    <a class="btn btn-secondary" href="../buscarAuto.php">Volver</a>
    <?php
}

include __DIR__ . '/../estructura/footer.php';

