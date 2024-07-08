<?php

if(isset($_REQUEST["btnNuevo"]) == true){
    include_once("formNuevo.php");
    $objtFormActualizar = new formNuevo;
    $objtFormActualizar->formNuevoShow();
}

if(isset($_REQUEST["btnMerma"]) == true){
    include_once("formMerma.php");
    $objtFormActualizar = new formMerma;
    $objtFormActualizar->formMermaShow();
}

if(isset($_REQUEST["btnListar"]) == true){
    include_once("formListar.php");
    $objtFormActualizar = new formListar;
    $objtFormActualizar->formListarShow();
}

if(isset($_REQUEST["btnFaltantes"]) == true){
    include_once("formFaltantes.php");
    $objtFormActualizar = new formFaltantes;
    $objtFormActualizar->formFaltantesShow();
}

if(isset($_REQUEST["btnAgregar"]) == true){
    include_once("formAgregar.php");
    $objtFormActualizar = new formAgregar;
    $objtFormActualizar->formAgregarShow();
}

class controlInsumos{

    public function NuevoInsumos($codigo, $nombre, $descripción, $cantidadInsumo, $cantidadRecomendada, $proveedor, $contacto){

            include_once("../model/modeloInsumos.php");

            $objInsumo = new modeloInsumos;
            $respuesta = $objInsumo->NuevoInsumos($codigo, $nombre, $descripción, $cantidadInsumo, $cantidadRecomendada, $proveedor, $contacto);
            if($respuesta == true){
                
                header('Location: indexInsumos.php');
            }
            else{
                
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