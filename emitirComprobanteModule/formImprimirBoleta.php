<?php
class formImprimirBoleta
{
    public function formImprimirBoletaShow($datosBoleta, $detalle)
    {
?>
        <html>

        <head>
            <link href="../styles/forms.css" rel="stylesheet" type="text/css">
            <script src="../js/redireccionamientos.js"></script>
        </head>

        <body>
            <div class="navbar">
                <h1>Imprimir Boleta</h1>
                <button type="button" onclick="cerrarSesionYRedirigir()" class="logout-button">Cerrar Sesión</button>
            </div>
            <?php foreach ($datosBoleta as $boleta) { ?>
                <form name="formImprimirBoleta">
                    <table class="table">
                        <tr>
                            <td colspan='2'>BOLETA</td>
                            <td colspan='2'><?php echo $boleta['codBoleta'] ?></td>
                        </tr>
                        <tr>
                            <td colspan='2'>Fecha Emisión:</td>
                            <td colspan='2'><?php echo $boleta['fecha'] ?></td>
                        </tr>
                        <tr>
                            <td colspan='2'>Fecha Entrega:</td>
                            <td colspan='2'><?php echo $boleta['FechaEntrega'] ?></td>
                        </tr>
                        <tr>
                            <td colspan='2'>Cliente:</td>
                            <td colspan='2'><?php echo $boleta['nombreCliente'] ?></td>
                        </tr>
                        <tr>
                            <td colspan='4'></td>
                        </tr>
                        <tr>
                            <th scope="col">Producto</th>
                            <th scope="col">Cantidad</th>
                            <th scope="col">P/U</th>
                            <th scope="col">Subtotal</th>
                        </tr>
                        <tbody>
                            <?php foreach ($detalle as $det) { ?>
                                <tr>
                                    <td><?php echo $det['nombre'] ?></td>
                                    <td><?php echo $det['cantidad'] ?></td>
                                    <td><?php echo $det['precio'] ?></td>
                                    <td>S/.<?php echo $det['subtotal'] ?></td>
                                </tr>
                            <?php } ?>
                            <tr>
                                <td colspan='3'>Total:</td>
                                <td><?php echo $boleta['total'] ?></td>
                            </tr>
                            <tr>
                                <td colspan='3'>IGV:</td>
                                <td><?php echo $boleta['iva'] ?></td>
                            </tr>
                            <tr>
                                <td colspan='3'>Total a Pagar:</td>
                                <td>S/.<?php echo $boleta['totalPagar'] ?></td>
                            </tr>
                            <tr>
                                <td colspan='4'><button type="button" class="button" onclick="imprimir()">Imprimir</button></td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            <?php } ?>
            <div class="button-container">
                <button type="button" onclick="irAInicio('<?php echo urlencode($_SESSION['login']); ?>')">Inicio</button>
            </div>
        </body>

        </html>
<?php
    }
}
?>