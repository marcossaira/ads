<?php
function verificarBoton($btn)
{
    return isset($btn);
}

function validarTexto($txtCod)
{
    return strlen(trim($txtCod)) >= 20;
}

$btnMantenimiento = $_POST['btnMantenimiento'] ?? null;
$btnReparacion = $_POST['btnReparacion'] ?? null;
$btnRegistrarM = $_POST['btnRegistrarM'] ?? null;
$btnRegistrarR = $_POST['btnRegistrarR'] ?? null;

if (verificarBoton($btnMantenimiento)) {
    include_once('./tecnicoModule/controlListar.php');
    $controlListar = new controlListar();
    $controlListar->equipoMant($btnMantenimiento);
} elseif (verificarBoton($btnReparacion)) {
    include_once('./tecnicoModule/controlListar.php');
    $controlListar = new controlListar();
    $controlListar->equipoRep($btnReparacion);
} elseif (verificarBoton($btnRegistrarM)) {
    $idEquipo = $btnRegistrarM;
    $descripcionMantenimiento = $_POST['txtDetalleM'];
    $fechaMantenimiento = $_POST['txtFecha'];
    
    if (validarTexto($descripcionMantenimiento)) {
        include_once('./tecnicoModule/controlListar.php');
        $controlListar = new controlListar();
        $controlListar->insertarMantenimientoEquipo($descripcionMantenimiento, $fechaMantenimiento, $idEquipo);
    } else {
        include_once('../shared/windowMensajeSistema.php');
        $mensajeSistema = new WindowMensajeSistema();
        $mensajeSistema->mostrarMensaje("Detalle correctamente el mantenimiento");
    }
} elseif (verificarBoton($btnRegistrarR)) {
    $idEquipo = $btnRegistrarR;
    $descripcionReparacion = $_POST['txtDetalleR'];
    $fechaReparacion = $_POST['txtFecha'];

    if (validarTexto($descripcionReparacion)) {
        include_once('./tecnicoModule/controlListar.php');
        $controlListar = new controlListar();
        $controlListar->insertarRepEquipo($descripcionReparacion, $fechaReparacion, $idEquipo);
    } else {
        include_once('../shared/windowMensajeSistema.php');
        $mensajeSistema = new WindowMensajeSistema();
        $mensajeSistema->mostrarMensaje("Detalle correctamente la reparacion");
    }
} else {
    include_once('../shared/windowMensajeSistema.php');
    $mensajeSistema = new WindowMensajeSistema();
    $mensajeSistema->mostrarMensaje("Error: Acceso no permitido");
}
?>
