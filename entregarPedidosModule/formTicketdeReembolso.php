<?php
class formTicketdeReembolso
{
    public function formTicketdeReembolsoShow($cantidad,$idBtn)
    {
?>
        <html>

        <head>
            <title>TICKET DE REEMBOLSO</title>
        </head>

        <body>
            <form name="formTicketdeReembolso" method="POST" action="getBoletaFactura.php">
                <table border="0" align="center">
                    <tr>
                        <td colspan="2" align="center">TICKET DE REEMBOLSO</td>
                    </tr>
                    <tr>
                        <td>Comprobante:</td>
                        <td><input name="txtComprobante" type="text" value="<?php echo $idBtn?>" /></td>
                    </tr>
                    <?php
                        for ($i = 0; $i < count($cantidad); $i++) {
                        ?>
                    <tr>
                       
                            <td>Monto:</td>
                            <td><?php echo $cantidad[$i]['totalPagar'] ?></td>
                    </tr>
                    <tr>
                
                    <td>Fecha</td>
                    <td><input name="txtFecha" type="text" value="<?php echo $fechaActual = date("Y-m-d"); ?>" /></td>
                    </tr>
                    <tr>
                        <?php
                        if(substr($idBtn,0,1) == "B"){
                            $cod=$cantidad[$i]['idBoleta'];
                        }else{
                            $cod=$cantidad[$i]['idFactura'];
                        }
                        ?>
                        <td><button name="btnGenerarTicket" type="submit" value="<?= $cod?>">GENERAR</button></td>
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