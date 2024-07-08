<?php
require_once('commandControlInsumos.php');

class controlInsumos {
    public function executeCommand(Command $command) {
        $command->execute();
    }

    public function NuevoInsumos($codigo, $nombre, $descripción, $cantidadInsumo, $cantidadRecomendada, $proveedor, $contacto){
        include_once("../model/modeloInsumos.php");
        $objInsumo = new modeloInsumos;
        $respuesta = $objInsumo->NuevoInsumos($codigo, $nombre, $descripción, $cantidadInsumo, $cantidadRecomendada, $proveedor, $contacto);
        if($respuesta == true){
            header('Location: indexInsumos.php');
        } else{
            include_once('../shared/windowMensajeSistema.php');
            $objMensaje = new windowMensajeSistema();
            $objMensaje -> windowMensajeSistemaShow("El producto no ha sido encontrado6","<a href='../index.php'>ir al inicio</a>");
        }
    }

    public function MermaInsumos($codigo, $cantidadInsumo) { 
        include_once("../model/modeloInsumos.php");
        $objInsumo = new modeloInsumos;
            $respuesta = $objInsumo->MermaInsumos($codigo, $cantidadInsumo);
            if($respuesta == true){
                header('Location: indexInsumos.php');
            }
            else{
                include_once('../shared/windowMensajeSistema.php');
                $objMensaje = new windowMensajeSistema();
                $objMensaje -> windowMensajeSistemaShow("El producto no ha sido encontrado6","<a href='../index.php'>ir al inicio</a>");
            }
    }

    public function AgregarInsumo($codigo, $cantidadInsumo){
    include_once("../model/modeloInsumos.php");
    $objInsumo = new modeloInsumos;
        $respuesta = $objInsumo->AgregarInsumos($codigo, $cantidadInsumo);
        if($respuesta == true){
            header('Location: indexInsumos.php');
        }
        else{
            include_once('../shared/windowMensajeSistema.php');
            $objMensaje = new windowMensajeSistema();
            $objMensaje -> windowMensajeSistemaShow("El producto no ha sido encontrado6","<a href='../index.php'>ir al inicio</a>");
        }
    }
}
?>