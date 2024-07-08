<?php
class formReprogramarFecha
{
    public function formReprogramarFechaShow($idBtn)
    {
?>
        <html>

        <head>
            <title>REPROGRAMAR FECHA</title>
        </head>

        <body>
            <form name="formReprogramarFecha" method="POST" action="getBoletaFactura.php">
                <table border="0" align="center">
                    <tr>
                        <td colspan="2" align="center">REPROGRAMAR FECHA</td>
                    </tr>
                    <tr>
                        <td>Nueva Fecha:</td>
                        <td><input name="txtNuevaFecha" type="text"></td>
                    </tr>
                    <tr>
                        <td><button name="btnRepFecha" type="submit" value="<?= $idBtn?>">REPROGRAMAR</button></td>
                    </tr>
           
                </table>
            </form>
        </body>

        </html>
<?php
    }
}
?>