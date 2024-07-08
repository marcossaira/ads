<?php
function verificarBoton($btonIngresar)
{
    if(isset($btonIngresar))
        return true;
    else
        return false;
}

function validarTexto($login,$password)
{
    $login = trim($login);
    $password = trim($password);
    if(strlen($login)>3 and strlen($password)>3)
        return true;
    else
        return false;
}

$boton = $_POST['btnLogin'];
//echo verificarBoton($boton);
if(verificarBoton($boton))
{
    $login = $_POST['txtLogin'];
    $password = $_POST['txtPassword'];
    if(validarTexto($login,$password))
    {
        include_once('controlAutenticarUsuario.php');
        $obControl = new controlAutenticarUsuario();
        $obControl -> validarDatos($login,$password);
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
    $objMensaje -> windowMensajeSistemaShow("Error: se ha detectado un acceso no permitido","<a href='../index.php'>ir al inicio</a>");
}
?>