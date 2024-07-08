<?php
include_once('../shared/ventanaSistema.php');

class WindowBienvenidaSistema implements VentanaSistema {
   public function mostrarMensaje($listaPrivilegios, $enlace=null)
    {
        ?>
        <html>
            <head>
                <title>Bienvenido: <?php echo $_SESSION['login']?></title>
            </head>
            <body>
                <table border = '0' align="center">
                <tr>
                    <?php
                    for($i = 0 ; $i < count($listaPrivilegios); $i++)
                    {
                        ?>
                        <td align='center'>
                            <form name ="formx" method = "POST" action ="<?php echo $listaPrivilegios[$i]['pathPriv'];?>" >
                            <p><img src="../img/<?php echo $listaPrivilegios[$i]['iconPriv'] ?>" width = "50" heiht = "50"></p>
                            <input type = "submit" value = "<?php echo $listaPrivilegios[$i]['labelPriv']; ?>"
                                    name = "<?php echo $listaPrivilegios[$i]['buttonPriv']; ?>" />
                            
                            </form>
                        </td>
                        <?php
                    }
                    ?>
                </tr>
                </table>
            </body>
        </html>
        <?php
    }
}
?>
