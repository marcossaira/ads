<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include_once('../insumosModule/formInsumos.php');

$objFormInsumos = new formInsumos();
$objFormInsumos->formInsumosShow();
?>
