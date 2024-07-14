<?php
include_once('conectarBaseDatos.php');

class modeloProducto extends conectarBaseDatos
{
    public function buscarProducto($txtProducto)
    {
        $query = "SELECT *
                  FROM producto
                  WHERE nombre='$txtProducto'";
        $mysqli = $this->conecta();
        $resultadoP = $mysqli->query($query);

        if ($resultadoP->num_rows > 0) {
            $datos = $resultadoP->fetch_all(MYSQLI_ASSOC);
            $this->desconecta($mysqli);
            return $datos;
        } else {
            $this->desconecta($mysqli);
            return [];
        }

    }





    public function updateEstado($serie,$id){
        $query = "UPDATE boletas 
                  SET estado = 0
                  WHERE idBoleta = '$id' AND
                        serie = '$serie'";
        $mysqli = $this->conecta();
        $return = $mysqli->query($query);
        $this->desconecta($mysqli);
        return true;
    }
}

if (isset($_POST['btnSi'])) {
        $serie=$_POST['serie'];
        $id=$_POST['idBoleta'];
        include_once('modeloBoleta.php');
        $obBole = new modeloBoleta();
        $obBole -> updateEstado($serie,$id);
        if($obBole){?>
            <form name="formy" method="POST" action="">
            <?php include_once('../shared/windowMensajeSistema.php');
            $objMensaje = new windowMensajeSistema();
            $objMensaje -> mostrarMensaje("Boleta anulada <br>","<a href='../index.php'>ir al inicio</a>");?>
            <div align="center">
                <input type="submit" value = "ok" name = "btnOk" formaction="../postVentaModule/indexAnularBoleta.php">
            </div>
        </form><?php
        }
    }
?>