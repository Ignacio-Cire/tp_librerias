<?php
require_once __DIR__ . '/../Control/controlAuto.php';
require_once __DIR__ . '/../Control/controlPersona.php';
$pageTitle = 'Ver Autos';
include __DIR__ . '/estructura/header.php';

$controlAuto = new controlAuto();
$autos = $controlAuto->listar();
?>

<h1 class="mb-4">Autos cargados</h1>
<?php if (count($autos) > 0): ?>
    <div class="table-responsive">
        <table class="table table-striped table-hover align-middle">
            <thead>
                <tr>
                    <th>Patente</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>DNI Dueño</th>
                    <th>Dueño</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($autos as $auto): ?>
                <?php $controlPersona = new controlPersona(); $duenio = $controlPersona->buscar($auto->getDniDuenio()); ?>
                <tr>
                    <td><?php echo htmlspecialchars($auto->getPatente()); ?></td>
                    <td><?php echo htmlspecialchars($auto->getMarca()); ?></td>
                    <td><?php echo htmlspecialchars($auto->getModelo()); ?></td>
                    <td><?php echo htmlspecialchars($auto->getDniDuenio()); ?></td>
                    <td><?php echo $duenio ? htmlspecialchars($duenio->getNombre().' '.$duenio->getApellido()) : 'No encontrado'; ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php else: ?>
    <div class="alert alert-info">No hay autos cargados.</div>
<?php endif; ?>

<?php include __DIR__ . '/estructura/footer.php'; ?>

