<?php
include_once("conectarBaseDatos.php");
class modeloDetalleProforma extends conectarBaseDatos{
public function insertarDetalleProforma($idProforma, $idProducto, $cantidad,$precioTotal){
    $conexion = $this->conecta();
    $sql = "INSERT INTO detalleproforma (idProforma, idProducto, cantidad, subtotal) VALUES ('$idProforma', '$idProducto', '$cantidad', '$precioTotal')";
    mysqli_query($conexion, $sql);
    $this->desconecta($conexion);
}
    
public function buscarProformaD($codProforma){
    $query2="SELECT P.nombre, DP.cantidad, P.precio, DP.subtotal, DP.idDetalleProforma
              FROM proforma PF, detalleproforma DP, producto P
              WHERE PF.CodProforma='$codProforma' and PF.idProforma=DP.idProforma and DP.idProducto=P.idProducto ";
    $mysqli = $this->conecta();
    $resultadoD= $mysqli->query($query2);
    $this->desconecta($mysqli);
    if ($resultadoD->num_rows > 0) {
        $detalle=$resultadoD->fetch_all(MYSQLI_ASSOC);
    return $detalle;
    } else {
    return [];
    }
}
public function buscarProformaId($codProforma){
    $query2="SELECT P.nombre, DP.cantidad, P.precio, DP.subtotal, DP.idDetalleProforma
              FROM proforma PF, detalleproforma DP, producto P
              WHERE PF.idProforma='$codProforma' and PF.idProforma=DP.idProforma and DP.idProducto=P.idProducto ";
    $mysqli = $this->conecta();
    $resultadoD= $mysqli->query($query2);
    $this->desconecta($mysqli);
    if ($resultadoD->num_rows > 0) {
        $detalle=$resultadoD->fetch_all(MYSQLI_ASSOC);
    return $detalle;
    } else {
    return [];
    }
}

}
?>