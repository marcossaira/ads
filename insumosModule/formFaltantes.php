<?php
class formFaltantes
{
    public function formFaltantesShow()
    {
        require_once('../model/modeloInsumos.php');

        $objInsumo = new modeloInsumos();
        $faltantes = $objInsumo->Faltantes();

        ?>
        <html>

        <head>
            <title>faltantes</title>
        </head>

        <body>
        <div class="navbar">
                    <h1>Insumos Faltantes</h1> 
                    <a href="../index.php" class="logout-button">Cerrar Sesion</a>
        </div>
            <h2>Lista de faltantes</h2>

            <?php
            if ($faltantes) {

                echo '<table>';
                echo '<tr><th>Código</th><th>Nombre</th><th>Cantidad Faltante</th><th>Proveedor</th><th>Contacto</th></tr>';
                foreach ($faltantes as $faltante) {
                    $cantidadFaltante = $faltante['cantidadRecomendada'] - $faltante['cantidadInsumo'];
                    echo '<tr>';
                    echo '<td>' . $faltante['idInsumos'] . '</td>';
                    echo '<td>' . $faltante['nombreInsumo'] . '</td>';
                    echo '<td>' . $cantidadFaltante . '</td>';
                    echo '<td>' . $faltante['proveedor'] . '</td>';
                    echo '<td>' . $faltante['contacto'] . '</td>';
                    echo '</tr>';
                }
                echo '</table>';
            } else {
                echo 'No se encontraron productos faltantes.';
            }
            ?>
                <a href="indexInsumos.php">Index</a>

        </body>

        </html>
        <?php
    }
}
?>
