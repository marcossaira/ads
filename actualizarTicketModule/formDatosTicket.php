<?php
class formDatosTicket
{
    public function formDatosTicketShow($listaTicket,$cod)
    {
?>
        <html>

        <head>
            <link href="../styles/forms.css" rel="stylesheet" type="text/css">
            <title>Bienvenido: <?php echo $_SESSION['login'] ?></title>
        </head>

        <body>
            <form name="formDatosTicket" method="POST" action="../actualizarTicketModule/getTicket.php">

                <table align="center">
                    <?php
                    for ($i = 0; $i < count($listaTicket); $i++) {
                    ?>
                        <tr>
                            <th>CodTicket</th>
                            <td><?php echo $cod?></td>
                        </tr>
                        <tr>
                            <th>Fecha</th>
                            <td><?php echo $listaTicket[$i]['fecha'] ?></td>
                        </tr>
                        <tr>
                            <th>Monto</th>
                            <td>S/.<?php echo $listaTicket[$i]['totalPagar'] ?></td>
                        </tr>
                        <tr>
                            <th>Estado</th>
                            <td><?php echo $listaTicket[$i]['estado'] ?></td>
                        </tr>
                   
                    <tr>
                        <td><button name="btnEntregar" type="submit" value="<?php echo $cod?>">ENTREGAR</button></td>
                        <td><button name="btnAnular" type="submit" value="<?php echo $cod?>">ANULAR</button></td>
                    </tr>
                    <?php
                    }
                    ?>
                </table>
            </form>

        </body>

        </html>
<?php
    }
}
?>