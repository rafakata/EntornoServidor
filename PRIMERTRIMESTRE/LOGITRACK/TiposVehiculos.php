<?php
require_once 'Vehiculo.php';

class Furgoneta extends Vehiculo{
    public function calcularCosteEnvio($distanciaKm){
        $precioPorKm = 0.5;
        if ($this->cargaMaxima < 3000){
            return $distanciaKm * $precioPorKm;
        } else {
            return $distanciaKm * ($precioPorKm + 1.30);
        }
    }
}

class Camion extends Vehiculo{
   private $esRefrigerado;
    public function __construct($matricula, $marca, $carga, $esRefrigerado){
         parent::__construct($matricula, $marca, $carga);
         $this->esRefrigerado = $esRefrigerado;
    }
    public function calcularCosteEnvio($distanciaKm){
        $precioPorKm = 1.0;
        $costeFijo=50;
        $total = ($distanciaKm * $precioPorKm) + $costeFijo;
        if ($this->esRefrigerado){
            $total *=1.25;
        } else {
            return $total;
        }
    }
}
?>