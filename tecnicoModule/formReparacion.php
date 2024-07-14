<?php
class formReparacion
{
    public function formReparacionShow($datos)
    {
        ?>
        <html>

        <head>
            <title>Reparacion del Equipo</title>
            <link href="../styles/forms.css" rel="stylesheet" type="text/css">
        </head>

        <body>
                <div class="navbar">
                    <h1>Reparacion del Equipo</h1> 
                    <a href="../index.php" class="logout-button">Cerrar Sesion</a>
                </div>
            <form name="formReparacion" method="POST" action="getFicha.php">
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
                                <input type='text' name='txtDetalleR'>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <button type='submit' name='btnRegistrarR' value="<?= $datos[$i]['idEquipo'] ?>">REGISTRAR</button>
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