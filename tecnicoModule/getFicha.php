<?php
function verificarBoton($btn)
{
    if (isset($btn))
        return true;
    else
        return false;
}
function validarTexto($txtCod)
{
    $txtCodi = trim($txtCod);
    if (strlen($txtCodi) >= 20)
        return true;
    else
        return false;
}

$btnMantenimiento = $_POST['btnMantenimiento'] ?? null;;
$btnReparacion = $_POST['btnReparacion'] ?? null;;
$btnRegistrarM = $_POST['btnRegistrarM'] ?? null;
$btnRegistrarR = $_POST['btnRegistrarR'] ?? null;

if (verificarBoton($btnMantenimiento)) {
    include_once('controlListar.php');
    $objControl = new controlListar();
    $objControl->equipoMant($btnMantenimiento);
} elseif (verificarBoton($btnReparacion)) {
    include_once('controlListar.php');
    $objControl = new controlListar();
    $objControl->equipoRep($btnReparacion);
} elseif (verificarBoton($btnRegistrarM)) {
    $idBtn = $btnRegistrarM;
    $descripcionm = $_POST['txtDetalleM'];
    $fechamant = $_POST['txtFecha'];
    if (validarTexto($descripcionm)) {
        include_once('controlListar.php');
        $objControlB = new controlListar();
        $objControlB->insertarMantenimientoEquipo($descripcionm, $fechamant, $idBtn);
    } else {
        include_once('../shared/windowMensajeSistema.php');
        $objMensaje = new windowMensajeSistema();
        $objMensaje->windowMensajeSistemaShow("Detalle correctamente el mantenimiento");
    }
} elseif (verificarBoton($btnRegistrarR)) {
    $idBtn = $btnRegistrarR;
    $descripcionr = $_POST['txtDetalleR'];
    $fecharep = $_POST['txtFecha'];
    if (validarTexto($descripcionr)) {
        include_once('controlListar.php');
        $objControlB = new controlListar();
        $objControlB->insertarRepEquipo($descripcionr, $fecharep, $idBtn);
    } else {
        include_once('../shared/windowMensajeSistema.php');
        $objMensaje = new windowMensajeSistema();
        $objMensaje->windowMensajeSistemaShow("Detalle correctamente la reparacion");
    }
} else {
    include_once('../shared/windowMensajeSistema.php');
    $objMensaje = new windowMensajeSistema();
    $objMensaje->windowMensajeSistemaShow("Error: Acceso no permitido");
}
