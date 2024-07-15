<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['login'])) {
    header('Location: ../index.php');
    exit;
}
class formMantenimiento
{
    public function formMantenimientoShow($datos)
    {
?>
        <html>

        <head>
            <title>Mantenimiento del Equipo</title>
            <link href="../styles/forms.css" rel="stylesheet" type="text/css">
            <script src="../js/redireccionamientos.js"></script>
        </head>

        <body>
            <div class="navbar">
                <h1>Mantenimiento del Equipo </h1>
                <a href="../index.php" class="logout-button">Cerrar Sesion</a>
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
                            <td><input name="txtFecha" type="text" value="<?php echo $fechaActual = date("Y-m-d"); ?>" /></td>
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
                    <button type="button" onclick="irAFormFichaTecnica('<?php echo isset($_SESSION['idEq']) ? urlencode($_SESSION['idEq']) : ''; ?>')">Regresar</button>
                    <button type="button" onclick="irAInicio('<?php echo urlencode($_SESSION['login']); ?>')">Inicio</button>
                </div>
            </form>
        </body>

        </html>
<?php
    }
}
