<?php
include_once('conectarBaseDatos.php');

class modeloDetalleBoleta extends conectarBaseDatos
{
    public function buscarBoleta($txtoNum)
    {
        $query = "SELECT P.nombre, DP.cantidad
                    FROM boleta B, detalleboleta DB, detalleproforma DP ,producto P
                    WHERE B.codBoleta = '$txtoNum' and B.idBoleta=DB.idBoleta and DB.idDetalleProforma=DP.idDetalleProforma and DP.idProducto=P.idProducto and B.estado = 1";

        $mysqli = $this->conecta();
        $productos = $mysqli->query($query);
        $this->desconecta($mysqli);

        if ($productos->num_rows>= 1) {
            $datos = $productos->fetch_all(MYSQLI_ASSOC);
            return $datos;
        } else {
            return [];
        }
    }
    public function updateEstado($cod){
        $query = "UPDATE boleta 
                  SET estado = 0
                  WHERE codBoleta = '$cod'";
        $mysqli = $this->conecta();
        $return = $mysqli->query($query);
        $this->desconecta($mysqli);
        return true;
    }

    public function insertarDetalleBoleta($idBoleta,$idDetalleProforma){
        $query="INSERT INTO detalleboleta (idBoleta,idDetalleProforma) 
        VALUES ('$idBoleta','$idDetalleProforma')";
        $mysqli = $this->conecta();
        $mysqli->query($query);
        $this->desconecta($mysqli);

    }




}


?>