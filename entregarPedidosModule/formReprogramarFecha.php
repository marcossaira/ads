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
                <div class="navbar">
                    <h1>Reprogramacion de Fecha</h1> 
                    <a href="../index.php" class="logout-button">Logout</a>
                </div>
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