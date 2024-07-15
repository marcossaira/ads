<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
class formDatosTicket
{
    public function formDatosTicketShow($listaTicket,$cod)
    {
?>
        <html>

        <head>
            <link href="../styles/forms.css" rel="stylesheet" type="text/css">
            <title>Datos Ticket Reembolso<?php echo $_SESSION['login'] ?></title>
            <script src="../js/redireccionamientos.js"></script>
        </head>

        <body>
                <div class="navbar">
                    <h1>Datos del Ticket de Reembolso</h1> 
                    <?php echo $_SESSION['txtCodigo'] ?>
                    <button type="button" onclick="cerrarSesionYRedirigir()" class="logout-button">Cerrar Sesión</button>
                </div>
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
                <div class="button-container">
                <button type="button" onclick="goBackTicketModule();">Regresar</button>
                        <button type="button" onclick="irAInicio('<?php echo urlencode($_SESSION['login']); ?>')">Inicio</button>
                </div>
            </form>

        </body>

        </html>
<?php
    }
}
?>