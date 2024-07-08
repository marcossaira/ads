<?php
class formInsumos
{
    public function formInsumosShow()
    {
        ?>
        <html>

        <head>
            <title>Lista de Insumos</title>
            <link rel="stylesheet" type="text/css" href="style.css">
        </head>



        <body>
            <div class="container">
                <a class="button" href="controlInsumos.php?btnNuevo=true">Nuevo</a>
                <a class="button" href="controlInsumos.php?btnAgregar=true">Agregar</a>
                <a class="button" href="controlInsumos.php?btnMerma=true">Merma</a>
                <a class="button" href="controlInsumos.php?btnListar=true">Listar</a>
                <a class="button" href="controlInsumos.php?btnFaltantes=true">Faltantes</a>
            </div> 

        </body>

        </html>
        <?php
    }
}
?>