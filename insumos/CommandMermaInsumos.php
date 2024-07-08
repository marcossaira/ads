<?php
require_once('commandControlInsumos.php');
require_once('../model/ModeloInsumos.php');

class MermaInsumosCommand implements Command {
    private $codigo;
    private $cantidadInsumo;

    public function __construct($codigo, $cantidadInsumo) {
        $this->codigo = $codigo;
        $this->cantidadInsumo = $cantidadInsumo;
    }

    public function execute() {
        $modeloInsumos = new modeloInsumos();
        return $modeloInsumos->MermaInsumos($this->codigo, $this->cantidadInsumo);
    }
}
?>
