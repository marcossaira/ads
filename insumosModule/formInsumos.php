<?php
class formInsumos
{
    public function formInsumosShow()
    {
        ?>
        <html>

        <head>
            <title>Lista de Insumos</title>
        </head>


        <body>
                <div>
                    <a href="controlInsumos.php?btnNuevo=true">Nuevo</a>
                    <a href="controlInsumos.php?btnAgregar=true">Agregar</a>
                    <a href="controlInsumos.php?btnMerma=true">Merma</a>
                    <a href="controlInsumos.php?btnListar=true">Listar</a>
                    <a href="controlInsumos.php?btnFaltantes=true">Faltantes</a>
                    
                </div> 

        </body>

        </html>
        <?php
    }
}
?>