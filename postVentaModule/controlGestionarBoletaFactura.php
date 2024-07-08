<?php

class controlGestionarBoletaFactura
{
    function cotejarDiferenciaFecha($respuesta)
    {
        foreach ($respuesta as $elemento) {
            $fechaEmision = $elemento['fecha'];
            $fechaActual = date('Y-m-d');
            $diferencia = date_diff(date_create($fechaEmision), date_create($fechaActual));
            $diasTranscurridos = $diferencia->format('%a');
            return $diasTranscurridos;
        }
    }
    function verTipo($Num)
    {
        if (substr($Num, 0, 1) == "B") {
            return "B";
        } else {
            return "F";
        }
    }

    public function validarDatos($txtoNum)
    {
        if ($this->verTipo($txtoNum) == "B") {
            echo 'boleta';
            include_once('../model/modeloBoleta.php');
            $objBoleta = new modeloBoleta();
            $respuesta = $objBoleta->listarBoletaC($txtoNum);
            foreach($respuesta as $elemento);
            if (!empty($respuesta)) {
                if ($this->cotejarDiferenciaFecha($respuesta) <= 7) {
                    include_once('formBoletaVenta.php');
                    $objformBoletaVenta = new formBoletaVenta();
                    $objformBoletaVenta->formBoletaVentaShow($respuesta);
                } else {
                    //echo $this->cotejarDiferenciaFecha($respuestaB);
?>
                    <form name="formNC" method="POST" action="./controlGestionarBoletaFactura.php">
                        <?php include_once('../shared/windowMensajeSistema.php');
                        $objMensaje = new windowMensajeSistema();
                        $objMensaje->windowMensajeSistemaShow("Es necesario emitir una<br> nota de credito ya que la <br> boleta fue emitida hace <br> 7 dias o más", "<a href='../index.php'>ir al inicio</a>");
                        ?>
                        <div align="center">
                            <input type="submit" value="Continuar" name="btnContinuar">
                            <input type="submit" value="Cancelar" name="btnCancelar" formaction="indexAnularBoletaFactura.php">
                            <input type="hidden" name="idTipo" value="1">
                            <input type="hidden" name="id" value="<?php echo $elemento['idBoleta'] ?>">
                            <input type="hidden" name="cod" value="<?php echo $elemento['codBoleta'] ?>">
                            <input type="hidden" name="cliente" value="<?php echo $elemento['nombreCliente']  ?>">
                            <input type="hidden" name="monto" value="<?php echo $elemento['totalPagar'] ?>">
                        </div>
                    </form><?php
                        }
                    } else {
                        include_once('../shared/windowMensajeSistema.php');
                        $objMensaje = new windowMensajeSistema();
                        $objMensaje->windowMensajeSistemaShow("La boleta no se ha encontrado<br> el password no coincide, <br> o ya esta anulada", "<a href='../index.php'>ir al inicio</a>");
                    }
                } elseif ($this->verTipo($txtoNum) == "F") {
                    include_once('../model/modeloFactura.php');
                    $objFactura = new modeloFactura();
                    $respuesta = $objFactura->listarFacturaC($txtoNum);
                    foreach($respuesta as $elemento);
                    if (!empty($respuesta)) {
                        if ($this->cotejarDiferenciaFecha($respuesta) <= 7) {
                            //echo $this->cotejarDiferenciaFecha($respuesta);
                            include_once('formFacturaVenta.php');
                            $objformFacturaVenta = new formFacturaVenta();
                            $objformFacturaVenta->formFacturaVentaShow($respuesta);
                            //print_r($respuesta);
                        } else {
                            //echo $this->cotejarDiferenciaFecha($respuestaB);
                            ?>
                    <form name="formNC" method="POST" action="./controlGestionarBoletaFactura.php">
                        <?php include_once('../shared/windowMensajeSistema.php');
                            $objMensaje = new windowMensajeSistema();
                            $objMensaje->windowMensajeSistemaShow("Es necesario emitir una<br> nota de credito ya que la <br> factura fue emitida hace <br> 7 dias o más", "<a href='../index.php'>ir al inicio</a>");
                        ?>
                        <div align="center">
                            <input type="submit" value="Continuar" name="btnContinuar">
                            <input type="submit" value="Cancelar" name="btnCancelar" formaction="indexAnularBoletaFactura.php">
                            <input type="hidden" name="id" value="<?php echo $elemento['idFactura'] ?>">
                            <input type="hidden" name="idTipo" value="2">
                            <input type="hidden" name="cod" value="<?php echo $elemento['codFactura'] ?>">
                            <input type="hidden" name="cliente" value="<?php echo $elemento['rucCliente']?>">
                            <input type="hidden" name="monto" value="<?php echo $elemento['totalPagar'] ?>">
                        </div>
                    </form><?php
                        }
                    } else {
                        include_once('../shared/windowMensajeSistema.php');
                        $objMensaje = new windowMensajeSistema();
                        $objMensaje->windowMensajeSistemaShow("La factura no se ha encontrado<br> el password no coincide, <br> o ya esta anulada", "<a href='../index.php'>ir al inicio</a>");
                    }
                } else {
                    include_once('../shared/windowMensajeSistema.php');
                    $objMensaje = new windowMensajeSistema();
                    $objMensaje->windowMensajeSistemaShow("La factura no se ha encontrado<br> el password no coincide, <br> o ya esta anulada", "<a href='../index.php'>ir al inicio</a>");
                }
            }
        } ?>

<?php if (isset($_POST['btnAnularBoleta'])) {
    //echo "El botón 'Anular' ha sido presionado";
?>
    <form name="formConfirmar" method="POST" action="./controlGestionarBoletaFactura.php">
        <?php include_once('../shared/windowMensajeSistema.php');
        $objMensaje = new windowMensajeSistema();
        $objMensaje->windowMensajeSistemaShow("¿Seguro que desea anular<br> la boleta de venta? <br>", "<a href='../index.php'>ir al inicio</a>"); ?>
        <div align="center">
            <input type="submit" value="Si" name="btnSiB">
            <input type="submit" value="No" name="btnNo" formaction="indexAnularComprobante.php">
            <input type="hidden" name="codBoleta" value="<?php echo $_POST['codBoleta'] ?>">
        </div>
    </form>
<?php
}

if (isset($_POST['btnAnularFactura'])) {
    //echo "El botón 'Anular' ha sido presionado";
?>
    <form name="formConfirmar" method="POST" action="./controlGestionarBoletaFactura.php">
        <?php include_once('../shared/windowMensajeSistema.php');
        $objMensaje = new windowMensajeSistema();
        $objMensaje->windowMensajeSistemaShow("¿Seguro que desea anular<br> la Factura de venta? <br>", "<a href='../index.php'>ir al inicio</a>"); ?>
        <div align="center">
            <input type="submit" value="Si" name="btnSiF">
            <input type="submit" value="No" name="btnNo" formaction="indexAnularComprobante.php">
            <input type="hidden" name="codFactura" value="<?php echo $_POST['codFactura'] ?>">

        </div>
    </form>
    <?php
}

if (isset($_POST['btnSiB'])) {
    $cod = $_POST['codBoleta'];
    include_once('../model/modeloBoleta.php');
    $obBole = new modeloBoleta();
    $obBole->updateEstado($cod);
    if ($obBole) { ?>
        <form name="formy" method="POST" action="">
            <?php include_once('../shared/windowMensajeSistema.php');
            $objMensaje = new windowMensajeSistema();
            $objMensaje->windowMensajeSistemaShow("Boleta anulada <br>", "<a href='../index.php'>ir al inicio</a>"); ?>
            <div align="center">
                <input type="submit" value="ok" name="btnOk" formaction="../postVentaModule/indexAnularComprobante.php">
            </div>
        </form><?php
            }
        }
        if (isset($_POST['btnSiF'])) {
            $cod = $_POST['codFactura'];

            include_once('../model/modeloFactura.php');
            $obBole = new modeloFactura();
            $obBole->updateEstado($cod);
            if ($obBole) { ?>
        <form name="formy" method="POST" action="">
            <?php include_once('../shared/windowMensajeSistema.php');
                $objMensaje = new windowMensajeSistema();
                $objMensaje->windowMensajeSistemaShow("Factura anulada <br>", "<a href='../index.php'>ir al inicio</a>"); ?>
            <div align="center">
                <input type="submit" value="ok" name="btnOk" formaction="../postVentaModule/indexAnularComprobante.php">
            </div>
        </form><?php
            }
        }

        if (isset($_POST['btnContinuar'])) {
            //echo "El botón 'Continuar' ha sido presionado";
            include_once('formNotaCredito.php');
            $objformNotaCredito = new formNotaCredito();
            $objformNotaCredito->formNotaCreditoShow( $_POST['cod'], $_POST['cliente'], $_POST['monto'], $_POST['idTipo'], $_POST['id']);
        }

        if (isset($_POST['btnEmitir'])) {

            include_once('../model/modeloNotaCredito.php');
            $objNotaCredito = new modeloNotaCredito();
            $objNotaCredito->insertarNotaCredito($_POST['idTipo'], $_POST['id'], $_POST['txtMotivo'], $_POST['txtFechaEmisionNota']);
            if ($objNotaCredito) { ?>
        <form name="formNota" method="POST" action="">
            <?php include_once('../shared/windowMensajeSistema.php');
                $objMensaje = new windowMensajeSistema();
                $objMensaje->windowMensajeSistemaShow("Nota de credito emitida <br>", "<a href='../index.php'>ir al inicio</a>"); ?>
            <div align="center">
                <input type="submit" value="ok" name="btnOk" formaction="../postVentaModule/indexAnularComprobante.php">
            </div>
        </form><?php
            }
        }
                ?>