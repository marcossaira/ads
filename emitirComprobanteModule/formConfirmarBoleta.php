<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
class formConfirmarBoleta
{
    public function formConfirmarBoletaShow($boleta)
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
        <form name="formConfirmarBoleta" method="POST" action="../emitirComprobanteModule/getComprobante.php">
            <table class="table">
                <tr>
                    <td colspan='2'>PROFORMA</td>
                    <td colspan='2'><?php echo $boleta['codProforma'] ?></td>
                </tr>
                <tr>
                    <td colspan='2'>Fecha Emision:</td>
                    <td colspan='2'><?php echo $boleta['fecha'] ?></td>
                </tr>
                <tr>
                    <td colspan='2'>Fecha Entrega:</td>
                    <td colspan='2'><?php echo $boleta['fechaEntrega'] ?></td>
                </tr>
                <tr>
                    <td colspan='2'>Cliente:</td>
                    <td colspan='2'><?php echo $boleta['nombreCliente'] ?></td>
                </tr>
                <tr>
                    <th>PRODUCTO</th>
                    <th>CANTIDAD</th>
                    <th>P/U</th>
                    <th>SUBTOTAL</th>
                </tr>
                <?php foreach ($boleta['detalle'] as $detalle) { ?>
                    <tr>
                        <td><?php echo $detalle['nombre'] ?></td>
                        <td><?php echo $detalle['cantidad'] ?></td>
                        <td><?php echo $detalle['precio'] ?></td>
                        <td>S/.<?php echo $detalle['subtotal'] ?></td>
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
                    <td><?php echo $boleta['totalPagar'] ?></td>
                </tr>
                <tr>
                    <td colspan='4'><input class='button' name="confirmarB" type="submit" value="CONFIRMAR" /></td>
                </tr>
            </table>
            <div class="button-container">
            <button type="button" onclick="irAFormProforma('<?php echo isset($_SESSION['codProforma']) ? urlencode($_SESSION['codProforma']) : ''; ?>')">Regresar</button>
                <button type="button" onclick="irAInicio('<?php echo urlencode($_SESSION['login']); ?>')">Inicio</button>
            </div>
        </form>
    </body>
    </html>
<?php
}
}
?>