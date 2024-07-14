<?php
class formMerma
{
    public function formMermaShow()
{
        ?>
        <html>

        <head>
            <title>Merma</title>
        </head>

        <body>
        <div class="navbar">
                    <h1>Realizar Merma</h1> 
                    <a href="../index.php" class="logout-button">Cerrar Sesion</a>
        </div>
        <h2>Realizar Merma</h2>

        <form action="getInsumos.php" method="POST">

        <label for="idInsumos">Código:</label>
        <input type="text" id="codigo" name="codigo" required>

        <br><br>

        <label for="cantidadInsumo">Cantidad Mermada:</label>
        <input type="text" id="cantidadInsumo" name="cantidadInsumo" required>

        <input type="submit" name="btnEnviarMerma" value="Enviar">
        </form>
        </body>

        </html>
        <?php
    }
}

?>