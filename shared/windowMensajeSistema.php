<?php
include_once('../shared/ventanaSistema.php');

class WindowMensajeSistema implements VentanaSistema
{
    public function mostrarMensaje($mensaje, $tipo = 'alerta')
    {
?>
        <html>

        <head>
            <title>Mensaje del sistema</title>
            <link href="../styles/forms.css" rel="stylesheet" type="text/css">
            <link href="../styles/alert.css" rel="stylesheet" type="text/css"> <!-- Archivo CSS para la alerta -->
            <script src="../js/redireccionamientos.js"></script>
        </head>

        <body>
            <div class="body">
                <div class="alert-container">
                    <div class="alert-box <?php echo $tipo === 'exito' ? 'success' : 'error'; ?>"> <!-- Clase CSS dinámica según el tipo de mensaje -->
                        <table border='0' align="center">
                            <tr>
                                <p align="center"> <strong> <?php echo strtoupper($mensaje); ?></strong></p>
                            </tr>
                        </table>
                        <div class="button-container">
                            <button type="button" onclick="handleRegresar()">Regresar</button>
                            <button type="button" onclick="cerrarSesionYRedirigir()">Inicio</button>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                function handleRegresar() {
                    var login = '<?php echo isset($_SESSION['login']) ? urlencode($_SESSION['login']) : ""; ?>';
                    if (login !== '') {
                        window.location.href = '../securityModule/getRedireccionar.php?login=' + login;
                    } else {
                        window.location.href = '../index.php'; // O cualquier otra acción deseada si no hay sesión
                    }
                }
            </script>
        </body>

        </html>
<?php
    }
}
?>