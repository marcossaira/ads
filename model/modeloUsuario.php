<?php
include_once('conectarBaseDatos.php');

class modeloUsuario extends conectarBaseDatos
{
    public function verificarUsuario($login, $password)
    {
        $password = md5($password); // cajero password:cajero123

        $query = "SELECT login 
                  FROM usuario
                  WHERE login = '$login' AND 
                        password = '$password' AND 
                        estado = 1";

        $mysqli = $this->conecta();
        $resultado = $mysqli->query($query);

        if ($resultado->num_rows == 1) {
            $this->desconecta($mysqli);
            return 1;
        } else {
            $this->desconecta($mysqli);
            return 0;
        }
    }
}
?>
