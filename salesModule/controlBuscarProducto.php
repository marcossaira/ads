<?php
class controlBuscarProducto
{
    public function validarProducto($txtProducto)
    {
        include_once('../model/modeloProducto.php');
        $objProducto = new modeloProducto();
        $respuesta = $objProducto->buscarProducto($txtProducto);
        
        if (!empty($respuesta)) {
            include_once("formBuscarProducto.php");
            $objFormBuscarProducto = new formBuscarProducto();
            $objFormBuscarProducto->formBuscarProductoShow($respuesta);
        } else {
            include_once('../shared/windowMensajeSistema.php');
            $objMensaje = new windowMensajeSistema();
            $objMensaje->mostrarMensaje("Error: No se encontró el producto", "<a href='../index.php'>ir al inicio</a>");
        }
    }

    public function agregarProductoProforma($idProducto, $nombreProducto, $descripcionProducto, $precioProducto)
    {
        if (!isset($_SESSION["listaProductosProforma"])) {
            $_SESSION["listaProductosProforma"] = array();
        }

        $listaProductosProforma = $_SESSION["listaProductosProforma"];
        $producto = array(
            "idProducto" => $idProducto,
            "nombreProducto" => $nombreProducto,
            "descripcionProducto" => $descripcionProducto,
            "precioProducto" => $precioProducto,
            "cantidadProducto" => 1, // cantidad por defecto
            "subTotal" => $precioProducto // subtotal por defecto
        );
        $listaProductosProforma[] = $producto;
        $_SESSION["listaProductosProforma"] = $listaProductosProforma;

        include_once("formBuscarProducto.php");
        $objFormBuscarProducto = new formBuscarProducto();
        $objFormBuscarProducto->formBuscarProductoShow(null);
    }
}
?>
