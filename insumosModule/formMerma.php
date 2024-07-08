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