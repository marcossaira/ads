<?php
require_once('commandControlInsumos.php');
require_once('../model/ModeloInsumos.php');

class NuevoInsumosCommand implements Command {
    private $codigo;
    private $nombre;
    private $descripcion;
    private $cantidadInsumo;
    private $cantidadRecomendada;
    private $proveedor;
    private $contacto;

    public function __construct($codigo, $nombre, $descripcion, $cantidadInsumo, $cantidadRecomendada, $proveedor, $contacto) {
        $this->codigo = $codigo;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->cantidadInsumo = $cantidadInsumo;
        $this->cantidadRecomendada = $cantidadRecomendada;
        $this->proveedor = $proveedor;
        $this->contacto = $contacto;
    }

    public function execute() {
        $modeloInsumos = new modeloInsumos();
        return $modeloInsumos->NuevoInsumos($this->codigo, $this->nombre, $this->descripcion, $this->cantidadInsumo, $this->cantidadRecomendada, $this->proveedor, $this->contacto);
    }
}
?>