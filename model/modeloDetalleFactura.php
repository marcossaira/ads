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
    public function imprimirFactura($idFactura){
        $query2="SELECT P.nombre, DP.cantidad, P.precio, DP.subtotal, DP.idDetalleProforma 
                 FROM proforma PF, detalleproforma DP, producto P, factura F, detallefactura DF 
                 WHERE F.idFactura='$idFactura' and F.idFactura=DF.idFactura and DF.idDetalleProforma=DP.idDetalleProforma and PF.idProforma=DP.idProforma and DP.idProducto=P.idProducto";
        $mysqli = $this->conecta();
        $resultadoF= $mysqli->query($query2);
        $this->desconecta($mysqli);
        if ($resultadoF->num_rows > 0) {
            $detalle=$resultadoF->fetch_all(MYSQLI_ASSOC);
        return $detalle;
        } else {
        return [];
        }
    }



}


?>