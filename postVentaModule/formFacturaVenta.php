<?php
class formFacturaVenta
{
    public function formFacturaVentaShow($d)
    {
?>
        <html>

        <head>
            <title>Detalle Comprobante</title>
            <link href="../styles/forms.css" rel="stylesheet" type="text/css">
        </head>

        <body>
                <div class="navbar">
                    <h1>Detalle del Comprobante</h1> 
                    <a href="../index.php" class="logout-button">Cerrar Sesion</a>
                </div>
            <form name="formFacturaVenta" method="POST" action="controlGestionarBoletaFactura.php">
                <table border='0' align="center">
                    <tr>
                        <td colspam=2 align="center">DETALLE DE FACTURA</td>
                    </tr>
                    <?php
                    for ($i = 0; $i < count($d); $i++) {
                    ?>
                        <tr>
                            <td>N° Factura: </td>
                            <td><?php echo $d[$i]['codFactura'] ?></td>
                        </tr>
                        <tr>
                            <td>RUC del Cliente: </td>
                            <td><?php echo $d[$i]['rucCliente'] ?></td>
                        </tr>
                        <tr>
                            <td>Monto Pagado: </td>
                            <td><?php echo $d[$i]['totalPagar']; ?></td>
                        </tr>
                        <tr>
                            <td>Fecha de Emision: </td>
                            <td><?php echo $d[$i]['fecha']; ?></td>
                        </tr>

                </table>
                <div class="center">
                    <input type="submit" value="Anular" name="btnAnularFactura">
                    <input type="hidden" name="codFactura" value="<?php echo $d[$i]['codFactura']; ?>">
                <?php

                    }
                ?>
                </div>
                <div class="button-container">
                    <button type="button" onclick="window.history.back();">Regresar</button>
                    <button type="button" onclick="window.location.href='../securityModule/getUsuario.php';">Inicio</button>
                </div>
            </form>

        </body>

        </html>
<?php
    }
}
?>