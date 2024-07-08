<?php
    include_once("conectarBaseDatos.php");
    class modeloProforma extends conectarBaseDatos{
        public function insertarDatosProforma($codProforma, $fecha, $total, $descuento, $iva, $totalPagar){
            $conexion = $this->conecta();
            $sql = "INSERT INTO proforma (codProforma, fecha, total, descuento, iva, totalPagar) VALUES ('$codProforma', '$fecha', '$total', '$descuento', '$iva', '$totalPagar')";
            mysqli_query($conexion, $sql);
            $idProforma = mysqli_insert_id($conexion);
            $this->desconecta($conexion);
            return $idProforma;
        }
        public function buscarProforma($codProforma){
            $query = "SELECT PF.codProforma, PF.fecha, PF.iva, PF.totalPagar, PF.total
                      FROM proforma PF
                      WHERE PF.CodProforma='$codProforma' ";
            $mysqli = $this->conecta();
            $resultadoP = $mysqli->query($query);
            $this->desconecta($mysqli);
            if ($resultadoP->num_rows > 0) {
                $datos = $resultadoP->fetch_all(MYSQLI_ASSOC);
            return $datos;
            } else {
            return [];
            }
        }
        public function codProforma(){
            $query="SELECT max(codProforma)
                    FROM proforma";
          $mysqli=$this->conecta();
          $resultadoB = $mysqli->query($query);
          $this->desconecta($mysqli);
          $code = $resultadoB->fetch_all(MYSQLI_ASSOC);
          return $code;
          
        }
        public function listarProforma($cod)
        {
            $query = "SELECT *
                        FROM proforma
                        WHERE idProforma='$cod'";
    
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
