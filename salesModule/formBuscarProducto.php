<?php
class formBuscarProducto
{
    public function formBuscarProductoShow($producto)
    {
?>
        <html>

        <head>
            <title>Buscar Producto</title>
            <link href="../styles/forms.css" rel="stylesheet" type="text/css">
        </head>

        <body>
            <form name="formBuscarProducto" method="POST" action="../salesModule/getProforma.php">
                <table borde="0" align="center">
                    <tr>
                        <td colspam=2 align="center">Buscar Producto</td>
                    </tr>
                    <tr>
                        <td>Producto</td>
                        <td><input name="txtProducto" type="text" />
                    </tr>
                    <tr>
                        <td><input name="btnBuscar" type="submit" value="Buscar" />
                    </tr>
                </table>
                <br>
                <br>
                <?php
                if (!empty($producto)) {
                ?>
                    <table>
                        <tr>
                            <th>IdProducto</th>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            <th>Precio</th>
                        </tr>
                        <tr>
                            <?php
                            $id = $producto[0]['idProducto'];
                            $nombre = $producto[0]['nombre'];
                            $descripcion = $producto[0]['descripcion'];
                            $precio = $producto[0]['precio'];
                            ?>
                            <td><?php echo $id ?></td>
                            <td><?php echo $nombre ?></td>
                            <td><?php echo $descripcion ?></td>
                            <td><?php echo $precio ?></td>
                        </tr>
                        <tr>
                            <form action="../salesModule/getProforma.php" method="POST">
                                <input type="hidden" name="idProducto" value="<?php echo $id ?>">
                                <input type="hidden" name="nombreProducto" value="<?php echo $nombre ?>">
                                <input type="hidden" name="descripcionProducto" value="<?php echo $descripcion ?>">
                                <input type="hidden" name="precioProducto" value="<?php echo $precio ?>">
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
                    <table>
                        <tr>
                            <th>Nombre</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Subtotal</th>
                        </tr>
                        <?php
                        $listaProductosProforma = $_SESSION["listaProductosProforma"];
                        foreach ($listaProductosProforma as $producto) {
                            $id = $producto['idProducto'];
                            $nombre = $producto['nombreProducto'];
                            $descripcion = $producto['descripcionProducto'];
                            $precio = $producto['precioProducto'];
                        ?>
                            <tr>
                                <td><?php echo $nombre; ?></td>
                                <td><?php echo $precio; ?></td>
                                <td><input type="number" class="cantidadProducto" min="1" value="1" name="cantidadProducto[]"></td>
                                <td><input type="text" class="subTotal" name="subTotal[]" readonly></td>
                                </td>
                            </tr>

                        <?php
                        }
                        ?>


                    </table>
                    <p>Total</p>

                    <input type="text" name="totalProforma" id="totalProforma" readonly>
                    <input type="submit" name="btnEmitirProforma" value="Emitir proforma">


                <?php
            }
                ?>
                </form>
                <script>
                    const cantidadProducto = Array.from(document.getElementsByClassName("cantidadProducto"));
                    const mostrarTotal = document.getElementById("totalProforma");
                    const subTotal = Array.from(document.getElementsByClassName("subTotal"));
                    cantidadProducto.forEach((element, index) => {
                        element.addEventListener("keyup", () => {
                            let total = 0;
                            const cantidad = parseInt(element.value);
                            const precio = parseFloat(element.parentElement.previousElementSibling.textContent);
                            const subtotal = cantidad * precio;
                            subTotal[index].value = subtotal;
                            cantidadProducto.forEach(element => {
                                total += element.value * element.parentElement.previousElementSibling.textContent;
                            });
                            mostrarTotal.value = total;
                        });
                    });
                </script>
        </body>

        </html>
<?php
    }
}

?>