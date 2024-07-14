<?php
class controlBuscarProducto
{

    public function validarProducto($txtProducto)
    {
        include_once('../model/modeloProducto.php');
        $objProducto = new modeloProducto();
        $respuesta = $objProducto -> buscarProducto($txtProducto);
        
       if(!empty($respuesta))
       {
        include_once("formBuscarProducto.php");
        $objFormBuscarProducto = new formBuscarProducto();
        $objFormBuscarProducto -> formBuscarProductoShow($respuesta);
       }
       else
       {
        include_once('../shared/windowMensajeSistema.php');
        $objMensaje = new windowMensajeSistema();
        $objMensaje -> mostrarMensaje("El no ha sido encontrado","<a href='../index.php'>ir al inicio</a>");

       }
    }

    public function agregarProductoProforma($idProducto, $nombreProducto, $descripcionProducto, $precioProducto,){
        $listaProductosProforma = $_SESSION["listaProductosProforma"];
        $producto = array(
            "idProducto" => $idProducto,
            "nombreProducto" => $nombreProducto,
            "descripcionProducto" => $descripcionProducto,
            "precioProducto" => $precioProducto
        );
        array_push($listaProductosProforma, $producto);
        $_SESSION["listaProductosProforma"] = $listaProductosProforma;
        
        include_once("formBuscarProducto.php");
        $objFormBuscarProducto = new formBuscarProducto();
        $objFormBuscarProducto -> formBuscarProductoShow(null);
    }

}
