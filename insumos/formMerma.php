<?php
class formMerma
{
    public function formMermaShow()
{
        ?>
        <html>

        <head>
        <link rel="stylesheet" type="text/css" href="style.css">
            <title>Merma</title>
            
        </head>

        <body>
        <div class="navbar">
                    <h1>Realizar Merma</h1> 
                    <a href="../index.php" class="logout-button">Cerrar Sesion</a>
                </div>
        <div class="container">
    <div class="form-container">
        <h2 class="form-title">Realizar Merma</h2>

        <form action="getInsumos.php" method="POST">
            <label class="form-label" for="codigo">Código:</label>
            <input class="form-input" type="text" id="codigo" name="codigo" required>

            <br><br>

            <label class="form-label" for="cantidadInsumo">Cantidad Mermada:</label>
            <input class="form-input" type="text" id="cantidadInsumo" name="cantidadInsumo" required>

            <input class="form-submit" type="submit" name="btnEnviarMerma" value="Enviar">
        </form>
    </div>
</div>

        </body>

        </html>
        <?php
    }
}

?>