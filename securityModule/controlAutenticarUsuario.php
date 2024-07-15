<?php
include_once('../shared/ventanaSistema.php');
include_once('../shared/windowMensajeSistema.php');
include_once('../securityModule/windowBienvenidaSistema.php');
include_once('../model/ModeloUsuario.php');
include_once('../model/ModeloUsuarioPrivilegio.php');

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

class ControlAutenticarUsuario {

    public function validarDatos($login, $password)
    {
        $objUsuario = new ModeloUsuario();
        $respuesta = $objUsuario->verificarUsuario($login, $password);
        
        if ($respuesta == 1) {
            $objPrivilegioUsuario = new ModeloUsuarioPrivilegio();
            $listaPrivilegios = $objPrivilegioUsuario->obtenerPrivilegios($login);
            
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            
            $_SESSION['login'] = $login;
            
            $objWindowBienvenida = new WindowBienvenidaSistema();
            $objWindowBienvenida->mostrarMensaje($listaPrivilegios);
        
        } else {
            $objMensaje = new WindowMensajeSistema();
            $objMensaje->mostrarMensaje("El usuario no se ha encontrado, el password no coincide o está deshabilitado", "<a href='../index.php'>Ir al inicio</a>");
        }
    }
    public function mostrarBienvenidaConPrivilegios($login)
    {
        $objPrivilegioUsuario = new ModeloUsuarioPrivilegio();
        $listaPrivilegios = $objPrivilegioUsuario->obtenerPrivilegios($login);
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
     
        $_SESSION['login'] = $login;
        $objWindowBienvenida = new WindowBienvenidaSistema();
        $objWindowBienvenida->mostrarMensaje($listaPrivilegios);
    }
}
?>
