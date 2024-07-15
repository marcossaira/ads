<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
interface CodigoStrategy {
    public function incrementarCodigo($code);
}

interface FechaStrategy {
    public function calcularFechaEntrega($current_date);
}

class IncrementarCodigoProforma implements CodigoStrategy {
    public function incrementarCodigo($code) {
        $code_number = intval(substr($code, 6));
        $code_number++;
        $new_code = substr($code, 0, 6) . strval($code_number);
        return $new_code;
    }
}

class FechaEntregaSemana implements FechaStrategy {
    public function calcularFechaEntrega($current_date) {
        return date('Y-m-d', strtotime($current_date . ' + 7 days'));
    }
}
?>
