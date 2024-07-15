<?php
if (isset($_GET['login'])) {
    $login = $_GET['login'];
    
    // Puedes almacenar el login en la sesión si aún no está establecido
    if (!isset($_SESSION['login'])) {
        $_SESSION['login'] = $login;
    }

    include_once('controlAutenticarUsuario.php');
        $obControl = new controlAutenticarUsuario();
        $obControl -> mostrarBienvenidaConPrivilegios($login);
} else {
    // Manejar caso en el que no se ha proporcionado un login válido
    echo "No se ha especificado un login válido.";
}
?>