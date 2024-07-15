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
?>