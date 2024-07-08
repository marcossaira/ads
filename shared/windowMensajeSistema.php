<?php
include_once('../shared/ventanaSistema.php');

class WindowMensajeSistema implements VentanaSistema {
    public function mostrarMensaje($mensaje, $enlace = null)
    {
        ?>
        <html>
        <head>
            <title>Mensaje del sistema</title>
        </head>
        <body>
            <p align="center"> <strong> <?php echo strtoupper($mensaje); ?></strong></p>
            <?php if ($enlace) : ?>
                <p align="center"> <?php echo $enlace; ?> </p>
            <?php endif; ?>
        </body>
        </html>
        <?php
    }
}
?>
