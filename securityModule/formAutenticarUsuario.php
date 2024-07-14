<?php
class formAutenticarUsuario
{
    public function formAutenticarUsuarioShow()
    {
    ?>
 <html>
        <head>
            <title>Autenticacion de usuario</title>
            <link rel='stylesheet' href='./styles/login.css' type='text/css'>
        </head>

        <body>
            <div class="body"></div>
            <div class="grad"></div>
            <div class="header">
                <div>LABDENT<span>Lopez</span></div>
            </div>
            <div class="login">
                <h2 class="login-header">INGRESE SU CUENTA</h2>
                <form name="formAutenticarUsuario" method="POST" action="./securityModule/getUsuario.php">
                    <p><input type="text" name="txtLogin" placeholder="Usuario"></p>
                    <p><input type="password" name="txtPassword" placeholder="Password"></p>
                    <p><input name="btnLogin" type="submit" value="Ingresar" /></p>
                </form>
            </div>
        </body>
    </html>

    <?php
    }
}
?>

