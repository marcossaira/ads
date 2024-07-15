<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
class formBuscarProducto
{
    public function formBuscarProductoShow($producto)
    {
?>
        <html>
        <head>
            <title>Buscar Producto</title>
            <link href="../styles/forms.css" rel="stylesheet" type="text/css">
            <script src="../js/redireccionamientos.js"></script>
        </head>
        <body>
            <div class="navbar">
                <h1>Buscar Producto</h1> 
                <button type="button" onclick="cerrarSesionYRedirigir()" class="logout-button">Cerrar Sesión</button>
            </div>
            <form name="formBuscarProducto" method="POST" action="../salesModule/getProforma.php">
                <table align="center">
                    <tr>
                        <td colspan="2" align="center">Buscar Producto</td>
                    </tr>
                    <tr>
                        <td>Producto</td>
                        <td><input name="txtProducto" type="text" /></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input name="btnBuscar" type="submit" value="Buscar" /></td>
                    </tr>
                </table>
                <br><br>
                <?php
                if (!empty($producto)) {
                ?>
                    <table align="center">
                        <tr>
                            <th>IdProducto</th>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            <th>Precio</th>
                        </tr>
                        <tr>
                            <td><?php echo $producto[0]['idProducto'] ?></td>
                            <td><?php echo $producto[0]['nombre'] ?></td>
                            <td><?php echo $producto[0]['descripcion'] ?></td>
                            <td><?php echo $producto[0]['precio'] ?></td>
                        </tr>
                        <tr>
                            <form action="../salesModule/getProforma.php" method="POST">
                                <input type="hidden" name="idProducto" value="<?php echo $producto[0]['idProducto'] ?>">
                                <input type="hidden" name="nombreProducto" value="<?php echo $producto[0]['nombre'] ?>">
                                <input type="hidden" name="descripcionProducto" value="<?php echo $producto[0]['descripcion'] ?>">
                                <input type="hidden" name="precioProducto" value="<?php echo $producto[0]['precio'] ?>">
                                <td colspan="4"><input name="btnAgregar" type="submit" value="Agregar"></td>
                            </form>
                        </tr>
                    </table>
                <?php } ?>
            </form>
            <?php
            if (!empty($_SESSION["listaProductosProforma"])) {
            ?>
                <form class='listado' action="../salesModule/getProforma.php" method="POST">
                    <table align="center">
                        <tr>
                            <th>Nombre</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Subtotal</th>
                        </tr>
                        <?php
                        foreach ($_SESSION["listaProductosProforma"] as $producto) {
                        ?>
                            <tr>
                                <td><?php echo $producto['nombreProducto']; ?></td>
                                <td><?php echo $producto['precioProducto']; ?></td>
                                <td><input type="number" class="cantidadProducto" min="1" value="<?php echo isset($producto['cantidadProducto']) ? $producto['cantidadProducto'] : 1; ?>" name="cantidadProducto[]"></td>
                                <td><input type="text" class="subTotal" name="subTotal[]" readonly></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </table>
                    <p>Total</p>
                    <input type="text" name="totalProforma" id="totalProforma" readonly>
                    <input type="submit" name="btnEmitirProforma" value="Emitir Proforma">
                </form>
            <?php } ?>
            <div class="button-container">
            <button type="button" onclick="irAInicio('<?php echo urlencode($_SESSION['login']); ?>')">Regresar</button>
            </div>
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    const cantidadProducto = Array.from(document.getElementsByClassName("cantidadProducto"));
                    const mostrarTotal = document.getElementById("totalProforma");
                    const subTotal = Array.from(document.getElementsByClassName("subTotal"));
                    cantidadProducto.forEach((element, index) => {
                        element.addEventListener("input", () => {
                            let total = 0;
                            const cantidad = parseInt(element.value);
                            const precio = parseFloat(element.parentElement.previousElementSibling.textContent);
                            const subtotal = cantidad * precio;
                            subTotal[index].value = subtotal.toFixed(2);
                            cantidadProducto.forEach((elem, i) => {
                                total += parseFloat(subTotal[i].value || 0);
                            });
                            mostrarTotal.value = total.toFixed(2);
                        });
                    });
                });
            </script>
        </body>
        </html>
<?php
    }
}
?>
