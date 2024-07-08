<?php
include_once('../shared/ventanaSistema.php');
include_once('../shared/windowMensajeSistema.php');
include_once('../securityModule/windowBienvenidaSistema.php');

class ControlAutenticarUsuario {

    public function validarDatos($login, $password)
    {
        include_once('../model/ModeloUsuario.php');
        $objUsuario = new ModeloUsuario();
        $respuesta = $objUsuario->verificarUsuario($login, $password);
        
        if ($respuesta == 1) {
            include_once('../model/ModeloUsuarioPrivilegio.php');
            $objWindowBienvenida = new WindowBienvenidaSistema();
            $objPrivilegioUsuario = new ModeloUsuarioPrivilegio();
            $listaPrivilegios = $objPrivilegioUsuario->obtenerPrivilegios($login);
            
            session_start();
            $_SESSION['login'] = $login;
            
            $objWindowBienvenida->mostrarMensaje($listaPrivilegios);
        } else {
            $objMensaje = new WindowMensajeSistema();
            $objMensaje->mostrarMensaje("El usuario no se ha encontrado, el password no coincide, o está deshabilitado", "<a href='../index.php'>Ir al inicio</a>");
        }
    }
}
?>
