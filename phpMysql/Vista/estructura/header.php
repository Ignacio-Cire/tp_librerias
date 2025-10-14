<?php
// Header común de la aplicación
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo isset($pageTitle) ? htmlspecialchars($pageTitle) : 'Aplicación TP4'; ?></title>
    <link rel="stylesheet" href="/UNCO_FAI_TUDW_PWD_2025_TP4-main/phpMysql/Vista/css/bootstrap.min.css">
    <link rel="stylesheet" href="/UNCO_FAI_TUDW_PWD_2025_TP4-main/phpMysql/Vista/css/styles.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">TP4 PHP/MySQL</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link" href="/UNCO_FAI_TUDW_PWD_2025_TP4-main/phpMysql/Vista/VerAutos.php">Ver Autos</a></li>
        <li class="nav-item"><a class="nav-link" href="/UNCO_FAI_TUDW_PWD_2025_TP4-main/phpMysql/Vista/buscarAuto.php">Buscar Auto</a></li>
        <li class="nav-item"><a class="nav-link" href="/UNCO_FAI_TUDW_PWD_2025_TP4-main/phpMysql/Vista/listaPersonas.php">Personas</a></li>
        <li class="nav-item"><a class="nav-link" href="/UNCO_FAI_TUDW_PWD_2025_TP4-main/phpMysql/Vista/NuevaPersona.php">Nueva Persona</a></li>
        <li class="nav-item"><a class="nav-link" href="/UNCO_FAI_TUDW_PWD_2025_TP4-main/phpMysql/Vista/NuevoAuto.php">Nuevo Auto</a></li>
        <li class="nav-item"><a class="nav-link" href="/UNCO_FAI_TUDW_PWD_2025_TP4-main/phpMysql/Vista/CambioDuenio.php">Cambio de Dueño</a></li>
        <li class="nav-item"><a class="nav-link" href="/UNCO_FAI_TUDW_PWD_2025_TP4-main/phpMysql/Vista/BuscarPersona.php">Buscar Persona</a></li>
      </ul>
    </div>
  </div>
  </nav>
<main class="container py-4">