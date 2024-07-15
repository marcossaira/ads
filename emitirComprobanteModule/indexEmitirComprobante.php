<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include_once('../emitirComprobanteModule/formBuscarProforma.php');
$objFormBuscar = new formBuscarProforma();
$objFormBuscar->formBuscarProformaShow();
?>
