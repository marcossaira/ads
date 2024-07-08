<?php
include_once('conectarBaseDatos.php');

class modeloTicketReembolso extends conectarBaseDatos

{
    public function generarTicket($codTicket,$Fecha,$idTipo,$idBF)
    {
        $query = "INSERT INTO ticketdereembolso (codTicket,Fecha,idTipo,idBF,estado)
                  VALUES ('$codTicket','$Fecha','$idTipo','$idBF','activo')";
        $mysqli=$this->conecta();
        mysqli_query($mysqli, $query);
        $idBol = mysqli_insert_id($mysqli);
        $this->desconecta($mysqli);
        return $idBol;
    }



    public function validarTicket($txtCodigo)
    {
        $query = "SELECT *
                  FROM ticketdereembolso
                  WHERE codTicket='$txtCodigo' and estado='activo'";
        $mysqli = $this->conecta();
        $resultadoC = $mysqli->query($query);

        if ($resultadoC->num_rows > 0) {
            $datos = $resultadoC->fetch_all(MYSQLI_ASSOC);
            $this->desconecta($mysqli);
            return $datos;
        } else {
            $this->desconecta($mysqli);
            return [];
        }
    }
    public function validarTicketR($txtCodigo)
    {
        $query = "SELECT *
                  FROM ticketdereembolso TR
                  WHERE TR.codTicket='$txtCodigo' and TR.estado='activo'";
        $mysqli = $this->conecta();
        $resultadoC = $mysqli->query($query);
        $this->desconecta($mysqli);
        if ($resultadoC->num_rows > 0) {
            $datos = $resultadoC->fetch_all(MYSQLI_ASSOC);
            return $datos;
        } else {
            return [];
        }
    }
    public function validarTicketB($txtCodigo)
    {
        $query = "SELECT TR.codTicket, TR.estado, B.Fecha, B.totalPagar
                  FROM ticketdereembolso TR, boleta B
                  WHERE TR.codTicket='$txtCodigo' and TR.estado='activo' and TR.idBoleta=B.idBoleta";
        $mysqli = $this->conecta();
        $resultadoC = $mysqli->query($query);

        if ($resultadoC->num_rows > 0) {
            $datos = $resultadoC->fetch_all(MYSQLI_ASSOC);
            $this->desconecta($mysqli);
            return $datos;
        } else {
            $this->desconecta($mysqli);
            return [];
        }
    }

    public function validarTicketF($txtCodigo)
    {
        $query = "SELECT TR.codTicket, TR.estado, F.Fecha, F.totalPagar
                  FROM ticketdereembolso TR, factura F
                  WHERE TR.codTicket='$txtCodigo' and TR.estado='activo' and TR.idFactura=F.idFactura";
        $mysqli = $this->conecta();
        $resultadoC = $mysqli->query($query);

        if ($resultadoC->num_rows > 0) {
            $datos = $resultadoC->fetch_all(MYSQLI_ASSOC);
            $this->desconecta($mysqli);
            return $datos;
        } else {
            $this->desconecta($mysqli);
            return [];
        }
    }

    public function actualizarTicketEntregado($txtCodigo)
    {
        $query = "UPDATE ticketdereembolso
                  SET estado='entregado'
                  WHERE codTicket='$txtCodigo'";

        $query2= "SELECT *
                  FROM ticketdereembolso
                  WHERE codTicket='$txtCodigo' and estado='entregado'";
        $mysqli = $this->conecta();
        $mysqli->query($query);
        $this->desconecta($mysqli);
        $mysqli2 = $this->conecta();
        $resultadoC = $mysqli2->query($query2);

        if ($resultadoC->num_rows==1) {
            $this->desconecta($mysqli2);
            return 1;
        } else {
            $this->desconecta($mysqli2);
            return 0;
        }
    }

    public function actualizarTicketAnulado($txtCodigo)
    {
        $query = "UPDATE ticketdereembolso
                  SET estado='anulado'
                  WHERE codTicket='$txtCodigo'";

        $query2= "SELECT *
                  FROM ticketdereembolso
                  WHERE codTicket='$txtCodigo' and estado='anulado'";
        $mysqli = $this->conecta();
        $mysqli->query($query);
        $this->desconecta($mysqli);
        $mysqli2 = $this->conecta();
        $resultadoC = $mysqli2->query($query2);

        if ($resultadoC->num_rows==1) {
            $this->desconecta($mysqli2);
            return 1;
        } else {
            $this->desconecta($mysqli2);
            return 0;
        }
    }

    public function codTicket(){
        $query="SELECT max(codTicket)
                FROM ticketdereembolso";
      $mysqli=$this->conecta();
      $resultadoB = $mysqli->query($query);
      $this->desconecta($mysqli);
      $code = $resultadoB->fetch_all(MYSQLI_ASSOC);
      return $code;
      
    }



}