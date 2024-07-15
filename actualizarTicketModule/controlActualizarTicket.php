<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
interface TicketCommand
{
    public function execute($txtCodigo);
}

class ValidarTicketCommand implements TicketCommand
{
    public function execute($txtCodigo)
    {
        include_once('../model/modeloTicketReembolso.php');
        $objProducto = new modeloTicketReembolso();
        $respuesta = $objProducto->validarTicketR($txtCodigo);
        if (!empty($respuesta)) {
            foreach ($respuesta as $r) {
                $idTipo = $r['idTipo'];
                $id = $r['idBF'];
                $cod = $r['codTicket'];
            }
            if ($idTipo == '1') {
                include_once('../actualizarTicketModule/formDatosTicket.php');
                include_once('../model/modeloBoleta.php');
                $objBoleta = new modeloBoleta();
                $rpta = $objBoleta->listarBoleta($id);
                if (!empty($rpta)) {
                    $objFormDatosTicket = new formDatosTicket();
                    $objFormDatosTicket->formDatosTicketShow($rpta, $cod);
                } else {
                    include_once('../shared/windowMensajeSistema.php');
                    $objMensaje = new windowMensajeSistema();
                    $objMensaje->mostrarMensaje("El ticket no ha sido encontrado", "alerta");
                }
            } elseif ($idTipo == '2') {
                include_once('../actualizarTicketModule/formDatosTicket.php');
                include_once('../model/modeloFactura.php');
                $objFactura = new modeloFactura();
                $rpta = $objFactura->listarFactura($id);
                if (!empty($rpta)) {
                    $objFormDatosTicket = new formDatosTicket();
                    $objFormDatosTicket->formDatosTicketShow($rpta, $cod);
                } else {
                    include_once('../shared/windowMensajeSistema.php');
                    $objMensaje = new windowMensajeSistema();
                    $objMensaje->mostrarMensaje("El ticket no ha sido encontrado", "alerta");
                }
            } else {
                include_once('../shared/windowMensajeSistema.php');
                $objMensaje = new windowMensajeSistema();
                $objMensaje->mostrarMensaje("El ticket no ha sido encontrado", "alerta");
            }
        } else {
            include_once('../shared/windowMensajeSistema.php');
            $objMensaje = new windowMensajeSistema();
            $objMensaje->mostrarMensaje("El ticket no ha sido encontrado", "alerta");
        }
    }
}

class EntregarTicketCommand implements TicketCommand
{
    public function execute($txtCodigo)
    {
        include_once('../model/modeloTicketReembolso.php');
        $objTicket = new modeloTicketReembolso();
        $entregado = $objTicket->actualizarTicketEntregado($txtCodigo);

        if ($entregado == 1) {
            include_once('../shared/windowMensajeSistema.php');
            $objMensaje = new windowMensajeSistema();
            $objMensaje->mostrarMensaje("El ticket ha sido entregado", "exito");
        } else {
            include_once('../shared/windowMensajeSistema.php');
            $objMensaje = new windowMensajeSistema();
            $objMensaje->mostrarMensaje("No se ejecutó el cambio", "alerta");
        }
    }
}

class AnularTicketCommand implements TicketCommand
{
    public function execute($txtCodigo)
    {
        include_once('../model/modeloTicketReembolso.php');
        $objTicket = new modeloTicketReembolso();
        $anulado = $objTicket->actualizarTicketAnulado($txtCodigo);

        if ($anulado == 1) {
            include_once('../shared/windowMensajeSistema.php');
            $objMensaje = new windowMensajeSistema();
            $objMensaje->mostrarMensaje("El ticket ha sido anulado", "exito");
        } else {
            include_once('../shared/windowMensajeSistema.php');
            $objMensaje = new windowMensajeSistema();
            $objMensaje->mostrarMensaje("No se ejecutó el cambio", "alerta");
        }
    }
}

class ControlActualizarTicket
{
    public function ejecutarComando(TicketCommand $command, $txtCodigo)
    {
        $command->execute($txtCodigo);
    }
}
?>
