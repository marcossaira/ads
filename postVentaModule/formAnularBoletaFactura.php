<?php
class formAnularBoletaFactura
{
    public function formAnularBoletaFacturaShow()
    {
        ?>
        <html>
            <head>
                <title>Anular Boleta o Factura</title>
                <link href="../styles/forms.css" rel="stylesheet" type="text/css">
            </head>
            <body>
                <form name="formAnularBoletaFactura" method="POST" action="getBoletaFactura.php">
                    <table border="0" align="center">
                        <tr>
                            <td colspan="2" align="center">Buscar Boleta</td>
                        </tr>
                        <tr>
                            <td>N° Boleta o Factura:</td>
                            <td><input name="txtNum" type="text" /></td>
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
