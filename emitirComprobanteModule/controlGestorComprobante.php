<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
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
    // Obtener datos necesarios
    include_once('../model/modeloProforma.php');
    include_once('../model/modeloDetalleProforma.php');
    $objProforma = new modeloProforma();
    $proforma = $objProforma->buscarProforma($cod);
    $objDetalleProforma = new modeloDetalleProforma();
    $detalleproforma = $objDetalleProforma->buscarProformaD($cod);

    $control = new controlGestorComprobante(new IncrementarCodigoProforma(), new FechaEntregaSemana());
    foreach ($proforma as $x) {
        $iva = $x['iva'];
        $total = $x['total'];
        $totalPagar = $x['totalPagar'];
    }
    $fechaActual = date("Y-m-d");
    $fechaEntrega = $control->semanaEntrega($fechaActual);

    // Almacenar datos en sesión
    $_SESSION['boleta'] = [
        'codProforma' => $cod,
        'nombreCliente' => $nombreC,
        'total' => $total,
        'iva' => $iva,
        'totalPagar' => $totalPagar,
        'fecha' => $fechaActual,
        'fechaEntrega' => $fechaEntrega,
        'detalle' => $detalleproforma
    ];
    $_SESSION['codProforma']=$cod;

    // Mostrar vista previa de la boleta
    include_once('../emitirComprobanteModule/formConfirmarBoleta.php');
    $objForm = new formConfirmarBoleta();
    $objForm->formConfirmarBoletaShow($_SESSION['boleta']);
}

public function emitirFactura($cod, $nombreC)
{
    // Obtener datos necesarios
    include_once('../model/modeloProforma.php');
    include_once('../model/modeloDetalleProforma.php');
    $objProforma = new modeloProforma();
    $proforma = $objProforma->buscarProforma($cod);
    $objDetalleProforma = new modeloDetalleProforma();
    $detalleproforma = $objDetalleProforma->buscarProformaD($cod);

    $control = new controlGestorComprobante(new IncrementarCodigoProforma(), new FechaEntregaSemana());
    foreach ($proforma as $x) {
        $iva = $x['iva'];
        $total = $x['total'];
        $totalPagar = $x['totalPagar'];
    }
    $fechaActual = date("Y-m-d");
    $fechaEntrega = $control->semanaEntrega($fechaActual);

    // Almacenar datos en sesión
    $_SESSION['factura'] = [
        'codProforma' => $cod,
        'nombreCliente' => $nombreC,
        'total' => $total,
        'iva' => $iva,
        'totalPagar' => $totalPagar,
        'fecha' => $fechaActual,
        'fechaEntrega' => $fechaEntrega,
        'detalle' => $detalleproforma
    ];

    // Mostrar vista previa de la factura
    include_once('../emitirComprobanteModule/formConfirmarFactura.php');
    $objForm = new formConfirmarFactura();
    $objForm->formConfirmarFacturaShow($_SESSION['factura']);
}
public function confirmarBoleta() {
    if (isset($_SESSION['boleta'])) {
        $boleta = $_SESSION['boleta'];
        $idBoleta = $this->crearBoleta($boleta);
        include_once('../model/modeloBoleta.php');
        $objModeloBoleta= new modeloBoleta();
        $datosBoleta=$objModeloBoleta->consultarBoleta($idBoleta);
        include_once('../emitirComprobanteModule/formImprimirBoleta.php');
        include_once('../model/modeloDetalleBoleta.php');
        $objDetalleBoleta = new modeloDetalleBoleta();
        $detalleproforma = $objDetalleBoleta->imprimirBoleta($idBoleta);
        $objFormBoleta=new formImprimirBoleta();
        $objFormBoleta->formImprimirBoletaShow($datosBoleta,$detalleproforma);
        
    }
}

public function confirmarFactura() {
    if (isset($_SESSION['factura'])) {
        $factura = $_SESSION['factura'];
        $idFactura = $this->crearFactura($factura);
        include_once('../model/modeloFactura.php');
        $objModeloFactura= new modeloFactura();
        $datosFactura=$objModeloFactura->consultarFactura($idFactura);
        include_once('../emitirComprobanteModule/formImprimirFactura.php');
        include_once('../model/modeloDetalleFactura.php');
        $objDetalleFactura= new modeloDetalleFactura();
        $detalleFactura=$objDetalleFactura->imprimirFactura($idFactura);
        $objFormFactura=new formImprimirFactura();
        $objFormFactura->formImprimirFacturaShow($datosFactura,$detalleFactura);

    }
}
private function crearBoleta($boleta) {
    include_once('../model/modeloBoleta.php');
    $objBoleta = new modeloBoleta();
    $codB = $objBoleta->codBoleta();
    foreach ($codB as $c) {
        $codBoleta = $c['max(codBoleta)'];
    }
    $next_proforma_number = $this->increment_code($codBoleta);

    $idBoleta = $objBoleta->crearBoleta(
        $next_proforma_number,
        $boleta['fecha'],
        $boleta['nombreCliente'],
        $boleta['total'],
        $boleta['iva'],
        $boleta['totalPagar'],
        $boleta['fechaEntrega']
    );

    include_once('../model/modeloDetalleBoleta.php');
    $objDetalleBoleta = new modeloDetalleBoleta();
    foreach ($boleta['detalle'] as $d) {
        $idDetalle = $d['idDetalleProforma'];
        $objDetalleBoleta->insertarDetalleBoleta($idBoleta, $idDetalle);
    }

    return $idBoleta;
}

private function crearFactura($factura) {
    include_once('../model/modeloFactura.php');
    $objFactura = new modeloFactura();
    $codF = $objFactura->codFactura();
    foreach ($codF as $c) {
        $codFactura = $c['max(codFactura)'];
    }
    $next_proforma_number = $this->increment_code($codFactura);

    $idFactura = $objFactura->crearFactura(
        $next_proforma_number,
        $factura['fecha'],
        $factura['nombreCliente'],
        $factura['total'],
        $factura['iva'],
        $factura['totalPagar'],
        $factura['fechaEntrega']
    );

    include_once('../model/modeloDetalleFactura.php');
    $objDetalleFactura = new modeloDetalleFactura();
    foreach ($factura['detalle'] as $d) {
        $idDetalle = $d['idDetalleProforma'];
        $objDetalleFactura->insertarDetalleFactura($idFactura, $idDetalle);
    }

    return $idFactura;
}
}
?>