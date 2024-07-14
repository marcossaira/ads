<?php

require_once('EstrategiasComprobante.php');

class controlGestorComprobante
{   
    private $codigoStrategy;
    private $fechaStrategy;

    public function __construct(CodigoStrategy $codigoStrategy = null, FechaStrategy $fechaStrategy = null) {
        $this->codigoStrategy = $codigoStrategy ?? new IncrementarCodigoProforma();
        $this->fechaStrategy = $fechaStrategy ?? new FechaEntregaSemana();
    }

    public function semanaEntrega($current_date){
        return $this->fechaStrategy->calcularFechaEntrega($current_date);
    }

    public function increment_code($code) {
        return $this->codigoStrategy->incrementarCodigo($code);
    }

    public function validarDatos($txtoNum)
    {
        include_once('../model/modeloDetalleProforma.php');
        include_once('../model/modeloProforma.php');
        $objProforma = new modeloProforma();
        $objDetalleProforma = new modeloDetalleProforma();
        $proforma = $objProforma->buscarProforma($txtoNum);
        $detalleproforma = $objDetalleProforma->buscarProformaD($txtoNum);

        if (!empty($proforma)) {
            include_once('formProforma.php');
            $objformProforma = new formProforma();
            $objformProforma->formProformaShow($proforma, $detalleproforma);
        } else {
            include_once('../shared/windowMensajeSistema.php');
            $objMensaje = new windowMensajeSistema();
            $objMensaje->mostrarMensaje("La proforma no se ha encontrado", "<a href='../index.php'>ir al inicio</a>");
        }
    }
    public function emitirBoleta($cod, $nombreC)
    {
        include_once('../model/modeloProforma.php');
        include_once('../model/modeloDetalleProforma.php');
        include_once('../model/modeloBoleta.php');
        $objProforma = new modeloProforma();
        $proforma = $objProforma->buscarProforma($cod);
        $objDetalleProforma = new modeloDetalleProforma();
        $detalleproforma = $objDetalleProforma->buscarProformaD($cod);
        $objBoleta = new modeloBoleta();
        $codB = $objBoleta->codBoleta();
        foreach ($codB as $c) {
            $codBoleta = $c['max(codBoleta)'];
        }
        $control = new controlGestorComprobante(new IncrementarCodigoProforma(), new FechaEntregaSemana());
        $next_proforma_number = $control->increment_code($codBoleta);
        foreach ($proforma as $x) {
            $codBoleta = $next_proforma_number;
            $iva = $x['iva'];
            $total = $x['total'];
            $totalPagar = $x['totalPagar'];
        }
        $fechaActual = date("Y-m-d");
        $fechaEntrega=$control->semanaEntrega($fechaActual);
        
        $idBoleta = $objBoleta->crearBoleta($codBoleta, $fechaActual, $nombreC, $total, $iva, $totalPagar,$fechaEntrega);

        foreach ($detalleproforma as $d) {
            $idDetalle = $d['idDetalleProforma'];
            include_once('../model/modeloDetalleBoleta.php');
            $objDetalleBoleta = new modeloDetalleBoleta();
            $objDetalleBoleta->insertarDetalleBoleta($idBoleta, $idDetalle);
        }
        include_once('../emitirComprobanteModule/formImprimirBoleta.php');
        $objForm= new formImprimirBoleta();
        $datosBoleta=$objBoleta->listarBoleta($idBoleta);
        $objForm->formImprimirBoletaShow($datosBoleta,$detalleproforma);

    }

    public function emitirFactura($cod, $nombreC)
    {
        include_once('../model/modeloProforma.php');
        include_once('../model/modeloDetalleProforma.php');
        include_once('../model/modeloFactura.php');
        $objProforma = new modeloProforma();
        $proforma = $objProforma->buscarProforma($cod);
        $objDetalleProforma = new modeloDetalleProforma();
        $detalleproforma = $objDetalleProforma->buscarProformaD($cod);
        $objFactura = new modeloFactura();
        $codF = $objFactura->codFactura();
        foreach ($codF as $c) {
            $codFactura = $c['max(codFactura)'];
        }
        $control = new controlGestorComprobante(new IncrementarCodigoProforma(), new FechaEntregaSemana());
        $next_proforma_number = $control->increment_code($codFactura);
        foreach ($proforma as $x) {
            $codFactura = $next_proforma_number;
            $iva = $x['iva'];
            $total = $x['total'];
            $totalPagar = $x['totalPagar'];
        }
        $fechaActual = date("Y-m-d");
        $fechaEntrega=$control->semanaEntrega($fechaActual);
        include_once('../model/modeloFactura.php');
        $idFactura = $objFactura->crearFactura($codFactura, $fechaActual, $nombreC, $total, $iva, $totalPagar,$fechaEntrega);
        foreach ($detalleproforma as $d) {
            $idDetalle = $d['idDetalleProforma'];
            include_once('../model/modeloDetalleFactura.php');
            $objDetalleBoleta = new modeloDetalleFactura();
            $objDetalleBoleta->insertarDetalleFactura($idFactura, $idDetalle);
        }
        include_once('../emitirComprobanteModule/formImprimirFactura.php');
        $objForm= new formImprimirFactura();
        $datosFactura=$objFactura->listarFactura($idFactura);
        $objForm->formImprimirFacturaShow($datosFactura,$detalleproforma);
        
}
}
?>