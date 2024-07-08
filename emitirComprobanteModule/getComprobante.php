<?php
function verificarBoton($btonBuscar)
{
    if(isset($btonBuscar))
        return true;
    else
        return false;
}
function validarTexto($txtoCod)
{
    $txtoCod = trim($txtoCod);
    if(strlen($txtoCod)>8)
        return true;
    else
        return false;
}

if (isset($_POST['btnBoleta'])) {
    $codProforma = $_POST['btnBoleta'];
    $nombreC=$_POST['txtCliente'];
    if(validarTexto($nombreC)){
    include_once('controlGestorComprobante.php');
    $objControlB = new controlGestorComprobante();
    $objControlB -> emitirBoleta($codProforma,$nombreC);
    }else{
        include_once('../shared/windowMensajeSistema.php');
        $objMensaje = new windowMensajeSistema();
        $objMensaje -> windowMensajeSistemaShow("Error: Digite correctamente el nombre del Cliente","<a href='../index.php'>ir al inicio</a>");
    }
    
} elseif (isset($_POST['btnFactura'])) {
    $codProforma = $_POST['btnFactura'];
    $rucC=$_POST['txtCliente'];
    if(validarTexto($rucC)){
    include_once('controlGestorComprobante.php');
    $objControlB = new controlGestorComprobante();
    $objControlB -> emitirFactura($codProforma,$rucC);
    }else{
        include_once('../shared/windowMensajeSistema.php');
        $objMensaje = new windowMensajeSistema();
        $objMensaje -> windowMensajeSistemaShow("Error: Digite correctamente la RUC","<a href='../index.php'>ir al inicio</a>");
    }
}
?>