<?php
include_once('../model/conectarBaseDatos.php');
include_once('../model/modeloUsuario.php');
include_once('../model/modeloUsuarioPrivilegio.php');

class UserFactory {
    public static function createUser() {
        return new modeloUsuario();
    }

    public static function createUserPrivileges() {
        return new modeloUsuarioPrivilegio();
    }

    public static function createWindowBienvenida() {
        include_once('../securityModule/windowBienvenidaSistema.php');
        return new windowBienvenidaSistema();
    }

    public static function createWindowMessage() {
        include_once('../shared/windowMensajeSistema.php');
        return new windowMensajeSistema();
    }

    public static function createDatabase() {
        return ConectarBaseDatos::getInstance();
    }
}
?>
