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
                <div class="navbar">
                    <h1>Emitir Comprobante</h1> 
                    <a href="../index.php" class="logout-button">Cerrar Sesion</a>
                </div>
                <form name="formBuscarProforma" method="POST" action="../emitirComprobanteModule/getProforma.php">
                    <table border="0" >
                        <tr>
                            <td colspan="2" align="center">BUSCAR PROFORMA</td>
                        </tr>
                        <tr>
                            <td>N° de Proforma:</td>
                            <td><input name="txtProforma" type="text" /></td>
                        </tr>
                        <tr>
                            <td colspan="2" align="center">
                                <input name="btnBuscar" type="submit" value="Buscar" />
                            </td>
                        </tr>
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
