<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
class formBuscarTicketReembolso
{
    public function formBuscarTicketReembolsoShow()
    {
        ?>
        <html>

        <head>
            <title>Buscar Ticket Reembolso</title>
            <link href="../styles/forms.css" rel="stylesheet" type="text/css">
            <script src="../js/redireccionamientos.js"></script>
        </head>

        <body>
            <div class="navbar">
                <h1>Buscar Ticket Reembolso</h1> 
                <button type="button" onclick="cerrarSesionYRedirigir()" class="logout-button">Cerrar Sesión</button>
            </div>
            <div class='cajabuscar'>
                <form id='buscarform' name="formBuscarTicketReembolso" method="POST"
                    action="../actualizarTicketModule/getTicket.php">
                    <fieldset>
                        <table borde="0" align="center">
                            <tr>
                                <td colspam=2 align="center">Buscar Ticket</td>
                            </tr>
                            <tr>
                                <td>Codigo de Ticket</td>
                                <td><input name="txtCodigo" type="text" id='s' /></td>
                            </tr>
                            <tr>
                                <td><input class='button' name="btnBuscar" type="submit" value="Buscar" /></td>
                                <i class="search"></i>
                            </tr>
                        </table>
                    </fieldset>
                    <div class="button-container">
                        <button type="button" onclick="irAInicio('<?php echo urlencode($_SESSION['login']); ?>')">Regresar</button>
                    </div>
                </form>
            </div>
        </body>

        </html>
        <?php
    }
}
?>