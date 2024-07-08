<?php
class formAutenticarUsuario
{
    public function formAutenticarUsuarioShow()
    {
        ?>
        <html>

        <head>
            <title>Autenticacion de usuario</title>
            <link href="./styles/login.css" rel="stylesheet" type="text/css">
        </head>

        <body>
            <div class="login">
                <div class="login-triangle"></div>
                <h2 class="login-header">INGRESE SU CUENTA</h2>
                <form name="formAutenticarUsuario" method="POST" action="./securityModule/getUsuario.php">
                    <p><input type="text" name="txtLogin" placeholder="Usuario"></p>
                    <p><input type="password" name="txtPassword" placeholder="Password"></p>
                    <p><input name="btnLogin" type="submit" value="Ingresar" /></p>
                </form>
                <img class="logotipo"></img>
            </div>
        </body>

        </html>
        <?php
    }
}
