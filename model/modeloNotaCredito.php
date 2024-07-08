<?php
include_once('conectarBaseDatos.php');

class modeloNotaCredito extends conectarBaseDatos
{
    public function insertarNotaCredito($id,$cod,$motivo,$fechaEmisionNota)
    {  
        $query = "INSERT INTO notadecredito
                    (idTipo,idBF,motivo,fecha) 
                    VALUES 
                    ('$id','$cod','$motivo','$fechaEmisionNota')";
        $mysqli = $this->conecta();
        $resultadoN = $mysqli->query($query);
        $this->desconecta($mysqli);
        return true;
        }
    }
?>