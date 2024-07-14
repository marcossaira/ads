<?php
class formNotaCredito
{
   public function formNotaCreditoShow($cod,$cliente,$monto,$idTipo,$id)
    {   //echo $cod;
        
        ?>
        <html>
            <head>
                <title>Nota de Credito</title>
                <link href="../styles/forms.css" rel="stylesheet" type="text/css">
            </head>
            <body>
                <div class="navbar">
                    <h1>Nota de Credito</h1> 
                    <a href="../index.php" class="logout-button">Logout</a>
                </div>
                <form name ="formNotaCredito" method = "POST" action="controlGestionarBoletaFactura.php">
                <table border = '0' align="center">
                <tr>
                    <td colspam=2 align="center">NOTA DE CREDITO</td>                        
                </tr>
            
                <tr>
                    <td>Codigo de Comprobante: </td>
                    <td><input name="txtCod" type="text" value="<?php echo $cod;?>" /></td>
                </tr>
                <tr>
                    <td>Cliente: </td>
                    <td><input name="txtCliente" type="text" value="<?php echo $cliente;?>" /></td>
                </tr>
                <tr>
                    <td>Monto: </td>
                    <td><input name="txtMonto" type="text" value="<?php echo $monto;?>" /></td>
                </tr>
                <tr>
                    <td>Motivo: </td>
                    <td><input name="txtMotivo" type="text" /></td>
                </tr>
                <tr>
                    <td>Fecha de Emision de Nota de Credito: </td>
                    <td><input name="txtFechaEmisionNota" type="text" value="<?php echo $fechaActual = date("Y-m-d");?>" /></td>
                </tr>
                </table>
                <div class="center">
                <input type='hidden' value='<?php echo $idTipo?>' name='idTipo'>
                <?php echo $idTipo?>
                <input type='hidden' value='<?php echo $id?>' name='id'>
                <input type="submit" value = "Emitir" name = "btnEmitir">
                </div>
                <div class="button-container">
                    <button type="button" onclick="window.history.back();">Regresar</button>
                    <button type="button" onclick="window.location.href='../securityModule/getUsuario.php';">Inicio</button>
                </div>
                </form>
                
            </body>
        </html>
        <?php
    }
}
?>