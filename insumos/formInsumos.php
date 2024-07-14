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
                <div class="navbar">
                    <h1>Lista de Insumos</h1> 
                    <a href="../index.php" class="logout-button">Logout</a>
                </div>
            <div class="container">
                <a class="button" href="controlInsumos.php?btnNuevo=true">Nuevo</a>
                <a class="button" href="controlInsumos.php?btnAgregar=true">Agregar</a>
                <a class="button" href="controlInsumos.php?btnMerma=true">Merma</a>
                <a class="button" href="controlInsumos.php?btnListar=true">Listar</a>
                <a class="button" href="controlInsumos.php?btnFaltantes=true">Faltantes</a>
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