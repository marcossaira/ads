<?php
interface CodigoStrategy {
    public function incrementarCodigo($code);
}

class IncrementarCodigoProforma implements CodigoStrategy {
    public function incrementarCodigo($code) {
        $code_number = intval(substr($code, 6));
        $code_number++;
        $new_code = substr($code, 0, 6) . strval($code_number);
        return $new_code;
    }
}
?>
