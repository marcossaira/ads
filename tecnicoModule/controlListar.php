<?php
class controlListar
{
    public function EquipoSeleccionado($idEq)
    {
        include_once('../model/modeloEquipo.php');
        $objEquipo = new modeloEquipo();
        $equipos = $objEquipo -> seleccionEquipo($idEq);
       if(!empty($equipos))
       {
        include_once('../tecnicoModule/formFichaTecnica.php');
        include_once('../model/modeloHistorial.php');
        $objHistorial = new modeloHistorial();
        $fhistoria  =$objHistorial ->historialEquipo($idEq);
        $objFormFichaTecnica= new formFichaTecnica();
        $objFormFichaTecnica->formFichaTecnicaShow($equipos,$fhistoria);
       }
       else
       {
        include_once('../shared/windowMensajeSistema.php');
        $objMensaje = new windowMensajeSistema();
        $objMensaje -> windowMensajeSistemaShow("El equipo no ha sido encontrado");

       }
    }
    public function equipoMant($idEq)
    {
        include_once('../model/modeloEquipo.php');
        $objEquipo = new modeloEquipo();
        $equipo = $objEquipo -> seleccionEquipo($idEq);
        
       if(!empty($equipo))
       {
        include_once('../tecnicoModule/formMantenimiento.php');
        $objFormMantenimiento= new formMantenimiento();
        $objFormMantenimiento->formMantenimientoShow($equipo);
       }
       else
       {
        include_once('../shared/windowMensajeSistema.php');
        $objMensaje = new windowMensajeSistema();
        $objMensaje -> windowMensajeSistemaShow("El equipo no ha sido encontrado");

       }
    }
    public function equipoRep($idEq)
    {
        include_once('../model/modeloEquipo.php');
        $objEquipo = new modeloEquipo();
        $equipo = $objEquipo -> seleccionEquipo($idEq);
       if(!empty($equipo))
       {
        include_once('../tecnicoModule/formReparacion.php');
        $objFormReparacion= new formReparacion();
        $objFormReparacion->formReparacionShow($equipo);
       }
       else
       {
        include_once('../shared/windowMensajeSistema.php');
        $objMensaje = new windowMensajeSistema();
        $objMensaje -> windowMensajeSistemaShow("El equipo no ha sido encontrado");
       }
    }

    public function insertarMantenimientoEquipo($desc,$fecha,$idEq)
    {
        include_once('../model/modeloHistorial.php');
        $objHistorial = new modeloHistorial();
        $objHistorial -> insertarM($desc,$fecha,$idEq);
        include_once('../shared/windowMensajeSistema.php');
        $objMensaje = new windowMensajeSistema();
        $objMensaje->windowMensajeSistemaShow("El mantenimiento ha sido registrado");
        }
    public function insertarRepEquipo($desc,$fecha,$idEq)
        {
            include_once('../model/modeloHistorial.php');
            $objHistorial = new modeloHistorial();
            $objHistorial-> insertarR($desc,$fecha,$idEq);
            include_once('../shared/windowMensajeSistema.php');
            $objMensaje = new windowMensajeSistema();
            $objMensaje->windowMensajeSistemaShow("La reparación ha sido registrada");
            }     
}

?>