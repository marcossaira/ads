<?php
include_once('conectarBaseDatos.php');

class modeloBoleta extends conectarBaseDatos
{
    public function updateEstado($cod){
        $query = "UPDATE boleta 
                  SET estado = 0
                  WHERE codBoleta = '$cod'";
        $mysqli = $this->conecta();
        $return = $mysqli->query($query);
        $this->desconecta($mysqli);
        return true;
    }

    public function crearBoleta($codBoleta,$fecha,$nombreC,$total,$iva,$totalPagar,$fechaEntrega){
        $query="INSERT INTO boleta (codBoleta, fecha, nombreCliente,total,descuento,iva,totalPagar,FechaEntrega,estado) 
        VALUES ('$codBoleta', '$fecha', '$nombreC','$total','0','$iva','$totalPagar','$fechaEntrega','1')";
       $mysqli=$this->conecta();
       mysqli_query($mysqli, $query);
       $idBol = mysqli_insert_id($mysqli);
       $this->desconecta($mysqli);
       return $idBol;
        
    }
    public function repFecha($cod,$fechaE){
        $query = "UPDATE boleta 
                  SET FechaEntrega='$fechaE'
                  WHERE codBoleta = '$cod'";
        $mysqli = $this->conecta();
        $return = $mysqli->query($query);
        $this->desconecta($mysqli);
        return true;
    }
    public function entregaB($cod){
        $query = "UPDATE boleta 
                  SET estado='2'
                  WHERE codBoleta = '$cod'";
        $mysqli = $this->conecta();
        $return = $mysqli->query($query);
        $this->desconecta($mysqli);
        return true;
    }
    public function codBoleta(){
        $query="SELECT max(codBoleta)
                FROM boleta";
      $mysqli=$this->conecta();
      $resultadoB = $mysqli->query($query);
      $this->desconecta($mysqli);
      $code = $resultadoB->fetch_all(MYSQLI_ASSOC);
      return $code;
      
    }
    public function montoBoleta($cod)
    {
        $query = "SELECT totalPagar, idBoleta
                    FROM boleta
                    WHERE codBoleta='$cod'";

        $mysqli = $this->conecta();
        $resultadoB = $mysqli->query($query);
        $this->desconecta($mysqli);
        if ($resultadoB->num_rows == 1) {
            $datos = $resultadoB->fetch_all(MYSQLI_ASSOC);
            return $datos;
        } else {
            return [];
        }
    }
    public function listarBoleta($cod)
    {
        $query = "SELECT *
                    FROM boleta
                    WHERE idBoleta='$cod'";

        $mysqli = $this->conecta();
        $resultadoB = $mysqli->query($query);
        $this->desconecta($mysqli);
        if ($resultadoB->num_rows ==1) {
            $datos = $resultadoB->fetch_all(MYSQLI_ASSOC);
            return $datos;
        } else {
            return [];
        }
    }
    
    public function listarBoletaC($cod)
    {
        $query = "SELECT *
                    FROM boleta
                    WHERE codBoleta='$cod'";

        $mysqli = $this->conecta();
        $resultadoB = $mysqli->query($query);
        $this->desconecta($mysqli);
        if ($resultadoB->num_rows ==1) {
            $datos = $resultadoB->fetch_all(MYSQLI_ASSOC);
            return $datos;
        } else {
            return [];
        }
    }

}


?>