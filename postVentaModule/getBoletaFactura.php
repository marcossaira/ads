<?php
function verificarBoton($btonBuscar)
{
    if(isset($btonBuscar))
        return true;
    else
        return false;
}

function validarTexto($txtoNum)
{
    $txtoNum = trim($txtoNum);
    if(strlen($txtoNum)==7)
        return true;
    else
        return false;
}

$boton = $_POST['btnBuscar'];
//echo verificarBoton($boton);
if(verificarBoton($boton))
{   //echo aea;
    $txtoNum = $_POST['txtNum'];
    //$txtoId = $_POST['txtId'];
    if(validarTexto($txtoNum))
    {   //echo aea;
        include_once('controlGestionarBoletaFactura.php');
        $objControlB = new controlGestionarBoletaFactura();
        $objControlB -> validarDatos($txtoNum);
        
    }    
    else
    {
        include_once('../shared/windowMensajeSistema.php');
        $objMensaje = new windowMensajeSistema();
        $objMensaje -> windowMensajeSistemaShow("Error: los datos ingresados no son validos","<a href='../index.php'>ir al inicio</a>");

    }
}
else
{
    include_once('../shared/windowMensajeSistema.php');
    $objMensaje = new windowMensajeSistema();
    $objMensaje -> windowMensajeSistemaShow("Error: Acceso no permitido","<a href='../index.php'>ir al inicio</a>");
}
?>