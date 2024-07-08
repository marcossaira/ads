<?php
    class controlEmitirProforma{
        public function increment_code($code)
        {
            $code_number = intval(substr($code, 6));
            $code_number++;
            $new_code = substr($code, 0, 6) . strval($code_number);
            return $new_code;
        }
        public function insertarDatosProforma($total,$listaProductosProforma){
            include_once('../model/modeloProforma.php');
            $objModeloProforma = new modeloProforma();
            $codP=$objModeloProforma->codProforma();
            foreach ($codP as $c) {
                $codProforma = $c['max(codProforma)'];
            }
            $control = new controlEmitirProforma();
            $next_proforma_number = $control->increment_code($codProforma);
            $codProforma = $next_proforma_number;
            $fecha = date("Y-m-d");
            $descuento = 0;
            $iva = $total*18/100;
            $totalPagar = $total+$iva;
            $idProforma = $objModeloProforma->insertarDatosProforma($codProforma, $fecha, $total, $descuento, $iva, $totalPagar);

            foreach($listaProductosProforma as $producto){
                $idProducto= $producto['idProducto'];
                $nomProducto= $producto['nombreProducto'];
                $precioUnitario= $producto['precioProducto'];
                $cantidad= $producto['cantidadProducto'];
                $precioTotal = $precioUnitario*$cantidad;
                include_once('../model/modeloDetalleProforma.php');
                $objModeloDetalleProforma = new modeloDetalleProforma();
                $objModeloDetalleProforma->insertarDetalleProforma($idProforma, $idProducto, $cantidad, $precioTotal);
            }
            
            include_once('../salesModule/formImprimirProforma.php');
            include_once('../model/modeloDetalleProforma.php');
            $objForm= new formImprimirProforma();
            $objDetalleProforma = new modeloDetalleProforma();
            $detalleproforma = $objDetalleProforma->buscarProformaId($idProforma);
            $datosProforma=$objModeloProforma->listarProforma($idProforma);
            $objForm->formImprimirProformaShow($datosProforma,$detalleproforma);
        }
    }
    ?>
