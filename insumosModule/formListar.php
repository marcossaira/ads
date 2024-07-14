<?php
class formListar
{
    public function formListarShow()
    {
        ?>
        <html>

        <head>
            <title>Lista de Insumos</title>
        </head>


        <body>
        <div class="navbar">
                    <h1>Detalle de Insumo</h1> 
                    <a href="../index.php" class="logout-button">Cerrar Sesion</a>
        </div>

            <form name="formInsumos" method="POST" action="getInsumos.php">
                  
                <table border="0" align="center">

                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Cantidad Recomendada</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Proveedor</th>
                        <th scope="col">Contacto</th>
                    </tr>
                    <tr>
                    <?php
                    include_once('../model/modeloInsumos.php');
                    $objEquipo = new modeloInsumos();
                    $datos = $objEquipo->listarInsumos();
                    for ($i = 0; $i < count($datos); $i++) {
                        ?>
                        
                        <td>
                            <?php echo $datos[$i]['idInsumos'] ?>
                        </td>
                        <td>
                            <?php echo $datos[$i]['nombreInsumo'] ?>
                        </td>
                        <td>
                            <?php echo $datos[$i]['descripcion'] ?>
                        </td>
                        <td>
                            <?php echo $datos[$i]['cantidadInsumo'] ?>
                        </td>
                        <td>
                            <?php echo $datos[$i]['cantidadRecomendada'] ?>
                        </td>
                        <td>
                            <?php echo $datos[$i]['estado'] ?>
                        </td>
                        <td>
                            <?php echo $datos[$i]['proveedor'] ?>
                        </td>
                        <td>
                            <?php echo $datos[$i]['contacto'] ?>
                        </td>
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