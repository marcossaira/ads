<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
 // Inicia la sesión si aún no está iniciada

// Verifica si el usuario está autenticado (opcional, dependiendo de tus necesidades de seguridad)
if (!isset($_SESSION['login'])) {
    header('Location: ../index.php'); // Redirige al usuario al inicio si no está autenticado
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
        </head>

        <body>
        <h1>BIENVENIDO: ga<?php echo strtoupper($_SESSION['login']); ?></h1> 
                <div class="navbar">
                    <h1>Lista de Equipos de Laboratorio</h1> 
                    <a href="../index.php" class="logout-button">Cerrar Sesion</a>
                </div>
            <form name="formEquipos" method="POST" action="./tecnicoModule/getEquipos.php">
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

<script>
    function irAInicio(login) {
        // Redirige a la URL de getUsuario.php con el parámetro login
        window.location.href = `../securityModule/getRedireccionar.php?login=${login}`;
    }
</script>

</script>

                    </div>
            </form>
        </body>

        </html>
        <?php
    }
}
?>