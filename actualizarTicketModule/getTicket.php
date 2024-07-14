<?php
function verificarBoton($btn)
{
    if(isset($btn))
        return true;
    else
        return false;
}

function validarTexto($txtCod)
{
    $txtCodi=trim($txtCod);
    if(strlen($txtCodi)>=7)
        return true;
    else
        return false;
}


//echo verificarBoton($boton);
if (isset($_POST['btnBuscar'])) {
    $boton = $_POST['btnBuscar'];
    if (verificarBoton($boton)) {
        $txtCodigo = $_POST['txtCodigo'];
        if (validarTexto($txtCodigo)) {
            include_once('controlActualizarTicket.php');
            $objControl = new ControlActualizarTicket();
            $command = new ValidarTicketCommand();
            $objControl->ejecutarComando($command, $txtCodigo);
        } else {
            include_once('../shared/windowMensajeSistema.php');
            $objMensaje = new windowMensajeSistema();
            $objMensaje->mostrarMensaje("Error: datos no válidos", "<a href='../index.php'>ir al inicio</a>");
        }
    } else {
        include_once('../shared/windowMensajeSistema.php');
        $objMensaje = new windowMensajeSistema();
        $objMensaje->mostrarMensaje("Error: Acceso no permitido", "<a href='../index.php'>ir al inicio</a>");
    }
} elseif (isset($_POST['btnEntregar'])) {
    $txtCodigo = $_POST['btnEntregar'];
    include_once('controlActualizarTicket.php');
    $objControl = new ControlActualizarTicket();
    $command = new EntregarTicketCommand();
    $objControl->ejecutarComando($command, $txtCodigo);
} elseif (isset($_POST['btnAnular'])) {
    $txtCodigo = $_POST['btnAnular'];
    include_once('controlActualizarTicket.php');
    $objControl = new ControlActualizarTicket();
    $command = new AnularTicketCommand();
    $objControl->ejecutarComando($command, $txtCodigo);
}
?>