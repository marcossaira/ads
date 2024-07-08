<?php

include_once('validaciones.php');
include_once('controlInsumos.php');
require_once('commandNuevoInsumo.php');
require_once('commandMerma.php');
require_once('commandAgregarInsumo.php');

function validarCamposVacios($codigo, $nombre, $descripción, $cantidadInsumo, $cantidadRecomendada, $proveedor, $contacto){
    $array = [];
    array_push($array, $codigo, $nombre, $descripción, $cantidadInsumo, $cantidadRecomendada, $proveedor, $contacto);
    $vacio = false;
    foreach($array as $valor){
        if(empty(trim($valor)) == true && (trim($valor) != 0))
            $vacio = true;
    }
    return !$vacio;
} 

function validarDatos($codigo, $nombre, $descripción, $cantidadInsumo, $cantidadRecomendada, $proveedor, $contacto){
    if((strlen($codigo) >=  6 &&  strlen($codigo) <= 15) && 
       (strlen($nombre) >= 6 && strlen($nombre) <= 15) && 
       (strlen($descripción) >= 6 && strlen($descripción) <= 15) &&
       (strlen($cantidadInsumo) >= 1 && strlen($cantidadInsumo) <= 15) &&
       (strlen($cantidadRecomendada) >= 1 && strlen($cantidadRecomendada) <= 15) &&
       (strlen($proveedor) >= 6 && strlen($proveedor) <= 15) &&
       (strlen($contacto) >= 6 && strlen($contacto) <= 15) ){
        return true;
    }    
    else    
        return false;
}

function validarCamposVaciosCC($codigo, $cantidadInsumo){
    $array = [];
    array_push($array, $codigo, $cantidadInsumo);
    $vacio = false;
    foreach($array as $valor){
        if(empty(trim($valor)) == true && (trim($valor) != 0))
            $vacio = true;
    }
    return !$vacio;
} 

function validarDatosCC($codigo, $cantidadInsumo){
    if((strlen($codigo) >=  6 &&  strlen($codigo) <= 15) && (strlen($cantidadInsumo) >= 1 && strlen($cantidadInsumo) <= 15))
    {
        return true;
    }    
    else    
        return false;
}

if (isset($_POST["btnEnviar"])) {
    $codigo = $_POST["codigo"];
    $nombre = $_POST["nombre"];
    $descripción = $_POST["descripción"];
    $cantidadInsumo = $_POST["cantidadInsumo"];
    $cantidadRecomendada = $_POST["cantidadRecomendada"];
    $proveedor = $_POST["proveedor"];
    $contacto = $_POST["contacto"];

    if (validarCamposVacios($codigo, $nombre, $descripción, $cantidadInsumo, $cantidadRecomendada, $proveedor, $contacto)) {
        if (validarDatos($codigo, $nombre, $descripción, $cantidadInsumo, $cantidadRecomendada, $proveedor, $contacto)) {
            $command = new NuevoInsumosCommand($codigo, $nombre, $descripción, $cantidadInsumo, $cantidadRecomendada, $proveedor, $contacto);
            $result = $command->execute();

            if ($result) {
                header('Location: index.php');
                exit();
            } else {
                include_once('../shared/windowMensajeSistema.php');
                $objMensaje = new windowMensajeSistema();
                $objMensaje->windowMensajeSistemaShow("Error al agregar el insumo", "<a href='../index.php'>Ir al inicio</a>");
            }
        } else {
            include_once('../shared/windowMensajeSistema.php');
            $objMensaje = new windowMensajeSistema();
            $objMensaje->windowMensajeSistemaShow("Datos inválidos", "<a href='../index.php'>Ir al inicio</a>");
        }
    } else {
        include_once('../shared/windowMensajeSistema.php');
        $objMensaje = new windowMensajeSistema();
        $objMensaje->windowMensajeSistemaShow("Debe completar todos los campos", "<a href='../index.php'>Ir al inicio</a>");
    }
} elseif (isset($_POST["btnEnviarMerma"])) {
    $codigo = $_POST["codigo"];
    $cantidadInsumo = $_POST["cantidadInsumo"];

    if (validarCamposVaciosCC($codigo, $cantidadInsumo)) {
        if (validarDatosCC($codigo, $cantidadInsumo)) {
            $command = new MermaInsumosCommand($codigo, $cantidadInsumo);
            $result = $command->execute();

            if ($result) {
                header('Location: index.php');
                exit();
            } else {
                include_once('../shared/windowMensajeSistema.php');
                $objMensaje = new windowMensajeSistema();
                $objMensaje->windowMensajeSistemaShow("Error al realizar la merma", "<a href='../index.php'>Ir al inicio</a>");
            }
        } else {
            include_once('../shared/windowMensajeSistema.php');
            $objMensaje = new windowMensajeSistema();
            $objMensaje->windowMensajeSistemaShow("Datos inválidos", "<a href='../index.php'>Ir al inicio</a>");
        }
    } else {
        include_once('../shared/windowMensajeSistema.php');
        $objMensaje = new windowMensajeSistema();
        $objMensaje->windowMensajeSistemaShow("Debe completar todos los campos", "<a href='../index.php'>Ir al inicio</a>");
    }
} elseif (isset($_POST["btnAumento"])) {
    $codigo = $_POST["codigo"];
    $cantidadInsumo = $_POST["cantidadInsumo"];
    if (validarCamposVaciosCC($codigo, $cantidadInsumo)) {
        if (validarDatosCC($codigo, $cantidadInsumo)) {
            $command = new AgregarInsumosCommand($codigo, $cantidadInsumo);
            $result = $command->execute();

            if ($result) {
                header('Location: index.php');
                exit();
            } else {
                include_once('../shared/windowMensajeSistema.php');
                $objMensaje = new windowMensajeSistema();
                $objMensaje->windowMensajeSistemaShow("Error al agregar insumo", "<a href='../index.php'>Ir al inicio</a>");
            }
        } else {
            include_once('../shared/windowMensajeSistema.php');
            $objMensaje = new windowMensajeSistema();
            $objMensaje->windowMensajeSistemaShow("Datos inválidos", "<a href='../index.php'>Ir al inicio</a>");
        }
    } else {
        include_once('../shared/windowMensajeSistema.php');
        $objMensaje = new windowMensajeSistema();
        $objMensaje->windowMensajeSistemaShow("Debe completar todos los campos", "<a href='../index.php'>Ir al inicio</a>");
    }
} else {
    include_once('../shared/windowMensajeSistema.php');
    $objMensaje = new windowMensajeSistema();
    $objMensaje->windowMensajeSistemaShow("Acción no reconocida", "<a href='../index.php'>Ir al inicio</a>");
}
?>