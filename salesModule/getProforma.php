<?php
session_start();

function verificarBoton($btn)
{
    return isset($btn);
}

function validarTexto($txtProducto)
{
    $txtProducto = trim($txtProducto);
    return strlen($txtProducto) > 3;
}

$botonBuscar = $_POST['btnBuscar'] ?? null;
$botonAgregar = $_POST['btnAgregar'] ?? null;
$botonEmitirProforma = $_POST['btnEmitirProforma'] ?? null;

if (verificarBoton($botonBuscar)) {
    $txtProducto = $_POST['txtProducto'];
    if (validarTexto($txtProducto)) {
        include_once('controlBuscarProducto.php');
        $objControl = new controlBuscarProducto();
        $objControl->validarProducto($txtProducto);
    } else {
        include_once('../shared/windowMensajeSistema.php');
        $objMensaje = new windowMensajeSistema();
        $objMensaje->mostrarMensaje("Error: los datos ingresados no son válidos", "<a href='../index.php'>ir al inicio</a>");
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
    
    $listaProductosProforma = $_SESSION["listaProductosProforma"];
    $cantidadProductoActual = isset($_POST['cantidadProducto']) ? $_POST['cantidadProducto'] : array();
    $subTotalActual = isset($_POST['subTotal']) ? $_POST['subTotal'] : array();

    for ($i = 0; $i < count($listaProductosProforma); $i++) {
        $listaProductosProforma[$i]['cantidadProducto'] = $cantidadProductoActual[$i];
        $listaProductosProforma[$i]['subTotal'] = $subTotalActual[$i];
    }

    include_once("controlBuscarProducto.php");
    $objControl = new controlBuscarProducto();
    $objControl->agregarProductoProforma($idProducto, $nombreProducto, $descripcionProducto, $precioProducto);
} else {
    include_once('../shared/windowMensajeSistema.php');
    $objMensaje = new windowMensajeSistema();
    $objMensaje->mostrarMensaje("Error: se ha detectado un acceso no permitido", "<a href='../index.php'>ir al inicio</a>");
}
?>
