<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include_once('../actualizarTicketModule/formBuscarTicketReembolso.php');

$objFormBuscarTicket = new formBuscarTicketReembolso();
$objFormBuscarTicket->formBuscarTicketReembolsoShow();

?>
