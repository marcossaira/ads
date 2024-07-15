<?php
session_start(); // Iniciar la sesión si no está iniciada

// Limpiar todas las variables de sesión
$_SESSION = array();

// Destruir la sesión
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}
session_destroy();

// Redirigir a la página de inicio o a donde quieras después de cerrar sesión
header("Location: ../index.php");
exit();
?>
