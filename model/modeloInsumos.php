<?php
include_once('conectarBaseDatos.php');

class modeloInsumos extends conectarBaseDatos
{
    public function listarInsumos()
    {
        $query = "SELECT *
                  FROM insumos";
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

    public function NuevoInsumos($codigo, $nombre, $descripción, $cantidadInsumo, $cantidadRecomendada, $proveedor, $contacto)
    {
        $resta = $cantidadRecomendada - $cantidadInsumo;

        if($resta == 0){
            $estado = 'Optimo';
        } else {
            $estado = 'Faltante';
        }

        $query = "INSERT INTO insumos (idInsumos, nombreInsumo, descripcion, cantidadInsumo, cantidadRecomendada, estado, proveedor, contacto)
        VALUES('$codigo','$nombre','$descripción','$cantidadInsumo','$cantidadRecomendada','$estado','$proveedor','$contacto')";
        $mysqli = $this->conecta();
        $return = $mysqli->query($query);
        $this->desconecta($mysqli);
        return true;
    }

    public function Faltantes()
{
    $estado = "faltante";

    $query = "SELECT * FROM insumos WHERE estado = '$estado'";
    $mysqli = $this->conecta();
    $result = $mysqli->query($query);
    $this->desconecta($mysqli);

    if ($result) {
        return $result->fetch_all(MYSQLI_ASSOC);
    } else {
        return false;
    }
}


    public function MermaInsumos($codigo, $cantidadInsumo)
{
    $query = "SELECT cantidadInsumo, cantidadRecomendada FROM insumos WHERE idInsumos = '$codigo'";
    $mysqli = $this->conecta();
    $result = $mysqli->query($query);
    $row = $result->fetch_assoc();
    $cantidadActual = $row['cantidadInsumo'];
    $cantidadRecomendada = $row['cantidadRecomendada'];

    $nuevaCantidad = $cantidadActual - $cantidadInsumo;

    $estado = ($nuevaCantidad == 0) ? 'Optimo' : 'Faltante';

    $updateQuery = "UPDATE insumos SET cantidadInsumo = '$nuevaCantidad', estado = '$estado' WHERE idInsumos = '$codigo'";
    $updateResult = $mysqli->query($updateQuery);

    $this->desconecta($mysqli);

    return true;
}

public function AgregarInsumos($codigo, $cantidadInsumo)
{
    $query = "SELECT cantidadInsumo, cantidadRecomendada FROM insumos WHERE idInsumos = '$codigo'";
    $mysqli = $this->conecta();
    $result = $mysqli->query($query);
    $row = $result->fetch_assoc();
    $cantidadNueva = $row['cantidadInsumo'];

    $nuevaCantidad = $cantidadInsumo + $cantidadNueva;

    $estado = ($nuevaCantidad == 0) ? 'Optimo' : 'Faltante';

    $updateQuery = "UPDATE insumos SET cantidadInsumo = '$nuevaCantidad', estado = '$estado' WHERE idInsumos = '$codigo'";
    $updateResult = $mysqli->query($updateQuery);

    $this->desconecta($mysqli);

    return true;
}

    

    }

?>