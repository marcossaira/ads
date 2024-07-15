<?php
class formImprimirProforma
{
    public function formImprimirProformaShow($datosP, $detalle)
    {
?>
        <html>

        <head>
            <link href="../styles/forms.css" rel="stylesheet" type="text/css">
            <script src="../js/redireccionamientos.js"></script>
        </head>

        <body>
            <div class="navbar">
                <h1>Imprimir Proforma</h1>
                <button type="button" onclick="cerrarSesionYRedirigir()" class="logout-button">Cerrar Sesión</button>
            </div>
            <form name="formImprimirBoleta" method="POST" action="../emitirComprobanteModule/getComprobante.php">

                <table class="table">
                    <tr>
                        <td colspan='2'>PROFORMA</td>
                        <?php
                        for ($i = 0; $i < count($datosP); $i++) {
                        ?>
                            <td colspan='2'><?php echo $datosP[$i]['codProforma'] ?></td>
                    </tr>
                    <tr>

                    </tr>
                    <tr>
                        <td colspan='2'>Fecha Emision:</td>
                        <td colspan='2'><?php echo $datosP[$i]['fecha'] ?></td>
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
                for ($i = 0; $i < count($datosP); $i++) {
                ?>
                    <tr>

                        <td colspan='3'>Total:</td>

                        <td colspan=''><?php echo $datosP[$i]['total'] ?></td>
                    </tr>
                    <tr>

                        <td colspan='3'>IGV:</td>
                        <td><?php echo $datosP[$i]['iva'] ?></td>
                    </tr>
                    <tr>

                        <td colspan='3'>Total a Pagar:</td>
                        <td><?php echo $datosP[$i]['totalPagar'] ?></td>
                    </tr>
                    <tr>
                        <td colspan='4'></td>
                    </tr>
                    <tr>
                        <td colspan='4'><button type="button" class="button" onclick="imprimir()">Imprimir</button></td>
                    </tr>

                <?php
                }
                ?>
                </tbody>
                </table>
                <div class="button-container">
                    <button type="button" onclick="window.history.back();">Regresar</button>
                    <button type="button" onclick="irAInicio('<?php echo urlencode($_SESSION['login']); ?>')">Inicio</button>
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