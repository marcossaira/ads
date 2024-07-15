<?php
class formAgregar
{
    public function formAgregarShow()
{
        ?>
<html>

<head>
    <title>Agregar</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <div class="container">
        <div class="form-container">
            <h2 class="form-title">Agregar Unidades</h2>

            <form action="getInsumos.php" method="POST">
                <label class="form-label" for="codigo">Código:</label>
                <input class="form-input" type="text" id="codigo" name="codigo" required>

                <br><br>

                <label class="form-label" for="cantidadInsumo">Cantidad a agregar:</label>
                <input class="form-input" type="text" id="cantidadInsumo" name="cantidadInsumo" required>

                <input class="form-submit" type="submit" name="btnAumento" value="Enviar">
            </form>
        </div>
    </div>

</body>

</html>

        <?php
    }
}

?>