<?php
// Enrutador central de acciones de formularios
// Espera un parámetro 'op' que indica la operación a ejecutar.


function validarRecaptcha($token) {
    $claveSecreta = "6LdbfOkrAAAAAI_jykoYr2XNDclhDaGNfF-v40-i"; 
    $url = 'https://www.google.com/recaptcha/api/siteverify';
    $datos = [
        'secret'   => $claveSecreta,
        'response' => $token
    ];
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($datos));
    $respuestaJson = curl_exec($ch);
    curl_close($ch);
    $respuesta = json_decode($respuestaJson);
    return ($respuesta && $respuesta->success); // Versión corta de la función
}



// Acepta tanto POST como GET, pero prioriza POST
$op = isset($_POST['op']) ? trim($_POST['op']) : (isset($_GET['op']) ? trim($_GET['op']) : '');

switch ($op) {
  case 'buscarAuto':
    require __DIR__ . '/accionBuscarAuto.php';
    break;
  case 'nuevaPersona':


// Primero verificamos que el usuario no sea un robot.
    if (empty($_POST['g-recaptcha-response']) || !validarRecaptcha($_POST['g-recaptcha-response'])) {
        
        // Si falla el reCAPTCHA, mostramos una página de error y morimos.
        // Es mejor incluir un header/footer aquí también para consistencia.
        require_once __DIR__ . '/../estructura/header.php';
        echo '<div class="alert alert-danger">Error de seguridad: El reCAPTCHA es inválido.</div>';
        echo '<a class="btn btn-secondary" href="../NuevaPersona.php">Volver a intentar</a>';
        require_once __DIR__ . '/../estructura/footer.php';
        exit; // Detenemos todo.
    }

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