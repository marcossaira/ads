<?php
class controlEntregadePedidos
{
    function verTipo($Num){
        if(substr($Num,0,1) == "B"){
            return "B";
        }else{
            return "F";
        }
    }

    public function increment_code($code)
    {
        $code_number = intval(substr($code, 6));
        $code_number++;
        $new_code = substr($code, 0, 6) . strval($code_number);
        return $new_code;
    }
    public function validarDatos($txtoNum)
    {   
        if($this->verTipo($txtoNum) == "B"){
            include_once('../model/modeloDetalleBoleta.php');
            $objDetalleBoleta = new modeloDetalleBoleta();
            $productos = $objDetalleBoleta ->buscarBoleta($txtoNum);
            if(!empty($productos))
            {    
                include_once('formMenuComprobante.php');
                $objformBoletaVenta = new formMenuComprobante();
                $objformBoletaVenta -> formMenuComprobanteShow($productos,$txtoNum);         
            }
            else
            {
                include_once('../shared/windowMensajeSistema.php');
                $objMensaje = new windowMensajeSistema();
                $objMensaje -> mostrarMensaje("La boleta no se ha encontrado, <br> o ya esta anulada","<a href='../index.php'>ir al inicio</a>");
            }
        }

        elseif($this->verTipo($txtoNum) == "F"){

            include_once('../model/modeloDetalleFactura.php');
            $objDetalleFactura = new modeloDetalleFactura();
            $productos = $objDetalleFactura ->buscarFactura($txtoNum);
            if(!empty($productos))
            {    
                include_once('formMenuComprobante.php');
                $objformBoletaVenta = new formMenuComprobante();
                $objformBoletaVenta -> formMenuComprobanteShow($productos,$txtoNum);         
            }
            else
            {
                include_once('../shared/windowMensajeSistema.php');
                $objMensaje = new windowMensajeSistema();
                $objMensaje -> mostrarMensaje("La factura no se ha encontrado, <br> o ya esta anulada","<a href='../index.php'>ir al inicio</a>");
            }
        }

    }
    public function datosTicket($idBtn)
    {   
        if($this->verTipo($idBtn) == "B"){
        include_once('../model/modeloBoleta.php');
        $objBoleta= new modeloBoleta();
        $monto=$objBoleta->montoBoleta($idBtn);
        include_once('../entregarPedidosModule/formTicketdeReembolso.php');
            $formTicket= new formTicketdeReembolso();
            $formTicket->formTicketdeReembolsoShow($monto,$idBtn); 
        } 

        elseif($this->verTipo($idBtn) == "F"){ 
            include_once('../model/modeloFactura.php');
            $objFactura= new modeloFactura();
            $monto=$objFactura->montoFactura($idBtn);
            include_once('../entregarPedidosModule/formTicketdeReembolso.php');
                $formTicket= new formTicketdeReembolso();
                $formTicket->formTicketdeReembolsoShow($monto,$idBtn); 
         }
    }

    public function generarTicket($idBtnm,$fecha,$txtComprobante)
    {   
        if($this->verTipo($txtComprobante) == "B"){
            $txtComprobante='1';   
        }
        elseif($this->verTipo($txtComprobante) == "F"){
            $txtComprobante='2';}

        include_once('../model/modeloTicketReembolso.php');
        $objTicket = new modeloTicketReembolso();
        $codT = $objTicket->codTicket();

            foreach ($codT as $c) {
                $codTicket = $c['max(codTicket)'];
            }
            $control = new controlEntregadePedidos();
            $next_proforma_number = $control->increment_code($codTicket);
            $codigoTicket=$next_proforma_number;
            $objTicket->generarTicket($codigoTicket,$fecha,$txtComprobante,$idBtnm);
        }

    public function reprogramarFecha($codComp,$fecha)
    {   
        if($this->verTipo($codComp) == "B"){
            include_once('../model/modeloBoleta.php');
            $objBoleta = new modeloBoleta();
            $codT = $objBoleta->repFecha($codComp,$fecha);
            echo $codT;
        }

       elseif($this->verTipo($codComp) == "F"){
        include_once('../model/modeloFactura.php');
        $objFactura = new modeloFactura();
        $codT = $objFactura->repFecha($codComp,$fecha);
        echo $codT;
        }
    }
    public function entregaPedido($codComp)
    {   
        if($this->verTipo($codComp) == "B"){
            include_once('../model/modeloBoleta.php');
            $objBoleta = new modeloBoleta();
            $codT = $objBoleta->repFecha($codComp,$fecha);
            echo $codT;
        }

       elseif($this->verTipo($codComp) == "F"){
        include_once('../model/modeloFactura.php');
        $objFactura = new modeloFactura();
        $codT = $objFactura->repFecha($codComp,$fecha);
        echo $codT;
        }
    }

}
