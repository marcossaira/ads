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
        </head>
        <body>
        <form name="formMensaje">
            <table border='0' align="center">
                <tr>
                    <p align="center"> <strong> <?php echo strtoupper($mensaje); ?></strong></p>
                </tr>
                <tr>
                    <?php if ($enlace) : ?>
                        <p align="center"> <?php echo $enlace; ?> </p>
                    <?php endif; ?>
                </tr>
            </table>
            
            <div class="button-container">
                    <button type="button" onclick="window.history.back();">Regresar</button>
                    <button type="button" onclick="window.location.href='../index.php';">Inicio</button>
            </div>
        </form>
        </body>
        </html>
        <?php
    }
}
?>
