<?php
class formBuscarBoletaFactura
{
    public function formBuscarBoletaFacturaShow()
    {
        ?>
        <html>
            <head>
                <title>Buscar Boleta o Factura</title>
            </head>
            <body>
                <form name="formBuscarBoletaFactura" method="POST" action="../entregarPedidosModule/getBoletaFactura.php">
                    <table border="0" align="center">
                        <tr>
                            <td colspan="2" align="center">Buscar Boleta</td>
                        </tr>
                        <tr>
                            <td>N° Boleta o Factura:</td>
                            <td><input name="txtCode" type="text" /></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input name="btnBuscar" type="submit" value="Buscar" /></td>
                        </tr>
                    </table>
                </form>
            </body>
        </html>
        <?php
    }
}
?>