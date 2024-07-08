<?php
include_once('conectarBaseDatos.php');

class modeloConsultaComprobante extends conectarBaseDatos
{
    public function verificarComprobante($codigo)
    {
        $query = "SELECT *
                  FROM boletas
                  WHERE idBoleta = '$codigo' or idFactura='$codigo'";

        $mysqli = $this->conecta();
        $resultadoB = $mysqli->query($query);

        if ($resultadoB && $resultadoB->num_rows == 1) {
            $datos = $resultadoB->fetch_all(MYSQLI_ASSOC);
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
            $objMensaje -> windowMensajeSistemaShow("Boleta anulada <br>","<a href='../index.php'>ir al inicio</a>");?>
            <div align="center">
                <input type="submit" value = "ok" name = "btnOk" formaction="../postVentaModule/indexAnularBoleta.php">
            </div>
        </form><?php
        }
    }
?>