<?php
class formBuscarTicketReembolso
{
    public function formBuscarTicketReembolsoShow()
    {
        ?>
        <html>

        <head>
            <title>Buscar Ticket Reembolso</title>
            <link href="../styles/forms.css" rel="stylesheet" type="text/css">
        </head>

        <body>
            <div class="navbar">
                <h1>Buscar Ticket Reembolso</h1> 
                <a href="../index.php" class="logout-button">Cerrar Sesion</a>
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
                        <button type="button" onclick="window.history.back();">Regresar</button>
                        <button type="button" onclick="window.location.href='../securityModule/getUsuario.php';">Inicio</button>
                    </div>
                </form>
            </div>
        </body>

        </html>
        <?php
    }
}
?>