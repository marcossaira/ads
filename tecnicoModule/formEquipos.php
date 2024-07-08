<?php
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
            <form name="formEquipos" method="POST" action="getEquipos.php">
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
            </form>
        </body>

        </html>
        <?php
    }
}
?>