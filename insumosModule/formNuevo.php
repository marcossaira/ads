<?php
class formNuevo
{
    public function formNuevoShow()
    {
        ?>
        <html>

        <head>
            <title>Nuevo</title>
    </head>
    <body>
    <div class="navbar">
                    <h1>Nuevo Insumo</h1> 
                    <a href="../index.php" class="logout-button">Cerrar Sesion</a>
                </div>
        <h2>Ingresar nuevo insumo</h2>

        <form action="getInsumos.php" method="POST">

        <label for="idInsumos">Código de producto:</label>
        <input type="text" id="codigo" name="codigo" required>

        <br><br>

        <label for="nombreInsumo">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>
        
        <br><br>

        <label for="descripcion">Descripción:</label>
        <input type="text" id="descripción" name="descripción" required>
        
        <br><br>

        <label for="cantidadInsumo">Cantidad del Insumo:</label>
        <input type="text" id="cantidadInsumo" name="cantidadInsumo" required>

        <br><br>

        <label for="cantidadRecomendada">Cantidad recomendada del Insumo:</label>
        <input type="text" id="cantidadRecomendada" name="cantidadRecomendada" required>

        <br><br>

        <label for="proveedor">Proveedor:</label>
        <input type="text" id="proveedor" name="proveedor" required>

        <br><br>

        <label for="contacto">Contacto del proveedor:</label>
        <input type="text" id="contacto" name="contacto" required>

        <br><br>

        <input type="submit" name="btnEnviar" value="Enviar">
        </form>

        </body>

        </html>
        <?php
    }
}
?>