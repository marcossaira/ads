<?php
class formImprimirFactura
{
    public function formImprimirFacturaShow($datosFactura,$detalle)
    {
?>
        <html>

        <head>
            <link href="../styles/forms.css" rel="stylesheet" type="text/css">
        </head>

        <body>
                <div class="navbar">
                    <h1>Imprimir Factura</h1> 
                    <a href="../index.php" class="logout-button">Logout</a>
                </div>
            <form name="formImprimirBoleta" method="POST" action="../emitirComprobanteModule/getComprobante.php">

                <table class="table">
                    <tr>
                        <td colspan='2'>FACTURA</td>
                        <?php
                        for ($i = 0; $i < count($datosFactura); $i++) {
                        ?>
                            <td colspan='2'><?php echo $datosFactura[$i]['codFactura'] ?></td>
                    </tr>
                    <tr>

                    </tr>
                    <tr>
                        <td colspan='2'>Fecha Emision:</td>
                        <td colspan='2'><?php echo $datosFactura[$i]['fecha'] ?></td>
                    </tr>
                    <tr>
                        <td colspan='2'>Fecha Entrega:</td>
                        <td colspan='2'><?php echo $datosFactura[$i]['FechaEntrega'] ?></td>
                    </tr>
                    <tr>
                        <td colspan='4'></td>
                    </tr>
                <?php
                        }
                ?>
                <tr>
                    <th scope="col">PRODUCTO</th>
                    <th scope="col">CANTIDAD</th>
                    <th scope="col">P/U</th>
                    <th scope="col">SUBTOTAL</th>
                </tr>
                <tbody>
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
                <tr>
                    <td colspan='4'></td>
                </tr>
                <?php
                for ($i = 0; $i < count($datosFactura); $i++) {
                ?>
                    <tr>

                        <td colspan='3'>Total:</td>

                        <td colspan=''><?php echo $datosFactura[$i]['total'] ?></td>
                    </tr>
                    <tr>

                        <td colspan='3'>IGV:</td>
                        <td><?php echo $datosFactura[$i]['iva'] ?></td>
                    </tr>
                    <tr>

                        <td colspan='3'>Total a Pagar:</td>
                        <td><?php echo $datosFactura[$i]['totalPagar'] ?></td>
                    </tr>
                    <tr>
                        <td colspan='4'></td>
                    </tr>
                    <tr>
                        <td colspan='4'><input class='button' name="btnBuscar" type="submit" onclick="imprimir()"value="IMPRIMIR" /></td>
                    </tr>

                <?php
                }
                ?>
                </tbody>
                </table>
                <div class="button-container">
                        <button type="button" onclick="window.history.back();">Regresar</button>
                        <button type="button" onclick="window.location.href='../securityModule/getUsuario.php';">Inicio</button>
                </div>

            </form>

        </body>

        </html>
        <script>
            function imprimir() {
                window.print();
            }
        </script>
<?php
    }
}
?>