<?php
class formNuevo
{
    public function formNuevoShow()
    {
        ?>
        <html>

        <head>
        <link rel="stylesheet" type="text/css" href="style.css">
            <title>Nuevo Insumo</title>
            
    </head>
    <body>
                 <div class="navbar">
                    <h1>Nuevo Insumo</h1> 
                    <a href="../index.php" class="logout-button">Cerrar Sesion</a>
                </div>
        <div class="container">
        <div class="form-container">
        <h2>Ingresar nuevo insumo</h2>
        
        <form action="getInsumos.php" method="POST">

        <label class="form-label" for="idInsumos">Código de producto:</label>
        <input class="form-input" type="text" id="codigo" name="codigo" required>

        <label class="form-label" for="nombreInsumo">Nombre:</label>
        <input class="form-input" type="text" id="nombre" name="nombre" required>

        <label class="form-label" for="descripcion">Descripción:</label>
        <input class="form-input" type="text" id="descripción" name="descripción" required>

        <label class="form-label" for="cantidadInsumo">Cantidad del Insumo:</label>
        <input class="form-input" type="text" id="cantidadInsumo" name="cantidadInsumo" required>

        <label class="form-label" for="cantidadRecomendada">Cantidad recomendada del Insumo:</label>
        <input class="form-input" type="text" id="cantidadRecomendada" name="cantidadRecomendada" required>

        <label class="form-label" for="proveedor">Proveedor:</label>
        <input class="form-input" type="text" id="proveedor" name="proveedor" required>

        <label class="form-label" for="contacto">Contacto del proveedor:</label>
        <input class="form-input" type="text" id="contacto" name="contacto" required>

        <input class="form-submit" type="submit" name="btnEnviar" value="Enviar">
        </form>
    
        </div>
        </div>

        

        </body>

        </html>
        <?php
    }
}
?>