<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (isset($_GET['idEq'])) {
    $idEq = $_GET['idEq'];
    
    // Almacena el idEq en la sesión si aún no está establecido
    if (!isset($_SESSION['idEq'])) {
        $_SESSION['idEq'] = $idEq;
    }

    // Incluye el controlador o realiza otras operaciones según sea necesario
    include_once('../tecnicoModule/controlListar.php');
    $controlListar = new controlListar();
    $controlListar->equipoSeleccionado($idEq);
} else {
    // Manejar caso en el que no se ha proporcionado un idEq válido
    echo "No se ha proporcionado un idEq válido";
}
?>
