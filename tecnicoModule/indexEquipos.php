<?php
include_once('../tecnicoModule/formEquipos.php');
include_once('../model/modeloEquipo.php');
$objEquipo = new modeloEquipo();
$datos = $objEquipo->listarEquipos();
if(!empty($datos)){
    $objFormEquipos = new formEquipos();
    $objFormEquipos->formEquiposShow($datos);
}else{
    include_once('../shared/windowMensajeSistema.php');
        $objMensaje = new windowMensajeSistema();
        $objMensaje->windowMensajeSistemaShow("No tiene ningun equipo en su inventario");
}
?>
