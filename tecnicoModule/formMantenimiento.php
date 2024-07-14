<?php
class formMantenimiento
{
    public function formMantenimientoShow($datos)
    {
        ?>
        <html>

        <head>
            <title>Mantenimiento del Equipo</title>
            <link href="../styles/forms.css" rel="stylesheet" type="text/css">
        </head>

        <body>
                <div class="navbar">
                    <h1>Mantenimiento del Equipo</h1> 
                    <a href="../index.php" class="logout-button">Logout</a>
                </div>
            <form name="formMantenimiento" method="POST" action="getFicha.php">
                <table border="0" align="center">
                    <?php
                    for ($i = 0; $i < count($datos); $i++) {
                        ?>
                       
                        <tr>
                            <td>NOMBRE DE EQUIPO:</td>
                            <td>
                                <?php echo $datos[$i]['nomEquipo'] ?>
                            </td>
                        </tr>
                        <tr>
                            <td>FECHA:</td>
                            <td><input name="txtFecha" type="text" value="<?php echo $fechaActual = date("Y-m-d");?>" /></td>
                            </td>
                        </tr>
                        <tr>
                            <td>DESCRIPCION:</td>
                            <td>
                                <input type='text' name='txtDetalleM'>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <button type='submit' name='btnRegistrarM' value="<?= $datos[$i]['idEquipo'] ?>">REGISTRAR</button>
                            </td>
                        </tr>
               
                            <?php
                    }
                    ?>
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