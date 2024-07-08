<?php
interface FechaStrategy {
    public function calcularFechaEntrega($current_date);
}

class FechaEntregaSemana implements FechaStrategy {
    public function calcularFechaEntrega($current_date) {
        return date('Y-m-d', strtotime($current_date . ' + 7 days'));
    }
}
?>
