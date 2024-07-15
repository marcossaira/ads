<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
 // Inicia la sesión si aún no está iniciada

// Verifica si el usuario está autenticado (opcional, dependiendo de tus necesidades de seguridad)
if (!isset($_SESSION['login'])) {
    header('Location: ../index.php'); // Redirige al usuario al inicio si no está autenticado
    exit;
}
include_once('../tecnicoModule/formEquipos.php');
include_once('../model/modeloEquipo.php');
include_once('../shared/WindowMensajeSistema.php');

$objEquipo = new modeloEquipo();
$datos = $objEquipo->listarEquipos();

if (!empty($datos)) {
    $objFormEquipos = new formEquipos();
    $objFormEquipos->formEquiposShow($datos);
} else {
    $objMensaje = new WindowMensajeSistema();
    $objMensaje->mostrarMensaje("No tiene ningún equipo en su inventario");
}
?>
