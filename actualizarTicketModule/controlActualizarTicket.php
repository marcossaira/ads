<?php
class controlActualizarTicket
{
    function verTipo($Num)
    {
        if (substr($Num, 0, 1) == "T") {
            return "T";
        } else {
            return "F";
        }
    }
    public function validarTicket($txtCodigo)
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
                    $objMensaje->windowMensajeSistemaShow("El ticket no ha sido encontrado", "<a href='../index.php'>ir al inicio</a>");
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
                    $objMensaje->windowMensajeSistemaShow("El ticket no ha sido encontrado", "<a href='../index.php'>ir al inicio</a>");
                }
            } else {
                include_once('../shared/windowMensajeSistema.php');
                $objMensaje = new windowMensajeSistema();
                $objMensaje->windowMensajeSistemaShow("El ticket no ha sido encontrado", "<a href='../index.php'>ir al inicio</a>");
            }
        }
        else{
            include_once('../shared/windowMensajeSistema.php');
                $objMensaje = new windowMensajeSistema();
                $objMensaje->windowMensajeSistemaShow("El ticket no ha sido encontrado", "<a href='../index.php'>ir al inicio</a>");
        }
    }

    public function entregarTicket($txtCodigo2)
    {
        include_once('../model/modeloTicketReembolso.php');
        $objTicket = new modeloTicketReembolso();
        $entregado = $objTicket->actualizarTicketEntregado($txtCodigo2);

        if ($entregado == 1) {
            include_once('../shared/windowMensajeSistema.php');
            $objMensaje = new windowMensajeSistema();
            $objMensaje->windowMensajeSistemaShow("El ticket ha sido entregado", "<a href='../index.php'>ir al inicio</a>");
        } else {
            include_once('../shared/windowMensajeSistema.php');
            $objMensaje = new windowMensajeSistema();
            $objMensaje->windowMensajeSistemaShow("No se ejecuto el cambio", "<a href='../index.php'>ir al inicio</a>");
        }
    }

    public function anularTicket($txtCodigo2)
    {
        include_once('../model/modeloTicketReembolso.php');
        $objTicket = new modeloTicketReembolso();
        $anulado = $objTicket->actualizarTicketAnulado($txtCodigo2);

        if ($anulado == 1) {
            include_once('../shared/windowMensajeSistema.php');
            $objMensaje = new windowMensajeSistema();
            $objMensaje->windowMensajeSistemaShow("El ticket ha sido anulado", "<a href='../index.php'>ir al inicio</a>");
        } else {
            include_once('../shared/windowMensajeSistema.php');
            $objMensaje = new windowMensajeSistema();
            $objMensaje->windowMensajeSistemaShow("No se ejecuto el cambio", "<a href='../index.php'>ir al inicio</a>");
        }
    }
}
