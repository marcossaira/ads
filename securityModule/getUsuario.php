<?php
include_once('../shared/ventanaSistema.php');
include_once('../shared/windowMensajeSistema.php');
include_once('../securityModule/controlAutenticarUsuario.php');

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

function verificarBoton($btonIngresar)
{
    return isset($btonIngresar);
}

function validarTexto($login, $password)
{
    $login = trim($login);
    $password = trim($password);
    return (strlen($login) > 3 && strlen($password) > 3);
}

$boton = $_POST['btnLogin'];

if (verificarBoton($boton)) {
    $login = $_POST['txtLogin'];
    $password = $_POST['txtPassword'];

    if (validarTexto($login, $password)) {
        $obControl = new ControlAutenticarUsuario();
        $obControl->validarDatos($login, $password);
    } else {
        $objMensaje = new WindowMensajeSistema();
        $objMensaje->mostrarMensaje("Error: los datos ingresados no son válidos","alerta");
    }
} else {
    $objMensaje = new WindowMensajeSistema();
    $objMensaje->mostrarMensaje("Error: se ha detectado un acceso no permitido","alerta");
}
?>