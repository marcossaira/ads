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
    public function imprimirBoleta($idBoleta){
        $query2="SELECT P.nombre, DP.cantidad, P.precio, DP.subtotal, DP.idDetalleProforma
                 FROM proforma PF, detalleproforma DP, producto P, boleta B, detalleboleta DB
                 WHERE  B.idBoleta='$idBoleta' and B.idBoleta=DB.idBoleta and DB.idDetalleProforma=DP.idDetalleProforma and PF.idProforma=DP.idProforma and DP.idProducto=P.idProducto";
        $mysqli = $this->conecta();
        $resultadoB= $mysqli->query($query2);
        $this->desconecta($mysqli);
        if ($resultadoB->num_rows > 0) {
            $detalle=$resultadoB->fetch_all(MYSQLI_ASSOC);
        return $detalle;
        } else {
        return [];
        }
    }
    




}


?>