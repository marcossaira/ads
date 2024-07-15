<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include_once('../emitirComprobanteModule/EstrategiasComprobante.php');
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
    if(strlen($txtoCod)>5)
        return true;
    else
        return false;
}

$boton = $_POST['btnBuscar'];
if(verificarBoton($boton))
{   
    $txtoCod = $_POST['txtProforma'];
    if(validarTexto($txtoCod))
    {   
        include_once('controlGestorComprobante.php');
        $objControlB = new controlGestorComprobante();
        $objControlB ->validarDatos($txtoCod);
    }    
    else
    {
        include_once('../shared/windowMensajeSistema.php');
        $objMensaje = new windowMensajeSistema();
        $objMensaje -> mostrarMensaje("Error: Digite correctamente la proforma","<a href='../index.php'>ir al inicio</a>");
    }
}
else
{
    include_once('../shared/windowMensajeSistema.php');
    $objMensaje = new windowMensajeSistema();
    $objMensaje -> mostrarMensaje("Error: Acceso no permitido","<a href='../index.php'>ir al inicio</a>");
}
?>