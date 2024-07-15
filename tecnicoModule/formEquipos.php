<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['login'])) {
    header('Location: ../index.php'); 
    exit;
}
class formEquipos
{
    public function formEquiposShow($datos)
    {
        
        ?>
        <html>
        <head>
            <title>Lista de Equipos de Laboratorio</title>
            <link href="../styles/forms.css" rel="stylesheet" type="text/css">
            <script src="../js/redireccionamientos.js"></script>
        </head>

        <body>
                <div class="navbar">
                    <h1>Lista de Equipos de Laboratorio</h1> 
                    <button type="button" onclick="cerrarSesionYRedirigir()" class="logout-button">Cerrar Sesión</button>
                </div>
            <form name="formEquipos" method="POST" action="../tecnicoModule/getEquipos.php">
                <table border="0" align="center">

                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Marca</th>
                        <th scope="col">Modelo</th>
                        <th scope="col">Fecha</th>
                    </tr>
                    <tr>
                    <?php

                    for ($i = 0; $i < count($datos); $i++) {
                        ?>
                        <td>
                            <?php echo $datos[$i]['idEquipo'] ?>
                        </td>
                        <td>
                            <?php echo $datos[$i]['nomEquipo'] ?>
                        </td>
                        <td>
                            <?php echo $datos[$i]['marca'] ?>
                        </td>
                        <td>
                            <?php echo $datos[$i]['modelo'] ?>
                        </td>
                        <td>
                            <?php echo $datos[$i]['fechaCompra'] ?>
                        </td>
                        <td><button name="btnSeleccionar" type="submit" value="<?= $datos[$i]['idEquipo'] ?>">Seleccionar</button>
                        </tr>
                        <?php
                    }
                    ?>
                    
                </table>
                <div class="button-container">
         

                <button type="button" onclick="irAInicio('<?php echo urlencode($_SESSION['login']); ?>')">Regresar</button>



</script>

                    </div>
            </form>
        </body>

        </html>
        <?php
    }
}
?>