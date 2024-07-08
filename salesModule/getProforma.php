<?php

session_start();
function verificarBoton($btn)
{
    if (isset($btn))
        return true;
    else
        return false;
}

function validarTexto($txtProducto)
{
    $txtProducto = trim($txtProducto);
    if (strlen($txtProducto) > 3)
        return true;
    else
        return false;
}

$botonBuscar = $_POST['btnBuscar'] ?? null;
$botonAgregar = $_POST['btnAgregar'] ?? null;
$botonEmitirProforma = $_POST['btnEmitirProforma'] ?? null;
//echo verificarbotonBuscar($botonBuscar);
if (verificarBoton($botonBuscar)) {
    $txtProducto = $_POST['txtProducto'];
    if (validarTexto($txtProducto)) {
        include_once('controlBuscarProducto.php');
        $objControl = new controlBuscarProducto();
        $objControl->validarProducto($txtProducto);
    } else {
        include_once('../shared/windowMensajeSistema.php');
        $objMensaje = new windowMensajeSistema();
        $objMensaje->windowMensajeSistemaShow("Error: los datos ingresados no son validos", "<a href='../index.php'>ir al inicio</a>");
    }
} elseif (verificarBoton($botonEmitirProforma)) {
    $totalProforma = $_POST['totalProforma'];
    
    $listaProductosProforma = $_SESSION["listaProductosProforma"];
    $cantidadProducto = $_POST['cantidadProducto'];
    $subTotal = $_POST['subTotal'];

    for ($i = 0; $i < count($listaProductosProforma); $i++) {
        $listaProductosProforma[$i]['cantidadProducto'] = $cantidadProducto[$i];
        $listaProductosProforma[$i]['subTotal'] = $subTotal[$i];
    }
    include_once("controlEmitirProforma.php");
    $objControl = new controlEmitirProforma();
    $objControl->insertarDatosProforma($totalProforma, $listaProductosProforma);

} elseif (verificarBoton($botonAgregar)) {
    $idProducto = $_POST['idProducto'];
    $nombreProducto = $_POST['nombreProducto'];
    $descripcionProducto = $_POST['descripcionProducto'];
    $precioProducto = $_POST['precioProducto'];
    include_once("controlBuscarProducto.php");
    $objControl = new controlBuscarProducto();
    $objControl->agregarProductoProforma($idProducto, $nombreProducto, $descripcionProducto, $precioProducto);

} else {
    include_once('../shared/windowMensajeSistema.php');
    $objMensaje = new windowMensajeSistema();
    $objMensaje->windowMensajeSistemaShow("Error: se ha detectado un acceso no permitido", "<a href='../index.php'>ir al inicio</a>");
}
