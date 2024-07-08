<?php
include_once('conectarBaseDatos.php');

class modeloFactura extends conectarBaseDatos
{

    public function updateEstado($cod){
        $query = "UPDATE factura 
                  SET estado = 0
                  WHERE codFactura = '$cod'";
        $mysqli = $this->conecta();
        $return = $mysqli->query($query);
        $this->desconecta($mysqli);
        return true;
    }
    public function crearFactura($codFactura,$fecha,$nombreC,$total,$iva,$totalPagar,$fechaEntrega){
        $query="INSERT INTO factura (codFactura, fecha, rucCliente,total,descuento,iva,totalPagar,FechaEntrega,estado) 
        VALUES ('$codFactura', '$fecha', '$nombreC','$total','0','$iva','$totalPagar','$fechaEntrega','1')";
        $mysqli=$this->conecta();
        mysqli_query($mysqli, $query);
        $idFactura = mysqli_insert_id($mysqli);
        $this->desconecta($mysqli);
        return $idFactura;
        
    }
    public function codFactura(){
        $query="SELECT max(codFactura)
                FROM factura";
      $mysqli=$this->conecta();
      $resultadoB = $mysqli->query($query);
      $this->desconecta($mysqli);
      $code = $resultadoB->fetch_all(MYSQLI_ASSOC);
      return $code;
    }
    public function repFecha($cod,$fechaE){
        $query = "UPDATE factura
                  SET FechaEntrega='$fechaE'
                  WHERE codFactura = '$cod'";
        $mysqli = $this->conecta();
        $return = $mysqli->query($query);
        $this->desconecta($mysqli);
        return true;
    }
    public function entregaF($cod){
        $query = "UPDATE factura 
                  SET estado='2'
                  WHERE codFactura = '$cod'";
        $mysqli = $this->conecta();
        $return = $mysqli->query($query);
        $this->desconecta($mysqli);
        return true;
    }

    public function montoFactura($cod)
    {
        $query = "SELECT totalPagar, idFactura
                    FROM factura
                    WHERE codFactura='$cod'";

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
    public function listarFactura($cod)
    {
        $query = "SELECT *
                    FROM factura
                    WHERE idFactura='$cod'";

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
    public function listarFacturaC($cod)
    {
        $query = "SELECT *
                    FROM factura
                    WHERE codFactura='$cod'";

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