<?php
    abstract class Vehiculo{
        protected $matricula;
        protected $marca;
        protected $cargaMaxima;

        public function __construct($matricula, $marca, $cargaMaxima){
            $this->matricula = $matricula;
            $this->marca = $marca;
            $this->cargaMaxima = $cargaMaxima;
        }

        public function getMatricula(){
            return $this->matricula;
        }

        public function getMarca(){
            return $this->marca;
        }

        abstract public function calcularCosteEnvio($distanciaKm);

        public function getInfo(){
            return "Vehículo ".$this->marca." [".$this->matricula."]";
        }
    }
?>