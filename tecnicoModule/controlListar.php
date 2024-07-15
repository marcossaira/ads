<?php
include_once('../model/modeloEquipo.php');
include_once('../shared/WindowMensajeSistema.php');
include_once('../tecnicoModule/formFichaTecnica.php');
include_once('../tecnicoModule/formMantenimiento.php');
include_once('../tecnicoModule/formReparacion.php');
include_once('../model/modeloHistorial.php');

class controlListar
{
    public function EquipoSeleccionado($idEq)
    {
        $objEquipo = new modeloEquipo();
        $equipos = $objEquipo->seleccionEquipo($idEq);

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $_SESSION['idEq'] = $idEq;


        if (!empty($equipos)) {
            $objHistorial = new modeloHistorial();
            $fhistoria = $objHistorial->historialEquipo($idEq);
          
            $objFormFichaTecnica = new formFichaTecnica();
            $objFormFichaTecnica->formFichaTecnicaShow($equipos, $fhistoria);
        } else {
            $objMensaje = new WindowMensajeSistema();
            $objMensaje->mostrarMensaje("El equipo no ha sido encontrado");
        }
    }

    public function equipoMant($idEq)
    {
        $objEquipo = new modeloEquipo();
        $equipo = $objEquipo->seleccionEquipo($idEq);

        if (!empty($equipo)) {
            $objFormMantenimiento = new formMantenimiento();
            $objFormMantenimiento->formMantenimientoShow($equipo);
        } else {
            $objMensaje = new WindowMensajeSistema();
            $objMensaje->mostrarMensaje("El equipo no ha sido encontrado");
        }
    }

    public function equipoRep($idEq)
    {
        $objEquipo = new modeloEquipo();
        $equipo = $objEquipo->seleccionEquipo($idEq);

        if (!empty($equipo)) {
            $objFormReparacion = new formReparacion();
            $objFormReparacion->formReparacionShow($equipo);
        } else {
            $objMensaje = new WindowMensajeSistema();
            $objMensaje->mostrarMensaje("El equipo no ha sido encontrado");
        }
    }

    public function insertarMantenimientoEquipo($desc, $fecha, $idEq)
    {
        $objHistorial = new modeloHistorial();
        $objHistorial->insertarM($desc, $fecha, $idEq);

        $objMensaje = new WindowMensajeSistema();
        $objMensaje->mostrarMensaje("El mantenimiento ha sido registrado",'exito');
    }

    public function insertarRepEquipo($desc, $fecha, $idEq)
    {
        $objHistorial = new modeloHistorial();
        $objHistorial->insertarR($desc, $fecha, $idEq);

        $objMensaje = new WindowMensajeSistema();
        $objMensaje->mostrarMensaje("La reparación ha sido registrada",'exito');
    }
}
?>
