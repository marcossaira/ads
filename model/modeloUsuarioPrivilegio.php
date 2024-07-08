<?php
include_once('conectarBaseDatos.php');

class modeloUsuarioPrivilegio extends conectarBaseDatos
{
    public function obtenerPrivilegios($login)
    {
        $query = "SELECT P.pathPriv,P.labelPriv,P.buttonPriv,P.iconPriv
        FROM privilegios P, usuarioprivilegios UP, usuario U
        WHERE  U.login='$login'AND U.idUsuario=UP.idUsuario AND P.idPriv=UP.idPriv";

        $mysqli = $this->conecta();
        $resultado = $mysqli->query($query);

        if ($resultado && $resultado->num_rows > 0) {
            $privilegios = $resultado->fetch_all(MYSQLI_ASSOC);
            $this->desconecta($mysqli);
            return $privilegios;
        } else {
            $this->desconecta($mysqli);
            return [];
        }
    }
}
?>
