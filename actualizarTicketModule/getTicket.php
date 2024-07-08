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
    if(verificarBoton($boton))
    {   
        $txtCodigo=$_POST['txtCodigo'];
        if(validarTexto($txtCodigo))
        { 
            include_once('controlActualizarTicket.php');
            $objControlB = new controlActualizarTicket();
            $objControlB -> validarTicket($txtCodigo);
        }    

        else
        {
            include_once('../shared/windowMensajeSistema.php');
            $objMensaje = new windowMensajeSistema();
            $objMensaje -> windowMensajeSistemaShow("Error: datos no validos","<a href='../index.php'>ir al inicio</a>");

        }
    }
    else
    {
        include_once('../shared/windowMensajeSistema.php');
        $objMensaje = new windowMensajeSistema();
        $objMensaje -> windowMensajeSistemaShow("Error: Acceso no permitido","<a href='../index.php'>ir al inicio</a>");
    }
}
elseif (isset($_POST['btnEntregar'])) {
    $txtcodigo3=$_POST['btnEntregar'];
    include_once('controlActualizarTicket.php');
    $objControlB = new controlActualizarTicket();
    $objControlB -> entregarTicket($txtcodigo3);
  
}
elseif (isset($_POST['btnAnular'])) {
    $txtcodigo2=$_POST['btnAnular'];
    include_once('controlActualizarTicket.php');
    $objControlB = new controlActualizarTicket();
    $objControlB -> anularTicket($txtcodigo2);
}

?>