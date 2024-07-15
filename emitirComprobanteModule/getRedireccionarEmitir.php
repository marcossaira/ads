<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (isset($_GET['codProforma'])) {
    $codProforma = $_GET['codProforma'];
    
    // Almacena el idEq en la sesión si aún no está establecido
    if (!isset($_SESSION['codProforma'])) {
        $_SESSION['codProforma'] = $codProforma;
    }

    include_once('../emitirComprobanteModule/controlGestorComprobante.php');
    $objControlB = new controlGestorComprobante();
    $objControlB ->validarDatos($codProforma);

} else {
    // Manejar caso en el que no se ha proporcionado un idEq válido
    echo "No se ha proporcionado un idEq válido";
}
?>

