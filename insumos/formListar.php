<?php
class formListar
{
    public function formListarShow()
    {
        ?>
        <html>

        <head>
            <link rel="stylesheet" type="text/css" href="style.css">
            <title>Lista de Insumos</title>
            
        </head>


        <body>
        <div class="navbar">
                    <h1>Detalle de Insumo</h1> 
                    <a href="../index.php" class="logout-button">Logout</a>
        </div>

        <div class="container">
    <div class="table-container">
    <h2 class="form-title">Lista de Insumos</h2>
        <table>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Descripción</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Cantidad Recomendada</th>
                <th scope="col">Estado</th>
                <th scope="col">Proveedor</th>
                <th scope="col">Contacto</th>
            </tr>
            <?php
            include_once('../model/modeloInsumos.php');
            $objEquipo = new modeloInsumos();
            $datos = $objEquipo->listarInsumos();
            for ($i = 0; $i < count($datos); $i++) {
                ?>
                <tr>
                    <td><?php echo $datos[$i]['idInsumos'] ?></td>
                    <td><?php echo $datos[$i]['nombreInsumo'] ?></td>
                    <td><?php echo $datos[$i]['descripcion'] ?></td>
                    <td><?php echo $datos[$i]['cantidadInsumo'] ?></td>
                    <td><?php echo $datos[$i]['cantidadRecomendada'] ?></td>
                    <td><?php echo $datos[$i]['estado'] ?></td>
                    <td><?php echo $datos[$i]['proveedor'] ?></td>
                    <td><?php echo $datos[$i]['contacto'] ?></td>
                </tr>
                <?php
            }
            ?>
        </table>

    </div>
</div>
    <div class="button-container">
        <button type="button" onclick="window.history.back();">Regresar</button>
        <button type="button" onclick="window.location.href='../securityModule/getUsuario.php';">Inicio</button>
    </div>

        </body>

        </html>
        <?php
    }
}
?>