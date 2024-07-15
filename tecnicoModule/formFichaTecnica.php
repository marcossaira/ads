<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['login'])) {
    header('Location: ../index.php'); 
    exit;
}
class formFichaTecnica
{
    public function formFichaTecnicaShow($datos, $historia)
    {
?>
        <html>

        <head>
            <title>Ficha Tecnica del Equipo</title>
            <link href="../styles/forms.css" rel="stylesheet" type="text/css">
            <script src="../js/redireccionamientos.js"></script>
        </head>

        <body>
            <div class="navbar">
                <h1>Ficha Tecnica</h1> 
                <a href="../index.php" class="logout-button">Cerrar Sesion</a>
            </div>
            <form name="formFichaTecnica" method="POST" action="getFicha.php">

                <!-- Ficha Técnica -->
                <table border="0" align="center">
                    <?php for ($i = 0; $i < count($datos); $i++) { ?>
                        <tr>
                            <td colspan='2'>
                                <strong>FICHA TECNICA</strong>
                            </td>
                        </tr>
                        <tr>
                            <td>ID EQUIPO:</td>
                            <td><?php echo $datos[$i]['idEquipo'] ?></td>
                        </tr>
                        <tr>
                            <td>NOMBRE:</td>
                            <td><?php echo $datos[$i]['nomEquipo'] ?></td>
                        </tr>
                        <tr>
                            <td>MARCA:</td>
                            <td><?php echo $datos[$i]['marca'] ?></td>
                        </tr>
                        <tr>
                            <td>DATOS:</td>
                            <td><?php echo $datos[$i]['modelo'] ?></td>
                        </tr>
                        <tr>
                            <td>FECHA DE COMPRA:</td>
                            <td><?php echo $datos[$i]['fechaCompra'] ?></td>
                        </tr>
                        <tr>
                            <td colspan='2'>
                                <button name="btnMantenimiento" type="submit" value="<?= $datos[$i]['idEquipo'] ?>">MANTENIMIENTO</button>
                                <button name="btnReparacion" type="submit" value="<?= $datos[$i]['idEquipo'] ?>">REPARACION</button>
                            </td>
                        </tr>
                    <?php } ?>
                </table>

                <!-- Historial -->
                <table border="0" align="center">
                    <tr>
                        <td colspan='3'>
                            <strong>HISTORIAL</strong>
                        </td>
                    </tr>
                    <tr>
                        <td>DESCRIPCION</td>
                        <td>TIPO DE TRABAJO</td>
                        <td>FECHA</td>
                    </tr>
                    <?php for ($j = 0; $j < count($historia); $j++) { ?>
                        <tr>
                            <td><?php echo $historia[$j]['descripcion'] ?></td>
                            <td><?php echo $historia[$j]['tipo'] ?></td>
                            <td><?php echo $historia[$j]['fecha'] ?></td>
                        </tr>
                    <?php } ?>
                </table>

                <!-- Botones de Navegación -->
                <div class="button-container">
                <button type="button" onclick="goBackTecnicoModule();">Regresar</button>
                <button type="button" onclick="irAInicio('<?php echo urlencode($_SESSION['login']); ?>')">Inicio</button>
                </div>

</script>
            </form>
        </body>

        </html>
<?php
    }
}
?>
