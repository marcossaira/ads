<?php
function verificarBoton($btn)
{
    if(isset($btn))
        return true;
    else
        return false;
}

$boton = $_POST['btnSeleccionar'];
//echo verificarBoton($boton);
if(verificarBoton($boton))
{  
    if (!empty($boton)) {
        include_once('controlListar.php');
        $objControl = new controlListar();
        $objControl -> EquipoSeleccionado($boton);
    }
    else{
        include_once('../shared/windowMensajeSistema.php');
        $objMensaje = new windowMensajeSistema();
        $objMensaje->windowMensajeSistemaShow("Error: Acceso no permitido");
    }
}
?>