<?php
class formBuscarProforma
{
    public function formBuscarProformaShow()
    {
        ?>
        <html>
            <head>
                <title>Buscar Boleta o Factura</title>
                <link href="../styles/forms.css" rel="stylesheet" type="text/css">
            </head>
            <body>
                <form name="formBuscarProforma" method="POST" action="../emitirComprobanteModule/getProforma.php">
                    <table border="0" align="center">
                        <tr>
                            <td colspan="2" align="center">BUSCAR PROFORMA</td>
                        </tr>
                        <tr>
                            <td>N° de Proforma:</td>
                            <td><input name="txtProforma" type="text" /></td>
                        </tr>
                        <tr>
                            <td colspan="2"><input name="btnBuscar" type="submit" value="Buscar" /></td>
                        </tr>
                    </table>
                </form>
            </body>
        </html>
        <?php
    }
}
?>