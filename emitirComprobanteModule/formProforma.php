<?php
class formProforma
{
    public function formProformaShow($datos, $detalle)
    {
?>
        <html>

        <head>
            <link href="../styles/forms.css" rel="stylesheet" type="text/css">
        </head>

        <body>
                <div class="navbar">
                    <h1>Datos de la Proforma</h1> 
                    <a href="../index.php" class="logout-button">Logout</a>
                </div>
            <form name="formProforma" method="POST" action="../emitirComprobanteModule/getComprobante.php">

                <table align="center">
                    <?php
                    for ($i = 0; $i < count($datos); $i++) {
                    ?>
                        <tr>
                            <th>Nro de Proforma:</th>
                            <td><?php echo $datos[$i]['codProforma'] ?></td>
                        </tr>
                        <tr>
                            <th>Nombre o RUC del Cliente :</th>
                            <td><input name="txtCliente" type="text"></td>
                        </tr>
                        <tr>
                            <th>Fecha de Proforma</th>
                            <td><?php echo $datos[$i]['fecha'] ?></td>
                        </tr>

                    <?php
                    }
                    ?>
                    <tr>
                        <th>NOMBRE</th>
                        <th>CANTIDAD</th>
                        <th>P/U
                        <th>
                        <th>SUBTOTAL</th>
                    </tr>
                    <tr>
                        <?php
                        for ($j = 0; $j < count($detalle); $j++) {
                        ?>
                            <td><?php echo $detalle[$j]['nombre'] ?></td>
                            <td><?php echo $detalle[$j]['cantidad'] ?></td>
                            <td><?php echo $detalle[$j]['precio'] ?></td>
                            <td>S/.<?php echo $detalle[$j]['subtotal'] ?></td>
                    </tr>
                <?php
                        }
                ?>

                <?php
                for ($i = 0; $i < count($datos); $i++) {
                ?>
                    <tr>
                        <th>IVA</th>
                        <td><?php echo $datos[$i]['iva'] ?></td>
                    </tr>
                    <tr>
                        <th>Total</th>
                        <td><?php echo $datos[$i]['totalPagar'] ?></td>
                    </tr>
                    <tr>
                        <td><button name="btnBoleta" type="submit" value="<?= $datos[$i]['codProforma'] ?>">BOLETA</button></td>
                        <td><button name="btnFactura" type="submit" value="<?= $datos[$i]['codProforma'] ?>">FACTURA</button></td>
                    </tr>
                <?php
                }
                ?>


                </table>
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
