<?php
function verificarBoton($btn)
{
    return isset($btn);
}

$btnSeleccionar = $_POST['btnSeleccionar'] ?? null;

if (verificarBoton($btnSeleccionar)) {  
    include_once('../tecnicoModule/controlListar.php');
    $controlListar = new controlListar();
    $controlListar->equipoSeleccionado($btnSeleccionar);
} else {
    include_once('../shared/windowMensajeSistema.php');
    $mensajeSistema = new WindowMensajeSistema();
    $mensajeSistema->mostrarMensaje("Error: Acceso no permitido");
}
?>
