<?php
include_once('conectarBaseDatos.php');

class modeloHistorial extends conectarBaseDatos
{

    public function historialEquipo($idEquipo)
    {
        $query= "SELECT H.descripcion, H.tipo, H.fecha
                  FROM historial H, equipos E
                  WHERE H.idEquipo=E.idEquipo and E.idEquipo='$idEquipo' ";
        $mysqli = $this->conecta();
        $resultadoH = $mysqli->query($query);
        $this->desconecta($mysqli);

        if ($resultadoH->num_rows > 0) {
            $historial = $resultadoH->fetch_all(MYSQLI_ASSOC);
            return $historial;  
        } else {
            return [];
        }
    }

    public function insertarM($descrip,$fecham,$idEq)
    {
        $query = "INSERT INTO historial (descripcion,fecha,tipo,idEquipo)
                  VALUES ('$descrip','$fecham','mantenimiento','$idEq')";
        $mysqli = $this->conecta();
        $mysqli->query($query);
        $this->desconecta($mysqli);
        return true;
    }

    public function insertarR($descrip,$fechar,$idEq)
    {
        $query = "INSERT INTO historial (descripcion,fecha,tipo,idEquipo)
                  VALUES ('$descrip','$fechar','reparación','$idEq')";
        $mysqli = $this->conecta();
        $mysqli->query($query);
        $this->desconecta($mysqli);
        return true;
    }

}
