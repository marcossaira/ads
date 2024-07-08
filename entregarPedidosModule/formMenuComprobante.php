<?php
class formMenuComprobante
{
    public function formMenuComprobanteShow($productos,$txtoNum)
    {
?>
        <html>

        <head>
            <title>Menu del Comprobante</title>
        </head>

        <body>
            <form name="formMenuComprobante" method="POST" action="getBoletaFactura.php">
                <table border="0" align="center">
                    <tr>
                        <td colspan="2" align="center">Buscar Boleta</td>
                    </tr>
                    <tr>
                        <td>N° Boleta o Factura:</td>
                        <td><?php echo $txtoNum ?></td>
                        <td>Productos:</td>
                        <table align="center">
                            <tr>
                                <td>Producto</td>
                                <td>Cantidad</td>
                            </tr>
                            <?php
                            for ($i = 0; $i < count($productos); $i++) {
                            ?>
                                <tr>
                                    <td><?php echo $productos[$i]['nombre'] ?></td>
                                    <td><?php echo $productos[$i]['cantidad'] ?></td>

                                </tr>
                            <?php
                            }
                            ?>
                            <tr></tr>
                        </table>
                    </tr>
                    <tr>
                        <td></td>
                        <td><button name="btnEntregar" type="submit" value="<?php echo $txtoNum ?>">ENTREGAR</button></td>
                        <td><button name="btnReprogramar" type="submit" value="<?php echo $txtoNum ?>">REPROGRAMAR FECHA</button></td>
                        <td><button name="btnTicket" type="submit" value="<?php echo $txtoNum ?>">TICKET DE REEMBOLSO</button></td>
                    </tr>
                </table>
            </form>
        </body>

        </html>
<?php
    }
}
?>