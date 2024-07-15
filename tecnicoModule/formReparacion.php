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
            <script src="../js/redireccionamientos.js"></script>
        </head>

        <body>
                <div class="navbar">
                    <h1>Reparacion del Equipo</h1> 
                    <button type="button" onclick="cerrarSesionYRedirigir()" class="logout-button">Cerrar Sesión</button>
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
                <button type="button" onclick="irAFormFichaTecnica('<?php echo isset($_SESSION['idEq']) ? urlencode($_SESSION['idEq']) : ''; ?>')">Regresar</button>
                <button type="button" onclick="irAInicio('<?php echo urlencode($_SESSION['login']); ?>')">Inicio</button>
                    </div>
            </form>
        </body>

        </html>
        <?php
    }
}