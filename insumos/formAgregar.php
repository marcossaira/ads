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
        <div class="navbar">
                    <h1>Agregar Insumos</h1> 
                    <a href="../index.php" class="logout-button">Logout</a>
        </div>
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