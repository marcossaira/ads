<?php
class formBoletaVenta
{
    public function formBoletaVentaShow($d)
    {
?>
        <html>

        <head>
            <title>Detalle Boleta O Factura</title>
            <link href="../styles/forms.css" rel="stylesheet" type="text/css">
        </head>

        <body>
            <form name="formBoletaFactura" method="POST" action="controlGestionarBoletaFactura.php">
                <table border='0' align="center">
                    <tr>
                        <td colspam=2 align="center">DETALLE DE BOLETA</td>
                    </tr>
                    <?php
                    for ($i = 0; $i < count($d); $i++) {
                    ?>
                        <tr>
                            <td>N° Boleta: </td>
                            <td><?php echo $d[$i]['codBoleta'] ?></td>
                        </tr>
                        <tr>
                            <td>Nombre del Cliente: </td>
                            <td><?php echo $d[$i]['nombreCliente'] ?></td>
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
                    <input type="submit" value="Anular" name="btnAnularBoleta">
                    <input type="hidden" name="codBoleta" value="<?php echo $d[$i]['codBoleta']; ?>">
                <?php

                    }
                ?>
                </div>
            </form>

        </body>

        </html>
<?php
    }
}
?>