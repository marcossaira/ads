<?php

class WindowBienvenidaSistema implements VentanaSistema {
   public function mostrarMensaje($listaPrivilegios, $enlace=null)
    {
        ?>
        <html>
        <head>
            <title>Bienvenido: <?php echo strtoupper($_SESSION['login']); ?>
            </title>
            <link href="../styles/bienvenida.css" rel="stylesheet" type="text/css">
            
        </head>
        <body>
            <div class="navbar">
                <h1>BIENVENIDO: <?php echo strtoupper($_SESSION['login']); ?></h1> 
                <a href="../index.php" class="logout-button">Cerrar Sesion</a>
            </div>
            <table border='0' align="center" style="width: 30%;">
                <tr>
                    <?php
                    for($i = 0; $i < count($listaPrivilegios); $i++)
                    {
                        ?>
                        <td align='center'>
                            <form name="formx" method="POST" action="<?php echo $listaPrivilegios[$i]['pathPriv']; ?>">
                                <p><img src="../img/<?php echo $listaPrivilegios[$i]['iconPriv']; ?>" width="50" height="50" alt="<?php echo $listaPrivilegios[$i]['labelPriv']; ?>"></p>
                                <input type="submit" value="<?php echo $listaPrivilegios[$i]['labelPriv']; ?>" name="<?php echo $listaPrivilegios[$i]['buttonPriv']; ?>" />
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

