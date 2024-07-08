<?php
function verificarBoton($btonBuscar)
{
    if (isset($btonBuscar))
        return true;
    else
        return false;
}

function validarTexto($txtoCod)
{
    $txtoCod = trim($txtoCod);
    //$txtoId = trim($txtoId);
    if (strlen($txtoCod) > 5 /*and strlen($txtoId)==7*/)
        return true;
    else
        return false;
}
if (isset($_POST['btnBuscar'])) {
    $boton = $_POST['btnBuscar'];
    if (verificarBoton($boton)) {
        $txtoCod = $_POST['txtCode'];
        if (validarTexto($txtoCod)) {
            include_once('controlEntregadePedidos.php');
            $objControlB = new controlEntregadePedidos();
            $objControlB->validarDatos($txtoCod);
        } else {
            include_once('../shared/windowMensajeSistema.php');
            $objMensaje = new windowMensajeSistema();
            $objMensaje->windowMensajeSistemaShow("Error: Digite correctamente el comprobante", "<a href='../index.php'>ir al inicio</a>");
        }
    } else {
        include_once('../shared/windowMensajeSistema.php');
        $objMensaje = new windowMensajeSistema();
        $objMensaje->windowMensajeSistemaShow("Error: Acceso no permitido", "<a href='../index.php'>ir al inicio</a>");
    }
}

if (isset($_POST['btnTicket'])) {
    $idBtn = $_POST['btnTicket'];
    include_once('controlEntregadePedidos.php');
    $objControlB = new controlEntregadePedidos();
    $objControlB->datosTicket($idBtn);
}

if (isset($_POST['btnGenerarTicket'])) {
    $idBoleta = $_POST['btnGenerarTicket'];
    $txtFecha=$_POST['txtFecha'];
    $txtComprobante=$_POST['txtComprobante'];

    include_once('controlEntregadePedidos.php');
    $objControlB = new controlEntregadePedidos();
    $objControlB->generarTicket($idBoleta,$txtFecha,$txtComprobante);

}
if (isset($_POST['btnReprogramar'])) {
    $idComp = $_POST['btnReprogramar'];
    include_once('../entregarPedidosModule/formReprogramarFecha.php');
    $objControlB = new formReprogramarFecha();
    $objControlB->formReprogramarFechaShow($idComp);
}

if (isset($_POST['btnRepFecha'])) {
    $codComp = $_POST['btnRepFecha']; // B000004
    $newFecha=$_POST['txtNuevaFecha'];
    include_once('controlEntregadePedidos.php');
    $objControlB = new controlEntregadePedidos();
    $objControlB->reprogramarFecha($codComp,$newFecha);
}

if (isset($_POST['btnEntregar'])) {
    $codComp = $_POST['btnRepFecha']; // B000004
    include_once('controlEntregadePedidos.php');
    $objControlB = new controlEntregadePedidos();
    $objControlB->reprogramarFecha($codComp,$newFecha);
}



?>