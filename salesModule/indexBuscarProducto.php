<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$_SESSION["listaProductosProforma"] = array();
include_once('../salesModule/formBuscarProducto.php');
$objFormBuscarProducto = new formBuscarProducto();
$objFormBuscarProducto->formBuscarProductoShow(null);
