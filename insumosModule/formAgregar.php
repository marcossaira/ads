<?php
class formAgregar
{
    public function formAgregarShow()
{
        ?>
        <html>

        <head>
            <title>Agregar</title>
        </head>

        <body>
        <div class="navbar">
                    <h1>Agregar Insumos</h1> 
                    <a href="../index.php" class="logout-button">Logout</a>
        </div>
        <h2>Agregar Unidades</h2>

        <form action="getInsumos.php" method="POST">

        <label for="idInsumos">Código:</label>
        <input type="text" id="codigo" name="codigo" required>

        <br><br>

        <label for="cantidadInsumo">Cantidad a agregar:</label>
        <input type="text" id="cantidadInsumo" name="cantidadInsumo" required>

        <input type="submit" name="btnAumento" value="Enviar">
        </form>
        </body>

        </html>
        <?php
    }
}

?>