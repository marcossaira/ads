<?php
include_once('../shared/ventanaSistema.php');

class WindowMensajeSistema implements VentanaSistema {
    public function mostrarMensaje($mensaje, $enlace = null)
    {
        ?>
        <html>
        <head>
            <title>Mensaje del sistema</title>
            <link href="../styles/forms.css" rel="stylesheet" type="text/css">
            <link href="../styles/alert.css" rel="stylesheet" type="text/css"> <!-- Archivo CSS para la alerta -->
        </head>
        <body>
            <div class="body">
                <div class="alert-container">
                    <div class="alert-box">
                        <table border='0' align="center">
                            <tr>
                                <p align="center"> <strong> <?php echo strtoupper($mensaje); ?></strong></p>
                            </tr>
                        </table>
                        
                        <div class="button-container">
                            <button type="button" onclick="window.history.back();">Regresar</button>
                            <button type="button" onclick="window.location.href='../index.php';">Inicio</button>
                        </div>
                    </div>
                </div>
            </div>
        </body>
        </html>
        <?php
    }
}
?>
