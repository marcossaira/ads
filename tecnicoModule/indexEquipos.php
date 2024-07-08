<?php
include_once('../tecnicoModule/formEquipos.php');
include_once('../model/modeloEquipo.php');
include_once('../shared/WindowMensajeSistema.php');

$objEquipo = new modeloEquipo();
$datos = $objEquipo->listarEquipos();

if (!empty($datos)) {
    $objFormEquipos = new formEquipos();
    $objFormEquipos->formEquiposShow($datos);
} else {
    $objMensaje = new WindowMensajeSistema();
    $objMensaje->mostrarMensaje("No tiene ningún equipo en su inventario");
}
?>
