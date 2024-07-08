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
                </form>
            </div>
        </body>

        </html>
        <?php
    }
}
?>