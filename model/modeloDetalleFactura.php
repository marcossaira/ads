<?php
include_once('conectarBaseDatos.php');

class modeloDetalleFactura extends conectarBaseDatos
{
    public function buscarFactura($txtoNum)
    {
        $query = "SELECT P.nombre, DP.cantidad
                    FROM factura F, detallefactura DF, detalleproforma DP ,producto P
                    WHERE F.codFactura = '$txtoNum' and F.idFactura=DF.idFactura and DF.idDetalleProforma=DP.idDetalleProforma and DP.idProducto=P.idProducto and F.estado = 1";

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

    public function insertarDetalleFactura($idFactura,$idDetalleProforma){
        $query="INSERT INTO detallefactura (idFactura,idDetalleProforma) 
        VALUES ('$idFactura','$idDetalleProforma')";
        $mysqli = $this->conecta();
        $mysqli->query($query);
        $this->desconecta($mysqli);

    }




}


?>